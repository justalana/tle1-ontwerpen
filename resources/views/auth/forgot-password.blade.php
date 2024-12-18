@vite(['resources/css/auth.css', 'resources/css/style.css'])

<x-guest-layout>

    <form method="POST" action="{{ route('password.email') }}" class="login-form">
        <!-- Oops! Text -->
        <div class="oops-text">
            Oops!
        </div>

        <!-- Description Text -->
        <div class="description-text">
            Geef je email op, zodat wij een link kunnen sturen om je wachtwoord te veranderen.
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')"/>

        <!-- Email Address -->
        <div class="form-group">
            <x-input-label for="email" :value="__('Email')"/>
            <x-text-input id="email" class="input-field" type="email" name="email" :value="old('email')" required
                          autofocus/>
            <x-input-error :messages="$errors->get('email')" class="error-message"/>
        </div>

        <!-- Submit Button -->
        <div class="form-group">
            <x-primary-button class="login-btn">
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
