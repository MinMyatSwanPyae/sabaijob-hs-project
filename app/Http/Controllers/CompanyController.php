<?php

namespace App\Http\Controllers;
use App\Models\Company;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        
        return view('site.companies.index', ['companies'=> $companies]);
    }

    public function show(int $companies)
    {
        $companies = \App\Models\Company::where('id', $companies)->first();
        return view('site.companies.show', ['company' => $companies]);
    }


}
