<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class AuthHelper
{
    /**
     * Vérifier si l'utilisateur connecté a un rôle spécifique
     */
    public static function hasRole($roleId)
    {
        if (!Auth::check()) {
            return false;
        }
        
        return Auth::user()->role_id == $roleId;
    }

    /**
     * Vérifier si l'utilisateur connecté est admin
     */
    public static function isAdmin()
    {
        return self::hasRole(4);
    }

    /**
     * Vérifier si l'utilisateur connecté est coach
     */
    public static function isCoach()
    {
        return in_array(Auth::user()->role_id ?? 0, [3, 4]);
    }

    /**
     * Vérifier si l'utilisateur connecté est user
     */
    public static function isUser()
    {
        return in_array(Auth::user()->role_id ?? 0, [2, 3, 4]);
    }

    /**
     * Vérifier si l'utilisateur peut gérer les utilisateurs
     */
    public static function canManageUsers()
    {
        return Gate::allows('manage-users');
    }

    /**
     * Vérifier si l'utilisateur peut gérer les équipes
     */
    public static function canManageTeams()
    {
        return Gate::allows('manage-teams');
    }

    /**
     * Vérifier si l'utilisateur peut gérer les joueurs
     */
    public static function canManagePlayers()
    {
        return Gate::allows('manage-players');
    }

    /**
     * Vérifier si l'utilisateur peut modifier un joueur spécifique
     */
    public static function canEditPlayer($player)
    {
        return Gate::allows('edit-own-player', $player);
    }

    /**
     * Vérifier si l'utilisateur peut modifier une équipe spécifique
     */
    public static function canEditTeam($team)
    {
        return Gate::allows('edit-own-team', $team);
    }

    /**
     * Obtenir le nom du rôle de l'utilisateur connecté
     */
    public static function getRoleName()
    {
        if (!Auth::check()) {
            return 'Guest';
        }

        $roleId = Auth::user()->role_id;
        
        return match($roleId) {
            1 => 'Guest',
            2 => 'User',
            3 => 'Coach',
            4 => 'Admin',
            default => 'Unknown'
        };
    }
}