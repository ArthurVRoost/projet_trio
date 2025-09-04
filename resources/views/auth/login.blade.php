<x-guest-layout>
    <div class="text-center mb-5">
        <h2 class="h3 fw-bold text-white mb-2">Connexion</h2>
        <p class="text-muted">Accédez à votre espace personnel</p>
    </div>

    <!-- Session Status -->
    @if (session('status'))
    <div class="alert alert-info mb-4">
        <i class="bi bi-info-circle me-2"></i>
        {{ session('status') }}
    </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="mb-4">
            <label for="email" class="form-label fw-semibold">
                <i class="bi bi-envelope me-2 text-primary"></i>
                Adresse email
            </label>
            <input
                id="email"
                class="form-control @error('email') is-invalid @enderror"
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                autofocus
                autocomplete="username"
                placeholder="Entrez votre adresse email"
            />
            @error('email')
            <div class="invalid-feedback">
                <i class="bi bi-exclamation-triangle me-1"></i>
                {{ $message }}
            </div>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label for="password" class="form-label fw-semibold">
                <i class="bi bi-lock me-2 text-primary"></i>
                Mot de passe
            </label>
            <input
                id="password"
                class="form-control @error('password') is-invalid @enderror"
                type="password"
                name="password"
                required
                autocomplete="current-password"
                placeholder="Entrez votre mot de passe"
            />
            @error('password')
            <div class="invalid-feedback">
                <i class="bi bi-exclamation-triangle me-1"></i>
                {{ $message }}
            </div>
            @enderror
        </div>

        <!-- Remember Me -->
        <div class="mb-4 form-check">
            <input id="remember_me" type="checkbox" class="form-check-input" name="remember" />
            <label for="remember_me" class="form-check-label text-muted fw-medium"> Se souvenir de moi </label>
        </div>

        <div class="d-grid gap-2 mb-4">
            <button type="submit" class="btn btn-primary btn-lg">
                <i class="bi bi-box-arrow-in-right me-2"></i>
                Se connecter
            </button>
        </div>

        <hr class="my-4" style="border-color: #333" />

        <div class="text-center">
            <p class="text-muted mb-3 fw-medium">Pas encore de compte ?</p>
            <a href="{{ route('register') }}" class="btn btn-outline-primary">
                <i class="bi bi-person-plus me-2"></i>
                Créer un compte
            </a>
        </div>
    </form>
</x-guest-layout>
