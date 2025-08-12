<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organizer Dashboard | Event Management</title>
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
            padding: 2rem 0;
            color: white;
        }
        .stats-card {
            background: white;
            border-radius: 10px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: transform 0.2s;
        }
        .stats-card:hover {
            transform: translateY(-5px);
        }
        .sidebar {
            background: white;
            border-radius: 10px;
            padding: 1rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .nav-link {
            color: #444;
            padding: 0.8rem 1rem;
            border-radius: 5px;
            margin-bottom: 0.5rem;
        }
        .nav-link:hover, .nav-link.active {
            background: #f0f7ff;
            color: #0073e6;
        }
        .main-content {
            background: white;
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <!-- Dashboard Header -->
    <div class="dashboard-header mb-4">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-3">
            <a href="{{ url('/') }}">
                <img src="{{ asset('logo.png') }}" alt="Logo" style="max-width: 60px; height: auto;">
            </a>
        </div>
            <h2 class="mb-3">Welcome, {{ auth()->user()->name }}!</h2>
            <div class="row">
                <!-- Stats Cards -->
                <div class="col-md-4">
                    <div class="stats-card text-black">
                        <i class="bi bi-calendar-event mb-2" style="font-size: 2rem; color: #0090ff;"></i>
                        <h3>{{ $upcomingEvents }}</h3>
                        <p class="mb-0 text-muted">Upcoming Events</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stats-card text-black">
                        <i class="bi bi-ticket-perforated mb-2" style="font-size: 2rem; color: #0090ff;"></i>
                        <h3>{{ $ticketsSold }}</h3>
                        <p class="mb-0 text-muted">Tickets Sold</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="stats-card text-black">
                        <i class="bi bi-currency-dollar mb-2" style="font-size: 2rem; color: #0090ff;"></i>
                        <h3>${{ $revenue }}</h3>
                        <p class="mb-0 text-muted">Revenue</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 mb-4">
                <div class="sidebar">
                    <nav class="nav flex-column">
                        <a class="nav-link active" href="#"><i class="bi bi-speedometer2 me-2"></i> Dashboard</a>
                        <a class="nav-link" href="{{ route('events.index') }}"><i class="bi bi-calendar-event me-2"></i> My Events</a>
                        <a class="nav-link" href="{{ route('events.create') }}"><i class="bi bi-plus-circle me-2"></i> Create Event</a>

                        {{-- <a class="nav-link" href="{{ route('attendees.index') }}"><i class="bi bi-people me-2"></i> Attendees</a> --}}
                        <a class="nav-link {{ request()->routeIs('profile.show') ? 'active' : '' }}" href="{{ route('profile.show') }}">
                            <i class="bi bi-person me-2"></i> Profile
                        </a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="nav-link text-danger border-0 bg-transparent w-100 text-start">
                                <i class="bi bi-box-arrow-right me-2"></i> Logout
                            </button>
                        </form>
                    </nav>
                </div>
            </div>

            <!-- Main Content Area -->
            <div class="col-md-9">
                <div class="main-content">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4>Your Events</h4>
                        <a href="{{ route('events.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle me-2"></i>Create New Event</a>
                    </div>
                    
                    <!-- Events Table -->
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Event Name</th>
                                    <th>Date</th>
                                    <th>Tickets Sold</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($events as $event)
                                <tr>
                                    <td>{{ $event->name }}</td>
                                    <td>{{ $event->date }}</td>
                                    <td>
                                        {{ $ticketsSold}}/{{ $event->tickets_total }}
                                    </td>
                                    <td>
                                        @if($event->status === 'Active')
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-warning text-dark">Draft</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('events.show', $event->id) }}" class="btn btn-sm btn-primary">View</a>
                                        <a href="{{ route('events.edit', $event->id) }}" class="btn btn-sm btn-secondary">Edit</a>
                                        <form action="{{ route('events.destroy', $event->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this event?')">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>