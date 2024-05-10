@extends('layouts.app')

@section('title', 'Settings')

@section('content')

<div class="container-fluid page-body-wrapper">

	@include("individual.elements.sidebar")

	<div class="main-panel">
        <div class="content-wrapper">
            <div class="d-flex justify-content-between">
                <div class="pageheader">
                    <h4>SETTINGS</h4>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Edit Password</h5>
                        </div>
                        <div class="card-body">

                        	{{ Form::open(['url' => '/individual/changePassword', 'class' => '', 'changePassword','id'=>'changepasswordDataForm', 'class'=>'form-horizontal','type'=>'file', 'data-parsley-validate' => 'data-parsley-validate', "data-parsley-trigger"=>"keyup", 'autocomlete'=>"off"]) }}
	                            <div class="row">
	                                <div class="col-lg-12 mt-3">
	                                    <label>Old Password <span class="mandatory">*</span></label>
	                                    <div class="input-wrapper">

	                                    	{!! Form::input('password', 'oldpassword', old('oldpassword'), ['class'=>'form-control search-input', 'id'=> 'passwordold', 'data-parsley-minlength'=>"8", 'data-parsley-errors-container'=>".errorspanpldpassinput", 'data-parsley-required-message'=>"Please enter your old password.", 'data-parsley-uppercase'=>"1", 'data-parsley-lowercase'=>"1",'data-parsley-number'=>"1",'data-parsley-special'=>"1",'data-parsley-required']) !!}

	                                            <img src="{{ asset('assets/images/icons/eye-icon-hide.png') }}" alt="eye-icon" class="pass-eye-input-icon old-show-password" />

	                                            <img src="{{ asset('assets/images/icons/eye-icon-show.png') }}" alt="eye-icon" class="pass-eye-input-icon old-hide-password" style="display:none" />

	                                            <span class="errorspanpldpassinput"></span>
	                                    </div>
	                                </div>
	                                <div class="col-lg-12 mt-3">
	                                    <label>New Password <span class="mandatory">*</span></label>
	                                    <div class="input-wrapper">

	                                    	{!! Form::input('password', 'password', old('password'), ['class'=>'form-control search-input', 'id'=> 'password1', 'data-parsley-minlength'=>"8", 'data-parsley-errors-container'=>".errorspannewpassinput", 'data-parsley-required-message'=>"Please enter your new password.", 'data-parsley-uppercase'=>"1", 'data-parsley-lowercase'=>"1",'data-parsley-number'=>"1",'data-parsley-special'=>"1",'data-parsley-required']) !!}

	                                            <img src="{{ asset('assets/images/icons/eye-icon-hide.png') }}" alt="eye-icon" class="pass-eye-input-icon show-password" />

	                                            <img src="{{ asset('assets/images/icons/eye-icon-show.png') }}" alt="eye-icon" class="pass-eye-input-icon hide-password" style="display:none" />

	                                            <span class="errorspannewpassinput"></span>
	                                    </div>
	                                </div>
	                                <div class="col-lg-12 mt-3">
	                                    <div class="full-note">Must have at least 8 characters with at least one
	                                        Capital letter at least one lower case letter and at least one number
	                                        and at least one special character.</div>
	                                </div>
	                                <div class="col-lg-12 mt-3">
	                                    <label>Confirm Password <span class="mandatory">*</span></label>
	                                    <div class="input-wrapper">

	                                    	{!! Form::input('password', 'cpassword', old('cpassword'), ['class'=>'form-control search-input', 'id'=> 'password2', "data-parsley-equalto"=>"#password1", 'data-parsley-minlength'=>"8", "data-parsley-uppercase"=>"1", "data-parsley-lowercase"=>"1", "data-parsley-number"=>"1", "data-parsley-special"=>"1", "data-parsley-errors-container"=>".errorspanconfirmnewpassinput", 'data-parsley-required-message'=>"Please re-enter your new password.",'data-parsley-required']) !!}

	                                            <img src="{{ asset('assets/images/icons/eye-icon-hide.png') }}" alt="eye-icon" class="pass-eye-input-icon cshow-password" />

	                                            <img src="{{ asset('assets/images/icons/eye-icon-show.png') }}" alt="eye-icon" class="pass-eye-input-icon chide-password" style="display:none" />

	                                            <span class="errorspanconfirmnewpassinput"></span>
	                                    </div>
	                                </div>
	                                <div class="col-lg-12 mt-3">
	                                    <button class="btn btn-info button-size">Update</button>
	                                </div>
	                            </div>

                            {{ Form::close() }}
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 m-mt-2">
                    <div class="card">
                        <div class="fa2-img"><img src="{{ asset('assets/images/icons/2fa-img.png') }}" alt="2fa img" /></div>
                        <div class="card-header">
                            <h5 class="card-title">Two-Factor Authentication (2FA)</h5>
                        </div>
                        <div class="card-body">
                            <div class="row pb-3">
                                <div class="col-md-12 mb-3">
                                    <div class="col-xl-12 col-lg-12 second-box">
                                        <div class="kt-portlet kt-portlet--height-fluid">
                                            <div class="kt-portlet__body">
                                                <div class="kt-widget kt-widget--general-1">
                                                    <div class="kt-media kt-media--lg kt-media--circle">
                                                        <img src="{{ asset('assets/images/icons/googleauthenticator.png') }}" alt="google -icon" style="width: 150px; height: 150px;">
                                                    </div>
                                                    <div class="kt-widget__wrapper">
                                                        <div class="kt-widget__label">
                                                            <a href="#" class="kt-widget__title"> Google
                                                                Authenticator </a>
                                                            <span class="kt-widget__desc">
                                                                <div class="d-flex justify-content-between">
                                                                    <div>Required a security key or code in
                                                                        addition to your password.</div>
                                                                    <div>

                                                                    	@if ($user['2fa_status'] == 0)

                                                                    		<button class="btn btn-info button-size" id="enable2FADataButton">Enable
	                                                                        </button>

                                                                    	@else

                                                                    		<button class="btn btn-info button-size" id="disable2FADataButton">Disable
                                                                        	</button>

                                                                    	@endif
                                                                    	
                                                                    </div>
                                                                </div>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- New Message Modal -->
            <div class="modal fade" id="enable2FADataModel" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Enable 2FA Step Verification</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        {{ Form::open(['url' => '/individual/gauthEnable', 'id'=>'enable2FADataForm', 'data-parsley-validate'=>'data-parsley-validate', "data-parsley-trigger"=>"keyup", 'autocomlete'=>"off"]) }}
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div class="col-xl-12 col-lg-12 second-box">
                                        <div class="kt-portlet kt-portlet--height-fluid">
                                            <div class="kt-portlet__body">
                                                <div class="kt-widget kt-widget--general-1">
                                                    <div class="kt-media kt-media--lg kt-media--circle">
                                                        <img src="{{ asset('assets/images/icons/google-auth-logo.png') }}"
                                                            alt="google -icon">
                                                    </div>

                                                    <div class="kt-widget__wrapper">
                                                        <div class="kt-widget__label">
                                                            <a href="#" class="kt-widget__title"> Get the App
                                                            </a>
                                                            <span class="kt-widget__desc"> Download Google
                                                                Authenticator in your mobile.</span>
                                                            <div class="app-img-download">
                                                                <div class="mr-3">
                                                                    <a href="{{ Setting::get('android_authenticator_link') }}" target="_blank"><img src="{{ asset('assets/images/icons/download-google-play.png') }}"alt="google -icon"></a>
                                                                </div>
                                                                <div class="m-mt-2"> 
                                                                    <a href="{{ Setting::get('apple_authenticator_link') }}" target="_blank"><img src="{{ asset('assets/images/icons/download-app-store.png') }}"
                                                                        alt="google -icon"></a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-12 col-lg-12 second-box">
                                        <div class="kt-portlet kt-portlet--height-fluid">
                                            <div class="kt-portlet__body">
                                                <div class="kt-widget kt-widget--general-1">
                                                    <div class="kt-media kt-media--lg">
                                                        {!! $qr_image !!}
                                                    </div>
                                                    <div class="kt-widget__wrapper">
                                                        <div class="kt-widget__label">
                                                            <a href="#" class="kt-widget__title">
                                                                Scan this QR Code
                                                            </a>
                                                            <span class="kt-widget__desc snd-scan-desc">
                                                                <p>To generate the verification code, open
                                                                    Google Authenticator. </p>
                                                                <p>Tap the "+" icon in the bottom-right of the
                                                                    app. Scan the image to the left, using your
                                                                    phone camera.</p>
                                                                <p> If you cannot scan the code, the following
                                                                    secret key in your app to generate
                                                                    verification code: </p>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control fund-sub-input" id="copy" name="copy" value="{{ $google2fa_secret }}" readonly />
                                                                    <div class="input-group-append">
                                                                        <button
                                                                            class="btn btn-sm btn-outline-info"
                                                                            type="button"
                                                                            data-clipboard-target="#copy"><img
                                                                                src="{{ asset('assets/images/icons/copy-icon.png') }}"
                                                                                alt="copy icon" /></button>
                                                                    </div>
                                                                </div>
                                                            </span>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-12 col-lg-12 second-box">
                                        <div class="kt-portlet kt-portlet--height-fluid">
                                            <div class="kt-portlet__body">
                                                <div class="kt-widget kt-widget--general-1">
                                                    <div class="kt-media kt-media--lg kt-media--circle">
                                                        <img src="{{ asset('assets/images/products/otp.png') }}" alt="image"
                                                            style="height: 50px;">
                                                    </div>
                                                    <div class="kt-widget__wrapper">
                                                        <div class="kt-widget__label">
                                                            <a href="#" class="kt-widget__title"> Enter
                                                                Verification Code </a>
                                                            <span class="kt-widget__desc mb-3"> Enter the
                                                                6-digit verification code generated by the
                                                                app.</span>
                                                            <div class="col-lg-12 p-0">
                                                                <div class="form-group">
                                                                    <div class="input text required">

                                                                    	<input type="hidden" name="secretcode" id="secretcode" value="{{ $google2fa_secret }}">

                                                                        {!! Form::text('code', null, ['id'=> "users-otp", 'class'=>'form-control fund-sub-input', "required"=>"required", "data-parsley-type"=>"digits", "maxlength"=>"6", "pattern"=>"\d{6}"]) !!}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary modal-cancel"
                                data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-info">Verify Code</button>
                        </div>

                        {{ Form::close() }}
                    </div>
                </div>

            </div>
            
            @include('individual.elements.footer')

        </div>
    </div>

