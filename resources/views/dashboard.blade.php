<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Welcome to Your Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="text-center mb-8">
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">Welcome, {{ auth()->user()->name }}!</h1>
                    <p class="text-lg text-gray-600 dark:text-gray-300">You are logged in to your dashboard.</p>
                </div>

                <!-- Profiel link -->
                <div class="text-center">
                    <a href="{{ route('profile.edit') }}"
                       class="inline-block bg-blue-500 text-white py-2 px-6 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-300">
                        Go to Your Profile
                    </a>
                </div>

                <hr class="my-8 border-gray-300 dark:border-gray-600">

                <!-- Gebruiker Gerelateerde Informatie (Recent Activities) -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="bg-gray-50 dark:bg-gray-700 p-6 rounded-lg shadow-md">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-4">Recent Activities</h3>
                        <ul class="space-y-2 text-gray-600 dark:text-gray-300">
                            <li>Joined the platform on {{ auth()->user()->created_at->format('F d, Y') }}</li>
                            <li>Last login: {{ auth()->user()->last_login_at ?? 'Never logged in' }}</li>
                            <li>Number of posts: 5 (example)</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
