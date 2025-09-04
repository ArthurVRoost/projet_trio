<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Enregistrer les helpers
        require_once app_path('helpers/AuthHelper.php');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Gates pour les rôles
        Gate::define("isAdmin", function ($user) {
            return $user->role_id == 4;
        });

        Gate::define("isCoach", function($user) {
            return in_array($user->role_id, [3, 4]); // Coach ou Admin
        });

        Gate::define("isUser", function($user) {
            return in_array($user->role_id, [2, 3, 4]); // User, Coach ou Admin
        });

        // Gates pour les permissions spécifiques
        Gate::define("manage-users", function($user) {
            return $user->role_id == 4; // Seuls les admins
        });

        Gate::define("manage-teams", function($user) {
            return in_array($user->role_id, [3, 4]); // Coach ou Admin
        });

        Gate::define("manage-players", function($user) {
            return in_array($user->role_id, [2, 3, 4]); // User, Coach ou Admin
        });

        Gate::define("edit-own-player", function($user, $player) {
            return $user->role_id == 4 || // Admin peut tout modifier
                   ($user->role_id == 2 && $player->user_id == $user->id) || // User peut modifier ses propres joueurs
                   ($user->role_id == 3 && $player->user_id == $user->id); // Coach peut modifier ses propres joueurs
        });

        Gate::define("edit-own-team", function($user, $team) {
            return $user->role_id == 4 || // Admin peut tout modifier
                   ($user->role_id == 3 && $team->user_id == $user->id); // Coach peut modifier ses propres équipes
        });
    }
}