@extends('layouts.app')

@section('title', 'LOGIN')

@section('content')

<div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="main-panel custom-main-panel">
        <div class="content-wrapper">
            <section class="login-box row justify-content-center align-items-center">
                <section class="col-12 col-sm-8 col-md-6 col-lg-4">

                	@if(Session::has('message'))
		                <p class="alert alert-danger">{{Session::get('message')}}</p> 
		            @endif

                    <div class="login-box-container" id="loginTab">
                        <div class="top-loginbox">
                            <div class="top-loginbox-text">
                                <h4 class="mb-3">Welcome Back!</h4>
                                <h6>Sign in to continue to MCIL.</h6>
                            </div>
                            <div> <img src="{{ asset('assets/images/login/login-img.png') }}" alt="login-img" /></div>
                        </div>
                        <form id="loginForm" class="form-container login-form-container" method="POST" action="{{ route('login') }}" data-parsley-validate='data-parsley-validate' data-parsley-trigger="keyup" autocomplete="off">
                            @csrf

                            <div class="login-img mb-4">
                                <img src="{{ asset('assets/images/logo/login-logo.png') }}" alt="logo" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Your email@domain.com" data-parsley-group="group-1">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <div class="input-wrapper">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="* * * * * * * *" data-parsley-group="group-1" data-parsley-errors-container="#passwordErrorDiv">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <img src="{{ asset('assets/images/icons/eye-icon-hide.png') }}" alt="eye-icon" class="eye-input-icon show-password"/>

                                    <img src="{{ asset('assets/images/icons/eye-icon-show.png') }}" alt="eye-icon" class="eye-input-icon hide-password" style="display:none" />

                                    <div id="passwordErrorDiv"></div>

                                    <!-- For password eye show icon -->
                                    <!-- <img src="Assets/images/icons/eye-icon-show.png" alt="eye-icon" class="eye-input-icon" /> -->

                                </div>
                            </div>
                            <div class="login-footer-link">
                                <div class="string-check string-check-soft-info mb-2 left-side">

                                    <input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="string-check-label" for="remember">
                                        <span class="ml-2">Remember me</span>
                                    </label>
                                </div>

                                @if (Route::has('password.request'))
                                    <a class="text-capitalize right" href="{{ route('password.request') }}">
                                        Forgot Your Password?
                                    </a>
                                @endif

                            </div>
                            <button type="button" id="loginOTPButton" class="btn btn-primary btn-block login-btn">
                                Log In
                            </button>
                        </form>
                    </div>

                    <div class="login-box-container" id="gauthTab" style="display: none">
                        <form class="form-container login-form-container">
                            <div> <a href="{{ route('login') }}"> <img src="{{ asset('assets/images/icons/arrow-left.png') }}"
                            alt="logo" /> </a> </div>
                            <div class="login-img mb-4">
                                <img src="{{ asset('assets/images/icons/verification-icon.png') }}" alt="logo" />
                            </div>
                            <div class="text-center my-4">
                                <h4 class="font-weight-bold">Verify 2FA OTP</h4>
                                <h6 class="text-muted">Please Enter OTP</h6>
                                
                                {{-- <div id="otp" class="otp-digit my-4">
                                    <input type="text" name="gotp" id="users-gotp1" maxLength="1" onkeyup="OTPInput()" size="1" min="0" max="9" pattern="[0-9]{1}" />
                                    <input type="text" name="gotp" id="users-gotp2" maxLength="1" onkeyup="OTPInput()" size="1" min="0" max="9" pattern="[0-9]{1}" />
                                    <input type="text" name="gotp" id="users-gotp3" maxLength="1" onkeyup="OTPInput()" size="1" min="0" max="9" pattern="[0-9]{1}" />
                                    <input type="text" name="gotp" id="users-gotp4" maxLength="1" onkeyup="OTPInput()" size="1" min="0" max="9" pattern="[0-9]{1}" />
                                    <input type="text" name="gotp" id="users-gotp5" maxLength="1" onkeyup="OTPInput()" size="1" min="0" max="9" pattern="[0-9]{1}" />
                                    <input type="text" name="gotp" id="users-gotp6" maxLength="1" onkeyup="OTPInput()" size="1" min="0" max="9" pattern="[0-9]{1}" /> --}}

                                    {{-- <input type="hidden" name="otp" id="users-otp" data-parsley-group="group-2" data-parsley-type="digits" data-parsley-errors-container="#users_otp-errors"> --}}

                                {{-- </div> --}}

                                <div class="row my-4">
                                    <div class="col-12 col-lg-6 m-auto">

                                    {!! Form::text('gotp', null, ['id'=> "users-gotp", "placeholder" => "Enter OTP", 'class'=>'form-control fund-sub-input', "required"=>"required", "data-parsley-group"=>"group-3", "data-parsley-type"=>"digits", "maxlength"=>"6", "pattern"=>"\d{6}", 'data-parsley-errors-container'=>"#users_otp-errors", "style" => "text-align:center;"]) !!}

                                    </div>
                                </div>

                            </div>
                            <button type="button" id="gverifyOTP" class="btn btn-primary btn-block login-btn">Verify</button>
                        </form>
                    </div>

                    <div class="login-box-container" id="smsTab" style="display: none">
                        <form class="form-container login-form-container">
                            <div> <a href="{{ route('login') }}"> <img src="{{ asset('assets/images/icons/arrow-left.png') }}"
                            alt="logo" /> </a> </div>
                            <div class="login-img mb-4">
                                <img src="{{ asset('assets/images/icons/verification-icon.png') }}" alt="logo" />
                            </div>
                            <div class="text-center my-4">
                                <h4 class="font-weight-bold">Verify SMS OTP</h4>
                                <h6 class="text-muted">Please Enter OTP</h6>

                                {{-- <div id="otp" class="otp-digit my-4">
                                    <input type="text" name="smsOtp" id="users-otp1" maxlength="1" onkeyup="OTPInput()" size="1" min="0" max="9" pattern="[0-9]{1}" />
                                    <input type="text" name="smsOtp" id="users-otp2" maxLength="1" onkeyup="OTPInput()" size="1" min="0" max="9" pattern="[0-9]{1}" />
                                    <input type="text" name="smsOtp" id="users-otp3" maxLength="1" onkeyup="OTPInput()" size="1" min="0" max="9" pattern="[0-9]{1}" />
                                    <input type="text" name="smsOtp" id="users-otp4" maxLength="1" onkeyup="OTPInput()" size="1" min="0" max="9" pattern="[0-9]{1}" />
                                    <input type="text" name="smsOtp" id="users-otp5" maxLength="1" onkeyup="OTPInput()" size="1" min="0" max="9" pattern="[0-9]{1}" />
                                    <input type="text" name="smsOtp" id="users-otp6" maxLength="1" onkeyup="OTPInput()" size="1" min="0" max="9" pattern="[0-9]{1}" /> --}}

                                    {{-- <input type="hidden" name="otp" id="users-otp" data-parsley-group="group-2" data-parsley-type="digits" data-parsley-errors-container="#users_otp-errors"> --}}

                                {{-- </div> --}}

                                <div class="row my-4">
                                    <div class="col-12 col-lg-6 m-auto">

                                        {!! Form::text('otp', null, ['id'=> "users-otp", "placeholder" => "Enter OTP", 'class'=>'form-control fund-sub-input', "required"=>"required", "data-parsley-group"=>"group-2", "data-parsley-type"=>"digits", "maxlength"=>"6", "pattern"=>"\d{6}", 'data-parsley-errors-container'=>"#users_otp-errors", "style" => "text-align:center;"]) !!}

                                    </div>
                                </div>

                            </div>
                            <button type="button" id="verifyOTP" class="btn btn-primary btn-block login-btn">Verify</button>
                            <div class="text-center mt-3">
                                <p> Didn't receive a code? <a href="javascript:void(0);" class='skyblue-color' id="loginOTPLink"> REQUEST OTP</a>
                            </div>
                        </form>
                    </div>

                    <div id="users_otp-errors"></div>

                </section>
            </section>
        </div>
    </div>
