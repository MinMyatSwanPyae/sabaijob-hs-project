<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminVacancyController extends Controller
{
    /**
     * Display a listing of the resource specific to the admin's company.
     */
    public function index()
    {
        $vacancies = Vacancy::where('company_id', Auth::user()->company_id)->get();
        return view('admin.dashboard', compact('vacancies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.vacancies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
        ]);

        $vacancy = new Vacancy($request->all());
        $vacancy->company_id = Auth::user()->company_id; // Ensure it's set to the admin's company
        $vacancy->save();

        return redirect()->route('admin.dashboard')->with('success', 'Vacancy created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $vacancy = Vacancy::where('id', $id)
                          ->where('company_id', Auth::user()->company_id)
                          ->firstOrFail();
        return view('admin.vacancies.show', compact('vacancy'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $vacancy = Vacancy::where('id', $id)
                          ->where('company_id', Auth::user()->company_id)
                          ->firstOrFail();
        return view('admin.vacancies.edit', compact('vacancy'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
        ]);

        $vacancy = Vacancy::where('id', $id)
                          ->where('company_id', Auth::user()->company_id)
                          ->firstOrFail();
        $vacancy->update($request->all());

        return redirect()->route('admin.dashboard')->with('success', 'Vacancy updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $vacancy = Vacancy::where('id', $id)
                          ->where('company_id', Auth::user()->company_id)
                          ->firstOrFail();
        $vacancy->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Vacancy deleted successfully.');
    }
}