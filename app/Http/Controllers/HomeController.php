<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacancy; 
use App\Models\Company; 

class HomeController extends Controller
{
    public function index()
    {
        $latestVacancies = Vacancy::latest()->limit(9)->get();

        $topCompanies = Company::withCount('vacancies')
                               ->orderBy('vacancies_count', 'desc')
                               ->limit(3)
                               ->get();


        if (auth()->check()) {
            $user = auth()->user();
            $applications = $user->applications; 
            return view('site.home.show', compact('user', 'applications', 'latestVacancies', 'topCompanies'));
        }

        return view('site.home.show', compact('latestVacancies', 'topCompanies'));
    }
}


    

