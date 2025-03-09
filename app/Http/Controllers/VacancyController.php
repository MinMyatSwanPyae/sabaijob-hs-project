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

    public function show(int $vacancies)
    {
        $vacancies = \App\Models\Vacancy::where('id', $vacancies)->first();
        return view('site.vacancies.show', ['vacancy' => $vacancies]);

    }

}
