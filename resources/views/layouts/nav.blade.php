<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Event Management System') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
    <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
            <img src="{{ asset('logo.png') }}" alt="MyPlans Logo" style="height:40px; width:auto; margin-right:12px; border-radius:8px; box-shadow:0 2px 8px rgba(0,0,0,0.08); padding:4px;">
            <span style="font-size:1.7rem; font-weight:700; color:white; letter-spacing:1px; font-family:'Segoe UI', Arial, sans-serif;">
                Only<span style="color:#00ffae; ">Plans</span>
            </span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ url('/services') }}">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/event') }}">Events</a></li>
                {{-- <li class="nav-item"><a class="nav-link" href="{{ url('/about') }}">About</a></li> --}}
                <li class="nav-item"><a class="nav-link" href="{{ url('/contact') }}">Contact</a></li>

                <!-- Show login or logout link based on authentication status -->
                @guest
                    <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                @endguest

                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}" 
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                           Logout
                        </a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                @endauth
            </ul>
        </div>
    </div>
</nav>


    <!-- Main Content -->
    <main class="py-4">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>