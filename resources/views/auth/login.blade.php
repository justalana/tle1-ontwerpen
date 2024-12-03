<x-guest-layout>
    <!-- Sessie Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="login-form">
        @csrf

        <!-- E-mailadres -->
        <div class="form-group">
            <x-input-label for="email" :value="__('E-mail')" />
            <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Wachtwoord -->
        <div class="form-group mt-4">
            <x-input-label for="password" :value="__('Wachtwoord')" />
            <x-text-input id="password" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Onthoud mij -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Onthoud mij') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="forgot-password-link">
                    {{ __('Wachtwoord vergeten?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Inloggen') }}
            </x-primary-button>
        </div>
    </form>

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

        .form-group input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-group input:focus {
            border-color: #007bff;
            outline: none;
        }

        .mt-4 {
            margin-top: 1rem;
        }

        .forgot-password-link {
            color: #007bff;
            text-decoration: none;
            font-size: 0.875rem;
        }

        .forgot-password-link:hover {
            text-decoration: underline;
        }

        .primary-button {
            background-color: #007bff;
            color: #fff;
            padding: 0.75rem 1.5rem;
            border-radius: 4px;
            font-weight: bold;
            border: none;
            cursor: pointer;
        }

        .primary-button:hover {
            background-color: #0056b3;
        }

        .primary-button:focus {
            outline: none;
        }
    </style>
</x-guest-layout>
