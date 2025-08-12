{{-- filepath: resources/views/attendee/tickets.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Tickets | Event Management</title>
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
            min-height: 18vh;
            padding-top: 30px;
            padding-bottom: 30px;
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
                padding-bottom: 20px;
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
            <h2 class="mb-3">My Tickets</h2>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 mb-4">
                <div class="sidebar">
                    <nav class="nav flex-column">
                        <a class="nav-link mb-2 {{ request()->routeIs('attendee.dashboard') ? 'active' : '' }}" href="{{ route('attendee.dashboard') }}">
                            <i class="bi bi-house-door me-2"></i> Dashboard (Home)
                        </a>
                        <a class="nav-link mb-2 {{ request()->routeIs('attendee.tickets') ? 'active' : '' }}" href="{{ route('attendee.tickets') }}">
                            <i class="bi bi-ticket-perforated me-2"></i> My Tickets
                        </a>
                        <a class="nav-link mb-2 {{ request()->routeIs('attendee.registered') ? 'active' : '' }}" href="{{ route('attendee.registered') }}">
                            <i class="bi bi-calendar-check me-2"></i> Registered Events
                        </a>
                        <a class="nav-link mb-2 {{ request()->routeIs('events.attendee_index') ? 'active' : '' }}" href="{{ route('events.attendee_index') }}">
                            <i class="bi bi-search me-2"></i> Browse Events
                        </a>
                        <a class="nav-link mb-2 {{ request()->routeIs('profile.show') ? 'active' : '' }}" href="{{ route('profile.show') }}">
                            <i class="bi bi-person me-2"></i> Profile
                        </a>
                        {{-- <a class="nav-link mb-2 {{ request()->routeIs('attendee.notifications') ? 'active' : '' }}" href="{{ route('attendee.notifications') }}">
                            <i class="bi bi-bell me-2"></i> Notifications
                        </a> --}}
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
                    <h3 class="mb-4">My Tickets</h3>
                    <div class="table-responsive">
                        <table class="table table-striped align-middle">
                            <thead>
                                <tr>
                                    <th>Ticket ID</th>
                                    <th>Event</th>
                                    <th>Type</th>
                                    <th>Purchase Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($tickets as $ticket)
                                <tr>
                                    <td>{{ $ticket->id }}</td>
                                    <td>{{ $ticket->event->name ?? '-' }}</td>
                                    <td>{{ $ticket->type ?? 'General' }}</td>
                                    <td>{{ $ticket->created_at->format('Y-m-d') }}</td>
                                    <td>
                                        @if($ticket->status === 'Confirmed')
                                            <span class="badge bg-success">Confirmed</span>
                                        @elseif($ticket->status === 'Upcoming')
                                            <span class="badge bg-warning text-dark">Upcoming</span>
                                        @else
                                            <span class="badge bg-secondary">{{ $ticket->status }}</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('events.attendee_show', $ticket->event->id) }}" class="btn btn-primary btn-sm">View Event</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted">No tickets found.</td>
                                </tr>
                            @endforelse
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