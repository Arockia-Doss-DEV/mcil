@extends('layouts.app')

@section('title', 'RESET PASSWORD')

@section('styles')

@stop

@section('content')

<div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="main-panel custom-main-panel">
        <div class="content-wrapper">
            <section class="login-box row justify-content-center align-items-center">
                <section class="col-12 col-sm-8 col-md-6 col-lg-4">

                    <div class="login-box-container">
                        <div class="top-loginbox">
                            <div class="top-loginbox-text">
                                <h4 class="mb-3">Reset Password</h4>
                                <h6>Re-set password with MCIL.</h6>
                            </div>
                            <div> <img src="{{ asset('assets/images/login/login-img.png') }}" alt="login-img" /></div>
                        </div>
                        <form class="form-container login-form-container" method="POST" action="{{ route('password.update') }}" id="resetForm" data-parsley-validate="data-parsley-validate" data-parsley-trigger="keyup">
                            @csrf
                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="login-img mb-4">
                                <img src="{{ asset('assets/images/logo/login-logo.png') }}" alt="logo" />
                            </div>
                            <div class="form-group">
                                <label>E-Mail Address</label>
                                {!! Form::email('email', $email ?? old('email'), ['class'=>'form-control', 'id'=>'email', "required"=>"required", 'data-parsley-trigger'=>"focusout", 'autocomplete'=>"email"]) !!}
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <div class="input-wrapper">

                                    {!! Form::input('password', 'password', old('password'), ['class'=>'form-control', 'id'=> 'password', 'data-parsley-minlength'=>"8", 'data-parsley-errors-container'=>".errorspannewpassinput", 'data-parsley-required-message'=>"Please enter your new password.", 'data-parsley-uppercase'=>"1", 'data-parsley-lowercase'=>"1",'data-parsley-number'=>"1",'data-parsley-special'=>"1",'data-parsley-required']) !!}

                                    <img src="{{ asset('assets/images/icons/eye-icon-hide.png') }}" alt="eye-icon" class="sign-pass-eye-input-icon show-password" />

                                    <img src="{{ asset('assets/images/icons/eye-icon-show.png') }}" alt="eye-icon" class="sign-pass-eye-input-icon hide-password" style="display:none"/>

                                </div>

                                <span class="errorspannewpassinput"></span>
                            </div>

                            <div class="form-group">
                                <label>Confirm Password</label>
                                <div class="input-wrapper">

                                    {!! Form::input('password', 'password_confirmation', old('password_confirmation'), ['class'=>'form-control', 'id'=> 'password-confirm', "data-parsley-equalto"=>"#password", 'data-parsley-minlength'=>"8", "data-parsley-uppercase"=>"1", 
                                        "data-parsley-lowercase"=>"1",
                                        "data-parsley-number"=>"1",
                                        "data-parsley-special"=>"1", 
                                        "data-parsley-errors-container"=>".errorspanconfirmnewpassinput", 
                                        'data-parsley-required-message'=>"Please re-enter your new password.",'data-parsley-required']) !!}

                                    <img src="{{ asset('assets/images/icons/eye-icon-hide.png') }}" alt="eye-icon" class="sign-con-eye-input-icon cshow-password" />

                                    <img src="{{ asset('assets/images/icons/eye-icon-show.png') }}" alt="eye-icon" class="sign-con-eye-input-icon chide-password" style="display:none"/>

                                </div>

                                <span class="errorspanconfirmnewpassinput"></span>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block login-btn">Reset Password</button>
                        </form>
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
        
        $(".cshow-password, .chide-password").on('click', function() {
            var passwordId = "password-confirm";
            if ($(this).hasClass('cshow-password')) {
                $("#" + passwordId).attr("type", "text");
                $(this).parent().find(".cshow-password").hide();
                $(this).parent().find(".chide-password").show();
            } else {
                $("#" + passwordId).attr("type", "password");
                $(this).parent().find(".chide-password").hide();
                $(this).parent().find(".cshow-password").show();
            }
        });

    });

    //has uppercase
    window.Parsley.addValidator('uppercase', {
        requirementType: 'number',
        validateString: function(value, requirement) {
            var uppercases = value.match(/[A-Z]/g) || [];
            return uppercases.length >= requirement;
        },
        messages: {
            en: 'Your password must contain at least (%s) uppercase letter.'
        }
    });

    //has uppercase
    window.Parsley.addValidator('uppercase', {
      requirementType: 'number',
      validateString: function(value, requirement) {
        var uppercases = value.match(/[A-Z]/g) || [];
        return uppercases.length >= requirement;
      },
      messages: {
        en: 'Your password must contain at least (%s) uppercase letter.'
      }
    });

    //has lowercase
    window.Parsley.addValidator('lowercase', {
      requirementType: 'number',
      validateString: function(value, requirement) {
        var lowecases = value.match(/[a-z]/g) || [];
        return lowecases.length >= requirement;
      },
      messages: {
        en: 'Your password must contain at least (%s) lowercase letter.'
      }
    });

    //has number
    window.Parsley.addValidator('number', {
      requirementType: 'number',
      validateString: function(value, requirement) {
        var numbers = value.match(/[0-9]/g) || [];
        return numbers.length >= requirement;
      },
      messages: {
        en: 'Your password must contain at least (%s) number.'
      }
    });

    //has special char
    window.Parsley.addValidator('special', {
      requirementType: 'number',
      validateString: function(value, requirement) {
        var specials = value.match(/[^a-zA-Z0-9]/g) || [];
        return specials.length >= requirement;
      },
      messages: {
        en: 'Your password must contain at least (%s) special characters.'
      }
    });


</script>

@stop
