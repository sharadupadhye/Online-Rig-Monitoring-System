@include('pages.loader')
@include('pages.dropdown')
@include('pages.offline')
<x-app-layout>

   

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Dashboard Main Card -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-semibold">{{ __("Welcome Back!") }}</h3>
                    <p class="mt-4 text-lg">{{ __("You're logged in!") }}</p>
                </div>
            </div>

            <!-- Additional Dashboard Sections -->
            <div class="mt-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Profile Card -->
                <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                    <h4 class="font-semibold text-xl text-gray-800 dark:text-gray-200">{{ __("Your Profile") }}</h4>
                    <p class="mt-4 text-gray-600 dark:text-gray-400">{{ __("Manage your personal information and settings.") }}</p>
                    <a href="{{ route('Home') }}" class="mt-4 text-blue-500 hover:text-blue-700">{{ __("Go to Profile") }}</a>
                </div>

                <!-- Notifications Card -->
                <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                    <h4 class="font-semibold text-xl text-gray-800 dark:text-gray-200">{{ __("Notifications") }}</h4>
                    <p class="mt-4 text-gray-600 dark:text-gray-400">{{ __("View and manage your notifications.") }}</p>
                    <a href="#" class="mt-4 text-blue-500 hover:text-blue-700">{{ __("View Notifications") }}</a>
                </div>

                <!-- Settings Card profile.edit -->
                <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
                    <h4 class="font-semibold text-xl text-gray-800 dark:text-gray-200">{{ __("Settings") }}</h4>
                    <p class="mt-4 text-gray-600 dark:text-gray-400">{{ __("Update your account settings and preferences.") }}</p>
                    <a href="{{ route('profile.edit') }}" class="mt-4 text-blue-500 hover:text-blue-700">{{ __("Go to Settings") }}</a>
                </div>
            </div>

        </div>
    </div>

</x-app-layout>
<!-- Bootstrap CSS & JS -->
<!-- Add this to the <head> section of your HTML -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Add this just before the closing </body> tag -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

