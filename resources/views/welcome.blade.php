@extends('layouts.app')
@section('title', 'Accueil')
@section('content')
<div class="mt-5 pt-4">
    <!-- Hero Section -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="hero-section position-relative overflow-hidden rounded-4" style="background: linear-gradient(135deg, rgba(255, 107, 53, 0.1) 0%, rgba(255, 140, 66, 0.05) 50%, rgba(26, 26, 26, 0.9) 100%); border: 1px solid rgba(255, 107, 53, 0.2);">
                <div class="position-absolute top-0 end-0" style="width: 200px; height: 200px; background: radial-gradient(circle, rgba(255, 107, 53, 0.1) 0%, transparent 70%); border-radius: 50%; transform: translate(50%, -50%);"></div>
                <div class="position-absolute bottom-0 start-0" style="width: 150px; height: 150px; background: radial-gradient(circle, rgba(255, 140, 66, 0.08) 0%, transparent 70%); border-radius: 50%; transform: translate(-50%, 50%);"></div>
                
                <div class="card-body text-center py-5 position-relative">
                    <div class="mb-4">
                        <div class="d-inline-block p-3 rounded-circle" style="background: linear-gradient(135deg, rgba(255, 107, 53, 0.2) 0%, rgba(255, 140, 66, 0.1) 100%); border: 2px solid rgba(255, 107, 53, 0.3);">
                            <i class="bi bi-trophy-fill text-primary" style="font-size: 3rem;"></i>
                        </div>
                    </div>
                    <h1 class="display-3 fw-bold mb-3 text-white">
                        Sports Manager
                    </h1>
                    <p class="lead text-muted mb-4 fs-5">Plateforme de gestion sportive professionnelle</p>
                    <div class="d-flex justify-content-center gap-3 flex-wrap">
                        <a href="{{ route('joueurs.index') }}" class="btn btn-primary btn-lg px-4 py-3">
                            <i class="bi bi-people me-2"></i>Gestion des Joueurs
                        </a>
                        <a href="{{ route('equipes.index') }}" class="btn btn-outline-primary btn-lg px-4 py-3">
                            <i class="bi bi-shield me-2"></i>Gestion des Équipes
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Équipes Européennes -->
    <div class="row mb-5">
        <div class="col-12">
            <div class="d-flex align-items-center mb-4">
                <div class="me-3">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle" style="width: 50px; height: 50px; background: linear-gradient(135deg, #ff6b35 0%, #ff8c42 100%);">
                        <i class="bi bi-globe-europe-africa text-white fs-5"></i>
                    </div>
                </div>
                <div>
                    <h2 class="h3 fw-bold mb-1 text-white">Équipes Européennes</h2>
                    <p class="text-muted mb-0">Découvrez les équipes du continent européen</p>
                </div>
            </div>
            <div class="row g-4">
                @foreach ($equipesHome as $ekip)
                    <div class="col-lg-4 col-md-6">
                        <a href="{{ route('equipes.show', $ekip->id) }}" class="text-decoration-none">
                            <div class="card h-100 team-card position-relative overflow-hidden">
                                <div class="card-img-top overflow-hidden position-relative" style="height: 220px;">
                                    <img src="{{ asset($ekip->logo) }}" class="w-100 h-100 object-fit-cover" alt="{{ $ekip->nom }}">
                                    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(180deg, transparent 0%, rgba(0,0,0,0.1) 100%);"></div>
                                </div>
                                <div class="card-body p-4">
                                    <h5 class="card-title fw-bold text-white mb-3">{{ $ekip->nom }}</h5>
                                    <div class="d-flex align-items-center text-muted">
                                        <i class="bi bi-geo-alt me-2 text-primary"></i>
                                        <span class="fw-medium">{{ $ekip->ville }}</span>
                                    </div>
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
            <div class="d-flex align-items-center mb-4">
                <div class="me-3">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle" style="width: 50px; height: 50px; background: linear-gradient(135deg, #ff6b35 0%, #ff8c42 100%);">
                        <i class="bi bi-people text-white fs-5"></i>
                    </div>
                </div>
                <div>
                    <h2 class="h3 fw-bold mb-1 text-white">Joueurs Européens</h2>
                    <p class="text-muted mb-0">Les talents des équipes européennes</p>
                </div>
            </div>
            <div class="row g-4">
                @foreach ($joueursEurope as $joueur)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <a href="{{ route('joueurs.show', $joueur->id) }}" class="text-decoration-none">
                            <div class="card h-100 player-card position-relative overflow-hidden">
                                <div class="card-img-top overflow-hidden position-relative" style="height: 220px;">
                                    <img src="{{ asset('storage/'.$joueur->photo->src) }}" class="w-100 h-100 object-fit-cover" alt="{{ $joueur->nom }}">
                                    <div class="position-absolute top-0 end-0 m-2">
                                        <span class="badge bg-primary rounded-pill px-3 py-2 fw-semibold">
                                            {{ $joueur->age }} ans
                                        </span>
                                    </div>
                                </div>
                                <div class="card-body text-center p-4">
                                    <h6 class="card-title fw-bold text-white mb-2">{{ $joueur->prenom }} {{ $joueur->nom }}</h6>
                                    <div class="d-flex align-items-center justify-content-center text-muted">
                                        <i class="bi bi-shield me-2 text-primary"></i>
                                        <span class="fw-medium">{{ $joueur->equipe->nom }}</span>
                                    </div>
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
            <div class="d-flex align-items-center mb-4">
                <div class="me-3">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle" style="width: 50px; height: 50px; background: linear-gradient(135deg, #ff6b35 0%, #ff8c42 100%);">
                        <i class="bi bi-globe text-white fs-5"></i>
                    </div>
                </div>
                <div>
                    <h2 class="h3 fw-bold mb-1 text-white">Équipes Mondiales</h2>
                    <p class="text-muted mb-0">Équipes de tous les continents</p>
                </div>
            </div>
            <div class="row g-4">
                @foreach ($equipesMondial as $equipeMonde)
                    <div class="col-lg-4 col-md-6">
                        <a href="{{ route('equipes.show', $equipeMonde->id) }}" class="text-decoration-none">
                            <div class="card h-100 team-card position-relative overflow-hidden">
                                <div class="card-img-top overflow-hidden position-relative" style="height: 220px;">
                                    <img src="{{ asset($equipeMonde->logo) }}" class="w-100 h-100 object-fit-cover" alt="{{ $equipeMonde->nom }}">
                                    <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(180deg, transparent 0%, rgba(0,0,0,0.1) 100%);"></div>
                                </div>
                                <div class="card-body p-4">
                                    <h5 class="card-title fw-bold text-white mb-3">{{ $equipeMonde->nom }}</h5>
                                    <div class="d-flex align-items-center text-muted">
                                        <i class="bi bi-geo-alt me-2 text-primary"></i>
                                        <span class="fw-medium">{{ $equipeMonde->ville }}</span>
                                    </div>
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
            <div class="d-flex align-items-center mb-4">
                <div class="me-3">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle" style="width: 50px; height: 50px; background: linear-gradient(135deg, #ff6b35 0%, #ff8c42 100%);">
                        <i class="bi bi-people-fill text-white fs-5"></i>
                    </div>
                </div>
                <div>
                    <h2 class="h3 fw-bold mb-1 text-white">Joueurs Mondiaux</h2>
                    <p class="text-muted mb-0">Talents internationaux</p>
                </div>
            </div>
            <div class="row g-4">
                @foreach ($joueursMonde as $joueurMon)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <a href="{{ route('joueurs.show', $joueurMon->id) }}" class="text-decoration-none">
                            <div class="card h-100 player-card position-relative overflow-hidden">
                                <div class="card-img-top overflow-hidden position-relative" style="height: 220px;">
                                    <img src="{{ asset('storage/'.$joueurMon->photo->src) }}" class="w-100 h-100 object-fit-cover" alt="{{ $joueurMon->nom }}">
                                    <div class="position-absolute top-0 end-0 m-2">
                                        <span class="badge bg-primary rounded-pill px-3 py-2 fw-semibold">
                                            {{ $joueurMon->age }} ans
                                        </span>
                                    </div>
                                </div>
                                <div class="card-body text-center p-4">
                                    <h6 class="card-title fw-bold text-white mb-2">{{ $joueurMon->prenom }} {{ $joueurMon->nom }}</h6>
                                    <div class="d-flex align-items-center justify-content-center text-muted">
                                        <i class="bi bi-shield me-2 text-primary"></i>
                                        <span class="fw-medium">{{ $joueurMon->equipe->nom }}</span>
                                    </div>
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
            <div class="d-flex align-items-center mb-4">
                <div class="me-3">
                    <div class="d-inline-flex align-items-center justify-content-center rounded-circle" style="width: 50px; height: 50px; background: linear-gradient(135deg, #ff6b35 0%, #ff8c42 100%);">
                        <i class="bi bi-person-x text-white fs-5"></i>
                    </div>
                </div>
                <div>
                    <h2 class="h3 fw-bold mb-1 text-white">Agents Libres</h2>
                    <p class="text-muted mb-0">Joueurs disponibles pour recrutement</p>
                </div>
            </div>
            <div class="row g-4">
                @foreach ($joueursFA as $fa)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <a href="{{ route('joueurs.show', $fa->id) }}" class="text-decoration-none">
                            <div class="card h-100 player-card position-relative overflow-hidden">
                                <div class="card-img-top overflow-hidden position-relative" style="height: 220px;">
                                    <img src="{{ asset('storage/'.$fa->photo->src) }}" class="w-100 h-100 object-fit-cover" alt="{{ $fa->nom }}">
                                    <div class="position-absolute top-0 end-0 m-2">
                                        <span class="badge bg-warning text-dark rounded-pill px-3 py-2 fw-semibold">
                                            <i class="bi bi-star me-1"></i>Libre
                                        </span>
                                    </div>
                                </div>
                                <div class="card-body text-center p-4">
                                    <h6 class="card-title fw-bold text-white mb-2">{{ $fa->prenom }} {{ $fa->nom }}</h6>
                                    <div class="d-flex align-items-center justify-content-center text-muted">
                                        <i class="bi bi-shield me-2 text-primary"></i>
                                        <span class="fw-medium">{{ $fa->equipe->nom ?? 'Sans équipe' }}</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<style>
.team-card, .player-card {
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    border: 1px solid rgba(255, 107, 53, 0.1);
}

.team-card:hover, .player-card:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 20px 40px rgba(255, 107, 53, 0.2);
    border-color: rgba(255, 107, 53, 0.3);
}

.hero-section {
    transition: all 0.4s ease;
}

.hero-section:hover {
    transform: translateY(-2px);
    box-shadow: 0 25px 50px rgba(255, 107, 53, 0.15);
}

.badge.bg-primary {
    background: linear-gradient(135deg, #ff6b35 0%, #ff8c42 100%) !important;
    border: none;
}

.badge.bg-warning {
    background: linear-gradient(135deg, #ffc107 0%, #ffb300 100%) !important;
    border: none;
}
</style>
@endsection

