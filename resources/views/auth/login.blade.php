<x-guest-layout>
    <div class="text-center mb-4">
        <h2 class="h4 fw-bold text-white">Connexion</h2>
        <p class="text-muted">Connectez-vous à votre compte</p>
    </div>

    <!-- Session Status -->
    @if (session('status'))
        <div class="alert alert-info">
            <i class="bi bi-info-circle me-2"></i>
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="mb-3">
            <label for="email" class="form-label fw-medium">
                <i class="bi bi-envelope me-1"></i>
                Adresse email
            </label>
            <input id="email" 
                   class="form-control @error('email') is-invalid @enderror" 
                   type="email" 
                   name="email" 
                   value="{{ old('email') }}" 
                   required 
                   autofocus 
                   autocomplete="username"
                   placeholder="votre@email.com">
            @error('email')
                <div class="invalid-feedback">
                    <i class="bi bi-exclamation-triangle me-1"></i>
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label fw-medium">
                <i class="bi bi-lock me-1"></i>
                Mot de passe
            </label>
            <input id="password" 
                   class="form-control @error('password') is-invalid @enderror"
                   type="password"
                   name="password"
                   required 
                   autocomplete="current-password"
                   placeholder="Votre mot de passe">
            @error('password')
                <div class="invalid-feedback">
                    <i class="bi bi-exclamation-triangle me-1"></i>
                    {{ $message }}
                </div>
            @enderror
        </div>

        <!-- Remember Me -->
        <div class="mb-3 form-check">
            <input id="remember_me" 
                   type="checkbox" 
                   class="form-check-input" 
                   name="remember">
            <label for="remember_me" class="form-check-label text-muted">
                Se souvenir de moi
            </label>
        </div>

        <div class="d-grid gap-2 mb-3">
            <button type="submit" class="btn btn-primary btn-lg">
                <i class="bi bi-box-arrow-in-right me-2"></i>
                Se connecter
            </button>
        </div>

        <div class="text-center">
            @if (Route::has('password.request'))
                <a class="text-decoration-none text-muted" href="{{ route('password.request') }}">
                    <i class="bi bi-question-circle me-1"></i>
                    Mot de passe oublié ?
                </a>
            @endif
        </div>

        <hr class="my-4">

        <div class="text-center">
            <p class="text-muted mb-0">Pas encore de compte ?</p>
            <a href="{{ route('register') }}" class="btn btn-outline-primary mt-2">
                <i class="bi bi-person-plus me-2"></i>
                Créer un compte
            </a>
        </div>
    </form>
</x-guest-layout>
