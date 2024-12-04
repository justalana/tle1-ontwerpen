<x-guest-layout>
    <form method="POST" action="{{ route('register') }}" class="register-form">
        @csrf

        <div class="welcome-text">
            <span class="hi-welcome">Hi! Welkom.</span><br>
            <span class="create-account">Laten we een account aanmaken!</span>
        </div>

        <div class="info-text">
            Deze informatie is privé en zal niet zichtbaar zijn voor anderen.
        </div>

        <!-- Naam -->
        <div class="form-group">
            <label for="name" class="form-label">{{ __('Naam') }}</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" class="input-field">
            @error('name')
            <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <!-- E-mailadres -->
        <div class="form-group">
            <label for="email" class="form-label">{{ __('E-mail') }}</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" class="input-field">
            @error('email')
            <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <!-- Telefoonnummer -->
        <div class="form-group">
            <label for="phone_number" class="form-label">{{ __('Telefoonnummer') }}</label>
            <input id="phone_number" type="text" name="phone_number" value="{{ old('phone_number') }}" class="input-field">
            <p class="info-text-small">Optioneel: Je kunt dit veld leeg laten als je dat wilt.</p>
            @error('phone_number')
            <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <!-- Wachtwoord -->
        <div class="form-group">
            <label for="password" class="form-label">{{ __('Wachtwoord') }}</label>
            <input id="password" type="password" name="password" required autocomplete="new-password" class="input-field">
            @error('password')
            <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <!-- Bevestig Wachtwoord -->
        <div class="form-group">
            <label for="password_confirmation" class="form-label">{{ __('Bevestig Wachtwoord') }}</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password" class="input-field">
            @error('password_confirmation')
            <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <!-- Registreren Button -->
        <div class="form-group">
            <button type="submit" class="register-button">{{ __('Registreren') }}</button>
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

        .form-label {
            display: block;
            font-weight: bold;
            margin-bottom: 0.5rem;
            color: #333;
        }

        .input-field {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .input-field:focus {
            border-color: #007bff;
            outline: none;
        }

        .welcome-text {
            text-align: center;
            font-family: Arial, sans-serif;
            color: #92AA83;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 1rem;
        }

        .info-text {
            font-size: 0.875rem;
            color: #2F3A31;
            margin-bottom: 1.5rem;
        }

        .info-text-small {
            font-size: 0.8rem;
            color: #555;
            margin-top: 0.5rem;
        }

        .register-button {
            width: 100%;
            background-color: #AA0160;
            color: #fff;
            padding: 0.75rem;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            font-weight: bold;
            cursor: pointer;
        }

        .register-button:hover {
            background-color: #8a0151;
        }

        .error-message {
            color: red;
            font-size: 0.875rem;
            margin-top: 0.5rem;
        }
    </style>
</x-guest-layout>
