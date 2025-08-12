<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Our Services | OnlyPlans Event Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body {
            background: #f4f7fa;
            font-family: 'Segoe UI', Arial, sans-serif;
        }
        .services-header {
            background: linear-gradient(135deg, #0090ff 0%, #0073e6 100%);
            color: #fff;
            padding: 60px 0 40px 0;
            text-align: center;
        }
        .services-header h1 {
            font-size: 2.5rem;
            font-weight: 700;
        }
        .services-header p {
            font-size: 1.2rem;
            margin-bottom: 0;
        }
        .service-card {
            background: #fff;
            border-radius: 1.5rem;
            box-shadow: 0 2px 12px rgba(0,0,0,0.40); /* 40% shadow */
            padding: 2.5rem 2rem;
            transition: box-shadow 0.2s, background 0.2s, color 0.2s;
            text-align: center;
            height: 100%;
        }
        .service-card:hover {
            background: #0090ff;
            color: #fff;
            box-shadow: 0 8px 32px rgba(0,144,255,0.20);
        }
        .service-card:hover .service-icon,
        .service-card:hover h5,
        .service-card:hover p {
            color: #fff !important;
        }
        .service-icon {
            font-size: 2.5rem;
            color: #0090ff;
            margin-bottom: 1rem;
        }
        @media (max-width: 600px) {
            .service-card {
                padding: 1.2rem 0.5rem;
            }
        }
    </style>
</head>
<body>
    @extends('layouts.nav')
    @section('content')
    <!-- Header Section -->
    <div class="services-header">
        <h1>Our Services</h1>
        <div class="mx-auto" style="max-width: 1100px;">
            <p class="px-4">
                OnlyPlans offers a complete suite of event management solutions for organizers and attendees. Whether you’re hosting a conference, workshop, or meetup, our platform streamlines every step of the process.
            </p>
        </div>
    </div>

    <!-- Services Section -->
    <section class="py-5">
        <div class="container">
            <div class="row g-4 justify-content-center">
                <div class="col-md-4">
                    <div class="service-card h-100">
                        <div class="service-icon">
                            <i class="bi bi-calendar2-event"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Event Creation & Management</h5>
                        <p class="mb-0" style="color:#555;">
                            Easily create, customize, and manage your events with intuitive tools. Track registrations, update event details, and monitor attendee engagement in real time.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-card h-100">
                        <div class="service-icon">
                            <i class="bi bi-ticket-perforated"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Online Ticketing</h5>
                        <p class="mb-0" style="color:#555;">
                            Sell tickets securely online, manage ticket types and pricing, and provide attendees with instant digital tickets. Our platform supports seamless payments and real-time sales tracking.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="service-card h-100">
                        <div class="service-icon">
                            <i class="bi bi-people"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Attendee Experience</h5>
                        <p class="mb-0" style="color:#555;">
                            Attendees can easily browse events, register, view their tickets, and receive timely notifications. We ensure a smooth and engaging experience from registration to event day.
                        </p>
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
