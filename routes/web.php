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
    Route::get('/admin/vacancies', [AdminController::class, 'showVacancies'])->name('admin.vacancies.show');
    Route::get('/admin/vacancies/{id}', [AdminVacancyController::class, 'show'])->name('admin.vacancies.show');
    Route::get('/admin/vacancies', [AdminVacancyController::class, 'index'])->name('admin.vacancies.index');
    Route::get('/admin/vacancies/create', [AdminVacancyController::class, 'create'])->name('admin.vacancies.create');
    Route::post('/admin/vacancies', [AdminVacancyController::class, 'store'])->name('admin.vacancies.store');
    Route::get('/admin/vacancies/{id}/edit', [AdminVacancyController::class, 'edit'])->name('admin.vacancies.edit');
    Route::put('/admin/vacancies/{id}', [AdminVacancyController::class, 'update'])->name('admin.vacancies.update');
    Route::delete('/admin/vacancies/{id}', [AdminVacancyController::class, 'destroy'])->name('admin.vacancies.destroy');

    Route::get('/admin/companies', [AdminCompanyController::class, 'show'])->name('admin.companies.show');
    Route::get('/admin/companies/edit', [AdminCompanyController::class, 'edit'])->name('admin.companies.edit');
    Route::put('/admin/companies/update', [AdminCompanyController::class, 'update'])->name('admin.companies.update');
    

    Route::get('/applications/{id}', [ApplicationController::class, 'show'])->name('applications.show');

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

