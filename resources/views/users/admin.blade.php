@include('pages.loader')
@include('pages.dropdown')
@include('pages.offline')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<x-app-layout>
    <div class="py-4">
        <div class="container">

            <!-- Success and Error Messages -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show text-center mb-4" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show text-center mb-4" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Register New User Button -->
            <div class="text-center mb-4">
                <a href="{{ route('register') }}" class="btn register-btn" aria-label="Register new user">
                    {{ __('Register New User') }}
                </a>
            </div>

            <!-- Users Table Container -->
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg mx-auto p-8 w-full md:w-3/4 lg:w-2/3">
                <div class="p-6">
                    <h3 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl xl:text-8xl font-semibold mb-6 text-gray-800 text-center">
                        {{ __('Users List') }}
                    </h3>

                    <div class="overflow-x-auto">
                        <table class="table table-bordered table-striped table-hover text-center align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col" class="ph font-medium text-gray-700 border-b">{{ __('No') }}</th>
                                    <th scope="col" class="ph font-medium text-gray-700 border-b">{{ __('Name') }}</th>
                                    <th scope="col" class="ph font-medium text-gray-700 border-b">{{ __('Email') }}</th>
                                    <th scope="col" class="ph font-medium text-gray-700 border-b">{{ __('Role') }}</th>
                                    <th scope="col" class="ph font-medium text-gray-700 border-b">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $index => $user)
                                    <tr class="hover:bg-gray-50 transition-all">
                                        <td class="px-6 py-3 ph text-gray-800 border-b">{{ $index + 1 }}</td>
                                        <td class="px-6 py-3 ph text-gray-800 border-b">{{ $user->name }}</td>
                                        <td class="px-6 py-3 ph text-gray-800 border-b">{{ $user->email }}</td>
                                        <td class="px-6 py-3 ph text-gray-800 border-b">
                                            {{ $user->role }} <!-- Display the role without badge -->
                                        </td>
                                        <td class="px-6 py-3 border-b text-center">
                                            @if ($user->id !== $currentUser->id)
                                                <button class="btn delete-btn" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $user->id }}" aria-label="Delete user {{ $user->name }}">
                                                    {{ __('Delete') }}
                                                </button>

                                                <!-- Delete Confirmation Modal -->
                                                <div class="modal fade" id="deleteModal{{ $user->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $user->id }}" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="deleteModalLabel{{ $user->id }}">{{ __('Confirm Deletion') }}</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                {{ __('Are you sure you want to delete this user?') }}
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                                                                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn delete-btn" aria-label="Confirm delete user {{ $user->name }}">{{ __('Delete') }}</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <span class="text-muted">{{ __('Cannot delete yourself') }}</span>
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
    </div>

    <!-- Custom CSS for Button Styling and Table Font Size -->
    @push('css')
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');
            .delete-btn {
                background-color: #dc3545 !important;
                color: white !important;
                padding: 12px 22px !important;
                font-size: 16px !important;
                font-weight: bold !important;
                border: none !important;
                border-radius: 5px !important;
                transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease !important;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2) !important;
            }
            .delete-btn:hover {
                background-color: #c82333 !important;
                transform: translateY(-2px) !important;
                box-shadow: 0 6px 12px rgba(0, 0, 0, 0.25) !important;
            }
            .delete-btn:active {
                background-color: #bd2130 !important;
                box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.2) !important;
            }
            .register-btn {
                background-color: #28a745 !important;
                color: white !important;
                padding: 14px 28px !important;
                font-size: 18px !important;
                font-weight: bold !important;
                border-radius: 5px !important;
                text-transform: uppercase !important;
                transition: background-color 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease !important;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2) !important;
            }
            .register-btn:hover {
                background-color: #218838 !important;
                transform: translateY(-2px) !important;
                box-shadow: 0 6px 14px rgba(0, 0, 0, 0.25) !important;
            }
            .register-btn:active {
                background-color: #1e7e34 !important;
                box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.15) !important;
            }
            table {
                width: 100%;
                border-spacing: 0;
                border-collapse: collapse;
                font-size: 18px;
                font-family: 'Roboto', sans-serif;
            }
            th, td {
                padding: 1.5rem;
                text-align: center;
                border: 1px solid #e2e8f0;
                font-size: 18px;
            }
            th {
                background-color: #f7fafc;
                font-weight: 600;
                color: #4a5568;
            }
            tr:hover {
                background-color: #f1f5f9;
            }
            @media screen and (max-width: 768px) {
                table {
                    display: block;
                    overflow-x: auto;
                    white-space: nowrap;
                }
            }
        </style>
    @endpush

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</x-app-layout>
