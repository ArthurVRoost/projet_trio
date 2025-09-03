{{-- @extends('') --}}
{{-- @section('title', 'Edit') --}}



{{-- @section('content') --}}

{{-- @endsection --}}


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Modifier le joueur : {{ $joueur->prenom }} {{ $joueur->nom }}</h4>
                </div>
                <div class="card-body">
                    <!-- Affichage des erreurs -->
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Affichage des messages de succès/erreur -->
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Photo actuelle -->
                    @if($joueur->photo && $joueur->photo->src)
                        <div class="mb-3">
                            <label class="form-label">Photo actuelle :</label>
                            <div>
                                <img src="{{ asset('storage/' . $joueur->photo->src) }}" 
                                     alt="Photo de {{ $joueur->prenom }} {{ $joueur->nom }}" 
                                     class="img-thumbnail" style="max-width: 200px; max-height: 200px;">
                            </div>
                        </div>
                    @endif

                    <!-- Formulaire -->
                    <form action="{{ route('joueurs.update', $joueur->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <!-- Nom -->
                            <div class="col-md-6 mb-3">
                                <label for="nom" class="form-label">Nom <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('nom') is-invalid @enderror" 
                                       id="nom" name="nom" value="{{ old('nom', $joueur->nom) }}" required>
                                @error('nom')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Prénom -->
                            <div class="col-md-6 mb-3">
                                <label for="prenom" class="form-label">Prénom <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('prenom') is-invalid @enderror" 
                                       id="prenom" name="prenom" value="{{ old('prenom', $joueur->prenom) }}" required>
                                @error('prenom')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <!-- Âge -->
                            <div class="col-md-6 mb-3">
                                <label for="age" class="form-label">Âge <span class="text-danger">*</span></label>
                                <input type="number" class="form-control @error('age') is-invalid @enderror" 
                                       id="age" name="age" value="{{ old('age', $joueur->age) }}" min="10" max="100" required>
                                @error('age')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Téléphone -->
                            <div class="col-md-6 mb-3">
                                <label for="tel" class="form-label">Téléphone</label>
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
                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                       id="email" name="email" value="{{ old('email', $joueur->email) }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Pays -->
                            <div class="col-md-6 mb-3">
                                <label for="pays" class="form-label">Pays <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('pays') is-invalid @enderror" 
                                       id="pays" name="pays" value="{{ old('pays', $joueur->pays) }}" required>
                                @error('pays')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <!-- Genre -->
                            <div class="col-md-4 mb-3">
                                <label for="genre" class="form-label">Genre <span class="text-danger">*</span></label>
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
                                <label for="position" class="form-label">Position <span class="text-danger">*</span></label>
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
                                <label for="equipe" class="form-label">Équipe <span class="text-danger">*</span></label>
                                <select class="form-select @error('equipe') is-invalid @enderror" id="equipe" name="equipe" required>
                                    <option value="">Sélectionner une équipe</option>
                                    @if(isset($equipes))
                                        @foreach($equipes as $equipe)
                                            <option value="{{ $equipe->id }}" 
                                                {{ (old('equipe') ?? $joueur->equipe_id) == $equipe->id ? 'selected' : '' }}>
                                                {{ $equipe->nom ?? $equipe->name ?? $equipe->libelle ?? $equipe->designation }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>
                                @error('equipe')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Photo -->
                        <div class="mb-3">
                            <label for="src" class="form-label">Modifier la photo</label>
                            <input type="file" class="form-control @error('src') is-invalid @enderror" 
                                   id="src" name="src" accept="image/jpeg,image/png,image/jpg,image/gif">
                            <div class="form-text">
                                Formats acceptés: JPEG, PNG, JPG, GIF. Taille max: 2MB
                                @if($joueur->photo && $joueur->photo->src)
                                    <br><em>Laissez vide pour conserver la photo actuelle</em>
                                @endif
                            </div>
                            @error('src')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Boutons -->
                        <div class="d-flex justify-content-between">
                            <div>
                                <a href="{{ route('joueurs.index') }}" class="btn btn-secondary me-2">
                                    Retour à la liste
                                </a>
                                <a href="{{ route('joueurs.show', $joueur->id) }}" class="btn btn-info">
                                    Voir le joueur
                                </a>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                Mettre à jour
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>