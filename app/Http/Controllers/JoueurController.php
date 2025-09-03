<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use App\Models\Genre;
use App\Models\Joueur;
use App\Models\Position;
use Illuminate\Http\Request;

class JoueurController extends Controller
{
    public function index() {
        $joueurs = Joueur::all();
        return view('joueurs/index', compact('joueurs'));
    }

    public function create() {
        $positions = Position::all();
        $equipes = Equipe::all();
        $genres = Genre::whereBetween('id', [1,2])->get();
        return view('joueurs/create', compact('positions', 'equipes', 'genres'));
    }

    public function store(Request $request) {

        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'age' => 'required|integer|min:10|max:100',
            'tel' => 'required|string|max:20',
            'email' => 'required|email|unique:joueurs,email',
            'pays' => 'required|string|max:255',
            'position' => 'required',
            'equipe' => 'required',
            'genre' => 'required',
            'src' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // !Ajouter une condition par rapport au sexe!

        // On va vérifier au début si l'équipe choisie est complète ou non
        $equipe = Equipe::find($request->equipe);
        if ($equipe->joueur()->count() >= 15) {
            return redirect()->route('joueurs.create')->with('error', 'Cette équipe est déjà complète');
        }

        $joueur = new Joueur();

        $joueur->nom = $request->nom;
        $joueur->prenom = $request->prenom;
        $joueur->age = $request->age;
        $joueur->tel = $request->tel;
        $joueur->email = $request->email;
        $joueur->pays = $request->pays;
        $joueur->position_id = $request->position;
        $joueur->equipe_id = $request->equipe;
        $joueur->genre_id = $request->genre;
        // le auth()->id() renvoit l'id du user s'il est connecté, sinon null :
        // $joueur->user_id = auth()->id();
        $joueur->user_id = 1;

        // on sauvegarde le joueur avant d'ajouter/créer la photo, sinon ça va buger.
        $joueur->save();

        // Ajouter la photo :
        if ($request->hasFile('src')) {
            $image = $request->file('src');
            $image_name = time().'_'.$image->getClientOriginalName();
            $path = $request->file('src')->storeAs('joueurs_upload', $image_name, 'public');

            $joueur->photo()->create([
                'src' => $path
            ]);
        }

        return redirect()->route('joueurs.index')->with('success', 'Joueur/joueuse ajouté-e avec succès !');

    }

    public function show($id) {
        $joueur = Joueur::find($id);
        return view('joueurs/show', compact('joueur'));
    }

    public function edit($id) {
        $joueur = Joueur::find($id);
        $positions = Position::all();
        return view ('joueurs/edit', compact('joueur', 'positions'));
    }

    public function update($id, Request $request) {

        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'age' => 'required|integer|min:10|max:100',
            'tel' => 'nullable|string|max:20',
            'email' => 'required|email|unique:joueurs,email,'.$id,
            'pays' => 'required|string|max:255',
            'position' => 'required',
            'equipe' => 'required',
            'genre' => 'required',
            'src' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $joueur = Joueur::find($id);

        // On vérifie aussi ici qu'il reste de la place dans l'équipe (et que l'équipe choisie est différente de l'équipe actuelle)
        if ($request->equipe != $joueur->equipe_id) {
            $equipe = Equipe::find($request->equipe);
            if ($equipe->joueur()->count() >=15) {
                return redirect()->route('joueurs.create')->with('error', 'Cette équipe est déjà complète');
            }
        }
        
        $joueur->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'age' => $request->age,
            'tel' => $request->tel,
            'email' => $request->email,
            'pays' => $request->pays,
            'position_id' => $request->position,
            'equipe_id' => $request->equipe,
            'genre_id' => $request->genre
        ]);

        // Upload de l'image:

        if ($request->hasFile('src')) {
            $image = $request->file('src');
            $image_name = time().'_'.$image->getClientOriginalName();
            $path = $request->file('src')->storeAs('joueurs_upload', $image_name, 'public');
        }

        // S'il y en a déjà une, on l'update
        if ($joueur->photo) {
            $joueur->photo()->update([
                'src' => $path
            ]); 
        }

        // S'il n'y en a pas encore, on la create
        else {
            $joueur->photo()->create([
                'src' => $path
            ]);
        }

        return redirect()->route('joueurs.index')->with('success', 'Joueur/joueuse mis-e à jour avec succès !');
    }
    
    public function destroy ($id) {
        $joueur = Joueur::find($id)->delete();

        return redirect()->route('joueurs.index')->with('success', 'Joueur/joueuse supprimé-e avec succès !');
    }
}
