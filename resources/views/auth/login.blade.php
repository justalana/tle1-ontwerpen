<x-guest-layout>
    <!-- Sessie Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="text-center">
        <h2 class="welcome-text">Hi!
            Welkom</h2>
    </div>

    <form method="POST" action="{{ route('login') }}" class="login-form">
        @csrf

        <!-- E-mailadres -->
        <div class="form-group">
            <x-input-label for="email" :value="__('E-mail')" />
            <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" class="input-field"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Wachtwoord -->
        <div class="form-group mt-4">
            <x-input-label for="password" :value="__('Wachtwoord')" />
            <x-text-input id="password" type="password" name="password" required autocomplete="current-password" class="input-field"/>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Onthoud mij -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Onthoud mij') }}</span>
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
            <x-primary-button class="ms-3 login-btn">
                {{ __('Inloggen') }}
            </x-primary-button>
        </div>
    </form>

    <!-- "Heb je nog geen account?" link -->
    <div class="text-center mt-4">
        <a href="{{ route('register') }}" class="no-account-link">
            {{ __('Heb je nog geen account?') }}
        </a>
    </div>

    <style>
        .login-form {
            max-width: 400px;
            margin: 0 auto;
            padding: 2rem;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 0.5rem;
            color: #333;
        }

        .input-field {
            width: 100%;
            padding: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            background-color: #f4f4f4;
        }

        .input-field:focus {
            border-color: #007bff;
            outline: none;
        }

        .mt-4 {
            margin-top: 1rem;
        }

        .forgot-password-link {
            color: #2E342A; /* Moss Dark */
            text-decoration: none;
            font-size: 0.875rem;
        }

        .forgot-password-link:hover {
            text-decoration: underline;
        }

        .welcome-text {
            font-size: 50px;
            font-weight: bold;
            color: #92AA83;
        }

        .login-btn {
            background-color: #FAEC02;
            color: #2E342A; /* Moss Dark */
            padding: 1rem 2rem;
            border-radius: 4px;
            font-weight: bold;
            border: none;
            cursor: pointer;
            font-size: 20px;
            width: 100%;
            max-width: 400px;
            margin-left: -25%;
        }

        .login-btn:hover {
            background-color: #e0c800;
        }

        .login-btn:focus {
            outline: none;
        }

        .no-account-link {
            color: #2E342A; /* Moss Dark */
            text-decoration: none;
            font-size: 0.875rem;
        }

        .no-account-link:hover {
            text-decoration: underline;
        }
    </style>
</x-guest-layout>
