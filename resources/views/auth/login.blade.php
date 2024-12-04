<x-guest-layout>
    <!-- Sessie Status -->
    <div class="mb-4">
        @if (session('status'))
            <div class="session-status">{{ session('status') }}</div>
        @endif
    </div>

    <div class="text-center">
        <h2 class="welcome-text">Hi! Welkom</h2>
    </div>

    <form method="POST" action="{{ route('login') }}" class="login-form">
        @csrf

        <!-- E-mailadres -->
        <div class="form-group">
            <label for="email" class="form-label">{{ __('E-mail') }}</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus class="input-field">
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

        .form-label {
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
            background-color: #8a0151; /* Violet color */
            color: white;
            padding: 1rem 2rem;
            border-radius: 4px;
            font-weight: bold;
            border: none;
            cursor: pointer;
            font-size: 20px;
            width: 100%;
        }

        .login-btn:hover {
            background-color: #7a0146;
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

        .small-text {
            font-size: 0.875rem;
            color: #333;
        }

        .error-message {
            color: red;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        .session-status {
            color: green;
            font-weight: bold;
            margin-bottom: 1rem;
        }


        @media (max-width: 768px) {
            .login-form {
                padding: 1.5rem;
            }

            .welcome-text {
                font-size: 35px;
            }

            .login-btn {
                font-size: 18px;
                padding: 0.8rem 1.5rem;
            }
        }


        @media (max-width: 480px) {
            .login-form {
                padding: 1rem;
            }

            .welcome-text {
                font-size: 28px;
            }

            .login-btn {
                font-size: 16px;
                padding: 0.8rem 1.2rem;
            }

            .form-label {
                font-size: 0.9rem;
            }

            .input-field {
                padding: 0.8rem;
            }
        }
    </style>
</x-guest-layout>
