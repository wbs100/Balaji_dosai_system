@extends('public.layouts.app')
@section('content')
    <main>
        <div class="main-part">

            <!-- Start Login Register Section -->
            <section class="auth-section">
                <div class="container">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if ($errors->has('email'))
                        <div class="alert alert-danger">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                    <div class="auth-container">
                        <div class="auth-card register-card wow fadeInRight" data-wow-duration="1000ms"
                            data-wow-delay="300ms">
                            <div class="auth-header">
                                <div class="auth-icon">
                                    <i class="bi bi-person-plus-fill"></i>
                                </div>
                                <h2>Create Account</h2>
                                <p>Join us today and enjoy our delicious food</p>
                            </div>

                            <form class="auth-form" method="POST" action="{{ route('auth.register') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="register-email">
                                        <i class="bi bi-envelope"></i>
                                        Name
                                    </label>
                                    <input type="text" name="name" placeholder="First Name" required>
                                </div>

                                <div class="form-group">
                                    <label for="register-email">
                                        <i class="bi bi-envelope"></i>
                                        Email Address
                                    </label>
                                    <input type="email" id="register-email" name="email"
                                        placeholder="your.email@example.com" required>
                                </div>

                                <div class="form-group">
                                    <label for="register-password">
                                        <i class="bi bi-lock"></i>
                                        Password
                                    </label>
                                    <input type="password" id="register-password" name="password"
                                        placeholder="Create a strong password" required>
                                </div>

                                <div class="form-group">
                                    <label for="register-confirm">
                                        <i class="bi bi-lock-fill"></i>
                                        Confirm Password
                                    </label>
                                    <input type="password" id="register-confirm" name="password_confirmation"
                                        placeholder="Confirm your password" required>
                                </div>

                                {{-- <div class="form-options">
                                    <label class="checkbox-label">
                                        <input type="checkbox" name="terms" required>
                                        <span>I agree to the <a href="terms_condition.html" target="_blank">Terms &
                                                Conditions</a></span>
                                    </label>
                                </div> --}}

                                <button type="submit" class="btn-auth btn-register-submit">
                                    <i class="bi bi-person-check"></i>
                                    Create Account
                                </button>
                            </form>

                            <div class="divider">
                                <span>Or sign up with</span>
                            </div>

                            <a href="{{ route('google.login') }}" class="btn-social btn-google">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M19.8055 10.2292C19.8055 9.55056 19.7508 8.86667 19.6328 8.19792H10.2V12.0488H15.6016C15.3773 13.2911 14.6571 14.3898 13.6023 15.0875V17.5866H16.8251C18.7176 15.8449 19.8055 13.2728 19.8055 10.2292Z"
                                        fill="#4285F4" />
                                    <path
                                        d="M10.2 20C12.9567 20 15.2727 19.1053 16.8297 17.5866L13.6069 15.0875C12.7019 15.6977 11.5492 16.0427 10.2047 16.0427C7.54422 16.0427 5.29078 14.2828 4.49219 11.9164H1.17969V14.4925C2.77187 17.8547 6.30703 20 10.2 20Z"
                                        fill="#34A853" />
                                    <path
                                        d="M4.4875 11.9164C4.04531 10.6741 4.04531 9.33134 4.4875 8.08915V5.51302H1.17969C-0.226563 8.51302 -0.226563 11.9164 1.17969 14.9164L4.4875 11.9164Z"
                                        fill="#FBBC04" />
                                    <path
                                        d="M10.2 3.95729C11.6227 3.93521 13.0008 4.47188 14.0414 5.45833L16.8953 2.60417C15.1836 0.990625 12.9336 0.0994792 10.2 0.125C6.30703 0.125 2.77187 2.27031 1.17969 5.63281L4.4875 8.20885C5.28141 5.8375 7.53953 3.95729 10.2 3.95729Z"
                                        fill="#EA4335" />
                                </svg>
                                Sign up with Google
                            </a>

                            <div class="auth-footer">
                                <p>Already have an account? <a href="{{ route('user.login') }}" class="switch-link">Login
                                        here</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Login Register Section -->
        </div>
    </main>
    <!-- End Main -->
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('/assets/css/login.css') }}" />
@endpush
