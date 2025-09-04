<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/">
            <i class="bi bi-trophy-fill me-2"></i>
            Sports Manager
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/">
                        <i class="bi bi-house me-1"></i>Accueil
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('joueurs.index') }}">
                        <i class="bi bi-people me-1"></i>Joueurs
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('equipes.index') }}">
                        <i class="bi bi-shield me-1"></i>Équipes
                    </a>
                </li>
            </ul>
            
            <ul class="navbar-nav">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">
                            <i class="bi bi-box-arrow-in-right me-1"></i>Connexion
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-primary ms-2" href="{{ route('register') }}">
                            <i class="bi bi-person-plus me-1"></i>S'inscrire
                        </a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle me-1"></i>
                            {{ Auth::user()->prenom }} {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">
                                <i class="bi bi-gear me-2"></i>Profil
                            </a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        <i class="bi bi-box-arrow-right me-2"></i>Déconnexion
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    
                    @canany(['isUser', 'isCoach', 'isAdmin'])
                        <li class="nav-item ms-2">
                            <a class="btn btn-primary" href="{{ route('joueurs.create') }}">
                                <i class="bi bi-person-plus me-1"></i>Nouveau Joueur
                            </a>
                        </li>
                    @endcanany
                    
                    @canany(['isCoach', 'isAdmin'])
                        <li class="nav-item ms-2">
                            <a class="btn btn-outline-primary" href="{{ route('equipes.create') }}">
                                <i class="bi bi-plus-circle me-1"></i>Nouvelle Équipe
                            </a>
                        </li>
                    @endcanany
                    
                    @can("isAdmin")
                        <li class="nav-item dropdown ms-2">
                            <a class="btn btn-outline-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                <i class="bi bi-gear me-1"></i>Administration
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="{{ route('users.index') }}">
                                    <i class="bi bi-people me-2"></i>Utilisateurs
                                </a></li>
                                <li><a class="dropdown-item" href="{{ route('joueurs.index') }}">
                                    <i class="bi bi-people me-2"></i>Gestion Joueurs
                                </a></li>
                                <li><a class="dropdown-item" href="{{ route('equipes.index') }}">
                                    <i class="bi bi-shield me-2"></i>Gestion Équipes
                                </a></li>
                            </ul>
                        </li>
                    @endcan
                @endguest
            </ul>
        </div>
    </div>
</nav>