<?php

namespace App\Http\Controllers;

use App\Models\Continent;
use App\Models\Equipe;
use App\Models\Genre;
use App\Models\Joueur;
use App\Models\Position;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $equipes = Equipe::all();
        $genres = Genre::all();
        $continents = Continent::all();
        $joueurs = Joueur::all();
        $positions = Position::all();
        $roles = Role::all();
        $users = User::all();

        $equipesEurope = Equipe::where('continent_id', 1)->get();
        $equipesMondial = Equipe::whereBetween('continent_id', [2,7])->get();
        $joueursMonde = Joueur::whereHas('equipe', function ($query) {$query->whereBetween('continent_id', [2,7]);})->with('equipe')->take(8)->get();
        $joueursEurope = Joueur::whereHas('equipe', function ($query) {$query->where('continent_id', 1);})->with('equipe')->take(8)->get();
        
        return view('welcome', compact('equipes', 'genres', 'continents', 'joueurs', 'positions', 'roles', 'users'));
    }
}