</div>

@endsection

@section('scripts')
	
<script type="text/javascript">

	$(document).ready(function() {

		$(".old-show-password, .old-hide-password").on('click', function() {
            var passwordId = "passwordold";
            if ($(this).hasClass('old-show-password')) {
                $("#" + passwordId).attr("type", "text");
                $(this).parent().find(".old-show-password").hide();
                $(this).parent().find(".old-hide-password").show();
            } else {
                $("#" + passwordId).attr("type", "password");
                $(this).parent().find(".old-hide-password").hide();
                $(this).parent().find(".old-show-password").show();
            }
        });

        $(".show-password, .hide-password").on('click', function() {
            var passwordId = "password1";
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
            var passwordId = "password2";
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

    $('#enable2FADataButton').click(function(e){
        $('#enable2FADataForm')[0].reset();
        $('#enable2FADataModel').modal('show');
    });

    $('#enable2FADataForm').submit(function(e) {
        e.preventDefault();
        if ( $(this).parsley().isValid() ) {
            var csrfToken = "{{ csrf_token() }}";

            const form = document.getElementById('enable2FADataForm');
            let formData = new FormData(form);
            axios.post(SITE_URL+'individual/gauthEnable',formData,{
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        'X-CSRF-Token': csrfToken}}
            ).then(function(response){
                var item =response.data;
                if(item.status == "0"){
                    Swal.fire('Great Job !','Two-Factor Authentication (2FA) Is Enabled.','success');

                    $('#enable2FADataForm')[0].reset();
                    $('#enable2FADataModel').modal('hide');

                    setTimeout(location.reload.bind(location), 1500);
                }else{
                    Swal.fire('Sorry !','Wrong code entered.Please try again.','error');
                } 
            })
            .catch(function(){
                Swal.fire('Sorry !','Wrong code entered.Please try again.','error');
            });
        }
    });

    $(document).on("click","#disable2FADataButton",function() {
        Swal.fire({
            title: 'Are you sure?',
            text: "Please confirm the disable Two Step Verification",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.value) {
                
                var csrfToken = "{{ csrf_token() }}";
                let formData = new FormData();
                formData.set('status', '0');
                axios.post(SITE_URL+'individual/gauthDisable',formData,{
                        headers: {
                            'Content-Type': 'multipart/form-data',
                            'X-CSRF-Token': csrfToken}}
                ).then(function (response) {
                    Swal.fire('Great Job !','Two-Factor Authentication (2FA) Is Disbled.','success');
                    setTimeout(location.reload.bind(location), 1500);
                });
            }
        });
    });

</script>

@stop