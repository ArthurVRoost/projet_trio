@extends('layouts.app') @section('content')
<div class="container">
    <h1>Détails de l'équipe</h1>

    <!-- Flash Messages -->
    <x-flash-messages />

    <div class="card mb-4">
        <div class="card-body">
            <h3 class="card-title">{{ $equipe->nom }}</h3>
            <p><strong>Ville :</strong> {{ $equipe->ville }}</p>
            <p><strong>Genre :</strong> {{ $equipe->genre->sexe ?? 'Non spécifié' }}</p>
            <p><strong>Continent :</strong> {{ $equipe->continent->nom }}</p>

            @if($equipe->logo)
            <div class="mb-3">
                <img src="{{ asset($equipe->logo) }}" alt="Logo de {{ $equipe->nom }}" style="max-width: 200px" />
            </div>
            @endif
        </div>
    </div>

    <h4 class="mb-3">Joueurs de l'équipe</h4>

    <div class="row">
        @foreach($equipe->joueur as $joueur)
        <div class="col-md-3 mb-3">
            <a href="{{ route('joueurs.show', $joueur->id) }}" class="text-decoration-none text-dark">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $joueur->nom }} {{ $joueur->prenom }}</h5>
                        <p class="card-text">
                            <strong>Position :</strong> {{ $joueur->position->position ?? 'Non défini' }}
                        </p>
                        <p class="card-text"><strong>Âge :</strong> {{ $joueur->age }} ans</p>
                        <p class="card-text"><strong>Pays :</strong> {{ $joueur->pays }}</p>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>

    <div class="mt-3">
        <a href="{{ route('equipes.index') }}" class="btn btn-secondary">Retour</a>
        @canany(['isAdmin', 'isCoach'])
        <a href="{{ route('equipes.edit', $equipe->id) }}" class="btn btn-warning">Modifier</a>
        <form
            action="{{ route('equipes.destroy', $equipe->id) }}"
            method="POST"
            class="d-inline"
            onsubmit="return confirm('Supprimer cette équipe ?');"
        >
            @csrf @method('DELETE')
            <button type="submit" class="btn btn-danger">Supprimer</button>
            @endcanany
        </form>
    </div>
</div>
@endsection
