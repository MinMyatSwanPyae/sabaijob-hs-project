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
                            ->paginate(12); 

        return view('site.vacancies.index', compact('vacancies'));
    }

    public function show($id)
    {
    $vacancy = Vacancy::with(['company', 'applications'])->findOrFail($id);

    return view('site.vacancies.show', compact('vacancy'));
    }
}
