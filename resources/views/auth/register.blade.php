@vite(['resources/css/profile.css'])

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
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                   class="input-field">
            @error('name')
            <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <!-- E-mailadres -->
        <div class="form-group">
            <label for="email" class="form-label">{{ __('E-mail') }}</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                   class="input-field">
            @error('email')
            <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <!-- Telefoonnummer -->
        <div class="form-group">
            <label for="phone_number" class="form-label">{{ __('Telefoonnummer') }}</label>
            <input id="phone_number" type="text" name="phone_number" value="{{ old('phone_number') }}"
                   class="input-field">
            <p class="info-text-small">Optioneel: Je kunt dit veld leeg laten als je dat wilt.</p>
            @error('phone_number')
            <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <!-- Wachtwoord -->
        <div class="form-group">
            <label for="password" class="form-label">{{ __('Wachtwoord') }}</label>
            <input id="password" type="password" name="password" required autocomplete="new-password"
                   class="input-field">
            @error('password')
            <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <!-- Bevestig Wachtwoord -->
        <div class="form-group">
            <label for="password_confirmation" class="form-label">{{ __('Bevestig Wachtwoord') }}</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required
                   autocomplete="new-password" class="input-field">
            @error('password_confirmation')
            <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <!-- Registreren Button -->
        <div class="form-group">
            <button type="submit" class="register-button">{{ __('Registreren') }}</button>
        </div>
    </form>

</x-guest-layout>
