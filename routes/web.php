<?php

use App\Http\Controllers\ContinentController;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\JoueurController;
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


// ROUTE EQUIPE
Route::get('/equipes', [EquipeController::class, 'index'])->name('equipes.index');
Route::get('/equipes/create', [EquipeController::class, 'create'])->name('equipes.create');
Route::post('/equipes', [EquipeController::class, 'store'])->name('equipes.store');
Route::get('/equipes/{equipe}', [EquipeController::class, 'show'])->name('equipes.show');
Route::get('/equipes/{equipe}/edit', [EquipeController::class, 'edit'])->name('equipes.edit');
Route::put('/equipes/{equipe}', [EquipeController::class, 'update'])->name('equipes.update');
Route::delete('/equipes/{equipe}', [EquipeController::class, 'destroy'])->name('equipes.destroy');
require __DIR__.'/auth.php';

// ROUTE JOUEUR
Route::get('/joueurs', [JoueurController::class, 'index'])->name('joueurs.index');
Route::get('/joueurs/create', [JoueurController::class, 'create'])->name('joueurs.create');
Route::post('/joueurs', [JoueurController::class, 'store'])->name('joueurs.store');
Route::get('/joueurs/{id}', [JoueurController::class, 'show'])->name('joueurs.show');
Route::get('/joueurs/{id}/edit', [JoueurController::class, 'edit'])->name('joueurs.edit');
Route::put('/joueurs/{id}', [JoueurController::class, 'update'])->name('joueurs.update');
Route::delete('/joueurs/{id}', [JoueurController::class, 'destroy'])->name('joueurs.destroy');
