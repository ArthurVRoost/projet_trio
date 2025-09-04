@extends('layouts.app') 
@section('title', 'Page des joueurs et joueuses')



@section('content')
    <section class="pt-4">
    <div class="container">
        <div class="row mb-4">
            <div class="d-flex justify-content-center">
                <a href="{{route('joueurs.create')}}" class="btn btn-info me-3">Create joueur</a>

                {{-- Dropdown de tri par genre --}}
                <form method="GET" action="{{ route('joueurs.index') }}">
                    <select name="genre_id" class="form-select" onchange="this.form.submit()">
                        <option value="">-- Trier par genre --</option>
                        <option value="1" {{ request('genre_id') == 1 ? 'selected' : '' }}>Hommes</option>
                        <option value="2" {{ request('genre_id') == 2 ? 'selected' : '' }}>Femmes</option>
                    </select>
                </form>
            </div>
        </div>

        <div class="row">
            @foreach ($joueurs as $joueur)
                <div class="col-4 mb-4">
                    <div class="card" style="width: 18rem;">
                        {{-- Image placeholder si pas de photo --}}
                        <img src="{{ $joueur->photo ? asset('storage/'.$joueur->photo->src) : asset('images/placeholder.png') }}" 
                             class="card-img-top" alt="photo joueur">
                        <div class="card-body">
                            <h5 class="card-title text-capitalize">{{ $joueur->prenom }} {{ $joueur->nom }}</h5>
                            <div class="d-flex justify-content-between">
                                <p class="card-text">{{ $joueur->genre->sexe == 'femme' ? 'F' : 'H'}}</p>
                                <p class="card-text">{{ $joueur->age }}</p>
                            </div>
                            <p class="card-text">Equipe : {{ $joueur->equipe->nom ?? 'Sans équipe' }}</p>
                            <p class="card-text text-capitalize">Position : {{ $joueur->position->position ?? 'Sans position' }}</p>
                            <a href="{{route('joueurs.show', $joueur->id)}}" class="btn btn-primary">Voir plus</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@endsection






