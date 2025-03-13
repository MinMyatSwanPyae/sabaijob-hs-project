<?php

namespace App\Http\Controllers;
use App\Models\Company;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::paginate(10);
        return view('site.companies.index', compact('companies'));
    }

    public function show($id)
    {
        $company = Company::with('vacancies')->findOrFail($id);
        return view('site.companies.show', compact('company'));
    }
}
