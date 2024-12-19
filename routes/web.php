<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\VacancyController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Authenticated User Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    Route::get('/dashboard', function() {

        if (Gate::allows('admin')) {

            return to_route('admin');

        } else {
        return view('dashboard');
        }

    })->name('dashboard');
});

//Routes that implement middleware in their controller
Route::resource('vacancies', VacancyController::class);
Route::resource('branches', BranchController::class);
Route::resource('applications', ApplicationController::class)->only(['show']);

Route::get('private/vacancies', [VacancyController::class, 'private'])->name('vacancies.private');
Route::put('vacancies/{vacancy}/toggle-active', [VacancyController::class, 'toggleActive'])->name('vacancies.toggle-active');

// Application-specific routes
Route::get('applications/create/{vacancy}', [ApplicationController::class, 'create'])->name('applications.create');
Route::post('applications/store/{vacancy}', [ApplicationController::class, 'store'])->name('applications.store');
Route::get('applications/index/{vacancy?}', [ApplicationController::class, 'index'])->name('applications.index');
Route::get('applications', [ApplicationController::class, 'index'])->name('applications.index');

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
