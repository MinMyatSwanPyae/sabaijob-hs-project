<?php

namespace App\Http\Controllers;
use App\Models\Company;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        // $companies = Company::all();
        // return view('site.companies.index', compact('companies'));

 // pagination 
        $companies = Company::paginate(20);  
        return view('site.companies.index', compact('companies'));
    }

    public function create()
    {
        return view('site.companies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'website' => 'nullable|url',
        ]);

        Company::create($request->all());
        return redirect()->route('companies.index')->with('success', 'Company created successfully!');
    }

    public function show(Company $company)
    {
        return view('site.companies.show', compact('company'));
    }

    public function edit(Company $company)
    {
        return view('site.companies.edit', compact('company'));
    }

    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'website' => 'nullable|url',
        ]);

        $company->update($request->all());
        return redirect()->route('companies.show', $company)->with('success', 'Company updated successfully!');
    }

    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('companies.index')->with('success', 'Company deleted successfully!');
    }


}
