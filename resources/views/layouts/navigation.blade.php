<nav >
    <a href="/" >Home</a>
    <a href="{{route("joueurs.index")}}">Joueurs</a>
    <a href="{{route("equipes.index")}}">Equipes</a>
    @guest
        <a href="{{ route('login') }}" >Login</a>
        <a href="{{ route('register') }}" >Register</a>
    @else
        {{--
        Permissions pour rôles => User, Coach & Admin
        --}} 
        @canany(['isUser', 'isCoach', 'isAdmin'])
            <a href="{{ route('joueurs.create') }}">Créer un joueur</a>
        @endcanany
        {{--
        Permissions pour rôles => Coach & Admin
        --}}
        @canany(['isCoach', 'isAdmin'])
            <a href="{{ route('equipes.create') }}">Créer une équipe</a>
        @endcanany
        {{--
        Permissions pour rôle => Admin
        --}}
        @can("isAdmin")
            <a href="{{ route('joueurs.index') }}" >Gestion des joueurs</a>
            <a href="{{ route('equipes.index') }}" >Gestion des équipes</a>
            <a href="{{ route('users.index') }}" >Gestion des utilisateurs</a>
        @endcan
        <form method="POST" action="{{ route('logout') }}">@csrf<button>Se Déconnecter</button></form>
    @endguest
</nav>