<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Auth;


class AdminDashboardController extends Controller
{
    public function index()
    {
        // Check if the user is logged in and has the admin role
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            return redirect()->route('home')->with('error', 'You are not authorized to view this page.');
        }

        // Fetch only the vacancies associated with the admin's company
        $company_id = Auth::user()->company_id; // Get the company ID from the logged-in user
        $vacancies = Vacancy::where('company_id', $company_id)->get();

        // Pass vacancies data to the view
        return view('admin.dashboard', compact('vacancies'));
    }
}

