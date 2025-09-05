@extends('layouts.app')
@section('title', 'Modifier le joueur')

@section('content')
<div class="mt-5 pt-4">
    <div class="container">
        <!-- Header Section -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="h2 fw-bold mb-2">
                            <i class="bi bi-person-gear me-2"></i>
                            Modifier le joueur
                        </h1>
                        <p class="text-muted">{{ $joueur->prenom }} {{ $joueur->nom }}</p>
                    </div>
                    <div>
                        <a href="{{ route('joueurs.show', $joueur->id) }}" class="btn btn-outline-info me-2">
                            <i class="bi bi-eye me-1"></i>Voir le joueur
                        </a>
                        <a href="{{ route('joueurs.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left me-1"></i>Retour à la liste
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">
                            <i class="bi bi-person me-2"></i>
                            Informations du joueur
                        </h4>
                    </div>
                <div class="card-body">
                    <!-- Flash Messages -->
                    <x-flash-messages />

                    <!-- Affichage des erreurs de validation -->
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Photo actuelle -->
                    @if($joueur->photo && $joueur->photo->src)
                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="card bg-dark">
                                    <div class="card-body text-center">
                                        <h6 class="card-title text-primary mb-3">
                                            <i class="bi bi-image me-2"></i>Photo actuelle
                                        </h6>
                                        <div class="d-flex justify-content-center">
                                            <img src="{{ asset('storage/' . $joueur->photo->src) }}" 
                                                 alt="Photo de {{ $joueur->prenom }} {{ $joueur->nom }}" 
                                                 class="img-thumbnail rounded-circle" 
                                                 style="width: 150px; height: 150px; object-fit: cover; border: 3px solid #ff6b35;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Formulaire -->
                    <form action="{{ route('joueurs.update', $joueur->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <!-- Section Informations personnelles -->
                        <div class="mb-4">
                            <h5 class="text-primary mb-3">
                                <i class="bi bi-person me-2"></i>Informations personnelles
                            </h5>
                            <div class="row">
                                <!-- Nom -->
                                <div class="col-md-6 mb-3">
                                    <label for="nom" class="form-label fw-semibold">
                                        <i class="bi bi-person me-1"></i>Nom <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control @error('nom') is-invalid @enderror" 
                                           id="nom" name="nom" value="{{ old('nom', $joueur->nom) }}" required>
                                    @error('nom')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Prénom -->
                                <div class="col-md-6 mb-3">
                                    <label for="prenom" class="form-label fw-semibold">
                                        <i class="bi bi-person me-1"></i>Prénom <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control @error('prenom') is-invalid @enderror" 
                                           id="prenom" name="prenom" value="{{ old('prenom', $joueur->prenom) }}" required>
                                    @error('prenom')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Section Détails -->
                        <div class="mb-4">
                            <h5 class="text-primary mb-3">
                                <i class="bi bi-info-circle me-2"></i>Détails
                            </h5>
                            <div class="row">
                                <!-- Âge -->
                                <div class="col-md-6 mb-3">
                                    <label for="age" class="form-label fw-semibold">
                                        <i class="bi bi-calendar me-1"></i>Âge <span class="text-danger">*</span>
                                    </label>
                                    <input type="number" class="form-control @error('age') is-invalid @enderror" 
                                           id="age" name="age" value="{{ old('age', $joueur->age) }}" min="10" max="40" required>
                                    @error('age')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Téléphone -->
                                <div class="col-md-6 mb-3">
                                    <label for="tel" class="form-label fw-semibold">
                                        <i class="bi bi-telephone me-1"></i>Téléphone
                                    </label>
                                    <input type="tel" class="form-control @error('tel') is-invalid @enderror" 
                                           id="tel" name="tel" value="{{ old('tel', $joueur->tel) }}">
                                    @error('tel')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="row">
                                <!-- Email -->
                                <div class="col-md-6 mb-3">
                                    <label for="email" class="form-label fw-semibold">
                                        <i class="bi bi-envelope me-1"></i>Email <span class="text-danger">*</span>
                                    </label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                           id="email" name="email" value="{{ old('email', $joueur->email) }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Pays -->
                                <div class="col-md-6 mb-3">
                                    <label for="pays" class="form-label fw-semibold">
                                        <i class="bi bi-geo-alt me-1"></i>Pays <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control @error('pays') is-invalid @enderror" 
                                           id="pays" name="pays" value="{{ old('pays', $joueur->pays) }}" required>
                                    @error('pays')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Section Sportive -->
                        <div class="mb-4">
                            <h5 class="text-primary mb-3">
                                <i class="bi bi-trophy me-2"></i>Informations sportives
                            </h5>
                            <div class="row">
                                <!-- Genre -->
                                <div class="col-md-4 mb-3">
                                    <label for="genre" class="form-label fw-semibold">
                                        <i class="bi bi-{{ $joueur->genre->sexe == 'femme' ? 'person-dress' : 'person' }} me-1"></i>Genre <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select @error('genre') is-invalid @enderror" id="genre" name="genre" required>
                                        <option value="">Sélectionner un genre</option>
                                        @if(isset($genres))
                                            @foreach($genres as $genre)
                                                <option value="{{ $genre->id }}" 
                                                    {{ (old('genre') ?? $joueur->genre_id) == $genre->id ? 'selected' : '' }}>
                                                    {{ $genre->sexe }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('genre')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Position -->
                                <div class="col-md-4 mb-3">
                                    <label for="position" class="form-label fw-semibold">
                                        <i class="bi bi-geo-alt me-1"></i>Position <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select @error('position') is-invalid @enderror" id="position" name="position" required>
                                        <option value="">Sélectionner une position</option>
                                        @foreach($positions as $position)
                                            <option value="{{ $position->id }}" 
                                                {{ (old('position') ?? $joueur->position_id) == $position->id ? 'selected' : '' }}>
                                                {{ $position->position }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('position')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Équipe -->
                                <div class="col-md-4 mb-3">
                                    <label for="equipe" class="form-label fw-semibold">
                                        <i class="bi bi-shield me-1"></i>Équipe <span class="text-danger">*</span>
                                    </label>
                                    <select class="form-select @error('equipe') is-invalid @enderror" id="equipe" name="equipe" required>
                                        <option value="">Sélectionner une équipe</option>
                                        @if(isset($equipes))
                                            @foreach($equipes as $equipe)
                                                <option value="{{ $equipe->id }}" 
                                                    {{ (old('equipe') ?? $joueur->equipe_id) == $equipe->id ? 'selected' : '' }}>
                                                    {{ $equipe->nom ?? $equipe->name ?? $equipe->libelle ?? $equipe->designation }} ({{ $equipe->genre->sexe }})
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('equipe')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Section Photo -->
                        <div class="mb-4">
                            <h5 class="text-primary mb-3">
                                <i class="bi bi-camera me-2"></i>Photo du joueur
                            </h5>
                            <div class="mb-3">
                                <label for="src" class="form-label fw-semibold">
                                    <i class="bi bi-image me-1"></i>Modifier la photo
                                </label>
                                <input type="file" class="form-control @error('src') is-invalid @enderror" 
                                       id="src" name="src" accept="image/jpeg,image/png,image/jpg,image/gif">
                                <div class="form-text text-muted">
                                    @if($joueur->photo && $joueur->photo->src)
                                        <i class="bi bi-info-circle me-1"></i>Laissez vide pour conserver la photo actuelle
                                    @else
                                        <i class="bi bi-info-circle me-1"></i>Formats acceptés : JPG, PNG, GIF (max 2MB)
                                    @endif
                                </div>
                                @error('src')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Boutons d'action -->
                        <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                            <div>
                                <a href="{{ route('joueurs.index') }}" class="btn btn-outline-secondary me-2">
                                    <i class="bi bi-arrow-left me-1"></i>Retour à la liste
                                </a>
                                <a href="{{ route('joueurs.show', $joueur->id) }}" class="btn btn-outline-info">
                                    <i class="bi bi-eye me-1"></i>Voir le joueur
                                </a>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="bi bi-check-circle me-1"></i>Mettre à jour
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection