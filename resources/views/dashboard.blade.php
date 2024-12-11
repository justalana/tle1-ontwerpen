@vite(['resources/css/dashboard.css'])
<x-site-layout>

    <x-slot name="header">
        <h2>
            {{ __('Welkom op je Dashboard') }}
        </h2>
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

    </x-site-layout>
