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


    public function edit($id)
{
    $company = Company::findOrFail($id);
    return view('site.companies.edit', compact('company'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'website' => 'nullable|url'
    ]);

    $company = Company::findOrFail($id);
    $company->update([
        'name' => $request->name,
        'address' => $request->address,
        'website' => $request->website
    ]);

    return redirect()->route('companies.show', $company->id)
                     ->with('success', 'Company updated successfully!');
}
}
