<x-app-layout>
    <x-slot name="header">
        <h1 role="heading" aria-level="1" aria-label="Hoofdtitel van de pagina">
            {{ __('Welkom op je Dashboard') }}
        </h1>
    </x-slot>

    <div class="py-12">
        <div class="container">
            <div class="card">
                <div class="text-center mb-8">
                    <h1 class="heading">Welkom, {{ auth()->user()->name }}!</h1>
                    <p class="subheading">Je bent ingelogd op je dashboard.</p>
                </div>

                <!-- Profiel link -->
                <div class="text-center">
                    <a href="{{ route('profile.edit') }}" class="btn-profile-link">
                        Ga naar je profiel
                    </a>
                </div>
            </div>
        </div>
    </div>

    <style>
        .container {
            max-width: 40rem;
            margin: 0 auto;
            padding: 1rem;
        }

        .card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 1.5rem;
            text-align: center;
        }

        .heading {
            font-size: 2rem;
            font-weight: bold;
            color: #1a202c;
        }

        .subheading {
            font-size: 1.125rem;
            color: #4a5568;
        }

        .btn-profile-link {
            display: inline-block;
            background-color: #3b82f6;
            color: white;
            padding: 0.75rem 2rem;
            border-radius: 0.375rem;
            text-decoration: none;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        .btn-profile-link:hover {
            background-color: #2563eb;
        }
    </style>
</x-app-layout>
