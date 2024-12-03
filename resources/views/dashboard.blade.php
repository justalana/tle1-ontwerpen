<x-app-layout>
    <x-slot name="header">
        <h2>
            {{ __('Welkom op je Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="text-center mb-8">
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">Welkom, {{ auth()->user()->name }}!</h1>
                    <p class="text-lg text-gray-600 dark:text-gray-300">Je bent ingelogd op je dashboard.</p>
                </div>

                <!-- Profiel link -->
                <div class="text-center">
                    <a href="{{ route('profile.edit') }}"
                       class="inline-block bg-blue-500 text-white py-2 px-6 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-300">
                        Ga naar je profiel
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
