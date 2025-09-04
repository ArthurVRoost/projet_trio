@extends('layouts.app') @section('title', 'home') @section('content')

<!-- Carousel Hero Section -->
<div class="position-relative mb-5">
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button
                type="button"
                data-bs-target="#carouselExampleAutoplaying"
                data-bs-slide-to="0"
                class="active"
            ></button>
            <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide-to="2"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="position-relative">
                    <img
                        src="https://ichef.bbci.co.uk/ace/standard/1024/cpsprodpb/c27e/live/c3a39390-66d1-11ef-a065-11da863b60a9.jpg"
                        class="d-block w-100"
                        style="height: 70vh; object-fit: cover; filter: brightness(0.4)"
                        alt="Football"
                    />
                    <div class="position-absolute top-50 start-50 translate-middle text-center text-white">
                        <h1 class="display-2 fw-bold mb-4">Football Elite</h1>
                        <p class="lead fs-4">Découvrez les meilleures équipes et joueurs</p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="position-relative">
                    <img
                        src="https://img.olympics.com/images/image/private/t_s_pog_staticContent_hero_xl_2x/f_auto/primary/rvgg1pzokkgyasiuwqie"
                        class="d-block w-100"
                        style="height: 70vh; object-fit: cover; filter: brightness(0.4)"
                        alt="Olympics"
                    />
                    <div class="position-absolute top-50 start-50 translate-middle text-center text-white">
                        <h1 class="display-2 fw-bold mb-4">Champions</h1>
                        <p class="lead fs-4">Les légendes du sport mondial</p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="position-relative">
                    <img
                        src="https://img.uefa.com/imgml/uefacom/uel/social/og-default.jpg"
                        class="d-block w-100"
                        style="height: 70vh; object-fit: cover; filter: brightness(0.4)"
                        alt="UEFA"
                    />
                    <div class="position-absolute top-50 start-50 translate-middle text-center text-white">
                        <h1 class="display-2 fw-bold mb-4">Europa League</h1>
                        <p class="lead fs-4">L'excellence européenne</p>
                    </div>
                </div>
            </div>
        </div>
        <button
            class="carousel-control-prev"
            type="button"
            data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="prev"
        >
            <div class="bg-white bg-opacity-25 rounded-circle p-3">
                <span class="carousel-control-prev-icon"></span>
            </div>
            <span class="visually-hidden">Previous</span>
        </button>
        <button
            class="carousel-control-next"
            type="button"
            data-bs-target="#carouselExampleAutoplaying"
            data-bs-slide="next"
        >
            <div class="bg-white bg-opacity-25 rounded-circle p-3">
                <span class="carousel-control-next-icon"></span>
            </div>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>

