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

}
