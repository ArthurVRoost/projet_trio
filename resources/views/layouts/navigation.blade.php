<nav class="flex gap-10 items-center justify-center">
    <a href="/" class="border border-1 rounded border-black px-3">Home</a>
    <a href="{{route("joueurs.index")}}" class="border border-1 rounded border-black px-3">Joueurs</a>
    <a href="{{route("equipes.index")}}" class="border border-1 rounded border-black px-3">Equipes</a>
    @guest
        <a href="{{ route('login') }}" class="bg-blue-400 rounded px-2">Login</a>
        <a href="{{ route('register') }}" class="bg-green-400 rounded px-2">Register</a>
    @else
        {{--
        Permissions pour rôles => User, Coach & Admin
        --}} 
        @canany(['isUser', 'isCoach', 'isAdmin'])
            <a href="{{ route('joueurs.create') }}" class="border border-1 rounded border-black px-3">Créer un joueur</a>
        @endcanany
        {{--
        Permissions pour rôles => Coach & Admin
        --}}
        @canany(['isCoach', 'isAdmin'])
            <a href="{{ route('equipes.create') }}" class="border border-1 rounded border-black px-3">Créer une équipe</a>
        @endcanany
        {{--
        Permissions pour rôle => Admin
        --}}
        @can("isAdmin")
            <a href="{{ route('joueurs.index') }}" class="border border-1 rounded border-black px-3">Gestion des joueurs</a>
            <a href="{{ route('equipes.index') }}" class="border border-1 rounded border-black px-3">Gestion des équipes</a>
            <a href="{{ route('users.index') }}" class="border border-1 rounded border-black px-3">Gestion des utilisateurs</a>
        @endcan
        <form method="POST" action="{{ route('logout') }}">@csrf<button class="bg-red-400 rounded px-3">Se Déconnecter</button></form>
    @endguest
</nav>
