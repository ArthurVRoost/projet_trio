@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Détails de l'équipe</h1>

    <div class="card">
        <div class="card-body">
            <h3 class="card-title">{{ $equipe->nom }}</h3>
            <p><strong>Ville :</strong> {{ $equipe->ville }}</p>
            <p><strong>Genre :</strong> {{ $equipe->genre->sexe ?? 'Non spécifié' }}</p>
            <p><strong>Continent :</strong> {{ $equipe->continent->nom }}</p>

            @if($equipe->logo)
                <div class="mb-3">
                    <img src="{{ asset($equipe->logo) }}" alt="Logo de {{ $equipe->nom }}" style="max-width: 200px;">
                </div>
            @endif

            <a href="{{ route('equipes.index') }}" class="btn btn-secondary">Retour</a>
            <a href="{{ route('equipes.edit', $equipe->id) }}" class="btn btn-warning">Modifier</a>
            <form action="{{ route('equipes.destroy', $equipe->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Supprimer cette équipe ?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Supprimer</button>
            </form>
        </div>
    </div>
</div>
@endsection