<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminVacancyController extends Controller
{
    /**
     * Display a listing of the resource specific to the admin's company.
     */
    public function index()
    {
        $vacancies = Vacancy::where('company_id', Auth::user()->company_id)->get();
        return view('admin.vacancies.show', compact('vacancies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.vacancies.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
        ]);
    
        if (is_null(auth()->user()->company_id)) {
            return redirect()->back()->withErrors('You are not associated with any company.');
        }
    
        $validated['company_id'] = auth()->user()->company_id;
    
        try {
            $vacancy = new Vacancy($validated);
            $vacancy->save();
            return redirect()->route('admin.vacancies.index')->with('success', 'Vacancy created successfully!');
        } catch (\Exception $e) {
            return back()->withErrors('Failed to create vacancy: ' . $e->getMessage());
        }
    }



    public function show($id)
    {
    $vacancy = Vacancy::find($id);
    if (!$vacancy) {
        return redirect()->route('admin.vacancies.index')->with('error', 'Vacancy not found.');
    }

    return view('admin.vacancies.show', compact('vacancy'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $vacancy = Vacancy::where('id', $id)
                          ->where('company_id', Auth::user()->company_id)
                          ->firstOrFail();
        return view('admin.vacancies.edit', compact('vacancy'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'location' => 'required',
        ]);

        $vacancy = Vacancy::where('id', $id)
                          ->where('company_id', Auth::user()->company_id)
                          ->firstOrFail();
        $vacancy->update($request->all());

        return redirect()->route('admin.dashboard')->with('success', 'Vacancy updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $vacancy = Vacancy::where('id', $id)
                          ->where('company_id', Auth::user()->company_id)
                          ->firstOrFail();
        $vacancy->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Vacancy deleted successfully.');
    }
}