@extends('layouts.app')

@section('title', 'ACCESS DENIED')

@section('content')

<div class="container-fluid page-body-wrapper full-page-wrapper">

    <div class="main-panel custom-main-panel">
        <div class="content-wrapper">
            <section class="login-box row justify-content-center align-items-center">
                <section class="col-12 col-sm-10 col-md-8 col-lg-6">
                    <div class="login-box-container">
                        <div class="top-loginbox">
                            <div class="top-loginbox-text">
                                <h4 class="mb-3 text-danger">500 Server Error</h4>
                            </div>
                            <div> <img src="{{ asset('assets/images/login/login-img.png') }}" alt="login-img" /></div>
                        </div>
                        <div class="form-container login-form-container">
                            <div class="login-img mb-4">
                                <img src="{{ asset('assets/images/logo/login-logo.png') }}" alt="logo" />
                            </div>
                            <div class="text-center">
                                <h4>500 Server Error!</h4>
                                <h6 class="p-3 text-muted">The server encountered an unexpected condition that prevented it from fulfilling the request.</h6>
                            </div>

	                        @guest
                            <a class="btn btn-info btn-block login-btn" href="{{ url('/') }}">Back to Login</a>
							    {{-- <script>window.location = "/login";</script> --}}
							@endguest

	                        @auth    
	                            @if(Auth::user()->role_id == 1)
	                                <a class="btn btn-info btn-block login-btn" href="{{ url('/dashboard') }}">Back to home</a>
	                            @elseif(Auth::user()->role_id == 2)
	                                <a class="btn btn-info btn-block login-btn" href="{{ url('/individual/dashboard') }}">Back to home</a>
	                            @elseif(Auth::user()->role_id == 3)
	                                <a class="btn btn-info btn-block login-btn" href="{{ url('/company/dashboard') }}">Back to home</a>
	                            @endif
	                       	@endauth
  
                        </div>
                    </div>
                </section>
            </section>
        </div>
    </div>
</div>

@endsection
