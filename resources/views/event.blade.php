<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Events | OnlyPlans Event Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body {
            background: #f4f7fa;
            font-family: 'Segoe UI', Arial, sans-serif;
        }
        .events-header {
            background: linear-gradient(135deg, #0090ff 0%, #0073e6 100%);
            color: #fff;
            padding: 40px 0 40px 0;
            text-align: center;
        }
        .events-header h1 {
            font-size: 2.5rem;
            font-weight: 700;
        }
        .events-header p {
            font-size: 1.2rem;
            margin-bottom: 0;
        }
                .event-card {
            background: #fff;
            border-radius: 1.5rem;
            box-shadow: 0 2px 12px rgba(0,0,0,0.40); /* 40% shadow */
            padding: 2rem 1.5rem;
            transition: box-shadow 0.2s, background 0.2s, color 0.2s;
            height: 100%;
        }
        .event-card:hover {
            background: #0090ff;
            color: #fff;
            box-shadow: 0 8px 32px rgba(0,144,255,0.20);
        }
        .event-card:hover .event-icon,
        .event-card:hover h5,
        .event-card:hover p,
        .event-card:hover .event-date,
        .event-card:hover .badge {
            color: #fff !important;
        }
        .event-card:hover .badge.bg-warning {
            color: #222 !important;
            background: #ffe066 !important;
        }
        .event-icon {
            font-size: 2.2rem;
            color: #0090ff;
            margin-bottom: 1rem;
        }
        .event-date {
            font-size: 1rem;
            color: #0073e6;
            font-weight: 500;
        }
        @media (max-width: 600px) {
            .event-card {
                padding: 1.2rem 0.5rem;
            }
        }
    </style>
</head>
<body>
    @extends('layouts.nav')
    @section('content')
    <!-- Header Section -->
    <div class="events-header">
        <h1>Featured Events</h1>
        <p>Discover and join exciting events happening near you. OnlyPlans brings together </p>
        <p>a diverse range of conferences, workshops, and meetups for every interest.</p>
    </div>

    <!-- Events Section -->
    <section class="py-5">
        <div class="container">
            <div class="row g-4 justify-content-center">
                <div class="col-md-4">
                    <div class="event-card h-100 text-center">
                        <div class="event-icon">
                            <i class="bi bi-cpu"></i>
                        </div>
                        <h5 class="fw-bold mb-1">Annual Tech Conference</h5>
                        <div class="event-date mb-2">July 15, 2025</div>
                        <p class="mb-2" style="color:#555;">
                            Join industry leaders and innovators for a day of insightful talks, networking, and hands-on workshops in the world of technology.
                        </p>
                        <span class="badge bg-success mb-2">Open for Registration</span>
                    
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="event-card h-100 text-center">
                        <div class="event-icon">
                            <i class="bi bi-lightbulb"></i>
                        </div>
                        <h5 class="fw-bold mb-1">Startup Meetup</h5>
                        <div class="event-date mb-2">August 10, 2025</div>
                        <p class="mb-2" style="color:#555;">
                            Connect with entrepreneurs, investors, and mentors. Pitch your ideas, find collaborators, and grow your startup journey.
                        </p>
                        <span class="badge bg-warning text-dark mb-2">Coming Soon</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="event-card h-100 text-center">
                        <div class="event-icon">
                            <i class="bi bi-people"></i>
                        </div>
                        <h5 class="fw-bold mb-1">Community Workshop</h5>
                        <div class="event-date mb-2">September 5, 2025</div>
                        <p class="mb-2" style="color:#555;">
                            Participate in hands-on sessions and skill-building activities. Perfect for learners and professionals looking to expand their horizons.
                        </p>
                        <span class="badge bg-secondary mb-2">Registration Opens Soon</span>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    @endsection
</body>
</html>