<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use App\Models\Genre;
use App\Models\Joueur;
use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class JoueurController extends Controller
{
    public function index() {
        $joueurs = Joueur::with(['photo', 'genre', 'equipe', 'position']) 
                     ->orderBy('prenom', 'asc') 
                     ->get();
        return view('joueurs.index', compact('joueurs'));
    }

    public function create() {
        $positions = Position::all();
        $equipes = Equipe::all();
        $genres = Genre::whereBetween('id', [1,2])->get();
        return view('joueurs.create', compact('positions', 'equipes', 'genres'));
    }

    public function store(Request $request)
{
    $request->validate([
        'nom'      => 'required|string|max:255',
        'prenom'   => 'required|string|max:255',
        'age'      => 'required|integer|min:10|max:40',
        'tel'      => 'required|string|max:20',
        'email'    => 'required|email|unique:joueurs,email',
        'pays'     => 'required|string|max:255',
        'position' => 'required',
        'equipe'   => 'required',
        'genre'    => 'required',
        'src'      => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    $equipe   = Equipe::find($request->equipe);
    $position = Position::find($request->position);

    // Vérif équipe pleine
    if ($equipe->joueur()->count() >= 15) {
        return redirect()->route('joueurs.create')
            ->withInput()
            ->with('error', 'Cette équipe est déjà complète');
    }

    // Vérif sexe
    if ($equipe->genre_id != $request->genre && $equipe->genre_id !== 3) {
        return redirect()->route('joueurs.create')
            ->withInput()
            ->with('error', "Le sexe du joueur doit correspondre au sexe de l'équipe sélectionnée");
    }

    // Vérif place dispo dans la position (CORRIGÉ : compter par équipe ET position)
    $joueurs_dans_position = Joueur::where('equipe_id', $request->equipe)
                                  ->where('position_id', $request->position)
                                  ->count();
    
    if ($joueurs_dans_position >= 3) {
        // Si toutes les positions sont pleines (= équipe complète)
        if ($equipe->joueur()->count() >= 15) {
            // ⚡ On bascule automatiquement dans l'équipe 1
            $equipe = Equipe::find(1);
        } else {
            return redirect()->route('joueurs.create')
                ->withInput()
                ->with('error', 'Cette position est complète dans cette équipe.');
        }
    }

    // Création joueur
    $joueur = new Joueur();
    $joueur->nom        = $request->nom;
    $joueur->prenom     = $request->prenom;
    $joueur->age        = $request->age;
    $joueur->tel        = $request->tel;
    $joueur->email      = $request->email;
    $joueur->pays       = $request->pays;
    $joueur->position_id= $request->position;
    $joueur->equipe_id  = $equipe->id; // corrigé
    $joueur->genre_id   = $request->genre;
    $joueur->user_id    = auth()->id();
    $joueur->save();

    // Upload photo
    if ($request->hasFile('src')) {
        $image = $request->file('src');
        $image_name = time().'_'.$image->getClientOriginalName();
        $path = $image->storeAs('joueurs_upload', $image_name, 'public');

        $joueur->photo()->create([
            'src' => $path
        ]);
    }

    return redirect()->route('joueurs.index')
        ->with('success', 'Joueur/joueuse ajouté-e avec succès !');
}


    public function show($id) {
        $joueur = Joueur::find($id);
        return view('joueurs.show', compact('joueur'));
    }

    public function edit($id) {
        $joueur = Joueur::find($id);
        $positions = Position::all();
        $genres = Genre::whereBetween('id', [1,2])->get();
        $equipes = Equipe::all();
        return view ('joueurs.edit', compact('joueur', 'positions', 'genres', 'equipes'));
    }

    public function update($id, Request $request) {

        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'age' => 'required|integer|min:10|max:40',
            'tel' => 'nullable|string|max:20',
            'email' => 'required|email|unique:joueurs,email,'.$id,
            'pays' => 'required|string|max:255',
            'position' => 'required',
            'equipe' => 'required',
            'genre' => 'required',
            'src' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ],
    [
            'src.image'      => "Le fichier doit être une image valide.",
            'nom.required'   => 'Le nom est obligatoire.',
            'nom.string'     => 'Le nom doit être une chaîne de caractères.',
            'prenom.required'=> 'Le prénom est obligatoire.',
            'prenom.string'  => 'Le prénom doit être une chaîne de caractères.',
            'email.required'  => "L'adresse mail est obligatoire.",
            'email.email'     => "L'adresse mail doit être valide."
        ]);

        $joueur = Joueur::find($id);

        // On vérifie aussi ici qu'il reste de la place dans l'équipe (et que l'équipe choisie est différente de l'équipe actuelle)
        if ($request->equipe != $joueur->equipe_id) {
            $equipe = Equipe::find($request->equipe);
            if ($equipe->joueur()->count() >= 15) {
                return redirect()->route('joueurs.edit', $id)->withInput()->with('error', 'Cette équipe est déjà complète');
            }
        } else {
            $equipe = $joueur->equipe;
        }

        // verif sexe
        if ($equipe->genre_id != $request->genre && $equipe->genre_id !== 3) {
            return redirect()->route('joueurs.edit', $id)->withInput()->with('error', "Le sexe du joueur doit correspondre au sexe de l'équipe sélectionnée");
        }

        // Vérification de la position (NOUVELLE VÉRIFICATION AJOUTÉE)
        if ($request->position != $joueur->position_id || $request->equipe != $joueur->equipe_id) {
            // Si on change de position ou d'équipe, vérifier la disponibilité
            $joueurs_dans_position = Joueur::where('equipe_id', $request->equipe)
                                          ->where('position_id', $request->position)
                                          ->where('id', '!=', $id) // Exclure le joueur actuel
                                          ->count();
            
            if ($joueurs_dans_position >= 3) {
                return redirect()->route('joueurs.edit', $id)
                    ->withInput()
                    ->with('error', 'Cette position est complète dans cette équipe.');
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

            // S'il y a déjà une photo, on l'update
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
        }

        return redirect()->route('joueurs.index')->with('success', 'Joueur/joueuse mis-e à jour avec succès !');
    }
    
    public function destroy ($id) {
        $joueur = Joueur::find($id);

        // Vérifier les permissions : admin peut tout supprimer, user peut supprimer ses propres joueurs
        if (!Gate::allows('edit-own-player', $joueur)) {
            abort(403, 'Vous ne pouvez supprimer que vos propres joueurs.');
        }

        $joueur->delete();

        return redirect()->route('joueurs.index')->with('success', 'Joueur/joueuse supprimé-e avec succès !');
    }
}