<div class="container-fluid px-4">
    <!-- ÉQUIPES EUROPÉENNES -->
    <section class="mb-6">
        <div class="text-center mb-5">
            <h2 class="display-4 text-white fw-light mb-3">
                Équipes <span class="fw-bold text-primary">Européennes</span>
            </h2>
            <div
                class="mx-auto bg-gradient"
                style="width: 100px; height: 3px; background: linear-gradient(90deg, #0d6efd, #6f42c1)"
            ></div>
        </div>
        <div class="row g-4 mb-5">
            @foreach ($equipesHome as $ekip)
            <div class="col-xl-3 col-lg-4 col-md-6">
                <a href="{{ route('equipes.show', $ekip->id) }}" class="text-decoration-none">
                    <div
                        class="card bg-dark border-0 h-100 shadow-lg position-relative overflow-hidden"
                        style="transition: all 0.4s ease; border-radius: 20px"
                    >
                        <div
                            class="position-absolute top-0 start-0 w-100 h-100 bg-gradient opacity-0"
                            style="
                                background: linear-gradient(45deg, rgba(13, 110, 253, 0.1), rgba(111, 66, 193, 0.1));
                                transition: opacity 0.4s ease;
                            "
                        ></div>
                        <div class="card-body p-4 text-center position-relative">
                            <div class="mb-4">
                                <img
                                    src="{{ asset($ekip->logo) }}"
                                    class="img-fluid shadow-lg"
                                    style="width: 120px; height: 120px; object-fit: cover; border-radius: 15px"
                                    alt="{{ $ekip->nom }}"
                                />
                            </div>
                            <h5 class="card-title text-white fw-bold mb-3 fs-4">{{ $ekip->nom }}</h5>
                            <p class="card-text text-white mb-0">
                                <i class="bi bi-geo-alt me-1"></i>{{ $ekip->ville }}
                            </p>
                        </div>
                        <div class="card-footer bg-transparent border-0 text-center pb-4">
                            <span class="badge text-white bg-primary bg-opacity-20 text-primary px-3 py-2 rounded-pill"
                                >Voir l'équipe</span
                            >
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </section>

    <!-- JOUEURS EUROPÉENS -->
    <section class="mb-6">
        <div class="text-center mb-5">
            <h2 class="display-4 text-white fw-light mb-3">
                Joueurs <span class="fw-bold text-success">Européens</span>
            </h2>
            <div
                class="mx-auto bg-gradient"
                style="width: 100px; height: 3px; background: linear-gradient(90deg, #198754, #20c997)"
            ></div>
        </div>
        <div class="row g-4 mb-5">
            @foreach ($joueursEurope as $joueur)
            <div class="col-xl-3 col-lg-4 col-md-6">
                <a href="{{ route('joueurs.show', $joueur->id) }}" class="text-decoration-none">
                    <div
                        class="card bg-dark border-0 h-100 shadow-lg position-relative overflow-hidden"
                        style="transition: all 0.4s ease; border-radius: 20px"
                    >
                        <div
                            class="position-absolute top-0 start-0 w-100 h-100 bg-gradient opacity-0"
                            style="
                                background: linear-gradient(45deg, rgba(25, 135, 84, 0.1), rgba(32, 201, 151, 0.1));
                                transition: opacity 0.4s ease;
                            "
                        ></div>
                        <div class="card-body p-4 text-center position-relative">
                            <div class="mb-4">
                                <img
                                    src="{{ asset('storage/'.$joueur->photo->src) }}"
                                    class="rounded-circle shadow-lg"
                                    style="width: 120px; height: 120px; object-fit: cover"
                                    alt="{{ $joueur->nom }}"
                                />
                            </div>
                            <h5 class="card-title text-white fw-bold mb-1 fs-5">{{ $joueur->prenom }}</h5>
                            <h6 class="card-subtitle text-white-50 mb-3">{{ $joueur->nom }}</h6>
                            <span class="badge bg-success text-white bg-opacity-20 text-success px-3 py-1 rounded-pill"
                                >{{ $joueur->equipe->nom }}</span
                            >
                        </div>
                        <div class="card-footer bg-transparent border-0 text-center pb-4">
                            <span class="badge text-white bg-success bg-opacity-20 text-success px-3 py-2 rounded-pill"
                                >Voir le profil</span
                            >
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </section>

    <!-- ÉQUIPES MONDIALES -->
    <section class="mb-6">
        <div class="text-center mb-5">
            <h2 class="display-4 text-white fw-light mb-3">
                Équipes <span class="fw-bold text-warning">Mondiales</span>
            </h2>
            <div
                class="mx-auto bg-gradient"
                style="width: 100px; height: 3px; background: linear-gradient(90deg, #ffc107, #fd7e14)"
            ></div>
        </div>
        <div class="row g-4 mb-5">
            @foreach ($equipesMondial as $equipeMonde)
            <div class="col-xl-3 col-lg-4 col-md-6">
                <a href="{{ route('equipes.show', $equipeMonde->id) }}" class="text-decoration-none">
                    <div
                        class="card bg-dark border-0 h-100 shadow-lg position-relative overflow-hidden"
                        style="transition: all 0.4s ease; border-radius: 20px"
                    >
                        <div
                            class="position-absolute top-0 start-0 w-100 h-100 bg-gradient opacity-0"
                            style="
                                background: linear-gradient(45deg, rgba(255, 193, 7, 0.1), rgba(253, 126, 20, 0.1));
                                transition: opacity 0.4s ease;
                            "
                        ></div>
                        <div class="card-body p-4 text-center position-relative">
                            <div class="mb-4">
                                <img
                                    src="{{ asset($equipeMonde->logo) }}"
                                    class="img-fluid shadow-lg"
                                    style="width: 120px; height: 120px; object-fit: cover; border-radius: 15px"
                                    alt="{{ $equipeMonde->nom }}"
                                />
                            </div>
                            <h5 class="card-title text-white fw-bold mb-3 fs-4">{{ $equipeMonde->nom }}</h5>
                            <p class="card-text text-white mb-0">
                                <i class="bi bi-globe me-1"></i>{{ $equipeMonde->ville }}
                            </p>
                        </div>
                        <div class="card-footer bg-transparent border-0 text-center pb-4">
                            <span class="badge text-white bg-warning bg-opacity-20 text-warning px-3 py-2 rounded-pill"
                                >Voir l'équipe</span
                            >
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </section>

    <!-- JOUEURS MONDIAUX -->
    <section class="mb-6">
        <div class="text-center mb-5">
            <h2 class="display-4 text-white fw-light mb-3">Joueurs <span class="fw-bold text-info">Mondiaux</span></h2>
            <div
                class="mx-auto bg-gradient"
                style="width: 100px; height: 3px; background: linear-gradient(90deg, #0dcaf0, #6f42c1)"
            ></div>
        </div>
        <div class="row g-4 mb-5">
            @foreach ($joueursMonde as $joueurMon)
            <div class="col-xl-3 col-lg-4 col-md-6">
                <a href="{{ route('joueurs.show', $joueurMon->id) }}" class="text-decoration-none">
                    <div
                        class="card bg-dark border-0 h-100 shadow-lg position-relative overflow-hidden"
                        style="transition: all 0.4s ease; border-radius: 20px"
                    >
                        <div
                            class="position-absolute top-0 start-0 w-100 h-100 bg-gradient opacity-0"
                            style="
                                background: linear-gradient(45deg, rgba(13, 202, 240, 0.1), rgba(111, 66, 193, 0.1));
                                transition: opacity 0.4s ease;
                            "
                        ></div>
                        <div class="card-body p-4 text-center position-relative">
                            <div class="mb-4">
                                <img
                                    src="{{ asset('storage/'.$joueurMon->photo->src) }}"
                                    class="rounded-circle shadow-lg"
                                    style="width: 120px; height: 120px; object-fit: cover"
                                    alt="{{ $joueurMon->nom }}"
                                />
                            </div>
                            <h5 class="card-title text-white fw-bold mb-1 fs-5">{{ $joueurMon->prenom }}</h5>
                            <h6 class="card-subtitle text-white-50 mb-3">{{ $joueurMon->nom }}</h6>
                            <span class="badge text-white bg-info bg-opacity-20 text-info px-3 py-1 rounded-pill"
                                >{{ $joueurMon->equipe->nom }}</span
                            >
                        </div>
                        <div class="card-footer bg-transparent border-0 text-center pb-4">
                            <span class="badge text-white bg-info bg-opacity-20 text-info px-3 py-2 rounded-pill"
                                >Voir le profil</span
                            >
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </section>

    <!-- JOUEURS SANS ÉQUIPE -->
    <section class="mb-6">
        <div class="text-center mb-5">
            <h2 class="display-4 text-white fw-light mb-3">Agents <span class="fw-bold text-danger">Libres</span></h2>
            <div
                class="mx-auto bg-gradient"
                style="width: 100px; height: 3px; background: linear-gradient(90deg, #dc3545, #e83e8c)"
            ></div>
        </div>
        <div class="row g-4 mb-5">
            @foreach ($joueursFA as $fa)
            <div class="col-xl-3 col-lg-4 col-md-6">
                <a href="{{ route('joueurs.show', $fa->id) }}" class="text-decoration-none">
                    <div
                        class="card bg-dark border-0 h-100 shadow-lg position-relative overflow-hidden"
                        style="transition: all 0.4s ease; border-radius: 20px"
                    >
                        <div
                            class="position-absolute top-0 start-0 w-100 h-100 bg-gradient opacity-0"
                            style="
                                background: linear-gradient(45deg, rgba(220, 53, 69, 0.1), rgba(232, 62, 140, 0.1));
                                transition: opacity 0.4s ease;
                            "
                        ></div>
                        <div class="card-body p-4 text-center position-relative">
                            <div class="mb-4">
                                <img
                                    src="{{ asset('storage/'.$fa->photo->src) }}"
                                    class="rounded-circle shadow-lg"
                                    style="width: 120px; height: 120px; object-fit: cover"
                                    alt="{{ $fa->nom }}"
                                />
                            </div>
                            <h5 class="card-title text-white fw-bold mb-1 fs-5">{{ $fa->prenom }}</h5>
                            <h6 class="card-subtitle text-light mb-3">{{ $fa->nom }}</h6>
                            <span class="badge bg-danger px-3 py-1 rounded-pill">Agent libre</span>
                        </div>
                        <div class="card-footer bg-transparent border-0 text-center pb-4">
                            <span class="badge bg-danger px-3 py-2 rounded-pill">Voir le profil</span>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </section>
</div>

@endsection
