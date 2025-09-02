@extends('layouts.app') @section('content') @foreach ($joueurs as $joueur)
<div class="flex flex-col">
    <p>Nom: {{$joueur->nom}}</p>
    <p>Equipe: {{$joueur->equipe->nom}}</p>
</div>
@endforeach @endsection
