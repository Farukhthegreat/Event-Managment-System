<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Custom Fonts (optional) -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Vite (for your own assets if needed) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background: #f4f7fa;
            font-family: 'Segoe UI', Arial, sans-serif;
        }
        .dashboard-header {
            background: linear-gradient(135deg, #0090ff 0%, #0073e6 100%);
            padding: 2rem 0 1rem 0;
            color: white;
        }
        .sidebar {
            background: white;
            border-radius: 10px;
            padding: 1rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.07);
            min-height: 400px;
        }
        .nav-link {
            color: #222;
            font-size: 1rem;
            margin-bottom: 4px;
            border-radius: 6px;
            transition: background 0.2s, color 0.2s;
        }
        .nav-link.active, .nav-link:focus {
            background: #e6f2ff;
            color: #0073e6 !important;
            font-weight: 600;
        }
        .nav-link:hover {
            background: #f0f7ff;
            color: #0073e6 !important;
        }
        .rounded-4 {
            border-radius: 1.5rem !important;
        }
        @media (max-width: 991px) {
            .dashboard-header {
                padding-bottom: 30px;
            }
            .sidebar {
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>

    <!-- Dashboard Header (optional, can be customized per page) -->
    @hasSection('dashboard-header')
        <div class="dashboard-header mb-4">
            <div class="container">
                @yield('dashboard-header')
            </div>
        </div>
    @endif

    <!-- Main Content Area -->
    <div class="container-fluid">
        <div class="row">
            @hasSection('sidebar')
                <div class="col-md-3 mb-4">
                    @yield('sidebar')
                </div>
                <div class="col-md-9">
                    @yield('content')
                </div>
            @else
                <div class="col-12">
                    @yield('content')
                </div>
            @endif
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>