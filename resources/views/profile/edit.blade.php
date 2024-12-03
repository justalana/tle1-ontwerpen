<x-app-layout>
    <x-slot name="header">
        <h2>Profiel</h2>
    </x-slot>

    <div class="content">
        <!-- Succesmelding -->
        @if (session('status'))
            <div class="alert">
                {{ session('status') }}
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

        <!-- Activiteiten -->
        <div class="activities">
            <h3>Recente activiteiten</h3>
            <ul>
                <li>Je bent geregistreerd op: {{ auth()->user()->created_at->format('d F Y') }}</li>
                <li>Aantal vacatures: 5 (voorbeeld)</li>
            </ul>
        </div>
    </div>

    <style>
        .content {
            padding: 20px;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .note {
            font-size: 12px;
            color: #6c757d;
        }

        button {
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        .activities {
            margin-top: 30px;
        }

        .activities h3 {
            font-size: 18px;
            font-weight: bold;
        }

        .activities ul {
            list-style-type: none;
            padding: 0;
        }

        .activities li {
            margin-bottom: 10px;
        }
    </style>
</x-app-layout>
