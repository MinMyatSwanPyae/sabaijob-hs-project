<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\VacancyController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminVacancyController;
use App\Http\Controllers\AdminCompanyController;
use Livewire\Livewire;
use Livewire\Volt\Volt;

// Home route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Authentication routes
Auth::routes();

// Admin-specific routes
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin/vacancies', [AdminVacancyController::class, 'index'])->name('admin.vacancies.index');
    Route::get('/admin/companies/{id}', [AdminCompanyController::class, 'show'])->name('companies.show');
    Route::get('/admin/companies/{id}/edit', [AdminCompanyController::class, 'edit'])->name('companies.edit');
    Route::put('/admin/companies/{id}', [AdminCompanyController::class, 'update'])->name('companies.update');
});



// Public Routes for Vacancies
Route::resource('vacancies', VacancyController::class)->only(['index', 'show']);

// Public Routes for Companies
Route::resource('companies', CompanyController::class);



// Application specific routes
Route::middleware(['auth'])->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('/applications', [ApplicationController::class, 'index'])->name('applications.index');
        Route::get('/applications/{id}', [ApplicationController::class, 'show'])->name('applications.show');
        Route::post('/applications', [ApplicationController::class, 'store'])->name('applications.store');
        Route::delete('/applications/{id}', [ApplicationController::class, 'destroy'])->name('applications.destroy')->middleware('auth');

    });
});

// Additional Auth routes
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/login', [LoginController::class, 'login'])->name('login');


// Route::view('dashboard', 'dashboard')
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('settings.profile');
    Volt::route('settings/password', 'settings.password')->name('settings.password');
    Volt::route('settings/appearance', 'settings.appearance')->name('settings.appearance');
});

require __DIR__.'/auth.php';

