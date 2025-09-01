<?php

use App\Http\Controllers\ContinentController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ROUTE CONTINENT
Route::get('/continents', [ContinentController::class, 'index'])->name('continents.index');
Route::get('/continents/create', [ContinentController::class, 'create'])->name('continents.create');
Route::post('/continents', [ContinentController::class, 'store'])->name('continents.store');
Route::get('/continents/{id}', [ContinentController::class, 'show'])->name('continents.show');
Route::get('/continents/{id}/edit', [ContinentController::class, 'edit'])->name('continents.edit');
Route::put('/continents/{id}', [ContinentController::class, 'update'])->name('continents.update');
Route::delete('/continents/{id}', [ContinentController::class, 'destroy'])->name('continents.destroy');


// ROUTE GENRE
Route::get('/genres', [GenreController::class, 'index'])->name('genres.index');
Route::get('/genres/create', [GenreController::class, 'create'])->name('genres.create');
Route::post('/genres', [GenreController::class, 'store'])->name('genres.store');
Route::get('/genres/{id}', [GenreController::class, 'show'])->name('genres.show');
Route::get('/genres/{id}/edit', [GenreController::class, 'edit'])->name('genres.edit');
Route::put('/genres/{id}', [GenreController::class, 'update'])->name('genres.update');
Route::delete('/genres/{id}', [GenreController::class, 'destroy'])->name('genres.destroy');

require __DIR__.'/auth.php';
