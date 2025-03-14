<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;

class AdminCompanyController extends Controller
{
    public function show()
    {

        $company = Company::where('id', Auth::user()->company_id)->firstOrFail();

        return view('admin.companies.show', compact('company'));
    }

    public function edit()
    {
        $company = Company::where('id', Auth::user()->company_id)->firstOrFail();
        return view('admin.companies.edit', compact('company'));
    }

    public function update(Request $request)
    {
        $company = Company::where('id', Auth::user()->company_id)->firstOrFail();

        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'website' => 'nullable|url|max:255',
        ]);

        $company->update([
            'name' => $request->name,
            'address' => $request->address,
            'website' => $request->website,
        ]);

        return redirect()->route('admin.companies.show')->with('success', 'Company updated successfully.');
    }
}
