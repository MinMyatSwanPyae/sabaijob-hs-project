<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\VacancyController;
use App\Http\Controllers\ApplicationController;


Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/vacancies', [VacancyController::class, 'index'])->name('vacancies.index');
Route::get('/vacancies/create', [VacancyController::class, 'create'])->name('vacancies.create');
Route::post('/vacancies', [VacancyController::class, 'store'])->name('vacancies.store');
Route::get('/vacancies/{id}', [VacancyController::class, 'show'])->name('vacancies.show');
Route::get('/vacancies/{id}/edit', [VacancyController::class, 'edit'])->name('vacancies.edit');
Route::put('/vacancies/{id}', [VacancyController::class, 'update'])->name('vacancies.update');
Route::delete('/vacancies/{id}', [VacancyController::class, 'destroy'])->name('vacancies.destroy');

// Routes For Companies 
Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
Route::get('/companies/{id}', [CompanyController::class, 'show'])->name('companies.show');

// Company Edit Feature
Route::get('/companies/{id}/edit', [CompanyController::class, 'edit'])->name('companies.edit');
Route::put('/companies/{id}', [CompanyController::class, 'update'])->name('companies.update');

// Application Show Page
Route::get('/applications/{id}', [ApplicationController::class, 'show'])->name('applications.show');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';

