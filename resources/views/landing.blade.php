<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background: linear-gradient(135deg, #f9f9f9 0%, #e3e6f3 100%);
            font-family: 'Segoe UI', Arial, sans-serif;
        }
        .hero-section {
            background: linear-gradient(120deg, #007bff 60%, #0056b3 100%);
            color: white;
            text-align: center;
            padding: 120px 0 100px 0;
            box-shadow: 0 8px 24px rgba(0,0,0,0.07);
            position: relative;
            overflow: hidden;
        }
        .hero-section::after {
            content: "";
            position: absolute;
            bottom: -40px;
            left: 0;
            width: 100%;
            height: 80px;
            background: url('https://www.transparenttextures.com/patterns/diagmonds-light.png');
            opacity: 0.1;
        }
        .section-title {
            font-size: 2.7rem;
            font-weight: 700;
            letter-spacing: 1px;
            margin-bottom: 20px;
        }
        .hero-section p {
            font-size: 1.25rem;
            margin-bottom: 35px;
        }
        .cta-btn {
            background: linear-gradient(90deg, #28a745 60%, #218838 100%);
            color: white;
            padding: 14px 36px;
            border-radius: 30px;
            text-decoration: none;
            font-size: 1.1rem;
            font-weight: 600;
            box-shadow: 0 4px 16px rgba(40,167,69,0.15);
            transition: background 0.2s, transform 0.2s;
            border: none;
            display: inline-block;
        }
        .cta-btn:hover {
            background: linear-gradient(90deg, #218838 60%, #28a745 100%);
            transform: translateY(-2px) scale(1.04);
            color: #fff;
        }
        .features-section {
            margin-top: -60px;
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 4px 24px rgba(0,0,0,0.06);
            padding: 50px 30px 30px 30px;
            position: relative;
            z-index: 2;
        }
        .feature-icon {
            font-size: 2.5rem;
            color: #007bff;
            margin-bottom: 12px;
        }
        .features-section h4 {
            font-weight: 600;
            margin-bottom: 10px;
        }
        .features-section p {
            color: #555;
        }
        .testimonials-section {
            margin-top: 60px;
        }
        .testimonial-card {
            background: #f8fafd;
            border-radius: 14px;
            box-shadow: 0 2px 12px rgba(0,0,0,0.04);
            padding: 28px 24px;
            margin-bottom: 24px;
            border-left: 5px solid #007bff;
        }
        blockquote {
            font-size: 1.1rem;
            font-style: italic;
            margin: 0 0 10px 0;
        }
        blockquote footer {
            font-size: 0.98rem;
            color: #555;
            font-style: normal;
            margin-top: 8px;
        }
        footer {
            background: #222;
            color: #fff;
            padding: 28px 0 18px 0;
            margin-top: 60px;
            letter-spacing: 1px;
        }
        @media (max-width: 767px) {
            .hero-section {
                padding: 70px 0 60px 0;
            }
            .features-section {
                padding: 30px 10px 20px 10px;
            }
            .section-title {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>
    @extends('layouts.nav')

    @section('content')

    <!-- Hero Section -->
    <div class="hero-section">
        <div class="container">
    <h1 class="section-title">Welcome to Our Event Management Platform</h1>
    <p>Your one-stop solution for organizing and attending events with ease.</p>
    @if(auth()->check())
            <div>Logged in as: {{ auth()->user()->name }} (Role: {{ auth()->user()->role }})</div>
        @endif

        {{-- Get Started Button with correct logic --}}
        @if(auth()->check())
            @if(auth()->user()->role === 'organizer')
                <a href="{{ route('organizer.dashboard') }}" class="btn btn-success px-4 py-2 rounded-pill fw-bold" style="font-size:1.1rem;">Go to Dashboard</a>
            @elseif(auth()->user()->role === 'attendee')
                <a href="{{ route('attendee.dashboard') }}" class="btn btn-success px-4 py-2 rounded-pill fw-bold" style="font-size:1.1rem;">Go to Dashboard</a>
            @endif
        @else
            <a href="{{ route('login') }}" class="btn btn-success px-4 py-2 rounded-pill fw-bold" style="font-size:1.1rem;">Get Started</a>
        @endif
</div>
    </div>

    <!-- Features Section -->
    <div class="container features-section shadow">
        <h2 class="section-title text-center mb-4">Key Features</h2>
        <div class="row text-center">
            <div class="col-md-4 mb-4">
                <div class="feature-icon mb-2">
                    <i class="bi bi-calendar-event"></i>
                </div>
                <h4>Organize Events</h4>
                <p>Create and manage your own events in just a few clicks.</p>
            </div>
            <div class="col-md-4 mb-4">
                <div class="feature-icon mb-2">
                    <i class="bi bi-ticket-perforated"></i>
                </div>
                <h4>Ticket Sales</h4>
                <p>Set up ticketing for your event and sell tickets online.</p>
            </div>
            <div class="col-md-4 mb-4">
                <div class="feature-icon mb-2">
                    <i class="bi bi-credit-card"></i>
                </div>
                <h4>Payment Integration</h4>
                <p>Support multiple payment gateways for smooth transactions.</p>
            </div>
        </div>
    </div>

    <!-- Testimonials Section -->
    <div class="container testimonials-section">
        <h2 class="section-title text-center mb-4">What Our Users Say</h2>
        <div class="row justify-content-center">
            <div class="col-md-5 testimonial-card me-md-3">
                <blockquote>
                    "This platform made it incredibly easy for me to organize my first event. The ticketing system was smooth, and I loved the simplicity!"
                    <footer>- Jane Doe, Event Organizer</footer>
                </blockquote>
            </div>
            <div class="col-md-5 testimonial-card ms-md-3">
                <blockquote>
                    "I was able to find great events quickly and register online. The process was seamless!"
                    <footer>- John Smith, Attendee</footer>
                </blockquote>
            </div>
        </div>
    </div>

    <!-- Footer Section -->
    <footer class="text-center">
        <p>&copy; 2025 Event Management System. All Rights Reserved.</p>
    </footer>

    @endsection

    <!-- Bootstrap JS and Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>