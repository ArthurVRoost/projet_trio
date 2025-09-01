<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index(){
        $genres = Genre::all();
        return view('genres.index', compact('genres'));
    }

    public function create(){
        return view('genres.create');
    }

    public function store(Request $request){
        $request->validate([
            'sexe' => ['required']
        ]);

        $genre = new Genre();
        $genre->sexe = $request->sexe;
        $genre->save();

        return redirect()->route('genres.index')->with('success', 'Genre ajouté!');
    }

    public function show($id){
        $genre = Genre::findOrFail($id);
        return view('genres.show', compact('genre'));
    }

    public function edit($id){
        $genre = Genre::findOrFail($id);
        return view('genres.edit', compact('genre'));
    }

    public function update(Request $request, $id){
        $genre = Genre::findOrFail($id);
        $request->validate([
            'sexe' => ['required']
        ]);
        $genre->sexe = $request->sexe;
        $genre->save();

        return redirect()->route('genres.index')->with('success', 'Genre mis à jour!');
    }

    public function destroy($id){
        $genre = Genre::findOrFail($id);
        $genre->delete();

        return redirect()->route('genres.index')->with('success', 'Genre supprimé!');
    }
}
