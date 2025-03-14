<?php

namespace App\Http\Controllers;

use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminVacancyController extends Controller
{
   // public function __construct()
  //  {
   //     $this->middleware('auth');
   //     $this->middleware('isAdmin'); 
   // }

    public function index()
    {
        // Assuming each admin belongs to one company and their company_id is stored in users table
        $company_id = Auth::user()->company_id;
        $vacancies = Vacancy::where('company_id', $company_id)->get();

        return view('admin.vacancies.index', compact('vacancies'));
    }

    // Add other necessary methods like create, store, edit, update, delete as needed
}