<?php

use App\Http\Controllers\BranchController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


Route::middleware('can:admin')->group(function () {

    Route::get('/branch-dev', function () {
        return view('branches.devpage');
    })
        ->name('branchDevPage');

    Route::resource('branches', BranchController::class)->only('create', 'store', 'destory');
    Route::resource('companies', CompanyController::class);

});


Route::middleware('can:edit-branch,branch')->group(function () {

    Route::resource('branches', BranchController::class)->only('edit', 'update');

});

Route::resource('branches', BranchController::class)->only('index', 'show');

