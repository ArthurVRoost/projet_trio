<?php

namespace App\Http\Controllers;

use App\Models\Continent;
use App\Models\Equipe;
use App\Models\Genre;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class EquipeController extends Controller
{
    public function index(Request $request){
    $query = Equipe::where('id', '>=', 2);
    if ($request->filled('continent')) {
        $query->where('continent_id', $request->continent);
    }

    $equipes = $query->get();

    // on récupère la liste des continents pour le select
    $continents = Continent::all();

    return view('equipes.index', compact('equipes', 'continents'));
}

    public function create(){
        $continents = Continent::all();
        $genres = Genre::whereBetween('id', [1,3])->get();
        return view('equipes.create', compact('genres', 'continents'));
    }

    public function store(Request $request){
    $request->validate([
        'nom' => ['required', 'string', 'max:255'],
        'ville' => ['required', 'string', 'max:255'],
        'genre_id' => ['nullable', 'exists:genres,id'],
        'continent_id' => ['required', 'exists:continents,id'],
        'logo' => ['required', 'image', 'mimes:jpg,png,jpeg,webp', 'max:2048'],
    ]);

    $equipe = new Equipe();
    $equipe->nom = $request->nom;
    $equipe->ville = $request->ville;
    $equipe->genre_id = $request->genre_id;
    $equipe->continent_id = $request->continent_id;

    if ($request->hasFile('logo')) {
        $image = $request->file('logo');
        $image_name = time().'_'.$image->getClientOriginalName();
        $path = $image->storeAs('logo', $image_name, 'public');

        $equipe->logo = 'storage/' . $path;
    }

    $equipe->save();

    return redirect()->route('equipes.index')->with('success', 'Equipe ajoutée !');
}

    public function show($id)
{
    $equipe = Equipe::with('joueur')->findOrFail($id);
    return view('equipes.show', compact('equipe'));
}

    public function edit($id){
        $equipe = Equipe::findOrFail($id);
        $continents = Continent::all();
        $genres = Genre::whereBetween('id', [1,3])->get();
        return view('equipes.edit', compact('equipe', 'genres', 'continents'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'nom' => ['required', 'string', 'max:255'],
        'ville' => ['required', 'string', 'max:255'],
        'genre_id' => ['nullable', 'exists:genres,id'],
        'continent_id' => ['required', 'exists:continents,id'],
        'logo' => ['nullable', 'image', 'mimes:jpg,png,jpeg,webp', 'max:2048'],
    ]);

    $equipe = Equipe::findOrFail($id);
    $equipe->nom = $request->nom;
    $equipe->ville = $request->ville;
    $equipe->genre_id = $request->genre_id;
    $equipe->continent_id = $request->continent_id;

    if ($request->hasFile('logo')) {
        // Supprime l'ancien logo si existant
        if ($equipe->logo) {
            $oldPath = str_replace('storage/', '', $equipe->logo); 
            Storage::disk('public')->delete($oldPath);
        }

        // Upload le nouveau logo
        $image = $request->file('logo');
        $image_name = time().'_'.$image->getClientOriginalName();
        $path = $image->storeAs('logo', $image_name, 'public');

        $equipe->logo = 'storage/' . $path;
    }

    $equipe->save();

    return redirect()->route('equipes.index')->with('success', 'Equipe mise à jour !');
}

    public function destroy($id){
        $equipe = Equipe::findOrFail($id);

        // Vérifier les permissions : admin peut tout supprimer, coach peut supprimer ses propres équipes
        if (!Gate::allows('edit-own-team', $equipe)) {
            abort(403, 'Vous ne pouvez supprimer que vos propres équipes.');
        }

        if ($equipe->logo && Storage::exists(str_replace('storage/', 'public/', $equipe->logo))) {
        Storage::delete(str_replace('storage/', 'public/', $equipe->logo));
    }

    $equipe->delete();

    return redirect()->route('equipes.index')->with('success', 'Équipe supprimée!');
    }
}
