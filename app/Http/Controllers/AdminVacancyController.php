<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacancy;
use Illuminate\Support\Facades\Auth;

class AdminVacancyController extends Controller
{

    public function index()
    {
        $adminCompanyId = Auth::user()->company_id; // Get the admin's company ID

        $vacancies = Vacancy::where('company_id', $adminCompanyId)->paginate(10);

        return view('admin.vacancies.index', compact('vacancies'));
    }


    public function create()
{
    if (auth()->user()->company_id === null) {
        abort(403, 'Unauthorized access. You need to belong to a company to create a vacancy.');
    }

    return view('admin.vacancies.create');
}


    public function store(Request $request)
{
    if (auth()->user()->company_id === null) {
        abort(403, 'Unauthorized access.');
    }

    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'location' => 'required|string',
    ]);

    Vacancy::create([
        'company_id' => auth()->user()->company_id,
        'title' => $request->title,
        'description' => $request->description,
        'location' => $request->location,
    ]);

    return redirect()->route('admin.vacancies.index')->with('success', 'Vacancy created successfully.');
}



    public function show($id)
    {
    $adminCompanyId = auth()->user()->company_id; 
   
    $vacancy = Vacancy::where('id', $id)
                      ->where('company_id', $adminCompanyId)
                      ->with(['company', 'applications.user'])
                      ->first();

    if (!$vacancy) {
        abort(403, 'Unauthorized access.'); 
    }

    return view('admin.vacancies.show', compact('vacancy'));
    }


    public function edit($id)
    {
    $adminCompanyId = auth()->user()->company_id;
    $vacancy = Vacancy::where('id', $id)
                      ->where('company_id', $adminCompanyId)
                      ->first();

    if (!$vacancy) {
        abort(403, 'Unauthorized access.');
    }

    return view('admin.vacancies.edit', compact('vacancy'));
    }


    public function update(Request $request, $id)
    {
        $adminCompanyId = auth()->user()->company_id;
        $vacancy = Vacancy::where('id', $id)
                          ->where('company_id', $adminCompanyId)
                          ->first();
    
        if (!$vacancy) {
            abort(403, 'Unauthorized access.');
        }
    
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
        ]);
    
        $vacancy->update($request->all());
    
        return redirect()->route('admin.vacancies.index')
                         ->with('success', 'Vacancy updated successfully');
    }
    

    public function destroy($id)
    {
        $adminCompanyId = auth()->user()->company_id;
        $vacancy = Vacancy::where('id', $id)
                          ->where('company_id', $adminCompanyId)
                          ->first();
    
        if (!$vacancy) {
            abort(403, 'Unauthorized access.');
        }
    
        $vacancy->delete();
    
        return redirect()->route('admin.vacancies.index')
                         ->with('success', 'Vacancy deleted successfully');
    }
}
