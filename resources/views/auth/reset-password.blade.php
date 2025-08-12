<x-guest-layout>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="login-box w-100">
            <h2 class="text-center login-title">Reset Your Password</h2>
            <p class="text-center login-subtitle">
                Enter a new password for your account.
            </p>

            <form method="POST" action="{{ route('password.store') }}">
                @csrf
                <!-- Password reset token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <!-- Email -->
                <div class="mb-3">
                    <input  type="email"
                            name="email"
                            value="{{ old('email', $request->email) }}"
                            placeholder="Email Address"
                            class="form-control custom-input @error('email') is-invalid @enderror"
                            required
                            autofocus>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- New Password -->
                <div class="mb-3">
                    <input  type="password"
                            name="password"
                            placeholder="New Password"
                            class="form-control custom-input @error('password') is-invalid @enderror"
                            required
                            autocomplete="new-password">
                    @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mb-3">
                    <input  type="password"
                            name="password_confirmation"
                            placeholder="Confirm New Password"
                            class="form-control custom-input @error('password_confirmation') is-invalid @enderror"
                            required
                            autocomplete="new-password">
                    @error('password_confirmation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn custom-btn w-100 mb-2">
                    Reset Password
                </button>
            </form>

            <div class="text-center mt-2">
                <span class="text-muted" style="font-size:0.97rem;">Remembered your password?</span>
                <a href="{{ route('login') }}" class="signup-link">Log in</a>
            </div>
        </div>
    </div>
    <style>
        body {
            background: linear-gradient(135deg, #f9f9f9 0%, #e3e6f3 100%);
            font-family: 'Segoe UI', Arial, sans-serif;
            min-height: 100vh;
        }
        .login-box {
            box-shadow: 0 8px 32px rgba(0,0,0,0.09);
            background: #fff;
            border-radius: 12px;
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
            color: #fff;
            padding: 12px 16px;
            border-radius: 4px;
            border: none;
            transition: background 0.2s, transform 0.2s;
        }
        .custom-btn:hover {
            background: #333;
            transform: translateY(-2px) scale(1.02);
        }
        .custom-btn:focus {
            background: #b59f6a;
            color: #fff;
            transform: translateY(-2px) scale(1.03);
        }
        .signup-link {
            color: #007bff;
            text-decoration: none;
            font-weight: 500;
        }
        .signup-link:hover {
            text-decoration: underline;
        }
        .text-muted {
            color: #999;
        }
        .text-danger {
            color: #dc3545;
        }
        .text-center {
            text-align: center;
        }
        .mb-3 {
            margin-bottom: 1rem;
        }
        .mb-2 {
            margin-bottom: 0.5rem;
        }
        .w-100 {
            width: 100%;
        }
        .container {
            max-width: 1000px;
            padding: 20px;
        }    
    </style>
</x-guest-layout>
