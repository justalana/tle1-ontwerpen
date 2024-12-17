<x-site-layout>
    @vite(['resources/css/profile.css'])
    @if (auth()->user()->role === 2)
        <x-slot name="header">
            <h1 role="heading" aria-level="1" aria-label="Hoofdtitel van de pagina">Werkgever Profiel</h1>
        </x-slot>

        <!-- Succesmelding -->
        @if (session('profile_updated'))
            <div class="alert alert-success">
                {{ session('profile_updated') }}
            </div>
        @endif

        <!-- Profiel Informatie -->
        <section>
            <p>Je bent ingelogd als werkgever.</p>
            <header>
                <h2 role="heading" aria-level="2" aria-label="Subtitel">{{ __('Profiel') }}</h2>
                <p>{{ __("Hier kun je je profiel en bedrijfsinformatie beheren.") }}</p>
            </header>
            <form method="POST" action="{{ route('profile.update') }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Naam</label>
                    <input type="text" id="name" name="name" value="{{ old('name', $user->name) }}">
                </div>

                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}">
                </div>

                <div class="form-group">
                    <label for="phone_number">Telefoonnummer</label>
                    <input type="text" id="phone_number" name="phone_number"
                           value="{{ old('phone_number', $user->phone_number) }}">
                </div>

                <button type="submit">Profiel Bijwerken</button>
            </form>
        </section>

        <!-- Bedrijfsinformatie -->
        <section>
            <header>
                <h2 role="heading" aria-level="2" aria-label="Subtitel">Bedrijfsinformatie</h2>
            </header>
            <ul>
                <li><strong>Bedrijfsnaam:</strong> {{ auth()->user()->company_name ?? 'Bedrijf niet opgegeven' }}</li>
                <li><strong>Aantal vacatures geplaatst:</strong>
                    {{ auth()->user()->vacancies ? auth()->user()->vacancies->count() : 0 }}
                </li>
            </ul>
        </section>

        <!-- Vacaturebeheer -->
        <section>
            <header>
                <h2 role="heading" aria-level="2" aria-label="Subtitel">Vacaturebeheer</h2>
            </header>

            <a href="/vacancies/create" class="btn btn-primary">Nieuwe vacature toevoegen</a>
        </section>

    @else
        <p>Je hebt geen toegang tot deze pagina.</p>
    @endif
</x-site-layout>
