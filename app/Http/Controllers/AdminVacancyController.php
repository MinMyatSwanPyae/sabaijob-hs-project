<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacancy;
use Illuminate\Support\Facades\Auth;

class AdminVacancyController extends Controller
{

    // Display a list of vacancies that belong to the admin's company
    public function index()
    {
        $adminCompanyId = Auth::user()->company_id; // Get the admin's company ID

        $vacancies = Vacancy::where('company_id', $adminCompanyId)->paginate(10);

        return view('admin.vacancies.index', compact('vacancies'));
    }

    // Show the create vacancy form
    public function create()
    {
        return view('admin.vacancies.create');
    }

    // Store a new vacancy in the database
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
        ]);

        Vacancy::create([
            'company_id' => Auth::user()->company_id, // Assign to admin's company
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
        ]);

        return redirect()->route('admin.vacancies.index')
                         ->with('success', 'Vacancy created successfully');
    }

    // Show a specific vacancy
    public function show($id)
    {
        $vacancy = Vacancy::findOrFail($id);
        return view('admin.vacancies.show', compact('vacancy'));
    }

    // Show the edit form for a specific vacancy
    public function edit($id)
    {
        $vacancy = Vacancy::findOrFail($id);
        return view('admin.vacancies.edit', compact('vacancy'));
    }

    // Update a vacancy
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string',
        ]);

        $vacancy = Vacancy::findOrFail($id);
        $vacancy->update($request->all());

        return redirect()->route('admin.vacancies.index')
                         ->with('success', 'Vacancy updated successfully');
    }

    // Delete a vacancy
    public function destroy($id)
    {
        $vacancy = Vacancy::findOrFail($id);
        $vacancy->delete();

        return redirect()->route('admin.vacancies.index')
                         ->with('success', 'Vacancy deleted successfully');
    }
}
