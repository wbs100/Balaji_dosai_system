@extends('public.layouts.app')
@section('content')
    <section class="user-form-part">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-12 col-sm-10 col-md-12 col-lg-12 col-xl-6">
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
                    {{-- <div class="user-form-logo">
                        <a href='index.html'><img src="/assets/images/logo.png" alt="logo"></a>
                    </div> --}}
                    <div class="user-form-card">
                        <div class="user-form-title">
                            <h2>Join Now!</h2>
                            <p>Setup A New Account In A Minute</p>
                        </div>
                        <div class="user-form-group">
                            <form class="user-form" method="POST" action="{{ route('auth.register') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control" name="name" placeholder="Enter your name"
                                        required>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Enter your email"
                                        required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password"
                                        placeholder="Enter your password" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password_confirmation"
                                        placeholder="Enter repeat password" required>
                                </div>
                                {{-- <div class="form-check mb-3">
                                    <input class="form-check-input" type="checkbox" value="" id="check">
                                    <label class="form-check-label" for="check">Accept all the <a href="#">Terms &
                                            Conditions</a></label>
                                </div> --}}
                                <div class="form-button">
                                    <button type="submit">register</button>
                                </div>

                                <div class="user-form-divider">
                                    <p>or</p>
                                </div>

                                <ul class="user-form-social">
                                    <li>
                                        <a href="{{ route('google.login') }}" class="google">
                                            <i class="fab fa-google"></i> Login with Google
                                        </a>
                                    </li>
                                </ul>
                            </form>
                        </div>
                    </div>
                    <div class="user-form-remind mb-4">
                        <p>Already Have An Account?<a href="{{ route('user.login') }}">login here</a></p>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('/assets/css/user-auth.css') }}" />
@endpush
