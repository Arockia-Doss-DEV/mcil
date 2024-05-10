@extends('layouts.app')

@section('title', 'RESET PASSWORD')

@section('content')

<div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="main-panel custom-main-panel">
        <div class="content-wrapper">
            <section class="login-box row justify-content-center align-items-center">
                <section class="col-12 col-sm-8 col-md-6 col-lg-4">

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="login-box-container">
                        <div class="top-loginbox">
                            <div class="top-loginbox-text">
                                <h4 class="mb-3">Reset Password</h4>
                                <h6>Re-set password with MCIL.</h6>
                            </div>
                            <div> <img src="{{ asset('assets/images/login/login-img.png') }}" alt="login-img" /></div>
                        </div>
                        <form class="form-container login-form-container" method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="login-img mb-4">
                                <img src="{{ asset('assets/images/logo/login-logo.png') }}" alt="logo" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>

                            <button type="submit" class="btn btn-primary btn-block login-btn">Send Password Reset Link</button>
                            <div class="text-center mt-3">
                                <p> Remember it? <a href="{{ route('login') }}" class='skyblue-color'>Sign In here</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </section>
            </section>
        </div>
    </div>
</div>

@endsection
