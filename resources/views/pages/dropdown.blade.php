<!-- Navbar -->
<ul class="custom-nav nav nav-tabs d-flex justify-content-between align-items-center">
    <!-- Left side menu items -->
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Options
        </a>
        <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('Home') }}">Home</a></li>
            <li><a class="dropdown-item" href="{{ route('status') }}">Rig Status</a></li>
            <li><a class="dropdown-item" href="{{ route('table') }}">Test Plans</a></li>
            <li><a class="dropdown-item" href="{{ route('table') }}">Completed Test</a></li>
            <li><a class="dropdown-item" href="{{ route('table') }}">Material Management</a></li>
            <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
        </ul>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ session('active_tab') == 'home' ? 'active' : '' }}" href="{{ route('Home') }}">Home</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ session('active_tab') == 'status' ? 'active' : '' }}" href="{{ route('status') }}">Rig Status</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ session('active_tab') == 'table' ? 'active' : '' }}" href="{{ route('test-plans.index') }}">Test Plans</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ session('active_tab') == 'table' ? 'active' : '' }}" href="{{ route('allTests') }}">Test List</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ session('active_tab') == 'table' ? 'active' : '' }}" href="{{ route('material') }}">Material Management</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ session('active_tab') == 'dashboard' ? 'active' : '' }}" href="{{ route('dashboard') }}">Dashboard</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ session('active_tab') == 'dashboard' ? 'active' : '' }}" href="{{ route('users.admin') }}">Admin</a>
    </li>

    <!-- Right side - Logged-in user info and logout -->
    @auth
    <li class="nav-item ms-auto d-flex align-items-center">
        <span class="nav-link user-name">Welcome, {{ Auth::user()->name }}</span>
    </li>
    <li class="nav-item">
        <form action="{{ route('logout') }}" method="POST" class="nav-link">
            @csrf
            <button type="submit" class="btn logout-btn">Logout</button>
        </form>
    </li>
    @endauth
</ul>

<!-- Styles -->
<style>
@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

.custom-nav {
    background-color: #f8f9fa; /* Light grey background */
    font-family: 'Roboto', sans-serif !important; /* Ensure unique font */
    font-weight: 400 !important; /* Set font weight to normal */
    font-size: 16px !important; /* Set a specific font size for the navbar */
    border-bottom: 2px solid #ced4da; /* Light border */
}

.custom-nav .nav-item {
    position: relative; /* For positioning the vertical border */
}

.custom-nav .nav-link {
    color: #343a40 !important; /* Dark text color */
    padding: 10px 15px; /* Increased padding for better spacing */
    transition: background-color 0.3s, color 0.3s; /* Smooth transitions */
    font-weight: 400 !important; /* Ensure font weight is normal */
    font-size: 16px !important; /* Set a specific font size */
    border-right: 1px solid #ced4da; /* Add a right border for vertical separators */
}

.custom-nav .nav-link:last-child {
    border-right: none; /* Remove border from the last tab */
}

.custom-nav .nav-link:hover {
    background-color: #e2e6ea; /* Slightly darker grey on hover */
    color: #212529; /* Darker text on hover */
}

.custom-nav .nav-link.active {
    background-color: #d6d8db; /* Highlight the currently opened tab */
    color: #495057; /* Darker text for the active tab */
    border-radius: 4px; /* Slight rounding for the active button */
}

.custom-nav .nav-item.dropdown .nav-link.dropdown-toggle {
    background-color: #d0d0d0; /* Different grey background for Options button */
    color: white; /* White text for Options button */
    border-radius: 4px; /* Slight rounding for the button */
}

.custom-nav .nav-item.dropdown .nav-link.dropdown-toggle:hover {
    background-color: #b0b0b0; /* Darker grey on hover for Options button */
}

.custom-nav .nav-item.dropdown .dropdown-menu {
    background-color: #d0d0d0; /* Grey background for dropdown */
    border: none; /* No border for dropdown */
}

.custom-nav .dropdown-item {
    color: #343a40; /* Dark dropdown item text color */
}

.custom-nav .dropdown-item:hover {
    background-color: #e2e6ea; /* Darker grey for dropdown items on hover */
}

.custom-nav .nav-link.disabled {
    color: rgba(0, 0, 0, 0.5); /* Lighter color for disabled links */
    pointer-events: none; /* Disable interaction */
}

/* Styling for Logout Button */
.custom-nav .nav-item form button.logout-btn {
    color: #ffffff; /* White text for logout button */
    font-weight: 700; /* Bold font */
    background-color: #ff5c5c; /* Red background for logout */
    border: none; /* Remove border */
    padding: 8px 15px; /* Button padding */
    border-radius: 4px; /* Rounded corners */
    transition: background-color 0.3s ease, transform 0.2s ease; /* Smooth hover effects */
}

.custom-nav .nav-item form button.logout-btn:hover {
    background-color: #ff4040; /* Darker red on hover */
    transform: scale(1.05); /* Slightly enlarge the button on hover */
}

/* New Styling for Logged-in User Name */
.custom-nav .nav-item .user-name {
    color: #4CAF50; /* Green color for user's name */
    font-weight: 600; /* Bold font */
    font-size: 18px; /* Slightly larger text for emphasis */
    padding-right: 15px; /* Add space between the name and the logout button */
    border-radius: 5px; /* Rounded corners for the user name box */
    padding: 10px 20px; /* Padding around the name */
    background-color: #AFE1AF; /* Light green background */
    box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow for better contrast */
}

/* Right-aligned user info */
.custom-nav .ms-auto {
    margin-left: auto;
}

/* Centering the logged-in username and logout button vertically */
.custom-nav .d-flex.align-items-center {
    display: flex;
    align-items: center; /* Vertically centers the items */
}
</style>
