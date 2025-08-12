<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact Us | Event Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons (optional) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body {
            background: #f4f7fa;
            font-family: 'Segoe UI', Arial, sans-serif;
        }

        .contact-header {
            background: linear-gradient(135deg, #0090ff 0%, #0073e6 100%);
            color: #fff;
            padding: 60px 0 40px 0;
            text-align: center;
        }

        .contact-header p {
            padding-bottom: 50px;
        }
        .contact-header h1 {
            font-size: 2.5rem;
            font-weight: 700;
        }
        .contact-header p {
            font-size: 1.2rem;
            margin-bottom: 0;
        }
        .contact-card {
            background: #fff;
            border-radius: 1.5rem;
            box-shadow: 0 2px 12px rgba(0,0,0,0.07);
            padding: 2.5rem 2rem;
            max-width: 600px;
            margin: -60px auto 0 auto;
        }
        .form-label {
            font-weight: 500;
        }
        .form-control, textarea.form-control {
            background: #f4f7fa;
            border-radius: 8px;
            border: 1px solid #cfd8dc;
            color: #222;
        }
        .form-control:focus, textarea.form-control:focus {
            border-color: #0090ff;
            box-shadow: 0 0 0 0.2rem rgba(0,144,255,.1);
        }
        .btn-primary {
            background: #0090ff;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            padding: 12px 32px;
            transition: background 0.2s;
        }
        .btn-primary:hover {
            background: #0073e6;
        }
        @media (max-width: 600px) {
            .contact-card {
                padding: 1.2rem 0.5rem;
            }
        }
    </style>
</head>
<body>

    @extends('layouts.nav')

    @section('content')
    <!-- Header Section -->
    <div class="contact-header">
        <h1>Contact Us</h1>
        <p>Have any questions or suggestions? We'd love to hear from you!</p>
    </div>

    <!-- Contact Form Card -->
    <div class="contact-card shadow">
        <form id="contactForm" action="https://formspree.io/f/xnnvvray" method="POST">
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="First_name" class="form-label">Your First Name</label>
                    <input type="text" class="form-control" id="First_name" name="First_name" required>
                </div>
                <div class="col-md-6">
                    <label for="Last_name" class="form-label">Your Last Name</label>
                    <input type="text" class="form-control" id="Last_name" name="Last_name" required>
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Your Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="col-md-6">
                    <label for="mobile" class="form-label">Mobile Number</label>
                    <input type="tel" class="form-control" id="mobile" name="mobile" pattern="[0-9]{7,15}" placeholder="e.g. 923001234567" required>
                </div>
                <div class="col-md-6">
                    <label for="country" class="form-label">Country</label>
                    <input type="text" class="form-control" id="country" name="country" required>
                </div>
                <div class="col-md-6">
                    <label for="zipcode" class="form-label">ZIP / Postal Code</label>
                    <input type="text" class="form-control" id="zipcode" name="zipcode" pattern="[0-9]{4,10}" required>
                </div>
                <div class="col-md-12">
                    <label for="region" class="form-label">Region</label>
                    <input type="text" class="form-control" id="region" name="region" required>
                </div>
                <div class="col-md-12">
                    <label for="message" class="form-label">Your Message</label>
                    <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                </div>
            </div>
            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-primary">Send Message</button>
            </div>
        </form>
    </div>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    @endsection
</body>
</html> 