@extends('layouts.app')
@section('title', 'Détails')



@section('content')
    <section class="pt-4">
    <div class="container">
        <!-- Flash Messages -->
        <x-flash-messages />
        <div class="row justify-content-center">
            {{-- 1ère div --}}
            <div class="col-12 d-flex justify-content-center mb-3">
                <div class="card" style="width: 22rem;">
                    <img src="{{  asset('storage/'.$joueur->photo->src) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $joueur->prenom }} {{ $joueur->nom }}</h5>
                        <div class="d-flex justify-content-between">
                            <p class="card-text">{{ $joueur->genre->sexe == 'femme' ? 'F' : 'H'}}</p>
                            <p class="card-text">{{ $joueur->age }}</p>
                        </div>
                        <p class="card-text">Equipe : {{ $joueur->equipe->nom ?? 'Sans équipe' }}</p>
                        <p class="card-text text-capitalize">Position : {{ $joueur->position->position ?? 'Sans position' }}</p>
                        <p class="card-text">Email : {{ $joueur->email }}</p>
                        <p class="card-text">Téléphone : {{ $joueur->tel }}</p>
                        {{-- Boutons delete et edit --}}
                        <div class="d-flex gap-2">
                            {{-- Edit --}}
                            <div>
                                <a href="{{route('joueurs.edit', $joueur->id)}}" class="btn btn-info">Edit</a>
                            </div>
                            {{-- Delete --}}
                            <div>
                                <form action="{{route('joueurs.destroy', $joueur->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('être vous sûr de vouloir supprimer?')">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- 2ème div --}}
            <div class="col-12 d-flex justify-content-center">
                <a href="{{route('joueurs.index')}}"><- revenir vers tous les joueurs</a>
            </div>
        </div>
    </div>
</section>
@endsection











