<x-guest-layout>
    <div class="text-center mb-5">
        <h2 class="h3 fw-bold text-white mb-2">Créer un compte</h2>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="row">
            <div class="col-md-6 mb-4">
                <label for="prenom" class="form-label fw-semibold">
                    <i class="bi bi-person me-2 text-primary"></i>
                    Prénom
                </label>
                <input
                    id="prenom"
                    class="form-control @error('prenom') is-invalid @enderror"
                    type="text"
                    name="prenom"
                    value="{{ old('prenom') }}"
                    required
                    autofocus
                    autocomplete="prenom"
                    placeholder="Votre prénom"
                />
                @error('prenom')
                <div class="invalid-feedback">
                    <i class="bi bi-exclamation-triangle me-1"></i>
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="col-md-6 mb-4">
                <label for="name" class="form-label fw-semibold">
                    <i class="bi bi-person-badge me-2 text-primary"></i>
                    Nom
                </label>
                <input
                    id="name"
                    class="form-control @error('name') is-invalid @enderror"
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    required
                    autocomplete="name"
                    placeholder="Votre nom"
                />
                @error('name')
                <div class="invalid-feedback">
                    <i class="bi bi-exclamation-triangle me-1"></i>
                    {{ $message }}
                </div>
                @enderror
            </div>
        </div>

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
                autocomplete="username"
                placeholder="votre@email.com"
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
                autocomplete="new-password"
                placeholder="Choisissez un mot de passe sécurisé"
            />
            @error('password')
            <div class="invalid-feedback">
                <i class="bi bi-exclamation-triangle me-1"></i>
                {{ $message }}
            </div>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="mb-4">
            <label for="password_confirmation" class="form-label fw-semibold">
                <i class="bi bi-lock-fill me-2 text-primary"></i>
                Confirmer le mot de passe
            </label>
            <input
                id="password_confirmation"
                class="form-control @error('password_confirmation') is-invalid @enderror"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password"
                placeholder="Confirmez votre mot de passe"
            />
            @error('password_confirmation')
            <div class="invalid-feedback">
                <i class="bi bi-exclamation-triangle me-1"></i>
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="d-grid gap-2 mb-4">
            <button type="submit" class="btn btn-primary btn-lg">
                <i class="bi bi-person-plus me-2"></i>
                Créer mon compte
            </button>
        </div>

        <div class="text-center">
            <p class="text-muted mb-0 fw-medium">Déjà inscrit ?</p>
            <a class="text-decoration-none text-primary fw-semibold" href="{{ route('login') }}">
                <i class="bi bi-box-arrow-in-right me-1"></i>
                Se connecter
            </a>
        </div>
    </form>
</x-guest-layout>
