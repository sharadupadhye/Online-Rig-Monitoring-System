<!-- resources/views/users/index.blade.php -->

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registered Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="bg-green-500 text-white p-4 rounded-md mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-500 text-white p-4 rounded-md mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <!-- Users Table -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-4">{{ __('Users List') }}</h3>
                    
                    <table class="min-w-full table-auto border-collapse">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 text-left border-b">{{ __('Name') }}</th>
                                <th class="px-4 py-2 text-left border-b">{{ __('Email') }}</th>
                                <th class="px-4 py-2 text-left border-b">{{ __('Role') }}</th>
                                <th class="px-4 py-2 text-left border-b">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="px-4 py-2 border-b">{{ $user->name }}</td>
                                    <td class="px-4 py-2 border-b">{{ $user->email }}</td>
                                    <td class="px-4 py-2 border-b">{{ $user->role }}</td>
                                    <td class="px-4 py-2 border-b">
                                        <!-- Check if the logged-in user is not the one to be deleted -->
                                        @if ($user->id !== $currentUser->id)
                                            <!-- Form for deleting user -->
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" 
                                                  onsubmit="return confirm('Are you sure you want to delete this user?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700">{{ __('Delete') }}</button>
                                            </form>
                                        @else
                                            <span class="text-gray-400">{{ __('Cannot delete yourself') }}</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

