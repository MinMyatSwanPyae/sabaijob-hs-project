<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class ApplicationController extends Controller
{
    public function index()
    {
        // Fetch all applications related to the user
        $applications = Application::where('user_id', auth()->id())->with(['vacancy', 'user'])->get();
        return view('site.applications.index', compact('applications'));
    }
    
    
    public function show($id)
    {
        $application = Application::with(['user', 'vacancy'])->findOrFail($id); 
        return view('site.applications.show', compact('application'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'vacancy_id' => 'required|exists:vacancies,id',
        ]);

        $application = new Application();
        $application->user_id = auth()->user()->id;
        $application->vacancy_id = $request->vacancy_id;
        $application->save();

        return back()->with('success', 'You have successfully applied for the position.');
    }
}


