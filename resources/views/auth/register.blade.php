@include('pages.loader')
@include('pages.offline')
@include('pages.dropdown')

<!-- Toast Notification (Popup) -->
<div id="toast" class="fixed top-1/4 left-1/2 transform -translate-x-1/2 z-50 hidden bg-blue-500 text-black py-4 px-8 rounded-lg shadow-lg font-semibold text-xl max-w-md w-full text-center hover:bg-blue-600">
    <strong id="toast-message"></strong>
</div>

<x-guest-layout>
    <!-- Navbar -->
   

    <!-- Registration Form -->
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Role Selection -->
        <div class="mt-4">
            <x-input-label for="role" :value="__('Role')" />
            <select id="role" name="role" class="block mt-1 w-full" required>
                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="engineer" {{ old('role') == 'engineer' ? 'selected' : '' }}>Engineer</option>
                <option value="operator" {{ old('role') == 'operator' ? 'selected' : '' }}>Operator</option>
            </select>
            <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

<!-- Custom Styles for Toast Animations -->
<style>
@keyframes fadeIn {
    0% {
        opacity: 0;
    }
    100% {
        opacity: 1;
    }
}

@keyframes fadeOut {
    0% {
        opacity: 1;
    }
    100% {
        opacity: 0;
    }
}

.fade-in {
    animation: fadeIn 0.5s ease-in-out forwards;
}

.fade-out {
    animation: fadeOut 0.5s ease-in-out forwards;
}
</style>

<!-- Add JavaScript to show the Toast -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const toast = document.getElementById('toast');
    const message = document.getElementById('toast-message');

    // Check if there's a success message in the session
    @if(session('success'))
        message.textContent = "{{ session('success') }}"; // Set success message
        toast.classList.remove('hidden'); // Show the toast
        toast.classList.add('fade-in'); // Apply fade-in animation

        // Hide the toast after 4 seconds
        setTimeout(function() {
            toast.classList.remove('fade-in');
            toast.classList.add('fade-out'); // Apply fade-out animation
            setTimeout(function() {
                toast.classList.add('hidden'); // Hide the toast completely after fade-out
            }, 500); // Delay to match the fade-out duration
        }, 4000); // Adjust the visibility duration as needed
    @endif
});
</script>

<!-- Bootstrap CSS & JS -->
<!-- Add this to the <head> section of your HTML -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Add this just before the closing </body> tag -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
