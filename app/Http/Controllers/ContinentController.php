<?php

namespace App\Http\Controllers;

use App\Models\Continent;
use Illuminate\Http\Request;

class ContinentController extends Controller
{
    public function index(){
        $continents = Continent::all();
        return view('continents.index', compact('continents'));
    }

    public function create(){
        return view('continents.create');
    }
    
    public function store(Request $request){
        $request->validate([
            'nom' => ['required', 'unique:continents,nom']
        ]);

        $continent = new Continent();
        $continent->nom = $request->nom;
        $continent->save();

        return redirect()->route('continents.index')->with('success', 'Continent ajouté!');
    }

    public function show($id){
        $continent = Continent::findOrFail($id);
        return view('continents.show', compact ('continent'));
    }

    public function edit($id){
        $continent = Continent::findOrFail($id);
        return view('continents.edit', compact('continent'));
    }

    public function update(Request $request, $id){
        $continent = Continent::findOrFail($id);
        $request->validate([
            'nom' => ['required', 'unique:continents,nom'.$id]
        ]);

        $continent->nom = $request->nom;
        $continent->save();

        return redirect()->route('continents.index')->with('success', 'Continent mis à jour!');
    }

    public function destroy($id){
        $continent = Continent::findOrFail($id);
        $continent->delete();

        return redirect()->route('continents.index')->with('success', 'Continent supprimé!');
    }
}
