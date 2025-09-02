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
        $genres = Genre::all();
        $continents = Continent::all();
        $joueurs = Joueur::all();
        $positions = Position::all();
        $roles = Role::all();
        return view('welcome', compact('equipes', 'genres', 'continents', 'joueurs', 'positions', 'roles', 'equipesEurope'));
    }
}
