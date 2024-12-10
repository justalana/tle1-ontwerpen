<section>
    <header>
        <h2>
            {{ __('Profiel') }}
        </h2>

        <p>
            {{ __("Wijzig hier je profiel gegevens door de nieuwe informatie in te voeren en op 'opslaan' te klikken. Niemand kan deze informatie zien, behalve jij.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Naam')" />
            <x-text-input id="name" name="name" type="text" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p>
                        {{ __('Je email adres is nog niet bevestigd.') }}

                        <button form="send-verification">
                            {{ __('Klik hier om een nieuwe verificatie email te krijgen.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p>
                            {{ __('Een nieuwe verificatie mail is gestuurd naar jouw email adress.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

{{--        <div>--}}
{{--            <label for="phone_number">Telefoonnummer (Optioneel)</label>--}}
{{--            <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}">--}}
{{--            <p class="note">Je kunt dit veld leeg laten als je je telefoonnummer niet wilt opgeven.</p>--}}
{{--        </div>--}}

        <div>
            <x-primary-button>{{ __('Opslaan') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                >{{ __('Opgeslagen.') }}</p>
            @endif
        </div>
    </form>
</section>
