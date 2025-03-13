<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\VacancyController;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Routes for Vacancies 
Route::get('/vacancies', [\App\Http\Controllers\VacancyController::class, 'index']);
//Route::get('/vacancies/{vacancy}', [\App\Http\Controllers\VacancyController::class, 'show']);
Route::get('/vacancies/{id}', [VacancyController::class, 'show'])->name('vacancies.show');

// Vacancies Edit Function
Route::get('/vacancies/{id}/edit', [VacancyController::class, 'edit'])->name('vacancies.edit');
Route::put('/vacancies/{id}', [VacancyController::class, 'update'])->name('vacancies.update');

// Routes For Companies 
Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
Route::get('/companies/{id}', [CompanyController::class, 'show'])->name('companies.show');



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

