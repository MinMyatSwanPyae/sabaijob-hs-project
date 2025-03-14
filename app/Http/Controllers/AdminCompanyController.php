<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company; 
class AdminCompanyController extends Controller
{
    
    // Display the specific company information
    public function show($id)
    {
        $company = Company::findOrFail($id);
        return view('admin.companies.show', compact('company'));
    }

    // Show the form for editing the specific company information
    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('admin.companies.edit', compact('company'));
    }

    // Update the specified company in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            // add other fields as necessary
        ]);

        $company = Company::findOrFail($id);
        $company->update($request->all());

        return redirect()->route('admin.companies.show', $company->id)
                         ->with('success', 'Company updated successfully');
    }
}
