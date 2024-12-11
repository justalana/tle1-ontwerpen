<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\VacancyController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//A permanent redirect so no user can access Laravel's goofy ahh dashboard
Route::permanentRedirect('/dashboard', '/');

// Route voor werknemers
Route::get('/dashboard', function () {
    if (auth()->check()) {
        if (auth()->user()->role == 1) {
            return view('dashboard'); // Werknemers naar dashboard
        } elseif (auth()->user()->role == 2) {
            return redirect()->route('profile.employeedash'); // Werkgevers naar employeedash
        }
    }

    abort(403, 'Toegang geweigerd.');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route voor werkgevers
Route::get('/employeedash', function () {
    if (auth()->check() && auth()->user()->role == 2) {
        return view('profile.employeedash'); // Alleen werkgevers hebben toegang
    }

    abort(403, 'Toegang geweigerd. Alleen werkgevers hebben toegang.');
})->middleware(['auth', 'verified'])->name('profile.employeedash');


// Authenticated User Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

//Routes that implement middleware in their controller
Route::resource('vacancies', VacancyController::class);
Route::resource('branches', BranchController::class);
Route::resource('applications', ApplicationController::class) -> except(['create', 'store']);

Route::get('applications/create/{vacancy}', [ApplicationController::class, 'create'])->name('applications.create');
Route::post('applications/store/{vacancy}', [ApplicationController::class, 'store'])->name('applications.store');


// werkgever profile
Route::middleware('auth')->group(function () {
    Route::get('/employee', [ProfileController::class, 'showProfile'])->name('employee.profile');
});

Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::get('/employee/profile', [ProfileController::class, 'showProfile'])->name('employee');



//Admin only routes
Route::middleware('can:admin')->group(function () {
    Route::get('/admin', function () {
        return view('admin');
    })->name('admin');

    Route::resource('companies', CompanyController::class);
});

require __DIR__ . '/auth.php';
