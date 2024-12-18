<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\VacancyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// about pagina view
// routes/web.php
Route::get('/about', function () {
    return view('about');
})->name('about');



//A permanent redirect so no user can access Laravel's goofy ahh dashboard
Route::permanentRedirect('/dashboard', '/');

// Authenticated User Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

// Dashboard route - handled by DashboardController
Route::get('/dashboard', [DashboardController::class, 'redirectToDashboard'])->name('dashboard');
// Employee profile route (Werkgever)
// Employee Dashboard Route
Route::get('/profile/employerdash', [DashboardController::class, 'redirectToDashboard'])->name('employer');
Route::get('/profile/employer', [ProfileController::class, 'employer'])->name('profile.employer');

//Routes that implement middleware in their controller
Route::resource('vacancies', VacancyController::class);
Route::resource('branches', BranchController::class);
Route::resource('applications', ApplicationController::class) ->except(['create', 'store']);

// Application-specific routes
Route::put('vacancies/{vacancy}/toggle-active', [VacancyController::class, 'toggleActive'])->name('vacancies.toggle-active');

Route::get('applications/create/{vacancy}', [ApplicationController::class, 'create'])->name('applications.create');
Route::post('applications/store/{vacancy}', [ApplicationController::class, 'store'])->name('applications.store');

//Admin only routes
Route::middleware('can:admin')->group(function () {
    Route::get('/admin', function () {
        return view('admin');
    })->name('admin');

    Route::resource('companies', CompanyController::class);
    Route::get('admin/user-index', [AdminController::class, 'userIndex'])->name('admin.user-index');
    Route::get('admin/user-edit/{user}', [AdminController::class, 'userEdit'])->name('admin.user-edit');
    Route::put('admin/user-update/{user}', [AdminController::class, 'userUpdate'])->name('admin.user-update');
});

require __DIR__ . '/auth.php';
