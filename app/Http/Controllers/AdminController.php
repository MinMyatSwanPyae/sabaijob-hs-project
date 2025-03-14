<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vacancy;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('isAdmin');
    }

    public function showVacancies()
    {
        $vacancies = Vacancy::all();
        return view('admin.vacancies.show', compact('vacancies'));
    }
}