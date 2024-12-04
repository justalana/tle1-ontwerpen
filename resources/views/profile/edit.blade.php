<x-site-layout>
    @vite(['resources/css/profile.css'])
    <x-slot name="header">
        <h2>Profiel</h2>
    </x-slot>

    <div class="content">
        <!-- Succesmelding na profiel update -->
        @if (session('profile_updated'))
            <div class="alert alert-success">
                {{ session('profile_updated') }}
            </div>
        @endif

        <!-- Profiel Informatie -->
        <div class="profile-info">
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
                    <label for="phone_number">Telefoonnummer (Optioneel)</label>
                    <input type="text" id="phone_number" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}">
                    <p class="note">Je kunt dit veld leeg laten als je je telefoonnummer niet wilt opgeven.</p>
                </div>

                <button type="submit">Profiel Bijwerken</button>
            </form>
        </div>

        <!-- Wachtwoord Wijzigen -->
        <div class="password-change">
            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="current_password">Huidig Wachtwoord</label>
                    <input type="password" id="current_password" name="current_password" required>
                </div>

                <div class="form-group">
                    <label for="new_password">Nieuw Wachtwoord</label>
                    <input type="password" id="new_password" name="new_password" required>
                </div>

                <div class="form-group">
                    <label for="new_password_confirmation">Bevestig Nieuw Wachtwoord</label>
                    <input type="password" id="new_password_confirmation" name="new_password_confirmation" required>
                </div>

                <button type="submit">Wachtwoord Bijwerken</button>
            </form>
        </div>

        <!-- Anonimiteit Uitleg -->
        <div class="anonimity-info">
            <p>We respecteren je privacy en anonimiteit. Zelfs wanneer je je profielgegevens bijwerkt, blijven je gegevens anoniem en worden ze niet gedeeld met anderen. Alleen jij hebt toegang tot je eigen gegevens en ze blijven privé.</p>
        </div>

        <!-- Recente Activiteiten -->
        <div class="activities">
            <h3>Recente activiteiten</h3>
            <ul>
                <li>Je bent geregistreerd op: {{ auth()->user()->created_at->format('d F Y') }}</li>
                <li>Aantal vacatures bekeken: 5 (voorbeeld)</li>
                <li>Op aantal vacatures gereageerd: 5 (voorbeeld)</li>
            </ul>
        </div>

        <!-- Laatste Update -->
        <div class="last-update">
            <h3>Laatste Profiel Update</h3>
            <p>Je profiel is voor het laatst bijgewerkt op: {{ auth()->user()->updated_at->format('d F Y H:i') }}</p>
        </div>
    </div>
</x-site-layout>
