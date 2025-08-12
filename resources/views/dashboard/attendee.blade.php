<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendee Dashboard | Event Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body {
            background: #f4f7fa;
            font-family: 'Segoe UI', Arial, sans-serif;
        }
        .dashboard-header {
            background: linear-gradient(135deg, #0090ff 0%, #0073e6 100%);
            min-height: 40vh;
            padding-top: 40px;
            padding-bottom: 60px;
            margin-bottom: 0;
        }
        .dashboard-card {
            min-width: 180px;
            transition: box-shadow 0.2s;
        }
        .dashboard-stats .bg-white:hover {
            box-shadow: 0 8px 32px rgba(0,144,255,0.12);
        }
        .main-card {
            margin-top: -70px;
        }
        .rounded-4 {
            border-radius: 1.5rem !important;
        }
        .sidebar {
            min-height: 400px;
            background: white;
            border-radius: 10px;
            padding: 1rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.07);
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
            .main-card {
                margin-top: -40px;
            }
            .dashboard-card {
                margin-bottom: 20px;
            }
            .sidebar {
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-header text-center text-black">
        <div class="container">
            <h2 class="fw-bold text-white" style="font-size:2.5rem;">
                Welcome, {{ auth()->user()->name ?? 'Attendee' }}!
            </h2>
            <p class="mb-4 text-white" style="font-size:1.2rem;">
                Here’s your attendee dashboard. Browse and manage your event registrations below.
            </p>
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <div class="card text-center p-4 mb-3">
                        <div class="mb-2"><i class="bi bi-calendar-check" style="font-size:2rem;color:#0090ff;"></i></div>
                        <h4>{{ $eventsRegistered }}</h4>
                        <p class="mb-0">Events Registered</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card text-center p-4 mb-3">
                        <div class="mb-2"><i class="bi bi-ticket-perforated" style="font-size:2rem;color:#0090ff;"></i></div>
                        <h4>{{ $ticketsPurchased }}</h4>
                        <p class="mb-0">Tickets Purchased</p>
                    </div>
                </div>
                {{-- <div class="col-md-3">
                    <div class="card text-center p-4 mb-3">
                        <div class="mb-2"><i class="bi bi-star" style="font-size:2rem;color:#0090ff;"></i></div>
                        <h4>{{ $eventsRated }}</h4>
                        <p class="mb-0">Events Rated</p>
                    </div>
                </div> --}}
            </div>
            {{-- <div class="d-flex justify-content-center mt-3">
                <a href="{{ url('/events') }}" class="btn btn-success px-4 py-2 rounded-pill fw-bold" style="font-size:1.1rem;">
                    Browse Events
                </a>
            </div> --}}
        </div>
    </div>

    <div class="container main-card">
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
                    <h3 class="fw-bold mb-4" style="font-size:2rem;">My Registered Events</h3>
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th>Event Name</th>
                                    <th>Date</th>
                                    <th>Ticket</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($myTickets as $ticket)
                                <tr>
                                    <td>{{ $ticket->event->name }}</td>
                                    <td>{{ $ticket->event->date }}</td>
                                    <td>{{ $ticket->type ?? 'General' }}</td>
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
                                        {{-- <a href="#" class="btn btn-primary btn-sm">View</a> --}}
                                        @if($ticket->status === 'Confirmed')
                                            <a href="#" class="btn btn-outline-secondary btn-sm">Rate</a>
                                        @elseif($ticket->status === 'Upcoming')
                                            <form action="{{ route('tickets.cancel', $ticket->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-secondary btn-sm">Cancel</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="bg-white rounded-4 shadow p-4 mb-4">
                    <h3 class="fw-bold mb-4" style="font-size:2rem;">My Tickets</h3>
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th>Ticket ID</th>
                                    <th>Event</th>
                                    <th>Type</th>
                                    <th>Purchase Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($myTickets as $ticket)
                                <tr>
                                    <td>{{ $ticket->id }}</td>
                                    <td>{{ $ticket->event->name }}</td>
                                    <td>{{ $ticket->type ?? 'General' }}</td>
                                    <td>{{ $ticket->created_at->format('Y-m-d') }}</td>
                                    <td>
                                        {{-- <a href="#" class="btn btn-primary btn-sm">View</a> --}}
                                        @if($ticket->status === 'Confirmed')
                                            <a href="#" class="btn btn-outline-secondary btn-sm">Rate</a>
                                        @elseif($ticket->status === 'Upcoming')
                                            <form action="{{ route('tickets.cancel', $ticket->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-outline-secondary btn-sm">Cancel</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>

                <div class="bg-white rounded-4 shadow p-4">
                    <h3 class="fw-bold mb-4" style="font-size:2rem;">Notifications</h3>
                    <ul class="list-group">
                    @forelse($notifications as $note)
                        <li class="list-group-item">{!! $note->data['message'] ?? '' !!}</li>
                    @empty
                        <li class="list-group-item text-muted text-center">No notifications found.</li>
                    @endforelse
                </ul>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>