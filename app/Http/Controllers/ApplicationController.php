<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Application;

class ApplicationController extends Controller
{
    
    public function show($id)
    {
        $application = Application::with(['user', 'vacancy'])->findOrFail($id); 
        return view('site.applications.show', compact('application'));
    }

}
