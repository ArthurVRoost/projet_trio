@extends('layouts.app')
@section('title', 'Equipes')

@section('content')
    <a href="{{ route('equipes.create') }}">créer équipe</a>
    <h2 class="mt-3 ms-5" style="color: white">Toutes les équipes</h2>

    <!-- Filtre par continent -->
    <div class="mt-4 ms-5">
        <form action="{{ route('equipes.index') }}" method="GET">
            <label for="continent" class="form-label text-white">Choisir un continent :</label>
            <select name="continent" id="continent" class="form-select w-auto d-inline-block" onchange="this.form.submit()">
                <option value="">-- Tous --</option>
                @foreach ($continents as $continent)
                    <option value="{{ $continent->id }}" {{ request('continent') == $continent->id ? 'selected' : '' }}>
                        {{ $continent->nom }}
                    </option>
                @endforeach
            </select>
        </form>
    </div>

    <!-- Affichage des équipes -->
    <section class="section1 mt-5">
        @forelse ($equipes as $equipeTout)
            <a href="{{ route('equipes.show', $equipeTout->id) }}" class="cardEurope">
                <div class="cardEurope">
                    <img src="{{ asset($equipeTout->logo) }}" width="350" height="260" alt="">
                    <h3>{{ $equipeTout->nom }}</h3>
                    <p>Situé dans la ville de {{ $equipeTout->ville }}</p>
                    <p><strong>Continent :</strong> {{ $equipeTout->continent->nom }}</p>
                </div>
            </a>
        @empty
            <p class="text-white ms-5">Aucune équipe trouvée pour ce continent.</p>
        @endforelse
    </section>
@endsection