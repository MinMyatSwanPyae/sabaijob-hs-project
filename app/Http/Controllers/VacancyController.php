<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacancy;

class VacancyController extends Controller
{
   
    public function index()
    {
    $vacancies = Vacancy::join('companies', 'companies.id', '=', 'vacancies.company_id')
                        ->select('vacancies.*') 
                        ->get();

    return view('site.vacancies.index', compact('vacancies'));
    }

    public function create()
    {
        return view('site.vacancies.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            // Other fields as necessary
        ]);

        Vacancy::create($validatedData);
        return redirect()->route('vacancies.index');
    }

    public function show($id)
    {
    $vacancy = Vacancy::with('company')->findOrFail($id);
    return view('site.vacancies.show', compact('vacancy'));
    }


    public function edit($id)
    {
         $vacancy = Vacancy::findOrFail($id);
        return view('site.vacancies.edit', compact('vacancy'));
    }

    public function update(Request $request, Vacancy $vacancy)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
    
        $vacancy->update($request->all());   
        return redirect()->route('vacancies.show', ['id' => $vacancy->id])
                         ->with('success', 'Vacancy updated successfully!');
    }

    public function destroy($id)
        {
        $vacancy = Vacancy::findOrFail($id);
        $vacancy->delete();

        return redirect()->route('vacancies.index')->with('success', 'Vacancy deleted successfully.');
        }
}