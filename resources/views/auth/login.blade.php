@vite(['resources/css/profile.css'])

<x-guest-layout>

    <!-- Succesbericht tonen na registratie -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="login-form">
        @csrf

        <!-- Sessie Status -->
        <div class="mb-4">
            @if (session('status'))
                <div class="session-status">{{ session('status') }}</div>
            @endif
        </div>

        <div class="text-center">
            <h2 class="welcome-text">Hi! Welkom</h2>
        </div>

        <!-- E-mailadres -->
        <div class="form-group">
            <label for="email" class="form-label">{{ __('E-mail') }}</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                   class="input-field">
            @error('email')
            <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <!-- Wachtwoord -->
        <div class="form-group mt-4">
            <label for="password" class="form-label">{{ __('Wachtwoord') }}</label>
            <input id="password" type="password" name="password" required class="input-field">
            @error('password')
            <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <!-- Onthoud mij -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-label">
                <input id="remember_me" type="checkbox" name="remember">
                <span class="ms-2 small-text">{{ __('Onthoud mij') }}</span>
            </label>
        </div>

        <!-- Wachtwoord vergeten link -->
        <div class="text-right mt-2">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="forgot-password-link">
                    {{ __('Wachtwoord vergeten?') }}
                </a>
            @endif
        </div>

        <div class="flex items-center justify-end mt-4">
            <button type="submit" class="login-btn">
                {{ __('Inloggen') }}
            </button>
        </div>

        <!-- "Heb je nog geen account?" link -->
        <div class="text-center mt-4">
            <a href="{{ route('register') }}" class="no-account-link">
                {{ __('Heb je nog geen account?') }}
            </a>
        </div>
    </form>
</x-guest-layout>
