<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacancy;

class VacancyController extends Controller
{
    public function index()
    { 
        $vacancies = Vacancy::all();

        return view('site.vacancies.index', ['vacancies'=>$vacancies]);

    }

    public function show($id)
    {
        // Fetching a single vacancy by ID with its related recruiter data
        $vacancy = Vacancy::with('recruiter')->findOrFail($id);
        return view('site.vacancies.show', compact('vacancy'));
    }


    public function edit($id)
    {
    $vacancy = Vacancy::findOrFail($id);
    return view('site.vacancies.edit', compact('vacancy'));
    }

public function update(Request $request, $id)
    {
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
    ]);

    $vacancy = Vacancy::findOrFail($id);
    $vacancy->update([
        'title' => $request->title,
        'description' => $request->description,
    ]);

    return redirect()->route('vacancies.show', $vacancy->id)
                     ->with('success', 'Vacancy updated successfully!');
    }


}
