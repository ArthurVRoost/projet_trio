@extends('layouts.app')
@section('title', 'Équipes')

@section('content')
<div class="mt-5 pt-4">
    <!-- Flash Messages -->
    <x-flash-messages />
    
    <!-- Header Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h2 fw-bold mb-2">
                        <i class="bi bi-shield me-2"></i>
                        Équipes
                    </h1>
                    <p class="text-muted">Découvrez toutes les équipes de votre organisation</p>
                </div>
                @canany(['isCoach', 'isAdmin'])
                    <a href="{{ route('equipes.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-circle me-2"></i>
                        Nouvelle Équipe
                    </a>
                @endcanany
            </div>
        </div>
    </div>

    <!-- Filter Section -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('equipes.index') }}" method="GET">
                        <div class="row align-items-end">
                            <div class="col-md-4">
                                <label for="continent" class="form-label fw-medium">
                                    <i class="bi bi-globe me-1"></i>
                                    Filtrer par continent
                                </label>
                                <select name="continent" id="continent" class="form-select" onchange="this.form.submit()">
                                    <option value="">-- Tous les continents --</option>
                                    @foreach ($continents as $continent)
                                        <option value="{{ $continent->id }}" {{ request('continent') == $continent->id ? 'selected' : '' }}>
                                            {{ $continent->nom }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <div class="d-flex align-items-center">
                                    <span class="badge bg-primary me-2">{{ $equipes->count() }}</span>
                                    <span class="text-muted">équipe(s) trouvée(s)</span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Teams Grid -->
    <div class="row g-4">
        @forelse ($equipes as $equipe)
            <div class="col-lg-4 col-md-6">
                <a href="{{ route('equipes.show', $equipe->id) }}" class="text-decoration-none">
                    <div class="card h-100">
                        <div class="card-img-top overflow-hidden" style="height: 200px;">
                            <img src="{{ asset($equipe->logo) }}" 
                                 class="w-100 h-100 object-fit-cover" 
                                 alt="{{ $equipe->nom }}">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold">{{ $equipe->nom }}</h5>
                            
                            <div class="mb-3">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="bi bi-geo-alt me-2 text-muted"></i>
                                    <span class="text-muted">Ville:</span>
                                    <span class="ms-2 fw-medium">{{ $equipe->ville }}</span>
                                </div>
                                
                                <div class="d-flex align-items-center mb-2">
                                    <i class="bi bi-globe me-2 text-muted"></i>
                                    <span class="text-muted">Continent:</span>
                                    <span class="ms-2 fw-medium">{{ $equipe->continent->nom }}</span>
                                </div>
                                
                                @if($equipe->genre)
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-{{ $equipe->genre->sexe == 'femme' ? 'person-dress' : 'person' }} me-2 text-muted"></i>
                                        <span class="text-muted">Genre:</span>
                                        <span class="ms-2 fw-medium text-capitalize">{{ $equipe->genre->sexe }}</span>
                                    </div>
                                @endif
                            </div>
                            
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="badge bg-secondary">
                                    <i class="bi bi-people me-1"></i>
                                    {{ $equipe->joueur->count() }} joueur(s)
                                </span>
                                <i class="bi bi-arrow-right text-primary"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @empty
            <div class="col-12">
                <div class="card text-center py-5">
                    <div class="card-body">
                        <i class="bi bi-shield text-muted" style="font-size: 4rem;"></i>
                        <h4 class="mt-3 text-muted">Aucune équipe trouvée</h4>
                        <p class="text-muted">
                            @if(request('continent'))
                                Aucune équipe trouvée pour ce continent.
                            @else
                                Commencez par ajouter votre première équipe.
                            @endif
                        </p>
                        @canany(['isCoach', 'isAdmin'])
                            <a href="{{ route('equipes.create') }}" class="btn btn-primary">
                                <i class="bi bi-plus-circle me-2"></i>
                                Ajouter une équipe
                            </a>
                        @endcanany
                    </div>
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection