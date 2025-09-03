@extends('layouts.app')
@section('title', 'Equipes')

@section('content')
    <a href="{{ route('equipes.create') }}">cree equipe</a>
    <h2 class="mt-3 ms-5" style="color: white">Toutes les équipes</h2>
        <section class="section1 mt-5">
            @foreach ($equipes as $equipeTout)
                <a href="{{ route('equipes.show', $equipeTout->id) }}" class="cardEurope">
                    <div class="cardEurope">
                        <img src="{{ asset($equipeTout->logo) }}" width="350" height="260" alt="">
                        <h3>{{ $equipeTout->nom }}</h3>
                        <p>Situé dans la ville de {{ $equipeTout->ville }}</p>
                    </div>
                 </a>
                
            @endforeach
    </section>

@endsection