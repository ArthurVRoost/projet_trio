@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier l'équipe</h1>

    <!-- Flash Messages -->
    <x-flash-messages />

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Erreurs :</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('equipes.update', $equipe->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nom" class="form-label">Nom de l'équipe</label>
            <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom', $equipe->nom) }}" required>
        </div>

        <div class="mb-3">
            <label for="ville" class="form-label">Ville</label>
            <input type="text" name="ville" id="ville" class="form-control" value="{{ old('ville', $equipe->ville) }}" required>
        </div>

        <div class="mb-3">
            <label for="genre_id" class="form-label">Genre</label>
            <select name="genre_id" id="">
                <option value="">Sélectionne un genre</option>
                @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}" {{ old('genre_id') == $genre->id ? 'selected' : '' }}>
                        {{ $genre->sexe }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="continent_id" class="form-label">Continent</label>
            <select name="continent_id" id="">
    <option value="">Sélectionne un continent</option>
    @foreach ($continents as $con)
        <option value="{{ $con->id }}" {{ old('continent_id') == $con->id ? 'selected' : '' }}>
            {{ $con->nom }}
        </option>
    @endforeach
</select>
        </div>

        <div class="mb-3">
            <label for="logo" class="form-label">Logo (laisser vide pour conserver l'actuel)</label>
            @if($equipe->logo)
                <div class="mb-2">
                    <img src="{{ asset($equipe->logo) }}" alt="Logo actuel" style="max-width: 150px;">
                </div>
            @endif
            <input type="file" name="logo" id="logo" class="form-control" accept="image/*">
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour</button>
        <a href="{{ route('equipes.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection