<?php

namespace App\Http\Controllers;
use App\Models\Vacancy;
use Illuminate\Http\Request;


class AdminDashboardController extends Controller
{
    public function index()
    {
        // Check if the user is logged in and has the admin role
        if (!Auth::check() || Auth::user()->role !== 'admin') {
            // Redirect the user with an error message if they are not authorized
            return redirect('/home')->with('error', 'You are not authorized to access this page.');
        }

        // Proceed with normal operation for authorized users
        return view('admin.dashboard');
    }
}