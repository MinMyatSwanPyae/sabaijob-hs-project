<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use Auth;

class AdminCompanyController extends Controller

{
    public function show()
    {
        // Assuming each admin belongs to one company
        $company = Auth::user()->company;

        if (!$company) {
            return redirect()->route('admin.dashboard')->with('error', 'No company associated with your account.');
        }

        // Load the company with related vacancies and recruiters
        $company->load('vacancies', 'recruiters');

        return view('admin.companies.show', compact('company'));
    }
}
