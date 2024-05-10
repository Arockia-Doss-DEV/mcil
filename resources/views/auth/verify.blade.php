@extends('layouts.app')

@section('title', 'EMAIL VERIFICATION')

@section('content')
<div class="container-fluid page-body-wrapper full-page-wrapper">

    <div class="main-panel custom-main-panel">
        <div class="content-wrapper">
            <section class="login-box row justify-content-center align-items-center">
                <section class="col-12 col-sm-8 col-md-6 col-lg-6">

                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    <div class="login-box-container">
                        <div class="top-loginbox">
                            <div class="top-loginbox-text">
                                <h4 class="mb-3">Hi {{ Auth::user()->first_name . Auth::user()->last_name }}</h4>
                                <h4>Thanks for signing up</h4>
                            </div>
                            <div> <img src="{{ asset('assets/images/login/login-img.png') }}" alt="login-img" /></div>
                        </div>
                        <div class="form-container login-form-container">
                            <div class="login-img mb-4">
                                <img src="{{ asset('assets/images/logo/login-logo.png') }}" alt="logo" />
                            </div>
                            <div class="text-center">
                                <h4>Verify Your Email Address</h4>
                                <h6 class="p-3 text-muted thanks-content">
                                    Before proceeding, please check your email for a verification link. If you didn't receive the email

                                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                        @csrf
                                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline skyblue-color">{{ __('click here to request another') }}</button></h6>
                                    </form>

                                    {{-- <a href="" class="skyblue-color"> click here to request another.</a></h6> --}}
                            </div>

                            <div class="btn-block justify-content-center thanks-logout">
                                <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                    <button type="submit" class="btn btn-info btn-block login-btn">Logout</button>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </section>
        </div>
    </div>
</div>

@endsection

@section('scripts')

<script type="text/javascript">
    $(document).ready(function() {
        setInterval(function () {
            autoLogout();
            // $('#logout-form').submit();
        }, 60000);

        function autoLogout(){
            
            var csrfToken = "{{ csrf_token() }}";
            let formData = new FormData();
            var url = "{{ route('logout') }}";

            axios.post(url,formData,{
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        'X-CSRF-Token': csrfToken}}
            ).then(function(response){

                Swal.fire('Ohh !','Your session has closed!','success');
                setTimeout(location.reload.bind(location), 1000);
            })
            .catch(function(){
                setTimeout(location.reload.bind(location), 1500);
            });
        }
    });
</script>

@stop
