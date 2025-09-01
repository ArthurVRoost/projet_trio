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
            'nom' => ['required', 'string', 'max:255'],
            'ville' => ['required', 'string', 'max:255'],
            'genre_id' => ['nullable', 'exists:genre,id'],
            'continent_id' => ['required', 'exists:continents,id'],
            'logo' => ['required', 'image', 'mimes:jpg,png,jpeg,webp', 'max:2048'],
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
            'nom' => ['required', 'string', 'max:255'],
            'ville' => ['required', 'string', 'max:255'],
            'genre_id' => ['nullable', 'exists:genres,id'],
            'continent_id' => ['required', 'exists:continents,id'],
            'logo' => ['nullable', 'image', 'mimes:jpg,png,jpeg,webp', '2048'],
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
