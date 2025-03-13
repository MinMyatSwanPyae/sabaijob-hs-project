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
            return redirect('/home')->with('error', 'You are not authorized to access this page.');
        }
        return view('admin.dashboard');
    }
}