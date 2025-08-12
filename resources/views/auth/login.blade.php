<x-guest-layout>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="login-box w-100">
            <!-- Logo at the top -->
            <div class="text-center mb-3">
                <img src="{{ asset('logo.png') }}" alt="OnlyPlans Logo" style="height:90px; width:auto; border-radius:0; box-shadow:none; background:transparent; padding:0;">
            </div>
            <h2 class="text-center login-title">Welcome back!</h2>
            <p class="text-center login-subtitle">It's great to see you again! Please sign in below.</p>
            
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-3">
                    <input type="text" class="form-control custom-input @error('email') is-invalid @enderror" name="email" placeholder="Email Address or Username" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <input type="password" class="form-control custom-input @error('password') is-invalid @enderror" name="password" placeholder="Password" required>
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Remember Me -->
                <div class="mb-3 form-check">
                    <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                    <label for="remember_me" class="form-check-label ms-1" style="font-size: 0.97rem;">Remember me</label>
                </div>

                <button type="submit" class="btn custom-btn w-100 mb-2">Sign In</button>
            </form>

            <div class="mb-3 text-end">
                <a href="{{ route('password.request') }}" class="forgot-link">Forgot your password?</a>
            </div>

            {{-- <div class="divider">OR</div> --}}

            {{-- <!-- Facebook Login Button (Optional) -->
            <a href="#" class="btn btn-facebook w-100 mb-3">
                <i class="bi bi-facebook me-2"></i>Sign in with Facebook
            </a> --}}

            <hr>

            <div class="text-center mt-2">
                <span class="text-muted" style="font-size:0.97rem;">Don't have an account?</span>
                <a href="{{ route('register') }}" class="signup-link">Sign up.</a>
            </div>
        </div>
    </div>

    <style>
        body {
            background: linear-gradient(135deg, #181f2a 0%, #232b3e 100%);
            font-family: 'Segoe UI', Arial, sans-serif;
            min-height: 100vh;
        }
        .login-box {
            box-shadow: 0 8px 32px rgba(0,0,0,0.09);
            background: #fff;
            border-radius: 16px;
            padding: 2.5rem 2rem 2rem 2rem;
            margin: 40px auto;
            max-width: 420px;
        }
        .login-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.3rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        .login-subtitle {
            color: #666;
            font-size: 1rem;
            margin-bottom: 1.5rem;
        }
        .custom-input {
            background: #f7f7f7;
            border: none;
            border-radius: 4px;
            padding: 14px 16px;
            font-size: 1rem;
            color: #222;
            transition: box-shadow 0.2s;
        }
        .custom-input:focus {
            box-shadow: 0 0 0 2px #b59f6a33;
            border: 1px solid #b59f6a;
            background: #fff;
        }
        .custom-btn {
            letter-spacing: 2px;
            font-weight: 600;
            background: #222;
            color: antiquewhite;
            padding: 12px 16px;
            border-radius: 4px;
            border: none;
            transition: background 0.2s, transform 0.2s;
        }
        .custom-btn:hover, .custom-btn:focus {
            background: #b59f6a;
            color: #fff;
            transform: translateY(-2px) scale(1.03);
        }
        .btn-facebook {
            background: #29487d !important;
            border: none !important;
            color: #fff !important;
            padding: 12px 16px;
            border-radius: 4px;
            letter-spacing: 1px;
            font-weight: 600;
            transition: background 0.2s, transform 0.2s;
        }
        .btn-facebook:hover, .btn-facebook:focus {
            background: #1d3557 !important;
            transform: translateY(-2px) scale(1.03);
        }
        .forgot-link {
            color: #b59f6a;
            font-weight: 600;
            text-decoration: none;
            font-size: 0.97rem;
        }
        .forgot-link:hover {
            text-decoration: underline;
            color: #a0843a;
        }
        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 1.5rem 0 1rem 0;
        }
        .divider::before, .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #ddd;
        }
        .divider:not(:empty)::before {
            margin-right: .75em;
        }
        .divider:not(:empty)::after {
            margin-left: .75em;
        }
        .signup-link {
            color: #b59f6a;
            font-weight: 600;
            text-decoration: none;
        }
        .signup-link:hover {
            text-decoration: underline;
            color: #a0843a;
        }
    </style>
</x-guest-layout>