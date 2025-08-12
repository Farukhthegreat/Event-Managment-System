<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Attendees List | Event Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body {
            background: #f4f7fa;
            font-family: 'Segoe UI', Arial, sans-serif;
        }
        .dashboard-header {
            background: linear-gradient(135deg, #0090ff 0%, #0073e6 100%);
            min-height: 20vh;
            padding-top: 40px;
            padding-bottom: 40px;
            margin-bottom: 0;
            color: white;
        }
        .sidebar {
            min-height: 400px;
            background: white;
            border-radius: 10px;
            padding: 1rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.07);
        }
        .rounded-4 {
            border-radius: 1.5rem !important;
        }
        .nav-link.active, .nav-link:focus {
            background: #e6f2ff;
            color: #0073e6 !important;
            font-weight: 600;
        }
        .nav-link {
            color: #222;
            font-size: 1rem;
            margin-bottom: 4px;
            border-radius: 6px;
            transition: background 0.2s, color 0.2s;
        }
        .nav-link:hover {
            background: #f0f7ff;
            color: #0073e6 !important;
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
    <!-- Dashboard Header -->
    <div class="dashboard-header mb-4">
        <div class="container">
            <h2 class="mb-3">Attendees List</h2>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 mb-4">
                <div class="sidebar">
                    <nav class="nav flex-column">
                        <a class="nav-link mb-2 {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                            <i class="bi bi-speedometer2 me-2"></i> Dashboard
                        </a>
                        <a class="nav-link mb-2 {{ request()->routeIs('events.index') ? 'active' : '' }}" href="{{ route('events.index') }}">
                            <i class="bi bi-calendar-event me-2"></i> My Events
                        </a>
                        <a class="nav-link mb-2 {{ request()->routeIs('events.create') ? 'active' : '' }}" href="{{ route('events.create') }}">
                            <i class="bi bi-plus-circle me-2"></i> Create Event
                        </a>
                       
                        <a class="nav-link mb-2 {{ request()->routeIs('attendees.index') ? 'active' : '' }}" href="{{ route('attendees.index') }}">
                            <i class="bi bi-people me-2"></i> Attendees
                        </a>
                        <a class="nav-link mb-2 {{ request()->routeIs('profile.show') ? 'active' : '' }}" href="{{ route('profile.show') }}">
                            <i class="bi bi-person me-2"></i> Profile
                        </a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="nav-link text-danger mb-2" style="background:none;border:none;">
                                <i class="bi bi-box-arrow-right me-2"></i> Logout
                            </button>
                        </form>
                    </nav>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-9">
                <div class="bg-white rounded-4 shadow p-4">
                    <h3>Attendees List</h3>
                    <div class="table-responsive">
                        <table class="table table-striped align-middle">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Event</th>
                                    <th>Ticket Type</th>
                                    <th>Registered At</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Ali Raza</td>
                                    <td>ali@example.com</td>
                                    <td>Annual Tech Conference</td>
                                    <td>VIP</td>
                                    <td>2025-06-10</td>
                                </tr>
                                <tr>
                                    <td>Sara Khan</td>
                                    <td>sara@example.com</td>
                                    <td>Startup Meetup</td>
                                    <td>General</td>
                                    <td>2025-06-12</td>
                                </tr>
                                <!-- Add more attendees as needed -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>