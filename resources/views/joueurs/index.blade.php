@extends('layouts.app') 
@section('title', 'Page des joueurs et joueuses')



@section('content')
    <section class="pt-4">
    <div class="container">
        <!-- Flash Messages -->
        <x-flash-messages />
        <!-- Header Section -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="card bg-dark border-primary">
                    <div class="card-body p-4">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h3 class="h4 mb-0 text-white">
                                    <i class="bi bi-people-fill me-2 text-primary"></i>
                                    Gestion des Joueurs
                                </h3>
                                <p class="text-muted mb-0 mt-2">
                                    <i class="bi bi-info-circle me-1"></i>
                                    {{ $joueurs->count() }} joueur(s) au total
                                </p>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex justify-content-end align-items-center gap-3">
                                    @canany(['isUser', 'isCoach', 'isAdmin'])
                                        <a href="{{route('joueurs.create')}}" class="btn btn-primary">
                                            <i class="bi bi-person-plus me-2"></i>
                                            Nouveau Joueur
                                        </a>
                                    @endcanany
                                    
                                    <!-- Filtre par genre -->
                                    <div class="d-flex align-items-center">
                                        <label for="genre_id" class="form-label text-white me-2 mb-0">
                                            <i class="bi bi-funnel me-1"></i>
                                            Genre:
                                        </label>
                                        <form method="GET" action="{{ route('joueurs.index') }}" class="mb-0">
                                            <select name="genre_id" id="genre_id" class="form-select form-select-sm" onchange="this.form.submit()" style="min-width: 150px;">
                                                <option value="">Tous</option>
                                                <option value="1" {{ request('genre_id') == 1 ? 'selected' : '' }}>Hommes</option>
                                                <option value="2" {{ request('genre_id') == 2 ? 'selected' : '' }}>Femmes</option>
                                            </select>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Players Grid -->
        <div class="row g-4">
            @forelse ($joueurs as $joueur)
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card player-card h-100">
                        <!-- Player Image -->
                        <div class="card-img-top overflow-hidden" style="height: 250px; position: relative;">
                            <img src="{{ $joueur->photo ? asset('storage/'.$joueur->photo->src) : asset('images/placeholder.png') }}" 
                                 class="w-100 h-100 object-fit-cover" 
                                 alt="Photo de {{ $joueur->prenom }} {{ $joueur->nom }}">
                            
                            <!-- Player Badge -->
                            {{-- <div class="position-absolute top-0 end-0 m-2">
                                <span class="badge {{ $joueur->genre->sexe == 'femme' ? 'bg-pink' : 'bg-blue' }} fs-6">
                                    <i class="bi bi-{{ $joueur->genre->sexe == 'femme' ? 'person' : 'person' }} me-1"></i>
                                    {{ $joueur->genre->sexe == 'femme' ? 'F' : 'H' }}
                                </span>
                            </div> --}}
                            
                            <!-- Age Badge -->
                            {{-- <div class="position-absolute top-0 start-0 m-2">
                                <span class="badge bg-secondary fs-6">
                                    <i class="bi bi-calendar me-1"></i>
                                    {{ $joueur->age }} ans
                                </span>
                            </div> --}}
                        </div>
                        
                        <!-- Player Info -->
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold text-center mb-3">
                                <i class="bi bi-person-circle me-2 text-primary"></i>
                                {{ $joueur->prenom }} {{ $joueur->nom }}
                            </h5>
                            
                            <!-- Player Details -->
                            <div class="mb-3">
                                <div class="d-flex align-items-center mb-2">
                                    <i class="bi bi-shield me-2 text-muted"></i>
                                    <span class="text-muted">Équipe:</span>
                                    <span class="ms-2 fw-medium">{{ $joueur->equipe->nom ?? 'Sans équipe' }}</span>
                                </div>
                                
                                <div class="d-flex align-items-center mb-2">
                                    <i class="bi bi-gear me-2 text-muted"></i>
                                    <span class="text-muted">Position:</span>
                                    <span class="ms-2 fw-medium text-capitalize">{{ $joueur->position->position ?? 'Sans position' }}</span>
                                </div>
                                
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-geo-alt me-2 text-muted"></i>
                                    <span class="text-muted">Pays:</span>
                                    <span class="ms-2 fw-medium">{{ $joueur->pays }}</span>
                                </div>
                            </div>
                            
                            <!-- Action Buttons -->
                            <div class="mt-auto">
                                <div class="d-grid gap-2">
                                    <a href="{{route('joueurs.show', $joueur->id)}}" class="btn btn-primary">
                                        <i class="bi bi-eye me-2"></i>
                                        Voir le profil
                                    </a>
                                    
                                    @can('edit-own-player', $joueur)
                                        <div class="d-flex gap-2">
                                            <a href="{{route('joueurs.edit', $joueur->id)}}" class="btn btn-outline-secondary flex-fill">
                                                <i class="bi bi-pencil me-1"></i>
                                                Modifier
                                            </a>
                                            <form method="POST" action="{{route('joueurs.destroy', $joueur->id)}}" class="flex-fill" 
                                                  onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce joueur ?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-danger w-100">
                                                    <i class="bi bi-trash me-1"></i>
                                                    Supprimer
                                                </button>
                                            </form>
                                        </div>
                                    @endcan
                                </div>
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
                            <p class="text-muted">
                                @if(request('genre_id'))
                                    Aucun joueur trouvé pour ce genre.
                                @else
                                    Commencez par ajouter votre premier joueur.
                                @endif
                            </p>
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
</section>

@endsection