@extends('layouts.app') 
@section('title', 'Joueurs')

@section('content')
<div class="mt-5 pt-4">
    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h2 fw-bold mb-2">
                        <i class="bi bi-people me-2"></i>
                        Joueurs
                    </h1>
                    <p class="text-muted">Gérez tous les joueurs de votre organisation</p>
                </div>
                @canany(['isUser', 'isCoach', 'isAdmin'])
                    <a href="{{ route('joueurs.create') }}" class="btn btn-primary">
                        <i class="bi bi-person-plus me-2"></i>
                        Nouveau Joueur
                    </a>
                @endcanany
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <i class="bi bi-people-fill text-primary fs-1 mb-2"></i>
                    <h5 class="card-title">{{ $joueurs->count() }}</h5>
                    <p class="card-text text-muted">Total Joueurs</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <i class="bi bi-person-fill text-success fs-1 mb-2"></i>
                    <h5 class="card-title">{{ $joueurs->where('genre.sexe', 'homme')->count() }}</h5>
                    <p class="card-text text-muted">Hommes</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <i class="bi bi-person-dress text-info fs-1 mb-2"></i>
                    <h5 class="card-title">{{ $joueurs->where('genre.sexe', 'femme')->count() }}</h5>
                    <p class="card-text text-muted">Femmes</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <i class="bi bi-shield text-warning fs-1 mb-2"></i>
                    <h5 class="card-title">{{ $joueurs->where('equipe_id', '!=', 1)->count() }}</h5>
                    <p class="card-text text-muted">Avec Équipe</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Players Grid -->
    <div class="row g-4">
        @forelse ($joueurs as $joueur)
            <div class="col-lg-4 col-md-6">
                <div class="card h-100">
                    <div class="position-relative">
                        <div class="card-img-top overflow-hidden" style="height: 250px;">
                            <img src="{{ asset('storage/'.$joueur->photo->src) }}" 
                                 class="w-100 h-100 object-fit-cover" 
                                 alt="{{ $joueur->prenom }} {{ $joueur->nom }}">
                        </div>
                        <div class="position-absolute top-0 end-0 m-2">
                            <span class="badge bg-{{ $joueur->genre->sexe == 'femme' ? 'info' : 'primary' }}">
                                {{ $joueur->genre->sexe == 'femme' ? 'F' : 'H' }}
                            </span>
                        </div>
                        <div class="position-absolute bottom-0 start-0 m-2">
                            <span class="badge bg-dark">{{ $joueur->age }} ans</span>
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <h5 class="card-title fw-bold text-capitalize">
                            {{ $joueur->prenom }} {{ $joueur->nom }}
                        </h5>
                        
                        <div class="mb-3">
                            <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-shield me-2 text-muted"></i>
                                <span class="text-muted">Équipe:</span>
                                <span class="ms-2 fw-medium">
                                    {{ $joueur->equipe->nom ?? 'Sans équipe' }}
                                </span>
                            </div>
                            
                            <div class="d-flex align-items-center mb-2">
                                <i class="bi bi-geo-alt me-2 text-muted"></i>
                                <span class="text-muted">Position:</span>
                                <span class="ms-2 fw-medium text-capitalize">
                                    {{ $joueur->position->position ?? 'Sans position' }}
                                </span>
                            </div>
                            
                            <div class="d-flex align-items-center">
                                <i class="bi bi-flag me-2 text-muted"></i>
                                <span class="text-muted">Pays:</span>
                                <span class="ms-2 fw-medium">{{ $joueur->pays }}</span>
                            </div>
                        </div>
                        
                        <div class="d-flex gap-2">
                            <a href="{{ route('joueurs.show', $joueur->id) }}" 
                               class="btn btn-outline-primary flex-fill">
                                <i class="bi bi-eye me-1"></i>
                                Voir
                            </a>
                            @canany(['isUser', 'isCoach', 'isAdmin'])
                                <a href="{{ route('joueurs.edit', $joueur->id) }}" 
                                   class="btn btn-outline-secondary">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('joueurs.destroy', $joueur->id) }}" 
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="btn btn-outline-danger"
                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce joueur ?')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            @endcanany
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="card text-center py-5">
                    <div class="card-body">
                        <i class="bi bi-people text-muted" style="font-size: 4rem;"></i>
                        <h4 class="mt-3 text-muted">Aucun joueur trouvé</h4>
                        <p class="text-muted">Commencez par ajouter votre premier joueur.</p>
                        @canany(['isUser', 'isCoach', 'isAdmin'])
                            <a href="{{ route('joueurs.create') }}" class="btn btn-primary">
                                <i class="bi bi-person-plus me-2"></i>
                                Ajouter un joueur
                            </a>
                        @endcanany
                    </div>
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection






