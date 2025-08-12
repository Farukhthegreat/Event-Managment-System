<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Event | Event Management</title>
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
            <h2 class="mb-3">Create Event</h2>
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

                        {{-- <a class="nav-link mb-2 {{ request()->routeIs('attendees.index') ? 'active' : '' }}" href="{{ route('attendees.index') }}">
                            <i class="bi bi-people me-2"></i> Attendees
                        </a> --}}
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
                <div class="bg-white rounded-4 shadow p-4 mb-4">
                    <h3>Create a New Event</h3>
                    <form action="{{ route('events.store') }}" method="POST">
                         @csrf 
                        <div class="mb-3">
                            <label for="eventName" class="form-label">Event Name</label>
                            <input type="text" class="form-control" id="eventName" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label for="eventDate" class="form-label">Date</label>
                            <input type="date" class="form-control" id="eventDate" name="date" required>
                        </div>
                        <div class="mb-3">
                            <label for="eventLocation" class="form-label">Location</label>
                            <input type="text" class="form-control" id="eventLocation" name="location" required>
                        </div>
                        <div class="mb-3">
                            <label for="eventStatus" class="form-label">Status</label>
                            <select class="form-select" id="eventStatus" name="status" required>
                                <option value="Active">Active</option>
                                <option value="Draft">Draft</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="ticketsTotal" class="form-label">Total Tickets</label>
                            <input type="number" class="form-control" id="ticketsTotal" name="tickets_total" required>
                        </div>
                        <div class="mb-3">
                            <label for="eventPrice" class="form-label">Ticket Price</label>
                            <input type="number" step="0.01" class="form-control" id="eventPrice" name="price" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Create Event</button>
                    </form>
                </div>

                <!-- Example Upcoming Events Table -->
                <div class="bg-white rounded-4 shadow p-4">
                    <h3>Upcoming Events</h3>
                    <p>Here are the events you are registered for:</p>
                    <!-- Example table of events -->
                    <div class="table-responsive">
                        <table class="table table-striped align-middle">
                            <thead>
                                <tr>
                                    <th>Event Name</th>
                                    <th>Date</th>
                                    <th>Location</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($events) && count($events))
                                    @foreach($events as $event)
                                    <tr>
                                        <td>{{ $event->name }}</td>
                                        <td>{{ $event->date }}</td>
                                        <td>{{ $event->location }}</td>
                                        <td>
                                            @if($event->status === 'Active')
                                                <span class="badge bg-success">Active</span>
                                            @elseif($event->status === 'Draft')
                                                <span class="badge bg-warning text-dark">Draft</span>
                                            @else
                                                <span class="badge bg-secondary">{{ $event->status }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="4" class="text-center text-muted">No events found.</td>
                                    </tr>
                                @endif
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