@vite(['resources/css/employeedash.css'])
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



                <!-- Werknemerspagina link -->
                <div class="text-center mt-4">
                    <a href="{{ route('employee') }}" class="btn-profile-link">
                        Klik hier om naar je profiel te gaan
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-site-layout>
