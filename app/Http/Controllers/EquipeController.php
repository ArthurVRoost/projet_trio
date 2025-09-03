<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class EquipeController extends Controller
{
    public function index(){
        $equipes = Equipe::all();
        return view('equipes.index', compact('equipes'));
    }

    public function create(){
        return view('equipes.create');
    }

    public function store(Request $request){

        $request->validate([
            'nom'          => ['required', 'string', 'max:255'],
            'ville'        => ['required', 'string', 'max:255'],
            'genre_id'     => ['nullable', 'exists:genre,id'],
            'continent_id' => ['required', 'exists:continents,id'],
            'logo'         => ['required', 'image', 'mimes:jpg,png,jpeg,webp', 'max:2048'],
        ], [
            // NOM
            'nom.required' => 'Le nom est obligatoire.',
            'nom.string'   => 'Le nom doit être une chaîne de caractères.',
            'nom.max'      => 'Le nom ne peut pas dépasser 255 caractères.',

            // VILLE
            'ville.required' => 'La ville est obligatoire.',
            'ville.string'   => 'La ville doit être une chaîne de caractères.',
            'ville.max'      => 'La ville ne peut pas dépasser 255 caractères.',

            // GENRE
            'genre_id.exists' => 'Le genre sélectionné est invalide.',

            // CONTINENT
            'continent_id.required' => 'Le continent est obligatoire.',
            'continent_id.exists'   => 'Le continent sélectionné est invalide.',

            // LOGO
            'logo.required' => 'Le logo est obligatoire.',
            'logo.image'    => 'Le fichier du logo doit être une image.',
            'logo.mimes'    => 'Le logo doit être au format JPG, PNG, JPEG ou WEBP.',
            'logo.max'      => 'Le logo ne peut pas dépasser 2 Mo.',
        ]);

        $equipe = new Equipe();
        $equipe->nom = $request->nom;
        $equipe->ville = $request->ville;
        $equipe->genre_id = $request->genre_id;
        $equipe->continent_id = $request->continent_id;

        $logopath = $request->file('logo')->store('public/logo');
        $equipe->logo = str_replace('public/', 'storage/',$logopath);

        $equipe->save();
        return redirect()->route('equipes.index')->with('success', 'Equipe ajouté!');
    }

    public function show($id){
        $equipe = Equipe::findOrFail($id);
        return view('equipes.show', compact('equipe'));
    }

    public function edit($id){
        $equipe = Equipe::findOrFail($id);
        return view('equipes.edit', compact('equipe'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'nom'          => ['required', 'string', 'max:255'],
            'ville'        => ['required', 'string', 'max:255'],
            'genre_id'     => ['nullable', 'exists:genre,id'],
            'continent_id' => ['required', 'exists:continents,id'],
            'logo'         => ['required', 'image', 'mimes:jpg,png,jpeg,webp', 'max:2048'],
        ], [
            // NOM
            'nom.required' => 'Le nom est obligatoire.',
            'nom.string'   => 'Le nom doit être une chaîne de caractères.',
            'nom.max'      => 'Le nom ne peut pas dépasser 255 caractères.',

            // VILLE
            'ville.required' => 'La ville est obligatoire.',
            'ville.string'   => 'La ville doit être une chaîne de caractères.',
            'ville.max'      => 'La ville ne peut pas dépasser 255 caractères.',

            // GENRE
            'genre_id.exists' => 'Le genre sélectionné est invalide.',

            // CONTINENT
            'continent_id.required' => 'Le continent est obligatoire.',
            'continent_id.exists'   => 'Le continent sélectionné est invalide.',

            // LOGO
            'logo.required' => 'Le logo est obligatoire.',
            'logo.image'    => 'Le fichier du logo doit être une image.',
            'logo.mimes'    => 'Le logo doit être au format JPG, PNG, JPEG ou WEBP.',
            'logo.max'      => 'Le logo ne peut pas dépasser 2 Mo.',
        ]);

        $equipe= Equipe::findOrFail($id);
        $equipe->nom = $request->nom;
        $equipe->ville = $request->ville;
        $equipe->genre_id = $request->genre_id;
        $equipe->continent_id = $request->continent_id;
        if ($request->hasFile('logo')) {
            if ($equipe->logo && Storage::exists(str_replace('storage/', 'public/', $equipe->logo))) {
                Storage::delete(str_replace('storage/', 'public/', $equipe->logo));
            }
            $logoPath = $request->file('logo')->store('public/logo');
            $equipe->logo = str_replace('public/', 'storage/', $logoPath);
        }
        $equipe->save();
        return redirect()->route('equipes.index')->with('success', 'Equipe mise à jour!');
    }

    public function destroy($id){
        $equipe = Equipe::findOrFail($id);

        if ($equipe->logo && Storage::exists(str_replace('storage/', 'public/', $equipe->logo))) {
        Storage::delete(str_replace('storage/', 'public/', $equipe->logo));
    }

    $equipe->delete();

    return redirect()->route('equipes.index')->with('success', 'Équipe supprimée!');
    }
}