</div>
        
@endsection

@section('scripts')
    <script type="text/javascript">

        function OTPInput() {
            const inputs = document.querySelectorAll('#otp > *[id]');
            for (let i = 0; i < inputs.length; i++) {
                inputs[i].addEventListener('keydown', function(event) {
                  if (event.key === "Backspace") {
                    inputs[i].value = '';
                    if (i !== 0)
                      inputs[i - 1].focus();
                  } else {
                    if (i === inputs.length - 1 && inputs[i].value !== '') {
                      return true;
                    } else if (event.keyCode > 47 && event.keyCode < 58) {
                      inputs[i].value = event.key;
                      if (i !== inputs.length - 1)
                        inputs[i + 1].focus();
                      event.preventDefault();
                    } else if (event.keyCode > 64 && event.keyCode < 91) {
                      inputs[i].value = String.fromCharCode(event.keyCode);
                      if (i !== inputs.length - 1)
                        inputs[i + 1].focus();
                      event.preventDefault();
                    } else if ((event.keyCode >= 48 && event.keyCode <= 57) || (event.keyCode >= 96 && event.keyCode <= 105)) {
                      inputs[i].value = String.fromCharCode(event.keyCode-48);
                      if (i !== inputs.length - 1)
                        inputs[i + 1].focus();
                      event.preventDefault();
                    }
                  }
                });
            }
        }
        // OTPInput();

        $(".show-password, .hide-password").on('click', function() {
            var passwordId = "password";
            if ($(this).hasClass('show-password')) {
                $("#" + passwordId).attr("type", "text");
                $(this).parent().find(".show-password").hide();
                $(this).parent().find(".hide-password").show();
            } else {
                $("#" + passwordId).attr("type", "password");
                $(this).parent().find(".hide-password").hide();
                $(this).parent().find(".show-password").show();
            }
        });

        $("#loginOTPButton").on('click', function(e) {
            if ($('#loginForm').parsley().validate({group: 'group-1'})) {

                var csrfToken = "{{ csrf_token() }}";

                const form = document.getElementById('loginForm');
                let formData = new FormData(form);

                var email = $("#email").val();
                var password = $("#password").val();

                formData.set('email', email);
                formData.set('password', password);

                axios.post(SITE_URL+'checkLoginCredentials',formData,{
                        headers: {
                            'Content-Type': 'multipart/form-data',
                            'X-CSRF-Token': csrfToken}}
                ).then(function(response){

                    var item = response.data;
                    if(item.error === 0){

                        if(item.data === "2faenable"){
                            $('#loginTab').css('display', 'none');
                            $('#gauthTab').css('display', '');

                        }else{
                            $('#loginTab').css('display', 'none');
                            $('#smsTab').css('display', '');

                            Swal.fire('Dear User','OTP has been sent to your mobile number, please verify!','success');
                        }
                    }else{
                        Swal.fire('Sorry!',item.msg,'error');
                    } 
                })
                .catch(function(e){
                    Swal.fire('Sorry!',"We're facing some issue on sending SMS, please try again.",'error');
                    setTimeout(location.reload.bind(location), 300);
                });
            }
        });

        $('#loginOTPLink').on('click', function () {

            var csrfToken = "{{ csrf_token() }}";

            const form = document.getElementById('loginForm');
            let formData = new FormData(form);

            var email = $("#email").val();
            var password = $("#password").val();
            formData.set('email', email);
            formData.set('password', password);

            axios.post(SITE_URL+'resendOtp',formData,{
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        'X-CSRF-Token': csrfToken}}
            ).then(function(response){

                var item = response.data;
                if(item.error === 0){

                   $("#users-otp").val("");
                   $("#users-gotp").val("");

                   // $("input[name=smsOtp]").val("");
                   // $("input[name=gotp]").val("");

                   Swal.fire('Dear User','OTP has been sent to your mobile number, please verify!','success');
                }else{
                    Swal.fire('Sorry!',"We're facing some issue on sending SMS, please try again.",'error');
                    setTimeout(location.reload.bind(location), 300);
                } 
            })
            .catch(function(e){
                Swal.fire('Sorry!',"We're facing some issue on sending SMS, please try again.",'error');
                setTimeout(location.reload.bind(location), 300);
            });
            
        });

        $('#verifyOTP').on('click', function () {
           if ($('#loginForm').parsley().validate({group: 'group-2'})) {
                
                 $("#users-otp").removeAttr("required");
                // $("input[name=smsOtp]").removeAttr("required");

                var csrfToken = "{{ csrf_token() }}";

                const form = document.getElementById('loginForm');
                let formData = new FormData(form);

                var email = $("#email").val();
                var otp = $("#users-otp").val();

                // var otp = $("#users-otp").val();
                // var element = $('[id=users-otp]');

                // var smsOtp = $("input[name=smsOtp]");
                // var otp= '';
                // for(var i=0; i<smsOtp.length; i++) {
                //     otp+= smsOtp[i].value;
                // }
                
                // console.log(otp);

                formData.set('email', email);
                formData.set('otp', otp);
                
                axios.post(SITE_URL+'otpCheck',formData,{
                        headers: {
                            'Content-Type': 'multipart/form-data',
                            'X-CSRF-Token': csrfToken}}
                ).then(function(response){

                    var item = response.data;
                    if(item.error === 0){
                        
                        $('#loginForm').submit();

                    }else{
                        Swal.fire('Sorry!',"OTP code incorrect, please try again.",'error');
                    }
                })
                .catch(function(){
                    Swal.fire('Sorry!',"OTP code incorrect, please try again.",'error');
                });
            }
        });

        $('#gverifyOTP').on('click', function () {
           if ($('#loginForm').parsley().validate({group: 'group-3'})) {
                
                $("#users-gotp").removeAttr("required");
                // $("input[name=gotp]").removeAttr("required");

                var csrfToken = "{{ csrf_token() }}";

                const form = document.getElementById('loginForm');
                let formData = new FormData(form);

                var email = $("#email").val();
                var otp = $("#users-gotp").val();

                // var otp = $("#users-gotp").val();
                // var element = $('[id=users-gotp]');

                // var gotp = $("input[name=gotp]").val();
                // var otp= '';
                // for(var i=0; i<gotp.length; i++) {
                //     otp+= gotp[i].value;
                // }

                formData.set('email', email);
                formData.set('otp', otp);
                
                axios.post(SITE_URL+'gaotpCheck',formData,{
                        headers: {
                            'Content-Type': 'multipart/form-data',
                            'X-CSRF-Token': csrfToken}}
                ).then(function(response){

                    var item = response.data;
                    if(item.error === 0){
                        $('#loginForm').submit();
                    }else{
                        Swal.fire('Sorry!',"OTP code incorrect, please try again.",'error');
                    }
                })
                .catch(function(){
                    Swal.fire('Sorry!',"OTP code incorrect, please try again.",'error');
                });
            }
        });

    </script>
@stop
