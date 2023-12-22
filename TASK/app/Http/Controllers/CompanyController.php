<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $companies = Company::paginate(10); 
        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'nullable|email',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif', 
        ]);

        $this->validateMinFileSize($request->file('logo'));

        $company = new Company();
        $company->name = $request->input('name');
        $company->email = $request->input('email');

        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('public/logos');
            $company->logo = basename($logoPath); // Store only the filename in the database
        }

        $company->save();

        return redirect()->route('companies.index')->with('success', 'Company created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        return view('companies.edit', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'nullable|email',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        $this->validateMinFileSize($request->file('logo'));

        $company->name = $request->input('name');
        $company->email = $request->input('email');

        if ($request->hasFile('logo')) {
            if ($company->logo) {
                Storage::delete('public/logos/' . $company->logo);
            }

            $logoPath = $request->file('logo')->store('public/logos');
            $company->logo = basename($logoPath);
        }

        $company->save();

        return redirect()->route('companies.index')->with('success', 'Company updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        if ($company->logo) {
            Storage::delete('public/logos/' . $company->logo);
        }

        $company->delete();

        return redirect()->route('companies.index')->with('success', 'Company deleted successfully!');
    }


    private function validateMinFileSize($file)
    {
        if ($file && $file->getSize() < 100 * 1024) {
            abort(422, 'The logo must be at least 100 KB in size.');
        }
    }

    // public function viewEmployees(Company $company)
    // {
    //     $employees = Employee::where('company_id', $company->id)->paginate(10);

    //     return view('employees.index', compact('company', 'employees'));
    // }
}
