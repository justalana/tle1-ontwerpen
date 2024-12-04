<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\VacancyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::resource('/vacancies', VacancyController::class)->only(['index', 'show']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Authenticated User Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

// Login Routes
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);

// Admin Routes
Route::middleware('can:admin')->group(function () {
    Route::get('/admin', function () {
        return view('admin');
    })->name('admin');

    Route::resource('branches', BranchController::class)->only(['create', 'store', 'destroy']);
    Route::resource('companies', CompanyController::class);
});

// Branch Editor Routes
Route::middleware('can:edit-branch,branch')->group(function () {
    Route::resource('branches', BranchController::class)->only(['edit', 'update']);
});

// Public Branch Routes
Route::resource('branches', BranchController::class)->only(['index', 'show']);

require __DIR__.'/auth.php';
