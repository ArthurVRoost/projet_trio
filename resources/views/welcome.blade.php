@extends('layouts.app')
@section('title', 'home')
@section('content')
    
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="https://ichef.bbci.co.uk/ace/standard/1024/cpsprodpb/c27e/live/c3a39390-66d1-11ef-a065-11da863b60a9.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="https://img.olympics.com/images/image/private/t_s_pog_staticContent_hero_xl_2x/f_auto/primary/rvgg1pzokkgyasiuwqie" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="https://img.uefa.com/imgml/uefacom/uel/social/og-default.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        {{-- EKIP EUROPE --}}
        <h2 class="mt-3 ms-5" style="color: white">Equipes Européenes</h2>
        <section class="section1 mt-5">
            @foreach ($equipesEurope as $ekip)
                <a href="{{ route('equipes.show', $ekip->id) }}" class="cardEurope">
                    <div class="cardEurope">
                        <img src="{{ asset($ekip->logo) }}" width="350" height="240" alt="">
                        <h3>{{ $ekip->nom }}</h3>
                        <p>Situé dans la ville de {{ $ekip->ville }}</p>
                    </div>
                 </a>
                
            @endforeach
        </section>

        {{-- 8 JOUEURS/EUSE RANDOM EUROPE  --}}
        <h2 class="mt-3 ms-5" style="color: white">Joueurs/Joueuse d'équipes Européenes</h2>
        <section>

        </section>

        {{-- 4 EKIP HORS EUROPE --}}
        <h2 class="mt-3 ms-5" style="color: white">Equipes Mondiales</h2>
        <section>

        </section>

        {{-- 8 JOUEURS/EUSE RANDOM HORS EUROPE  --}}
        <h2 class="mt-3 ms-5" style="color: white">Joueurs/Joueuse d'équipes mondiales</h2>
        <section>

        </section>

        {{-- 4 JOUEURS/EUSE SANS EQUIPE --}}
        <h2 class="mt-3 ms-5" style="color: white">Joueurs/Joueuses sans équipe</h2>
        <section>

        </section>
        
@endsection

