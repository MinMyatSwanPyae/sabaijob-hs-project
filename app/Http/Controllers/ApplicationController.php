<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ApplicationController extends Controller
{
    use AuthorizesRequests;

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
        'cover_letter' => 'required|string', // Ensure there is validation for the cover letter
    ]);

    $application = new Application();
    $application->user_id = auth()->user()->id;
    $application->vacancy_id = $request->vacancy_id;
    $application->cover_letter = $request->cover_letter; // Save the cover letter
    $application->save();

    return redirect()->route('applications.index')->with('success', 'Application submitted successfully.');
    }

    public function destroy($id)
    {
        $application = Application::findOrFail($id);
    
        // Check if the current user is the owner of the application
        if (auth()->user()->id !== $application->user_id) {
            return redirect()->route('applications.index')->withErrors('Unauthorized to perform this action.');
        }
    
        // Perform the deletion
        $application->delete();
        
        return redirect()->route('applications.index')->with('success', 'Application deleted successfully.');
    }
}


