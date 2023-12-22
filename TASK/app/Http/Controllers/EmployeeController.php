<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmployeeRequest;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EmployeeController extends Controller
{

      /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // dd($request);
        $query = Employee::query();
        
        if ($request->has('company_filter') && $request->input('company_filter') !== null) {
            Log::info('Company Filter Applied: ' . $request->input('company_filter'));
                $query->where('company_id', $request->input('company_filter'));
        }
        $companies = Company::all();
        
        $employees = $query->paginate(10);
    
        return view('employees.index', compact('employees', 'companies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $companies = Company::all(); 

        return view('employees.create',compact('companies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeRequest $request)
    {
        Employee::create($request->all());
    
        return redirect()->route('employees.index')->with('success', 'Employee created successfully!');
    }
    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        $companies = Company::all(); 

        return view('employees.edit', compact('employee', 'companies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'company_id' => 'required|exists:companies,id',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
        ]);

        $employee->update($request->all());

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully!');
    }
    public function filterByCompany(Request $request){
        $query = Employee::query();

        // Check if a company filter is applied
        if ($request->has('company_filter') && $request->input('company_filter') !== '') {
            $query->where('company_id', $request->input('company_filter'));
        }
    
        $employees = $query->paginate(10);
    
        // Fetch the list of companies for the filter dropdown, considering the same filter
        $companies = Company::when($request->has('company_filter') && $request->input('company_filter') !== '', function ($query) use ($request) {
            $query->where('id', $request->input('company_filter'));
        })->get();
    
        return view('employees.index', compact('employees', 'companies'));
    }
}
