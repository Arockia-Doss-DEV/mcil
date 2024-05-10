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
                                <h4 class="mb-3 text-danger">409 Page Expired</h4>
                            </div>
                            <div> <img src="{{ asset('assets/images/login/login-img.png') }}" alt="login-img" /></div>
                        </div>
                        <div class="form-container login-form-container">
                            <div class="login-img mb-4">
                                <img src="{{ asset('assets/images/logo/login-logo.png') }}" alt="logo" />
                            </div>
                            <div class="text-center">
                                <h4>419 Error - Page Expired!</h4>
                                <h6 class="p-3 text-muted">HTTP 409 error status: The HTTP 409 indicates that the request could not be processed because of conflict in the request.</h6>
                            </div>

	                        <a class="btn btn-info btn-block login-btn" href="{{ url('/') }}">Back to home</a>
  
                        </div>
                    </div>
                </section>
            </section>
        </div>
    </div>
</div>

@endsection

