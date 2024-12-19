<section class="space-y-6">
    <header>
        <h2>
            {{ __('Verwijder Account') }}
        </h2>

        <p>
            {{ __('Wanneer je account verwijderd is, word alle data geassocieerd met jouw account ook verwijderd. Zorg dat je alle belangrijke informatie die je wilt behouden eerst opslaat op je apparaat voordat je je account permanent verwijderd.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
    >{{ __('Verwijder Account') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}">
            @csrf
            @method('delete')

            <h2>
                {{ __('Weet je zeker dat je je account wilt verwijderen?') }}
            </h2>

            <p>
                {{ __('Wanneer je account verwijderd is, word alle data geassocieerd met jouw account ook verwijderd. Voer je wachtwoord in om je account permanent te kunnen verwijderen.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Wachtwoord') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    placeholder="{{ __('Wachtwoord') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" />
            </div>

            <div>
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Annuleer') }}
                </x-secondary-button>

                <x-danger-button>
                    {{ __('Verwijder Account') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
