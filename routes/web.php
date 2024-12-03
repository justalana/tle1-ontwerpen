<?php use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
return view('home');
});

Route::get('/dashboard', function () {
return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
// Profiel bewerken
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

// Profiel bijwerken
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

// Profiel verwijderen
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
