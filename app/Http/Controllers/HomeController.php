<?php

namespace App\Http\Controllers;

use App\Models\Continent;
use App\Models\Equipe;
use App\Models\Genre;
use App\Models\Joueur;
use App\Models\Position;
use App\Models\Role;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $equipes = Equipe::all();
        $equipesEurope = Equipe::where('continent_id', 1)->get();
        $equipesMondial = Equipe::whereBetween('continent_id', [2,7])->get();
        $genres = Genre::all();
        $continents = Continent::all();
        $joueursMonde = Joueur::whereHas('equipe', function ($query) {$query->whereBetween('continent_id', [2,7]);})->with('equipe')->take(8)->get();
        $joueursEurope = Joueur::whereHas('equipe', function ($query) {$query->where('continent_id', 1);})->with('equipe')->take(8)->get();
        $joueurs = Joueur::all();
        $positions = Position::all();
        $roles = Role::all();
        return view('welcome', compact('equipes', 'genres', 'continents', 'joueurs', 'positions', 'roles', 'equipesEurope','equipesMondial', 'joueursEurope', 'joueursMonde'));
    }

    public function teams(){
        $equipes = Equipe::all();
        return view('teams', compact('equipes'));
    }
}
