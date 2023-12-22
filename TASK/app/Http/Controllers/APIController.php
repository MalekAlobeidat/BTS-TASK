<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function getAllCompanies()
    {
        $companies = Company::all();

        return response()->json(['companies' => $companies], 200);
    }
    public function getCompanyWithEmployees($companyId)
    {
        $company = Company::with('employees')->find($companyId);

        if (!$company) {
            return response()->json(['error' => 'Company not found'], 404);
        }

        return response()->json(['company' => $company], 200);
    }
}
