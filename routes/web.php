
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContinentController;
use App\Http\Controllers\EquipeController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JoueurController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;

// ========================================
// ROUTES PUBLIQUES (Guests)
// ========================================

// Page d'accueil
Route::get('/', [HomeController::class, 'home'])->name('home');

// Consultation des joueurs et équipes (lecture seule)
Route::get('/joueurs', [JoueurController::class, 'index'])->name('joueurs.index');
Route::get('/equipes', [EquipeController::class, 'index'])->name('equipes.index');

// ========================================
// ROUTES AUTHENTIFIÉES
// ========================================

Route::middleware('auth')->group(function () {
    // Profil utilisateur
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ========================================
// ROUTES UTILISATEURS (User, Coach, Admin)
// ========================================


    // Gestion des joueurs - Routes spécifiques AVANT les routes avec paramètres
    Route::get('/joueurs/create', [JoueurController::class, 'create'])->name('joueurs.create');
    Route::post('/joueurs', [JoueurController::class, 'store'])->name('joueurs.store');
    Route::get('/joueurs/{id}/edit', [JoueurController::class, 'edit'])->name('joueurs.edit');
    Route::put('/joueurs/{id}', [JoueurController::class, 'update'])->name('joueurs.update');
    Route::delete('/joueurs/{id}', [JoueurController::class, 'destroy'])->name('joueurs.destroy');


// ========================================
// ROUTES COACHS (Coach, Admin)
// ========================================

Route::middleware(['auth', 'coach'])->group(function () {
    // Gestion des équipes - Routes spécifiques AVANT les routes avec paramètres
    Route::get('/equipes/create', [EquipeController::class, 'create'])->name('equipes.create');
    Route::post('/equipes', [EquipeController::class, 'store'])->name('equipes.store');
    Route::get('/equipes/{equipe}/edit', [EquipeController::class, 'edit'])->name('equipes.edit');
    Route::put('/equipes/{equipe}', [EquipeController::class, 'update'])->name('equipes.update');
    Route::delete('/equipes/{equipe}', [EquipeController::class, 'destroy'])->name('equipes.destroy');
});

// ========================================
// ROUTES ADMINISTRATEURS (Admin uniquement)
// ========================================

Route::middleware(['auth', 'admin'])->group(function () {
    // Gestion des utilisateurs
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::patch('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
});

// ========================================
// ROUTES DE CONSULTATION (après toutes les routes spécifiques)
// ========================================

// Consultation des détails (lecture seule) - Ces routes doivent être en dernier
Route::get('/joueurs/{id}', [JoueurController::class, 'show'])->name('joueurs.show');
Route::get('/equipes/{equipe}', [EquipeController::class, 'show'])->name('equipes.show');

// ========================================
// ROUTES D'AUTHENTIFICATION
// ========================================

require __DIR__.'/auth.php';
