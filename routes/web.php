<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\VacancyController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AdminVacancyController;


Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

// loginController 
Auth::routes();
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');




// Public Routes for Vacancies 
Route::get('/vacancies', [VacancyController::class, 'index'])->name('vacancies.index');
Route::get('/vacancies/{id}', [VacancyController::class, 'show'])->name('vacancies.show');

// Public Routes For Companies 
Route::get('/companies', [CompanyController::class, 'index'])->name('companies.index');
Route::get('/companies/{company}', [CompanyController::class, 'show'])->name('companies.show');

// Admin Dashboard
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin/dashboard', [AdminVacancyController::class, 'index'])->name('admin.dashboard'); 
    Route::resource('vacancies', AdminVacancyController::class)->except(['index']); 
});

// Application Show Page
Route::get('/applications/{id}', [ApplicationController::class, 'show'])->name('applications.show');

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

