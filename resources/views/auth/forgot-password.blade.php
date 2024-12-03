<x-guest-layout>
    <!-- Oops! Text -->
    <div class="text-4xl text-center font-bold" style="color: #92AA83;">
        Oops!
    </div>

    <!-- Description Text -->
    <div class="text-sm text-center" style="color: #2F3A31;">
        Geef je naam, email of telefoonnummer op, zodat wij een link kunnen sturen om je wachtwoord te veranderen.
    </div>



    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="w-full" style="background-color: #8a0151; color: white;">
                {{ __('Email Password Reset Link') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
