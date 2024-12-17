<?php

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

// Permanent redirect to avoid accessing the Laravel dashboard
Route::permanentRedirect('/dashboard', '/');

// Profile routes
Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
Route::post('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');


// Dashboard route - handled by DashboardController
Route::get('/dashboard', [DashboardController::class, 'redirectToDashboard'])->name('dashboard');
// Employee profile route (Werkgever)
// Employee Dashboard Route
Route::get('/profile/employeedash', [ProfileController::class, 'showEmployeeDashboard'])->name('employee');
Route::get('/profile/employee', [ProfileController::class, 'employee'])->name('profile.employee');



// Logout route
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Routes for resources
Route::resource('vacancies', VacancyController::class);
Route::resource('branches', BranchController::class);
Route::resource('applications', ApplicationController::class)->except(['create', 'store']);

// Application-specific routes
Route::get('applications/create/{vacancy}', [ApplicationController::class, 'create'])->name('applications.create');
Route::post('applications/store/{vacancy}', [ApplicationController::class, 'store'])->name('applications.store');

//Admin only routes
Route::middleware('can:admin')->group(function () {
    Route::get('/admin', function () {
        return view('admin');
    })->name('admin');

    Route::resource('companies', CompanyController::class);
});
require __DIR__ . '/auth.php';
