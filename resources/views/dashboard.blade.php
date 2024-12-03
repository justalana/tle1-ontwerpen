<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-6">
                    Profile
                </h1>

                <!-- Formulier voor profielgegevens -->
                <form method="POST" action="{{ route('profile.update') }}" class="space-y-6">
                    @csrf
                    @method('PUT')


                    <!-- E-mailadres -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">E-mail</label>
                        <input id="email" name="email" type="email" value="{{ old('email', auth()->user()->email) }}" required
                               class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                    </div>

                    <!-- Telefoonnummer -->
                    <div>
                        <label for="phone_number" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Phone number (optional)</label>
                        <input id="phone_number" name="phone_number" type="text" value="{{ old('phone_number', auth()->user()->phone_number) }}"
                               class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                            This information is private and will not be visible to others.
                        </p>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                                class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring focus:ring-blue-300">
                            Save Profile
                        </button>
                    </div>
                </form>

                <!-- Formulier voor wachtwoord wijzigen -->
                <hr class="my-8 border-gray-300 dark:border-gray-600">
                <h2 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-4">Change Password</h2>

                <form method="POST" action="{{ route('password.update') }}" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Huidig wachtwoord -->
                    <div>
                        <label for="current_password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Current Password</label>
                        <input id="current_password" name="current_password" type="password" required
                               class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                    </div>

                    <!-- Nieuw wachtwoord -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">New Password</label>
                        <input id="password" name="password" type="password" required
                               class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                    </div>

                    <!-- Bevestig nieuw wachtwoord -->
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Confirm New Password</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" required
                               class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-50">
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                                class="bg-green-500 text-white py-2 px-4 rounded-md hover:bg-green-600 focus:outline-none focus:ring focus:ring-green-300">
                            Change Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
