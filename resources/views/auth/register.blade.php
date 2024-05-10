@extends('layouts.app')

@section('title', 'REGISTER')

@section('styles')

<link rel="stylesheet" href="{{ asset('assets/css/stepwizard.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/intlTelInput.css') }}">

<style>
    #bene-amount-1-block {
        display: none;
    }
    #bene-amount-2-block {
        display: none;
    }
    #joint-applicants {
        display: none;
    }
    #bene-first-block-id {
        display: none;
    }
    #bene-second-block-id {
        display: none;
    }

    .select2-container--default .select2-selection--single {
        height: 38px !important; background-color: #f4f7fc;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 37px !important;  padding-left: 10px;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow{
        height: 36px !important;
    }
    .select2-container {
        display: block !important; width: 100% !important;
    }

</style>

    
@stop

@section('content')

<div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="main-panel custom-signup-main-panel">
        <div class="content-wrapper">
            <div class="multisteps-form">
                <div class="row">
                    <div class="col-12 col-lg-8 m-auto pb-4">
                        <div class="bg-white">
                            <div class="login-img py-4"> <img src="{{ asset('assets/images/logo/login-logo.png') }}" alt="logo" /> </div>
                            <div class="multisteps-form__progress">
                                <button class="multisteps-form__progress-btn js-active" type="button" title="subscriper"><i class="far fa-user"></i>
                                <span>Subscriber Details</span>
                                </button>
                                <button class="multisteps-form__progress-btn" type="button" title="2FA"> <i class="fas fa-user-friends"></i>
                                <span>Authentication</span>
                                </button>
                            </div>

                            {{ Form::open(['class' => 'multisteps-form__form', 'route' => 'register', 'files' => true, 'id'=>'registerForm', 'data-parsley-validate' => 'data-parsley-validate', "data-parsley-trigger"=>"keyup", 'autocomplete'=>"off"]) }}

                            <div class="formWizardDiv">
                                <div class="multisteps-form__panel  p-4 rounded bg-white js-active" data-animation="scaleIn">
                                    <div class="multisteps-form__content signup-form-content">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <label>Type Of Member*</label>

                                                <?php 
                                                    $member_type = [2=> 'Individual / Self Employment', 3=> 'Company/Club/Society/Partnership'];
                                                ?>

                                                {!! Form::select('role_id', $member_type, old('role_id') ? old('role_id') : "", ['class' => 'form-control search-input', 'id' => 'role_id', 'data-parsley-group'=>"block1"]) !!}

                                            </div>
                                            <div class="col-lg-3 mt-3 individual">
                                                <label>Salutation*</label>

                                                <?php 
                                                            
                                                $salutationOption = ['Mr.'=> 'Mr','Mrs.'=> 'Mrs','Ms.'=> 'Ms','Dr.'=> 'Dr','Prof.'=> 'Prof','Assoc. Prof.'=> 'Assoc. Prof','Dato.'=> 'Dato',"Dato Sri."=>"Dato Sri","Datin."=>"Datin","Datuk."=>"Datuk", "Datuk Sri."=>"Datuk Sri","Haji."=>"Haji","Hajjah."=>"Hajjah","Puteri."=>"Puteri","Puan Sri."=>"Puan Sri","Raja."=>"Raja","Tan Sri."=>"Tan Sri","Tengku."=>"Tengku","Tun."=>"Tun","Tun Poh."=>"Tun Poh", 'Tunku.'=>'Tunku']; ?>
                                                {!! Form::select('salutation', $salutationOption, old('salutation') ? old('salutation') : "", ['class' => 'form-control search-input', 'id' => 'salutation', 'data-parsley-group'=>"block1"]) !!}
                                            </div>
                                            <div class="col-lg-9 mt-3 individual">
                                                <label>Name (as per NRIC/Passport) *</label>

                                                {!! Form::text('first_name', old('first_name'), ['id' => 'first_name', 'class'=>'form-control search-input', 'data-parsley-group'=>"block1", "onkeyup"=>"this.value = this.value.toUpperCase();"]) !!}
                                            </div>

                                            <div class="col-lg-12 mt-3 company">
                                                <label>Name of Company *</label>

                                                {!! Form::text('last_name', old('last_name'), ['id' => 'last_name', 'class'=>'form-control search-input', 'data-parsley-group'=>"block1", "onkeyup"=>"this.value = this.value.toUpperCase();", "required" => 'required']) !!}
                                            </div>

                                            <div class="col-lg-6 mt-3 company">
                                                <label>Company Reg.No *</label>

                                                {!! Form::text('company_reg_no', old('company_reg_no'), ['id' => 'company_reg_no', 'class'=>'form-control search-input', 'data-parsley-group'=>"block1", "onkeyup"=>"this.value = this.value.toUpperCase();", "required" => 'required']) !!}
                                            </div>
                                            <div class="col-lg-6 mt-3 company">
                                                <label>Country / Region of Incorporation. *</label>

                                                <select name="company_country_corporate" id="company_country_corporate" class="form-control search-input" data-parsley-group="block1" required>
                                                    <option value="">Please select country ...</option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                    @endforeach
                                                </select>

                                            </div>

                                            <div class="col-lg-6 mt-3 company">
                                                <label>Date of Incorporation*</label>
                                                <div class="input-group">
                                                    <input type="date" class="form-control search-input" name="date_corporation" id="date_corporation" value="{{ old('date_corporation') }}" data-parsley-group="block1" data-parsley-errors-container="#date_corporation_error" required="required">
                                                </div>
                                                <div id="date_corporation_error"></div>
                                            </div>

                                            <div class="col-lg-6 mt-3 company">
                                                <label>Principal Business Activity*</label>

                                                {!! Form::text('business_activity', old('business_activity'), ['id' => 'business_activity', 'class'=>'form-control search-input', 'data-parsley-group'=>"block1", "required" => 'required']) !!}
                                            </div>

                                            <div class="col-lg-12 mt-3 company">
                                                <label>Type Of Company*</label>

                                                <?php 
                                                    $type_company = [1=>"Sole Proprietor", 2=>"Private Limited",3=>"Public Limited", 4=>"Partnership", "5"=>"Organization/Foundation/Trust", "6"=>"Others"];
                                                ?>

                                                {!! Form::select('type_company', $type_company, old('type_company'), ['placeholder' => 'Please select ...', 'class' => 'form-control search-input', 'id' => 'type_company', 'data-parsley-group'=>"block1", "required" => 'required']) !!}
                                            </div>

                                            <div class="col-lg-12 mt-3 company_others_sub d-none">

                                                {!! Form::text('company_others_sub', old('company_others_sub'), ['id' => 'company_others_sub', 'class'=>'form-control search-input', 'data-parsley-group'=>"block1"]) !!}
                                            </div>

                                            <div class="col-lg-6 mt-3 individual">
                                                <label>Country / Region of Residence*</label>

                                                <select name="country_residence" id="country_residence" class="form-control search-input" data-parsley-group="block1">
                                                    <option value="">Please select country ...</option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                    @endforeach
                                                </select>

                                            </div>

                                            <div class="col-lg-6 mt-3 individual">
                                                <label>Nationality*</label>

                                                <select name="nationality" id="nationality" class="form-control search-input" data-parsley-group="block1">
                                                    <option value="">Please select nationality ...</option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                    @endforeach
                                                </select>

                                            </div>

                                            <div class="col-lg-12 mt-3 individual">
                                                <label id="passport_label">NRIC / Passport No*</label>

                                                {!! Form::text('passport', old('passport'), ['id' => 'passport', 'class'=>'form-control search-input', 'data-parsley-group'=>"block1"]) !!}
                                            </div>

                                            <div class="col-lg-6 mt-3 individual">
                                                <label>Gender*</label>

                                                <?php 
                                                    $gender = ['Male'=> 'Male', 'Female'=> 'Female'];
                                                ?>

                                                {!! Form::select('gender', $gender, old('gender'), ['class' => 'form-control search-input', 'id' => 'gender', 'data-parsley-group'=>"block1"]) !!}
                                            </div>

                                            <div class="col-lg-6 mt-3 individual">
                                                <label>Date of Birth*</label>
                                                <div class="input-group">

                                                    {!! Form::date('dob', old('dob'), ['placeholder' => 'YYYY-MM-DD','id' => 'dob', 'data-parsley-type' => 'date', 'class'=>'form-control search-input', 'data-date-format' => 'YYYY-MM-DD', 'data-parsley-errors-container'=>"#dob_error", 'data-parsley-group'=>"block1"]) !!}
                                                </div>

                                                <div id="dob_error"></div>
                                            </div>

                                            <div class="col-lg-6 mt-3">
                                                <label>Address Line 1*</label>

                                                {!! Form::text('address_line1', old('address_line1'), ['id' => 'address_line1', 'class'=>'form-control search-input', "placeholder"=>"Address Line 1", 'data-parsley-group'=>"block1", "required"=>"required"]) !!}
                                            </div>

                                            <div class="col-lg-6 mt-3">
                                                <label>Address Line 2</label>

                                                {!! Form::text('address_line2', old('address_line2'), ['id' => 'address_line2', "placeholder"=>"Address Line 2", 'class'=>'form-control search-input', 'data-parsley-group'=>"block1"]) !!}
                                            </div>

                                            <div class="col-lg-6 mt-3">
                                                <label>Country / Region *</label>

                                                <select name="users-country" id="users-country" class="form-control search-input" data-parsley-group="block1" required>
                                                    <option value="">Please select country ...</option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                    @endforeach
                                                </select>

                                            </div>

                                            <div class="col-lg-6 mt-3">
                                                <label>State *</label>
                                                <select class="form-control search-input" name="users-state" id="users-state" data-parsley-group="block1" required="required">
                                                    <option value="">--</option>
                                                </select>
                                            </div>

                                            <div class="col-lg-6 mt-3">
                                                <label>City *</label>

                                                {!! Form::text('city', old('city'), ['id' => 'city', 'class'=>'form-control search-input', 'data-parsley-group'=>"block1", "required"=>"required"]) !!}
                                            </div>

                                            <div class="col-lg-6 mt-3">
                                                <label>Postcode *</label>

                                                {!! Form::text('postcode', old('postcode'), ['id' => 'postcode', 'class'=>'form-control search-input', 'data-parsley-group'=>"block1", "required"=>"required"]) !!}
                                            </div>

                                            <div class="col-lg-6 mt-3">
                                                <label>Mobile No Prefix</label>

                                                {!! Form::select('mobile_prefix', $phone_prefix, null, ['placeholder' => 'Please select ...', 'id' => 'mobile_prefix', 'class'=>'form-control search-input', 'data-parsley-group'=>"block1", "required"=>"required"]) !!}
                                            </div>

                                            <div class="col-lg-6 mt-3">
                                                <label>Mobile No</label>
                                                <div class="w-100">

                                                    {!! Form::text('mobile_no', old('mobile_no'), ['id' => 'mobile_no', 'div'=>false, 'class'=>'form-control search-input', 'data-parsley-group'=>"block1", "required"=>"required", "data-parsley-type"=>"digits"]) !!}
                                                </div>
                                            </div>

                                            <div class="col-lg-6 mt-3">
                                                <label>Email *</label>
                                                {!! Form::email('peremail', old('peremail'), ['class'=>'form-control search-input', 'id'=>'peremail', 'data-parsley-group'=>"block1", "required"=>"required", 'data-parsley-checkemailpre', 'data-parsley-checkemailpre-message'=>"Email Address already Exists", 'data-parsley-trigger'=>"focusout"]) !!}
                                            </div>

                                            <div class="col-lg-6 mt-3 individual">
                                                <label>Occupation*</label>

                                                {!! Form::text('occupation', old('occupation'), ['id'=>'occupation', 'class'=>'form-control search-input', 'data-parsley-group'=>"block1"]) !!}
                                            </div>

                                            <div class="col-lg-6 mt-3 individual">
                                                <label>Employer Name / Name of Business</label>

                                                {!! Form::text('employer_name', old('employer_name'), ['id'=>'employer_name', 'class'=>'form-control search-input', 'data-parsley-group'=>"block1"]) !!}
                                            </div>

                                            <div class="col-lg-6 mt-3 individual">
                                                <label>Annual Income *</label>

                                                <?php 
                                                    $annual_income = ['< USD 20,000'=> '< USD 20,000', 'USD 20,000 – USD 60,000'=> 'USD 20,000 – USD 60,000', 'USD 60,001 – USD 120,000'=> 'USD 60,001 – USD 120,000', 'USD 120,001 – USD 180,000'=> 'USD 120,001 – USD 180,000', 'USD 180,001 – USD 240,000'=> 'USD 180,001 – USD 240,000', 'Above USD 240,000'=> 'Above USD 240,000'];
                                                ?>

                                                {!! Form::select('annual_income', $annual_income, old('annual_income'), ['placeholder' => 'Please select...', 'class' => 'form-control search-input', 'id' => 'annual_income', 'data-parsley-group'=>"block1"]) !!}
                                            </div>

                                            {{-- <div class="col-lg-6 mt-3">
                                                <label>Intermediary's Email *</label>
                                                {!! Form::email('agent_email', old('agent_email'), ['id' => 'agent_email', 'class'=>'form-control search-input', 'data-parsley-group'=>"block1", "required"=>"required", 'data-parsley-checkemailagent', 'data-parsley-checkemailagent-message'=>"Email Address not found", 'data-parsley-trigger'=>"focusout"]) !!}
                                            </div> --}}

                                            <div class="col-lg-6 mt-3">
                                                <label>Intermediary's Email *</label>
                                                <select class="form-control search-input select2" name="agent_email" id="agent_email" data-parsley-group="block1" data-parsley-checkemailagent data-parsley-checkemailagent-message="Email Address not found" data-parsley-trigger= "change" required>
                                                    <option value=''>-- Select Intermediary --</option>  
                                                    @foreach ($agents['data'] as $agent)
                                                        <option value="{{ $agent['email'] }}">{{ $agent['email'] }}</option>  
                                                    @endforeach 
                                                </select>
                                                
                                            </div>

                                            <div class="col-lg-12 mt-3 individual">
                                                <label>Source of Wealth</label>
                                                <div class=" mt-2 string-check string-check-soft-info  mb-2">
                                                    <input type="checkbox" name="source_wealth[]" class="source_wealth"  value="Personal Saving / Salary" id="source_wealth" data-parsley-group="block1" data-parsley-errors-container="#source_wealthError" data-parsley-multiple="source_wealth">

                                                    <label class="string-check-label">  <span class="ml-2">Personal Saving / Salary</span>   </label>
                                                </div>
                                                <div class=" mt-2 string-check string-check-soft-info  mb-2">
                                                    <input type="checkbox" name="source_wealth[]" class="source_wealth" value="Business Income" id="source_wealth" data-parsley-group="block1" data-parsley-errors-container="#source_wealthError" data-parsley-multiple="source_wealth">
                                                    <label class="string-check-label"> <span class="ml-2">Business Income </span> </label>
                                                </div>
                                                <div class=" mt-2 string-check string-check-soft-info  mb-2">
                                                    <input type="checkbox" name="source_wealth[]" class="source_wealth" value="Dividends from other entry" id="source_wealth" data-parsley-group="block1" data-parsley-errors-container="#source_wealthError" data-parsley-multiple="source_wealth">
                                                    <label class="string-check-label"> <span class="ml-2">Dividends from other entry </span> </label>
                                                </div>
                                                <div class=" mt-2 string-check string-check-soft-info  mb-2">
                                                    <input type="checkbox" name="source_wealth[]" class="source_wealth" value="Benefits of transactions due to me all of which are known to me" id="source_wealth" data-parsley-group="block1" data-parsley-errors-container="#source_wealthError" data-parsley-multiple="source_wealth">
                                                    <label class="string-check-label"> <span class="ml-2">Benefits of transactions due to me all of which are known to me </span>  </label>
                                                </div>
                                                <div class=" mt-2 string-check string-check-soft-info  mb-2">
                                                    <input type="checkbox" name="source_wealth[]" class="source_wealth" value="Other" id="source_wealth" data-parsley-group="block1" data-parsley-errors-container="#source_wealthError" data-parsley-multiple="source_wealth">
                                                    <label class="string-check-label"> <span class="ml-2">Others (please provide  details)  </span>  </label>
                                                </div>

                                                <span id="source_wealthError"></span>
                                            </div>

                                            <div class="col-lg-12 mt-3 individual source_wealth_other d-none">
                                                <input type="text" name="source_wealth_other" id="source_wealth_other" class="form-control search-input" value="{{ old('source_wealth_other') }}" data-parsley-group="block1" maxlength="50">
                                            </div>
                                            
                                        </div>
                                        <div class="button-row d-flex mt-4">
                                            <button class="btn btn-info ml-auto js-btn-next checkSubscription" type="button" title="Next"
                                            >Next</button>
                                        </div>
                                    </div>
                                </div>
                                
                                <!--single form panel-->
                                <div class="multisteps-form__panel  p-4 rounded bg-white" data-animation="scaleIn">
                                    <div class="multisteps-form__content signup-form-content">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <label>Email (Use to login your account, can't be change after sign up) </label>

                                                {!! Form::email('email', old('email'), ['class'=>'form-control search-input', 'id'=>'email', 'data-parsley-group'=>"block2", "required"=>"required", 'data-parsley-checkemail', 'data-parsley-checkemail-message'=>"Email Address already Exists", 'data-parsley-trigger'=>"focusout"]) !!}
                                            </div>

                                            <div class="col-lg-6 mt-3">
                                                <label>Password</label>
                                                <div class="input-wrapper">

                                                    {!! Form::input('password', 'password', old('password'), ['class'=>'form-control search-input', 'id'=> 'password1', 'data-parsley-group'=>"block2", 'data-parsley-minlength'=>"8", 'data-parsley-errors-container'=>".errorspannewpassinput", 'data-parsley-required-message'=>"Please enter your new password.", 'data-parsley-uppercase'=>"1", 'data-parsley-lowercase'=>"1",'data-parsley-number'=>"1",'data-parsley-special'=>"1",'data-parsley-required']) !!}

                                                    <img src="{{ asset('assets/images/icons/eye-icon-hide.png') }}" alt="eye-icon" class="pass-eye-input-icon show-password" />

                                                    <img src="{{ asset('assets/images/icons/eye-icon-show.png') }}" alt="eye-icon" class="pass-eye-input-icon hide-password" style="display:none" />

                                                    <span class="errorspannewpassinput"></span>

                                                </div>
                                            </div>

                                            <div class="col-lg-6 mt-3">
                                                <label>Confirm Password</label>
                                                <div class="input-wrapper">

                                                    {!! Form::input('password', 'cpassword', old('cpassword'), ['class'=>'form-control search-input', 'id'=> 'password2', 'data-parsley-group'=>"block2", "data-parsley-equalto"=>"#password1", 'data-parsley-minlength'=>"8", "data-parsley-uppercase"=>"1", 
                                                    "data-parsley-lowercase"=>"1",
                                                    "data-parsley-number"=>"1",
                                                    "data-parsley-special"=>"1", 
                                                    "data-parsley-errors-container"=>".errorspanconfirmnewpassinput", 
                                                    'data-parsley-required-message'=>"Please re-enter your new password.",'data-parsley-required']) !!}

                                                    <img src="{{ asset('assets/images/icons/eye-icon-hide.png') }}" alt="eye-icon" class="pass-eye-input-icon cshow-password" />

                                                    <img src="{{ asset('assets/images/icons/eye-icon-show.png') }}" alt="eye-icon" class="pass-eye-input-icon chide-password" style="display:none"/>

                                                    <span class="errorspanconfirmnewpassinput"></span>
                                                </div>
                                            
                                            </div>

                                            <div class="col-lg-12 mt-3">
                                                <div class="note-full"><code>Must have at least 8 characters with at least one Capital letter at least one lower case letter and at least one number and at least one special character.</code></div></div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <div class="col-xl-12 col-lg-12 second-box">
                                                        <div class="kt-portlet kt-portlet--height-fluid">
                                                            <div class="kt-portlet__body">
                                                                <div class="kt-widget kt-widget--general-1">
                                                                    <div class="kt-media kt-media--lg kt-media--circle">
                                                                        <img src="{{ asset('assets/images/icons/google-auth-logo.png') }}" alt="google -icon">
                                                                    </div>
                                                                    
                                                                    <div class="kt-widget__wrapper">
                                                                        <div class="kt-widget__label">
                                                                            <a href="#" class="kt-widget__title"> Get the App </a>
                                                                            <span class="kt-widget__desc"> Download Google Authenticator in your mobile.</span>
                                                                            <div class="app-img-download">
                                                                                <div class="mr-3">  
                                                                                    <a href="{{ Setting::get('android_authenticator_link') }}" target="_blank"><img src="{{ asset('assets/images/icons/download-google-play.png') }}" alt="google -icon"></a>
                                                                                </div>
                                                                                <div class="m-mt-2">  
                                                                                    <a href="{{ Setting::get('apple_authenticator_link') }}" target="_blank"><img src="{{ asset('assets/images/icons/download-app-store.png') }}" alt="google -icon"></a>
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
                                                                                <p>To generate the verification code, open Google Authenticator. </p>
                                                                                <p>Tap the "+" icon in the bottom-right of the app. Scan the image to the left, using your phone camera.</p>
                                                                                <p>  If you cannot scan the code, the following secret key in your app to generate verification code: </p>
                                                                                <div class="input-group">
                                                                                    <input type="text" class="form-control fund-sub-input" id="copy" name="copy" value="{{ $google2fa_secret }}" readonly />
                                                                                    <div class="input-group-append">
                                                                                        <button class="btn btn-sm btn-outline-info" type="button" data-clipboard-target="#copy"><img src="{{ asset('assets/images/icons/copy-icon.png') }}" alt="copy icon"/></button>
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
                                                                        <img src="{{ asset('assets/images/products/otp.png') }}" alt="image" style="height: 50px;">
                                                                    </div>
                                                                    <div class="kt-widget__wrapper">
                                                                        <div class="kt-widget__label">
                                                                            <a href="#" class="kt-widget__title"> Enter Verification Code </a>
                                                                            <span class="kt-widget__desc mb-3"> Enter the 6-digit verification code generated by the app.</span>
                                                                            <div class="col-lg-6 p-0">
                                                                                <div class="form-group">
                                                                                    <div class="input text required">
                                                                                        <input type="hidden" name="secretcode" id="secretcode" value="{{ $google2fa_secret }}">

                                                                                        {!! Form::text('code', null, ['id'=> "users-otp", 'class'=>'form-control fund-sub-input', "required"=>"required", 'data-parsley-group'=>"block2", "data-parsley-type"=>"digits", "maxlength"=>"6", "pattern"=>"\d{6}"]) !!}

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
                                            <div class="button-row d-flex mt-4">
                                                <button class="btn btn-info js-btn-prev" type="button" title="Prev">Back</button>
                                                <button class="btn btn-info finitsh-btn ml-auto" type="button" title="Submit"
                                                onclick="saveRegisterForm()">Finish</button>
                                            </div>
                                        </div>
                                    </div>
                                
                            </div>

                            {{ Form::close() }}
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection

    @section('scripts')

        <script src="{{ asset('assets/js/components/subscriptions-register-wizard.js') }}"></script>
        <script src="{{ asset('assets/js/components/date-picker.js') }}"></script>
        <script src="{{ asset('assets/js/components/intlTelInput.js') }}"></script>
        <script src="{{ asset('assets/js/components/dropify.js') }}"></script>

        <script type="text/javascript">

            function scrollToTop() {
                window.scrollTo(0, 0);
            }

            $(document).ready(function () {
                var today = new Date();
                $('.datepicker').datepicker({
                    format: 'mm-dd-yyyy',
                    autoclose:true,
                    endDate: "today",
                    maxDate: today
                }).on('changeDate', function (ev) {
                    $(this).datepicker('hide');
                });


                $('.datepicker').change(function () {
                    if (this.value.match(/[^0-9]/g)) {
                        this.value = this.value.replace(/[^0-9^-]/g, '');
                    }
                });
            });

            $(".datepicker").datepicker().datepicker("setDate", new Date());

            $(document).ready(function() {

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

            window.Parsley.addValidator('checkemailagent', (value, requirement) => {
                const def = new $.Deferred();

                $.ajax({
                    // url: SITE_URL+'checkAgentEmailExist',
                    url: SITE_URL+'checkAgentEmail',
                    dataType: 'json',
                    type: 'get',
                    data: {email: value},
                    async: false,
                    success: (response) => {
                        // console.log(response)
                        if (response.valid) {
                            def.resolve();
                        } else {
                            def.reject(response.error);
                        }
                    },
                    error: () => {def.reject();	},
                });
                return def.promise();
            });

            window.Parsley.addValidator('checkemail', (value, requirement) => {
                const def = new $.Deferred();

                $.ajax({
                    url: SITE_URL+'checkEmailExist',
                    dataType: 'json',
                    type: 'get',
                    data: {email: value},
                    async: false,
                    success: (response) => {
                        // console.log(response)
                        if (response.valid) {
                            def.resolve();
                        } else {
                            def.reject(response.error);
                        }
                    },
                    error: () => {def.reject(); },
                });
                return def.promise();
            });

            window.Parsley.addValidator('checkemailpre', (value, requirement) => {
                const def = new $.Deferred();

                $.ajax({
                    url: SITE_URL+'checkEmailExist',
                    dataType: 'json',
                    type: 'get',
                    data: {email: value},
                    async: false,
                    success: (response) => {
                        if (response.valid) {
                            def.resolve();
                        } else {
                            def.reject(response.error);
                        }
                    },
                    error: () => {def.reject();	},
                });
                return def.promise();
            });

            $(document).ready(function () {
            
                $('#nationality').change(function(){
                    if($(this).val() == 129){
                        $('#passport_label').html("NRIC*");
                    }else{
                        $('#passport_label').html("Passport No*");
                    }
                });

                if($("#nationality").val() == 129){
                    if($(this).val() == 129){
                        $('#passport_label').html("NRIC*");
                    }else{
                        $('#passport_label').html("Passport No*");
                    }
                };
            
            
                $("#peremail").on('keyup change', function () {

                    $("#email").val($(this).val());
                });
            
                $("#mobile_no").on('keyup change', function () {

                    var prefix =  $("#mobile_prefix option:selected").html();
                    var c_code = prefix.replace(/\D/g,'');

                    $("#mobile_").val("+"+c_code+$(this).val());
                    $("#users-mob-html").html("+"+c_code+$(this).val());
                });


                $('.individual').hide();

                if($("#role_id").val() == 2){
                    $('.company').hide();
                    $('.individual').show();

                    $("#last_name").removeAttr("required");
                    $("#company_reg_no").removeAttr("required");
                    $("#company_country_corporate").removeAttr("required");
                    $("#date_corporation").removeAttr("required");
                    $("#business_activity").removeAttr("required");
                    $("#type_company").removeAttr("required");

                    $("#first_name").attr("required", "required");
                    $("#passport").attr("required", "required");
                    $("#dob").attr("required", "required");
                    $("#country_residence").attr("required", "required");
                    $("#nationality").attr("required", "required");
                    $("#occupation").attr("required", "required");
                    //$("#users-individual-employer-name").attr("required", "required");    
                    $("#annual_income").attr("required", "required");
                    $(".source_wealth").attr("required", "required"); 
                    
                    $(".source_wealth:checked").each(function(){
                        var radioValue =$(this).val();
                        if(radioValue == "Other"){
                            $(".source_wealth").prop("checked",false);
                            $(this).prop("checked",true);

                            $('.source_wealth_other').removeClass('d-none');
                            $("#source_wealth_other").attr("required", "required");
                        }else{
                            $('.source_wealth_other').addClass('d-none');
                            $("#source_wealth_other").removeAttr("required"); 
                        }
                    });

                }else if($("#role_id").val() == 3){
                    $('.company').show();
                    $('.individual').hide();

                    $("#last_name").attr("required", "required");
                    $("#company_reg_no").attr("required", "required");
                    $("#company_country_corporate").attr("required", "required");
                    $("#date_corporation").attr("required", "required");
                    $("#business_activity").attr("required", "required");
                    $("#type_company").attr("required", "required");

                    $("#first_name").removeAttr("required");
                    $("#passport").removeAttr("required");
                    $("#dob").removeAttr("required");
                    $("#country_residence").removeAttr("required");
                    $("#nationality").removeAttr("required");
                    $("#occupation").removeAttr("required");
                    //$("#users-individual-employer-name").attr("required", "required");    
                    $("#annual_income").removeAttr("required");
                    $(".source_wealth").removeAttr("required");
                    $("#source_wealth_other").removeAttr("required"); 

                    if($("#type_company").val() == 6){
                        $('.company_others_sub').removeClass('d-none');
                        $("#company_others_sub").attr("required", "required");
                    }else{
                        $('.company_others_sub').addClass('d-none');
                        $("#company_others_sub").removeAttr("required"); 
                    }
                }

                $('#role_id').change(function(){
                    if($(this).val() == 2){
                        $('.company').hide();
                        $('.individual').show();

                        $("#last_name").removeAttr("required");
                        $("#company_reg_no").removeAttr("required");
                        $("#company_country_corporate").removeAttr("required");
                        $("#date_corporation").removeAttr("required");
                        $("#business_activity").removeAttr("required");
                        $("#type_company").removeAttr("required");

                        $("#first_name").attr("required", "required");
                        $("#passport").attr("required", "required");
                        $("#dob").attr("required", "required");
                        $("#country_residence").attr("required", "required");
                        $("#nationality").attr("required", "required");
                        $("#occupation").attr("required", "required");
                        //$("#users-individual-employer-name").attr("required", "required");    
                        $("#annual_income").attr("required", "required");
                        $(".source_wealth").attr("required", "required"); 
                        
                        $(".source_wealth:checked").each(function(){
                            var radioValue =$(this).val();
                            // console.log(radioValue)
                            if(radioValue == "Other"){
                                $(".source_wealth").prop("checked",false);
                                $(this).prop("checked",true);

                                $('.source_wealth_other').removeClass('d-none');
                                $("#source_wealth_other").attr("required", "required");
                            }else{
                                $('.source_wealth_other').addClass('d-none');
                                $("#source_wealth_other").removeAttr("required"); 
                            }
                        });
                        

                    }else if($(this).val() == 3){
                        $('.company').show();
                        $('.individual').hide();

                        $("#last_name").attr("required", "required");
                        $("#company_reg_no").attr("required", "required");
                        $("#company_country_corporate").attr("required", "required");
                        $("#date_corporation").attr("required", "required");
                        $("#business_activity").attr("required", "required");
                        $("#type_company").attr("required", "required");

                        $("#first_name").removeAttr("required");
                        $("#passport").removeAttr("required");
                        $("#dob").removeAttr("required");
                        $("#country_residence").removeAttr("required");
                        $("#nationality").removeAttr("required");
                        $("#occupation").removeAttr("required");
                        //$("#users-individual-employer-name").attr("required", "required");    
                        $("#annual_income").removeAttr("required");
                        $(".source_wealth").removeAttr("required");
                        $("#source_wealth_other").removeAttr("required"); 

                    }
                });

           
                $('#type_company').change(function(){
                    if($(this).val() == 6){
                        $('.company_others_sub').removeClass('d-none');
                        $("#company_others_sub").attr("required", "required");
                    }else{
                        $('.company_others_sub').addClass('d-none');
                        $("#company_others_sub").removeAttr("required"); 
                    }
                });

                $('#company_country_corporate').change(function(){
                    changeCountry($(this).val());
                });

                $('#country_residence').change(function(){
                    changeCountry($(this).val());
                });

                $('#users-country').change(function(){
                    $.ajax({
                        url: SITE_URL+'selectBoxStateList?country_id='+$(this).val(),
                        type:"GET",
                        success: function(data) {
                            var state = data.data;
                            $('#users-state').empty();
                            for (var key in state) {
                                if (state.hasOwnProperty(key)) {
                                    $('#users-state').append('<option value="'+key+'" >'+state[key]+'</option>');
                                }
                            }
                        }
                    });

                    // $('#mobile_prefix').val($(this).val());
                });

                $(".source_wealth"). click(function(){
                    $(".source_wealth:checked").each(function(){
                        var radioValue =$(this).val();

                        if(radioValue == "Other"){
                            $('.source_wealth_other').removeClass('d-none');
                            $("#source_wealth_other").attr("required", "required");
                        }else{
                            $('.source_wealth_other').addClass('d-none');
                            $("#source_wealth_other").removeAttr("required"); 
                        }
                    });
                });

            });

            function changeCountry(country_id){

                $('#mobile_prefix').val(country_id);
                $('#nationality').val(country_id);			
            }

            $('.checkSubscription').on('click', function () {

                if ($('#registerForm').parsley().validate('block1')) {
                    if ($("#registerForm").parsley().isValid()) {
                        // $(window).scrollTop(0, 0);
                        scrollToTop();
                    }
                }
            });

            function saveRegisterForm(){
                if ($('#registerForm').parsley().validate('block2')) {
                    if ($("#registerForm").parsley().isValid()) {

                        preloader_init();

                        var csrfToken = "{{ csrf_token() }}";

                        var form;
                        let formData = new FormData(form);

                        var email = $("#email").val();
                        var otp = $("#users-otp").val();
                        var secretcode = $("#secretcode").val();

                        formData.set('email', email);
                        formData.set('otp', otp);
                        formData.set('secretcode', secretcode);

                        axios.post(SITE_URL+'gaotpCheckSignUp',formData,{
                                headers: {
                                    'Content-Type': 'multipart/form-data',
                                    'X-CSRF-Token': csrfToken}}
                        ).then(function(response){

                            var item =response.data;
                            if(item.error == "0"){
                                $('#registerForm').submit();
                            }else{
                                preloader_off();
                                Swal.fire('Sorry!',"OTP code incorrect, please try again.",'error');
                            }
                        })
                        .catch(function(){
                            preloader_off();
                            Swal.fire('Sorry!',"OTP code incorrect, please try again.",'error');
                        });
                    }
                }
            }    

        </script>

    @stop