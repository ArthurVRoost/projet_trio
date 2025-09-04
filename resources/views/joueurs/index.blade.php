@extends('layouts.app') 
@section('title', 'Page des joueurs et joueuses')



@section('content')
    <section class="pt-4">
    <div class="container">
        <div class="row">
            <div class="d-flex justify-content-center mb-4">
                <a href="{{route('joueurs.create')}}" class="btn btn-info">Create joueur</a>
            </div>
            @foreach ($joueurs as $joueur)
                <div class="col-4 mb-4">
                    <div class="card" style="width: 18rem;">
                        {{-- Ici, ajouter une image par défaut aka un placeholder s'il n'y a pas de photo uploadée --}}
                        <img src="{{ asset('storage/'.$joueur->photo->src) }}" class="card-img-top" alt="...">
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






