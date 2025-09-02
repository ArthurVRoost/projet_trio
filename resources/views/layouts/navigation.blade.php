<nav>
    <a href="/">Home</a>
    <a href="{{route("joueurs.index")}}">Joueurs</a>
    <a href="{{route("equipes.index")}}">Equipes</a>
    @guest
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Register</a>
    @else 
        @canany(['isUser', 'isCoach', 'isAdmin'])
            <a href="{{ route('joueurs.create') }}">Créer un joueur</a>
        @endcanany
        
        @canany(['isCoach', 'isAdmin'])
            <a href="{{ route('equipes.create') }}">Créer une équipe</a>
        @endcanany
        @can("isAdmin")
            <a href="{{ route('joueurs.index') }}">Gestion des joueurs</a>
            <a href="{{ route('equipes.index') }}">Gestion des équipes</a>
            <a href="{{ route('users.index') }}">Gestion des utilisateurs</a>
        @endcan
        <form method="POST" action="{{ route('logout') }}">@csrf<button class="bg-red-400 rounded px-3">Se Déconnecter</button></form>
    @endguest
</nav>
