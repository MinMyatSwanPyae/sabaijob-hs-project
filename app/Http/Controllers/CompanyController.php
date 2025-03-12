<?php

namespace App\Http\Controllers;
use App\Models\Company;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        // Fetch all companies; consider using pagination if there are many companies
        $companies = Company::paginate(10);
        return view('site.companies.index', compact('companies'));
    }

    public function show($id)
    {
        // Fetch a single company by ID, possibly with related data like vacancies
        $company = Company::with('vacancies')->findOrFail($id);
        return view('site.companies.show', compact('company'));
    }
}
