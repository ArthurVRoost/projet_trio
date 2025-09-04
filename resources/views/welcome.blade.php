@extends('layouts.app')
@section('title', 'Accueil')
@section('content')
<div class="mt-5 pt-4">
    <!-- Hero Section -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="card border-0 bg-gradient" style="background: linear-gradient(135deg, rgba(35, 134, 54, 0.1) 0%, rgba(9, 105, 218, 0.1) 100%);">
                <div class="card-body text-center py-5">
                    <h1 class="display-4 fw-bold mb-3">
                        <i class="bi bi-trophy-fill text-primary me-3"></i>
                        Sports Manager
                    </h1>
                    <p class="lead text-muted mb-4">Gérez vos équipes et joueurs avec style</p>
                    <div class="d-flex justify-content-center gap-3">
                        <a href="{{ route('joueurs.index') }}" class="btn btn-primary btn-lg">
                            <i class="bi bi-people me-2"></i>Voir les Joueurs
                        </a>
                        <a href="{{ route('equipes.index') }}" class="btn btn-outline-primary btn-lg">
                            <i class="bi bi-shield me-2"></i>Voir les Équipes
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Équipes Européennes -->
    <div class="row mb-5">
        <div class="col-12">
            <h2 class="h3 fw-bold mb-4">
                <i class="bi bi-globe-europe-africa me-2"></i>
                Équipes Européennes
            </h2>
            <div class="row g-4">
                @foreach ($equipesHome as $ekip)
                    <div class="col-lg-4 col-md-6">
                        <a href="{{ route('equipes.show', $ekip->id) }}" class="text-decoration-none">
                            <div class="card h-100">
                                <div class="card-img-top overflow-hidden" style="height: 200px;">
                                    <img src="{{ asset($ekip->logo) }}" class="w-100 h-100 object-fit-cover" alt="{{ $ekip->nom }}">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">{{ $ekip->nom }}</h5>
                                    <p class="card-text text-muted">
                                        <i class="bi bi-geo-alt me-1"></i>
                                        {{ $ekip->ville }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Joueurs Européens -->
    <div class="row mb-5">
        <div class="col-12">
            <h2 class="h3 fw-bold mb-4">
                <i class="bi bi-people me-2"></i>
                Joueurs d'Équipes Européennes
            </h2>
            <div class="row g-4">
                @foreach ($joueursEurope as $joueur)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <a href="{{ route('joueurs.show', $joueur->id) }}" class="text-decoration-none">
                            <div class="card h-100">
                                <div class="card-img-top overflow-hidden" style="height: 200px;">
                                    <img src="{{ asset('storage/'.$joueur->photo->src) }}" class="w-100 h-100 object-fit-cover" alt="{{ $joueur->nom }}">
                                </div>
                                <div class="card-body text-center">
                                    <h6 class="card-title fw-bold">{{ $joueur->prenom }} {{ $joueur->nom }}</h6>
                                    <p class="card-text text-muted small">
                                        <i class="bi bi-shield me-1"></i>
                                        {{ $joueur->equipe->nom }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Équipes Mondiales -->
    <div class="row mb-5">
        <div class="col-12">
            <h2 class="h3 fw-bold mb-4">
                <i class="bi bi-globe me-2"></i>
                Équipes Mondiales
            </h2>
            <div class="row g-4">
                @foreach ($equipesMondial as $equipeMonde)
                    <div class="col-lg-4 col-md-6">
                        <a href="{{ route('equipes.show', $equipeMonde->id) }}" class="text-decoration-none">
                            <div class="card h-100">
                                <div class="card-img-top overflow-hidden" style="height: 200px;">
                                    <img src="{{ asset($equipeMonde->logo) }}" class="w-100 h-100 object-fit-cover" alt="{{ $equipeMonde->nom }}">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">{{ $equipeMonde->nom }}</h5>
                                    <p class="card-text text-muted">
                                        <i class="bi bi-geo-alt me-1"></i>
                                        {{ $equipeMonde->ville }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Joueurs Mondiaux -->
    <div class="row mb-5">
        <div class="col-12">
            <h2 class="h3 fw-bold mb-4">
                <i class="bi bi-people-fill me-2"></i>
                Joueurs d'Équipes Mondiales
            </h2>
            <div class="row g-4">
                @foreach ($joueursMonde as $joueurMon)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <a href="{{ route('joueurs.show', $joueurMon->id) }}" class="text-decoration-none">
                            <div class="card h-100">
                                <div class="card-img-top overflow-hidden" style="height: 200px;">
                                    <img src="{{ asset('storage/'.$joueurMon->photo->src) }}" class="w-100 h-100 object-fit-cover" alt="{{ $joueurMon->nom }}">
                                </div>
                                <div class="card-body text-center">
                                    <h6 class="card-title fw-bold">{{ $joueurMon->prenom }} {{ $joueurMon->nom }}</h6>
                                    <p class="card-text text-muted small">
                                        <i class="bi bi-shield me-1"></i>
                                        {{ $joueurMon->equipe->nom }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Joueurs Sans Équipe -->
    <div class="row mb-5">
        <div class="col-12">
            <h2 class="h3 fw-bold mb-4">
                <i class="bi bi-person-x me-2"></i>
                Joueurs Sans Équipe
            </h2>
            <div class="row g-4">
                @foreach ($joueursFA as $fa)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <a href="{{ route('joueurs.show', $fa->id) }}" class="text-decoration-none">
                            <div class="card h-100">
                                <div class="card-img-top overflow-hidden" style="height: 200px;">
                                    <img src="{{ asset('storage/'.$fa->photo->src) }}" class="w-100 h-100 object-fit-cover" alt="{{ $fa->nom }}">
                                </div>
                                <div class="card-body text-center">
                                    <h6 class="card-title fw-bold">{{ $fa->prenom }} {{ $fa->nom }}</h6>
                                    <p class="card-text text-muted small">
                                        <i class="bi bi-shield me-1"></i>
                                        {{ $fa->equipe->nom }}
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection

