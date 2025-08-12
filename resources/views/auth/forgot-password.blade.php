<x-guest-layout>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="login-box w-100">
            <h2 class="text-center login-title">Forgot Your Password?</h2>
            <p class="text-center login-subtitle">No problem! Just let us know your email address and we’ll send you a password reset link.</p>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-3">
                    <input type="email" class="form-control custom-input @error('email') is-invalid @enderror" name="email" placeholder="Email Address" value="{{ old('email') }}" required autofocus>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn custom-btn w-100 mb-3">Email Password Reset Link</button>
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
