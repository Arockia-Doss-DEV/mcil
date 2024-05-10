@extends('layouts.loginApp')

@section('title', 'LOGIN')

@section('content')

<div class="container-fluid">
    <div class="row">
        
        <div class="col-sm-6 px-0 d-none d-sm-block">
            <img src="{{ asset('login/img/media/login-bg.jpg') }}" alt="login image" class="login-img" />
        </div>
        <div class="col-sm-6 mb-2 login-section-wrapper">
            <div class="brand-wrapper">
                <img src="{{ asset('login/site/mcil-logo.png') }}" alt="logo" class="logo" style="width:140px;">
            </div>

            <div class="login-wrapper ">

                @if(Session::has('message'))
                    <p class="alert alert-danger">{{Session::get('message')}}</p> 
                @endif

                <form id="loginForm" class="form-container login-form-container" method="POST" action="{{ route('admin.login') }}" data-parsley-validate='data-parsley-validate' data-parsley-trigger="keyup" autocomplete="off">
                    @csrf
                    
                    <input type="hidden" id="is_admin" name="is_admin" value="1">
                    <div id="pills-tab" role="tablist">
                        <div class="tab-content login_box" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-profile" role="tabpanel">
                                
                                <h1 class="login-title">Admin Secure Login</h1>
                                
                                <div class="form-group">
                                    <label for="email">Username</label>
                                    <div class="input email required">
                                        <input type="email" name="email" class="form-control bx_shodow @error('email') is-invalid @enderror" value="{{ old('email') }}" required="required" id="email" placeholder="Enter Username (输入用户名)" data-parsley-required="data-parsley-required" data-parsley-group="group-1" maxlength="100"/>
                                    </div>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
                                    <label>Password</label>
                                    <div class="input-group bx_shodow">
                                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter password (输入密码)" required="required" data-parsley-group="group-1" id="password" data-parsley-errors-container="#passwordErrorDiv"/>
                                        <div class="input-group-append">
                                            <span class="input-group-text show-password"> <i class="fa fa-eye-slash"></i></span>
                                            <span class="input-group-text hide-password hidden"><i class="fa fa-eye"></i></span>
                                        </div>
                                    </div>

                                    <div id="passwordErrorDiv"></div>

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                </div>
                                
                                <div class="text-right a_link">
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}" class="">Forgot Password (忘记密码)</a>
                                    @endif
                                </div>
                                <input id="loginOTPButton" class="btn btn-block login-btn" type="button" value="Login (登录)">
                            </div>

                            <div class="tab-pane fade" id="pills-gotp" href="#pills-gotp" role="tabpanel">
                                <h1 class="login-title">Verify 2FA OTP</h1>
                                
                                <div class="form-group">
                                    <div class="input text required">

                                        {!! Form::text('gotp', null, ['id'=> "users-gotp", "placeholder" => "2FA Authenticator OTP", 'class'=>'form-control bx_shodow', "required"=>"required", "data-parsley-group"=>"group-3", "data-parsley-type"=>"digits", "data-parsley-minlength"=>"6", "data-parsley-maxlength"=>"6", "pattern"=>"\d{6}", 'data-parsley-errors-container'=>"#users_gotp-errors", "style" => "text-align:center;"]) !!}

                                    </div>
                                    <div id="users_gotp-errors"></div>

                                </div>

                                <input type="button" id="gverifyOTP" class="btn btn-block login-btn" value="Verify (确认)">
                            </div>

                            <div class="tab-pane fade" id="pills-otp" href="#pills-otp" role="tabpanel">
                                <h1 class="login-title">Verify OTP</h1>
                                
                                <div class="form-group">
                                    <div class="input text required">

                                        {!! Form::text('otp', null, ['id'=> "users-otp", "placeholder" => "OTP", 'class'=>'form-control bx_shodow', "required"=>"required", "data-parsley-group"=>"group-2", "data-parsley-type"=>"digits", "data-parsley-minlength"=>"6", "data-parsley-maxlength"=>"6", "pattern"=>"\d{6}", 'data-parsley-errors-container'=>"#users_otp-errors", "style" => "text-align:center;"]) !!}

                                    </div>
                                    <div id="users_otp-errors"></div>

                                </div>

                                <div class="mb-3 a_link text-right">
                                    <a href="javascript:void(0);" class="mb-3" id="loginOTPLink"> REQUEST OTP（获取验证码）</a>
                                </div>
                                
                                <input type="button" id="verifyOTP" class="btn btn-block login-btn" value="Verify (确认)">
                            </div>
                            
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <script type="text/javascript">

        $(document).ready(function() {
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
        }); 

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

        $("#loginOTPButton").on('click', function(e) {
            if ($('#loginForm').parsley().validate({group: 'group-1'})) {

                var csrfToken = "{{ csrf_token() }}";

                const form = document.getElementById('loginForm');
                let formData = new FormData(form);

                var email = $("#email").val();
                var password = $("#password").val();
                var is_admin = $("#is_admin").val();

                formData.set('email', email);
                formData.set('password', password);
                formData.set('is_admin', is_admin);

                axios.post(SITE_URL+'checkLoginCredentials',formData,{
                        headers: {
                            'Content-Type': 'multipart/form-data',
                            'X-CSRF-Token': csrfToken}}
                ).then(function(response){

                    var item = response.data;
                    if(item.error === 0){

                        if(item.data === "2faenable"){

                            $('#pills-profile').removeClass('show active');
                            $('#pills-gotp').addClass('show active');

                        }else{

                            $('#pills-profile').removeClass('show active');
                            $('#pills-otp').addClass('show active');

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

                var csrfToken = "{{ csrf_token() }}";

                const form = document.getElementById('loginForm');
                let formData = new FormData(form);

                var email = $("#email").val();
                var otp = $("#users-otp").val();
                
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
                        
                        $( "#loginForm" )[0].submit();
                        // $('#loginForm').submit();

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

                var csrfToken = "{{ csrf_token() }}";

                const form = document.getElementById('loginForm');
                let formData = new FormData(form);

                var email = $("#email").val();
                var otp = $("#users-gotp").val();

                // console.log(otp)

                formData.set('email', email);
                formData.set('otp', otp);
                
                axios.post(SITE_URL+'gaotpCheck',formData,{
                        headers: {
                            'Content-Type': 'multipart/form-data',
                            'X-CSRF-Token': csrfToken}}
                ).then(function(response){

                    var item = response.data;
                    if(item.error === 0){

                        $( "#loginForm" )[0].submit();
                        // $('#loginForm').submit();
                        
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