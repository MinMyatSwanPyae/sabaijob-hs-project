<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        // You can add more sophisticated role checking or user-specific data fetching here
        if (auth()->check()) {
            $user = auth()->user();
            $applications = $user->applications; // Assuming there is a relationship setup in the User model
            return view('site.home.show', compact('user', 'applications'));
        }
        return view('site.home.show');
    }
}


    

