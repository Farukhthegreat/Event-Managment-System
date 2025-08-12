<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About Us | OnlyPlans Event Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f4f7fa;
            font-family: 'Segoe UI', Arial, sans-serif;
        }
        .about-header {
            background: linear-gradient(135deg, #0090ff 0%, #0073e6 100%);
            color: #fff;
            padding: 60px 0 40px 0;
            text-align: center;
        }
        .about-header h1 {
            font-size: 2.5rem;
            font-weight: 700;
        }
        .about-content {
            background: #fff;
            border-radius: 1.5rem;
            box-shadow: 0 8px 10px rgba(0,144,255,20);
            max-width: 900px;
            margin: -50px auto 0 auto;
            padding: 2.5rem 2rem;
        }
        .about-content h2 {
            color: #0090ff;
            font-weight: 700;
            margin-bottom: 1rem;
        }
        .about-content p {
            color: #444;
            font-size: 1.1rem;
        }
        @media (max-width: 600px) {
            .about-content {
                padding: 1.2rem 0.5rem;
            }
        }
    </style>
</head>
<body>
    @extends('layouts.nav')
    @section('content')
    <!-- Header Section -->
    <div class="about-header">
        <h1>About Us</h1>
        <div class="mx-auto" style="max-width: 900px;">
            <p class="px-4">
                OnlyPlans is dedicated to transforming the way events are organized and experienced. Our mission is to empower both organizers and attendees with a seamless, intuitive, and powerful event management platform.
            </p>
        </div>
    </div>

    <!-- About Content Section -->
    <div class="about-content mt-4">
        <h2>Who We Are</h2>
        <p>
            Founded by a team of passionate event enthusiasts and tech innovators, OnlyPlans brings together years of experience in event planning and software development. We understand the challenges of managing events, from registrations and ticketing to attendee engagement and feedback.
        </p>
        <h2>What We Do</h2>
        <p>
            Our platform offers a complete suite of tools for event creation, online ticketing, attendee management, and real-time notifications. Whether you’re hosting a large conference or a small community meetup, OnlyPlans streamlines every step of the process.
        </p>
        <h2>Why Choose Us?</h2>
        <ul>
            <li>Modern, user-friendly interface for both organizers and attendees</li>
            <li>Secure and efficient online ticketing system</li>
            <li>Real-time updates and notifications</li>
            <li>Dedicated support and continuous improvements</li>
        </ul>
        <p>
            Join us and discover how easy and enjoyable event management can be with OnlyPlans.
        </p>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    @endsection
</body>
</html>