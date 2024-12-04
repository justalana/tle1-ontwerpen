<?php use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/', function () {
return view('home');
});

Route::resource('/vacancies', VacancyController::class)->only(['index', 'show']);

Route::get('/dashboard', function () {
return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
// Toon profiel
Route::get('/profile', [ProfileController::class, 'show'])->name('profile');

// Bewerk profiel
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

// Verwijder profiel
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Login routes
Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('login', [AuthenticatedSessionController::class, 'store']);
Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

require __DIR__.'/auth.php';

Route::middleware('can:admin')->group(function () {
Route::get('/admin', function () {
return view('admin');
})
->name('admin');

Route::resource('branches', BranchController::class)->only('create', 'store', 'destroy');
Route::resource('companies', CompanyController::class);
});

Route::middleware('can:edit-branch,branch')->group(function () {
Route::resource('branches', BranchController::class)->only('edit', 'update');
});

Route::resource('branches', BranchController::class)->only('index', 'show');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('/login', [AuthenticatedSessionController::class, 'store']);


require __DIR__.'/auth.php';
