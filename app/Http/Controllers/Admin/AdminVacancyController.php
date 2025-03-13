<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class AdminVacancyController extends Controller
{
    public function index()
{
    $vacancies = Vacancy::all();
    return view('admin.dashboard', compact('vacancies'));
}

public function create()
{
    return view('admin.vacancies.create');
}

public function show($id)
{
    $vacancy = Vacancy::findOrFail($id);
    return view('admin.vacancies.show', compact('vacancy'));
}

public function edit($id)
{
    $vacancy = Vacancy::findOrFail($id);
    return view('admin.vacancies.edit', compact('vacancy'));
}

public function destroy($id)
{
    $vacancy = Vacancy::findOrFail($id);
    $vacancy->delete();
    return redirect()->route('admin.dashboard')->with('success', 'Vacancy deleted successfully');
}
}
