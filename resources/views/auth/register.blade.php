<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="register-form">
        @csrf

        <div class="mb-6 text-sm text-gray-500">
            Deze informatie is privé en zal niet zichtbaar zijn voor anderen.
        </div>

        <!-- Naam -->
        <div class="form-group">
            <x-input-label for="name" :value="__('Naam')" />
            <x-text-input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- E-mailadres -->
        <div class="form-group mt-4">
            <x-input-label for="email" :value="__('E-mail')" />
            <x-text-input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Telefoonnummer -->
        <div class="form-group mt-4">
            <x-input-label for="phone_number" :value="__('Telefoonnummer')" />
            <x-text-input id="phone_number" type="text" name="phone_number" :value="old('phone_number')" />
            <p class="text-sm text-gray-500 mt-1">Optioneel: Je kunt dit veld leeg laten als je dat wilt.</p>
            <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
        </div>

        <!-- Wachtwoord -->
        <div class="form-group mt-4">
            <x-input-label for="password" :value="__('Wachtwoord')" />
            <x-text-input id="password" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Bevestig Wachtwoord -->
        <div class="form-group mt-4">
            <x-input-label for="password_confirmation" :value="__('Bevestig Wachtwoord')" />
            <x-text-input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a href="{{ route('login') }}" class="login-link">
                {{ __('Al geregistreerd?') }}
            </a>

            <x-primary-button class="register-button ms-4">
                {{ __('Registreren') }}
            </x-primary-button>
        </div>
    </form>

    <style>
        .register-form {
            max-width: 500px;
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

        .text-sm {
            font-size: 0.875rem;
        }

        .text-gray-500 {
            color: #6b7280;
        }

        .login-link {
            color: #007bff;
            text-decoration: none;
            font-size: 0.875rem;
        }

        .login-link:hover {
            text-decoration: underline;
        }

        .register-button {
            background-color: #007bff;
            color: #fff;
            padding: 0.75rem 1.5rem;
            border-radius: 4px;
            font-weight: bold;
            border: none;
            cursor: pointer;
        }

        .register-button:hover {
            background-color: #0056b3;
        }

        .register-button:focus {
            outline: none;
        }
    </style>
</x-guest-layout>
