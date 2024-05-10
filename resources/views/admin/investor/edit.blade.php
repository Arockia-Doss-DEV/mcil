@extends('layouts.app')

@section('title', 'Update Investor')

@section('styles')

@stop

@section('content')

<div class="container-fluid page-body-wrapper">

    @include("admin.elements.sidebar")

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="d-flex justify-content-between">
                <div class="pageheader">
                    <h4>UPDATE INVESTOR</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb no-bg custom-breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/investor/active') }}">Investors</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Investor Create </li>
                        </ol>
                    </nav>
                </div>
                <div class="d-flex">
                    <div class="go-back">
                        <a href="{{ url('/investor/active') }}" title="Back">
                            <img src="{{ asset('assets/images/icons/back-icon.png') }}" alt="back icon" />
                        </a>
                    </div>
                </div>
            </div>
            <div class="row mt-3 pb-5">
                <div class="col-lg-12 card-margin">
                    <div class="card">

                    {{ Form::open(['url' => '/investor/edit/'.$user->id, 'files' => true, 'id'=>'registerForm', 'data-parsley-validate' => 'data-parsley-validate', "data-parsley-trigger"=>"keyup", 'autocomlete'=>"off"]) }}

                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>Account Type <span class="mandatory">*</span></label>

                                    <?php 
                                        $ac_type = [0=> 'Business Account', 1=> 'Test Account']; 
                                    ?>

                                    {!! Form::select('is_tester', $ac_type, $user->is_tester, ['class' => 'form-control search-input', 'id' => 'is_tester', 'data-parsley-group'=>"block1", "required"=>"required"]) !!}
                                </div>

                                <div class="col-lg-6">
                                    <label>Type Of Member <span class="mandatory">*</span></label>

                                    <?php 
                                        $member_type = [2=> 'Individual / Self Employment', 3=> 'Company/Club/Society/Partnership',]; 
                                    ?>

                                    {!! Form::select('role_id', $member_type, $user->role_id, ['class' => 'form-control search-input', 'id' => 'role_id', 'data-parsley-group'=>"block1", "required"=>"required"]) !!}
                                </div>
                                <div class="col-lg-3 mt-3 individual">
                                    <label>Salutation</label>

                                    <?php 
                                        $salutation = ['Mr.'=> 'Mr','Mrs.'=> 'Mrs','Ms.'=> 'Ms','Dr.'=> 'Dr','Prof.'=> 'Prof','Assoc. Prof.'=> 'Assoc. Prof','Dato.'=> 'Dato', "Dato Sri."=>"Dato Sri","Datin."=>"Datin", "Datuk."=>"Datuk","Datuk Seri."=>"Datuk Seri", "Haji."=>"Haji","Hajjah."=>"Hajjah","Puteri."=>"Puteri","Puan Sri."=>"Puan Sri","Raja."=>"Raja","Tan Sri."=>"Tan Sri","Tengku."=>"Tengku","Tun."=>"Tun","Tun Poh."=>"Tun Poh", 'Tunku.'=>'Tunku'];
                                    ?>

                                    {!! Form::select('salutation', $salutation, $user->salutation, ['class' => 'form-control search-input', 'id' => 'salutation', 'data-parsley-group'=>"block1"]) !!}
                                </div>

                                <div class="col-lg-9 mt-3 individual">
                                    <label>Name (As Per NRIC/Passport) <span class="mandatory">*</span></label>
                                    {!! Form::text('first_name', $user->first_name, ['id' => 'first_name', 'class'=>'form-control search-input', 'data-parsley-group'=>"block1", "onkeyup"=>"this.value = this.value.toUpperCase();", 'required' => 'required']) !!}
                                </div>

                                <div class="col-lg-12 mt-3 company">
                                    <label>Name of Company *</label>

                                    {!! Form::text('last_name', $user->last_name, ['id' => 'last_name', 'class'=>'form-control search-input', 'data-parsley-group'=>"block1", "onkeyup"=>"this.value = this.value.toUpperCase();", "required" => 'required']) !!}
                                </div>

                                <div class="col-lg-6 mt-3 company">
                                    <label>Company Reg.No *</label>

                                    {!! Form::text('company_reg_no', $user['company'] ? $user->company->company_reg_no : '', ['id' => 'company_reg_no', 'class'=>'form-control search-input', 'data-parsley-group'=>"block1", "onkeyup"=>"this.value = this.value.toUpperCase();", "required" => 'required']) !!}
                                </div>

                                <div class="col-lg-6 mt-3 company">
                                    <label>Country / Region of Incorporation. *</label>

                                    {!! Form::select('company_country_corporate', $countries, $user['company'] ? $user->company->country_corporate : '', ['id'=>'company_country_corporate', 'class'=>'form-control search-input', 'data-parsley-group'=>"block1", "required" => 'required']) !!}
                                </div>

                                <div class="col-lg-6 mt-3 company">
                                    <label>Date of Incorporation*</label>
                                    <div class="input-group">

                                        {!! Form::date('date_corporation', $user['company'] ? $user->company->date_corporation : '' , ['placeholder' => 'YYYY-MM-DD','id' => 'date_corporation', 'data-parsley-type' => 'date', 'class'=>'form-control search-input', 'data-date-format' => 'YYYY-MM-DD', 'data-parsley-errors-container'=>"#dateCorporationError", 'data-parsley-group'=>"block1", "required" => 'required']) !!}
                                    </div>

                                    <span id="dateCorporationError"></span>
                                </div>

                                <div class="col-lg-6 mt-3 company">
                                    <label>Principal Business Activity*</label>

                                    {!! Form::text('business_activity', $user['company'] ? $user->company->business_activity : '', ['id' => 'business_activity', 'class'=>'form-control search-input', 'data-parsley-group'=>"block1", "required" => 'required']) !!}
                                </div>

                                <div class="col-lg-12 mt-3 company">
                                    <label>Type Of Company*</label>

                                    <?php 
                                        $type_company = [1=>"Sole Proprietor", 2=>"Private Limited",3=>"Public Limited", 4=>"Partnership", "5"=>"Organization/Foundation/Trust", "6"=>"Others"];
                                    ?>

                                    {!! Form::select('type_company', $type_company, $user['company'] ? $user->company->type_company : '', ['class' => 'form-control search-input', 'id' => 'type_company', 'data-parsley-group'=>"block1", "required" => 'required']) !!}
                                </div>

                                <div class="col-lg-12 mt-3 company_others_sub d-none">

                                    {!! Form::text('company_others_sub', $user['company'] ? $user->company->other_type_desc : '', ['id' => 'company_others_sub', 'class'=>'form-control search-input', 'data-parsley-group'=>"block1"]) !!}
                                </div>

                                <div class="col-lg-6 mt-3 individual">
                                    <label id="passport_label">NRIC / Passport No. <span class="mandatory">*</span></label>
                                    {!! Form::text('passport', $user['individual'] ? $user->individual->passport : '', ['id' => 'passport', 'class'=>'form-control search-input', 'data-parsley-group'=>"block1"]) !!}
                                </div>

                                <div class="col-lg-6 mt-3 individual">
                                    <label>Gender <span class="mandatory">*</span></label>

                                    <?php 
                                        $gender = ['Male'=> 'Male', 'Female'=> 'Female'];
                                    ?>

                                    {!! Form::select('gender', $gender, $user->gender, ['class' => 'form-control search-input', 'id' => 'gender', 'data-parsley-group'=>"block1"]) !!}
                                </div>

                                <div class="col-lg-6 mt-3">
                                    <label>Email <span class="mandatory">*</span></label>
                                    {!! Form::text('peremail', $user->peremail, ['class'=>'form-control search-input', 'id'=>'peremail', 'data-parsley-group'=>"block1", "required"=>"required", 'readonly']) !!}
                                </div>

                                <div class="col-lg-6 mt-3 individual">
                                    <label>Date of Birth <span class="mandatory">*</span></label>
                                    <div class="input-group">

                                        {!! Form::date('dob', $user->individual ? $user->individual->dob :'' , ['placeholder' => 'YYYY-MM-DD','id' => 'dob', 'data-parsley-type' => 'date', 'class'=>'form-control search-input', 'data-date-format' => 'YYYY-MM-DD', 'data-parsley-errors-container'=>"#dobError", 'data-parsley-group'=>"block1"]) !!}
                                        
                                        
                                    </div>
                                    <span id="dobError"></span>
                                </div>

                                <div class="col-lg-6 mt-3">
                                    <label>Mobile No Prefix</label>

                                    {!! Form::select('mobile_prefix', $phone_prefix, $user->mobile_prefix, ['id' => 'mobile_prefix', 'class'=>'form-control search-input', 'data-parsley-group'=>"block1", "required"=>"required"]) !!}
                                </div>

                                <div class="col-lg-6 mt-3">
                                    <label>Mobile No. <span class="mandatory">*</span></label>
                                    <div class="w-100">

                                    {!! Form::text('mobile_no', $user->mobile_no, ['id' => 'mobile_no', 'div'=>false, 'class'=>'form-control search-input', 'data-parsley-group'=>"block1", "required"=>"required", "data-parsley-type"=>"digits"]) !!}
                                    </div>
                                </div>
                                
                                <div class="col-lg-6 mt-3 individual">
                                    <label>Country / Region Of Residence <span class="mandatory">*</span></label>
                                    {!! Form::select('country_residence', $countries, $user['individual'] ? $user->individual->country_residence : '', ['placeholder' => 'Please select ...', 'class' => 'form-control search-input', 'id'=>'country_residence', "data-parsley-group"=>"block1"]) !!}
                                </div>
                                <div class="col-lg-6 mt-3 individual">
                                    <label>Nationality <span class="mandatory">*</span></label>
                                    {!! Form::select('nationality', $countries, $user['individual'] ? $user->individual->nationality : '', ['placeholder' => 'Please select ...', 'class' => 'form-control search-input', 'id'=>'nationality', "data-parsley-group"=>"block1"]) !!}
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <label>Address Line 1 <span class="mandatory">*</span></label>
                                    {!! Form::text('address_line1', $user->address_line1, ['id' => 'address_line1', 'class'=>'form-control search-input', "placeholder"=>"Address Line 1", 'data-parsley-group'=>"block1", "required"=>"required"]) !!}
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <label>Address Line 2</label>
                                    {!! Form::text('address_line2', $user->address_line2, ['id' => 'address_line2', "placeholder"=>"Address Line 2", 'class'=>'form-control search-input', 'data-parsley-group'=>"block1"]) !!}
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <label>Country / Region <span class="mandatory">*</span></label>
                                    {!! Form::select('country', $countries, $user->country, ['class' => 'form-control search-input', 'id'=>'country', "data-parsley-group"=>"block1", "required"=>"required"]) !!}
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <label>State <span class="mandatory">*</span></label>
                                    <select class="form-control search-input" name="state" id="state" data-parsley-group="block1" required="required">
                                        <option value="">--</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <label>City <span class="mandatory">*</span></label>
                                    {!! Form::text('city', $user->city, ['id' => 'city', 'class'=>'form-control search-input', 'data-parsley-group'=>"block1", "required"=>"required"]) !!}
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <label>Postcode <span class="mandatory">*</span></label>
                                    {!! Form::text('postcode', $user->post_code, ['id' => 'postcode', 'class'=>'form-control search-input', 'data-parsley-group'=>"block1", "required"=>"required", "data-parsley-type"=>"digits"]) !!}
                                </div>

                                <div class="col-lg-6 mt-3 individual">
                                    <label>Occupation <span class="mandatory">*</span></label>
                                    {!! Form::text('occupation', $user['individual'] ? $user->individual->occupation : '', ['id'=>'occupation', 'class'=>'form-control search-input', 'data-parsley-group'=>"block1"]) !!}
                                </div>
                                
                                <div class="col-lg-6 mt-3 individual">
                                    <label>Employer Name / Name of Business <span class="mandatory">*</span></label>
                                    {!! Form::text('employer_name', $user['individual'] ? $user->individual->employer_name : '', ['id'=>'employer_name', 'class'=>'form-control search-input', 'data-parsley-group'=>"block1"]) !!}
                                </div>
                                <div class="col-lg-6 mt-3 individual">
                                    <label>Annual Income <span class="mandatory">*</span></label>
                                    <?php 
                                        $annual_income = ['< USD 20,000'=> '< USD 20,000', 'USD 20,000 – USD 60,000'=> 'USD 20,000 – USD 60,000', 'USD 60,001 – USD 120,000'=> 'USD 60,001 – USD 120,000', 'USD 120,001 – USD 180,000'=> 'USD 120,001 – USD 180,000', 'USD 180,001 – USD 240,000'=> 'USD 180,001 – USD 240,000', 'Above USD 240,000'=> 'Above USD 240,000'];
                                    ?>

                                    {!! Form::select('annual_income', $annual_income, $user['individual'] ? $user->individual->annual_income : '', ['class' => 'form-control search-input', 'id' => 'annual_income', 'data-parsley-group'=>"block1"]) !!}
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <label>Intermediary's Email <span class="mandatory">*</span></label>
                                    {!! Form::email('agent_email', $user->agent_email, ['id' => 'agent_email', 'class'=>'form-control search-input', 'data-parsley-group'=>"block1", "required"=>"required", 'data-parsley-checkemailagent', 'data-parsley-checkemailagent-message'=>"Email Address not found", 'data-parsley-trigger'=>"focusout"]) !!}
                                </div>

                                <?php
                                    $sw_option = $user['individual'] ? explode(', ', $user->individual->source_wealth) : '';
                                ?>

                                <div class="col-lg-12 mt-3 individual">
                                    <label>Source of Wealth <span class="mandatory">*</span></label>
                                    <div class=" mt-2 string-check string-check-soft-info  mb-2">
                                        <input type="checkbox" name="source_wealth[]" class="source_wealth" value="Personal Saving / Salary" {{ (is_array($sw_option) and in_array('Personal Saving / Salary', $sw_option)) ? ' checked' : '' }} id="source_wealth" data-parsley-group="block1" data-parsley-errors-container="#source_wealthError" data-parsley-multiple="source_wealth">

                                        <label class="string-check-label">  <span class="ml-2">Personal Saving / Salary</span>   </label>
                                    </div>
                                    <div class=" mt-2 string-check string-check-soft-info  mb-2">
                                        <input type="checkbox" name="source_wealth[]" class="source_wealth" value="Business Income" {{ (is_array($sw_option) and in_array('Business Income', $sw_option)) ? ' checked' : '' }} id="source_wealth" data-parsley-group="block1" data-parsley-errors-container="#source_wealthError" data-parsley-multiple="source_wealth">
                                        <label class="string-check-label"> <span class="ml-2">Business Income </span> </label>
                                    </div>
                                    <div class=" mt-2 string-check string-check-soft-info  mb-2">
                                        <input type="checkbox" name="source_wealth[]" class="source_wealth" value="Dividends from other entry" {{ (is_array($sw_option) and in_array('Dividends from other entry', $sw_option)) ? ' checked' : '' }} id="source_wealth" data-parsley-group="block1" data-parsley-errors-container="#source_wealthError" data-parsley-multiple="source_wealth">
                                        <label class="string-check-label"> <span class="ml-2">Dividends from other entry </span> </label>
                                    </div>
                                    <div class=" mt-2 string-check string-check-soft-info  mb-2">
                                        <input type="checkbox" name="source_wealth[]" class="source_wealth" value="Benefits of transactions due to me all of which are known to me" {{ (is_array($sw_option) and in_array('Benefits of transactions due to me all of which are known to me', $sw_option)) ? ' checked' : '' }} id="source_wealth" data-parsley-group="block1" data-parsley-errors-container="#source_wealthError" data-parsley-multiple="source_wealth">
                                        <label class="string-check-label"> <span class="ml-2">Benefits of transactions due to me all of which are known to me </span>  </label>
                                    </div>
                                    <div class=" mt-2 string-check string-check-soft-info  mb-2">
                                        <input type="checkbox" name="source_wealth[]" class="source_wealth" value="Other" {{ (is_array($sw_option) and in_array('Other', $sw_option)) ? ' checked' : '' }} id="source_wealth" data-parsley-group="block1" data-parsley-errors-container="#source_wealthError" data-parsley-multiple="source_wealth">
                                        <label class="string-check-label"> <span class="ml-2">Others (please provide  details)  </span>  </label>
                                    </div>

                                    <span id="source_wealthError"></span>
                                </div>

                                <div class="col-lg-12 mt-3 individual source_wealth_other d-none">
                                    <input type="text" name="source_wealth_other" id="source_wealth_other" class="form-control search-input" value="{{ $user['individual'] ? $user->individual->source_wealth_other : '' }}" data-parsley-group="block1" maxlength="50">
                                </div>

                                <div class="col-lg-12 mt-3">
                                    <label>Active <span class="mandatory">*</span></label>
                                    <div class=" mt-2 string-check string-check-soft-info  mb-2">
                                        <input type="checkbox" name="active" value="1" {{ $user->active == 1 ? ' checked' : '' }}>
                                        <label class="string-check-label"> 
                                            <span class="ml-2"> Click To Active</span> 
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-12">
                                    <h5 class="font-weight-bold mb-3"> Your Login Information :</h5>
                                </div>
                                <div class="col-lg-12">
                                    <label>Email (Use to login your account, can't be change after sign up)
                                        <span class="mandatory">*</span>
                                    </label>
                                    {!! Form::email('email', $user->email, ['class'=>'form-control search-input', 'id'=>'email', 'data-parsley-group'=>"block2", "required"=>"required", 'readonly']) !!}
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <label>Password <span class="mandatory">*</span></label>
                                    <div class="input-wrapper">
                                        {!! Form::input('password', 'password', old('password'), ['class'=>'form-control search-input', 'id'=> 'password1', 'data-parsley-group'=>"block2", 'data-parsley-minlength'=>"8", 'data-parsley-errors-container'=>".errorspannewpassinput", 'data-parsley-required-message'=>"Please enter your new password.", 'data-parsley-uppercase'=>"1", 'data-parsley-lowercase'=>"1",'data-parsley-number'=>"1",'data-parsley-special'=>"1"]) !!}

                                        <img src="{{ asset('assets/images/icons/eye-icon-hide.png') }}" alt="eye-icon" class="pass-eye-input-icon show-password" />

                                        <img src="{{ asset('assets/images/icons/eye-icon-show.png') }}" alt="eye-icon" class="pass-eye-input-icon hide-password" style="display:none" />

                                        <span class="errorspannewpassinput"></span>
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <label>Confirm Password <span class="mandatory">*</span></label>
                                    <div class="input-wrapper">
                                        {!! Form::input('password', 'cpassword', old('cpassword'), ['class'=>'form-control search-input', 'id'=> 'password2', 'data-parsley-group'=>"block2", "data-parsley-equalto"=>"#password1", 'data-parsley-minlength'=>"8", "data-parsley-uppercase"=>"1", 
                                                    "data-parsley-lowercase"=>"1",
                                                    "data-parsley-number"=>"1",
                                                    "data-parsley-special"=>"1", 
                                                    "data-parsley-errors-container"=>".errorspanconfirmnewpassinput", 
                                                    'data-parsley-required-message'=>"Please re-enter your new password."]) !!}

                                        <img src="{{ asset('assets/images/icons/eye-icon-hide.png') }}" alt="eye-icon" class="pass-eye-input-icon cshow-password" />

                                        <img src="{{ asset('assets/images/icons/eye-icon-show.png') }}" alt="eye-icon" class="pass-eye-input-icon chide-password" style="display:none"/>

                                        <span class="errorspanconfirmnewpassinput"></span>
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-3">
                                    <div class="note-full">
                                        <code>Must have at least 8 characters with at least one Capital letter at least one lower case letter and at least one number and at least one special character.</code>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label>Mobile No (To receive OTP) <span class="mandatory">*</span></label>
                                    {!! Form::text('code', null, ['id'=> "users-otp", 'class'=>'form-control fund-sub-input', 'readonly'=> 'readonly', "data-parsley-type"=>"digits", "maxlength"=>"6", "pattern"=>"\d{6}"]) !!}
                                </div>
                            </div>
                            <div class="text-right mt-3">
                                <input type="submit" class="btn btn-info" id="verifyOTP" value="Submit" />
                            </div>

                        </div>

                    {{ Form::close() }}

                    </div>
                </div>
            </div>
            
            @include('admin.elements.footer')

        </div>
    </div>
</div>

@endsection

@section('scripts')

<script src="{{ asset('assets/js/components/date-picker.js') }}"></script>
<script src="{{ asset('assets/js/components/intlTelInput.js') }}"></script>
<script src="{{ asset('assets/js/components/dropify.js') }}"></script>

<script type="text/javascript">

    $(function () {
        $('#datepicker').datepicker({
            dateFormat: 'mm/dd/yyyy',
            todayHighlight: true
        });
    });

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
            url: SITE_URL+'checkAgentEmailExist',
            dataType: 'json',
            type: 'get',
            data: {email: value},
            async: false,
            success: (response) => {
                //console.log(response)
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

    window.Parsley.addValidator('checkemail', (value, requirement) => {
        const def = new $.Deferred();

        $.ajax({
            url: SITE_URL+'checkEmailExist',
            dataType: 'json',
            type: 'get',
            data: {email: value},
            async: false,
            success: (response) => {
                console.log(response)
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
            error: () => {def.reject(); },
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

            $("#mobile").val("+"+c_code+$(this).val());
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
            $(".dob").attr("required", "required");
            $("#country_residence").attr("required", "required");
            $("#nationality").attr("required", "required");
            $("#occupation").attr("required", "required");
            $("#employer_name").attr("required", "required");    
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
            $(".dob").removeAttr("required");
            $("#country_residence").removeAttr("required");
            $("#nationality").removeAttr("required");
            $("#occupation").removeAttr("required");
            $("#employer_name").removeAttr("required", "required");    
            $("#annual_income").removeAttr("required");
            $(".source_wealth").removeAttr("required");
            $("#source_wealth_other").removeAttr("required"); 

            if($("#type_company").val() == 6){
                $('.company_others_sub').removeClass('d-none');
            }else{
                $('.company_others_sub').addClass('d-none');
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
                $(".dob").attr("required", "required");
                $("#country_residence").attr("required", "required");
                $("#nationality").attr("required", "required");
                $("#occupation").attr("required", "required");
                $("#employer_name").attr("required", "required");    
                $("#annual_income").attr("required", "required");
                $(".source_wealth").attr("required", "required"); 
                
                $(".source_wealth:checked").each(function(){
                    var radioValue =$(this).val();
                    console.log(radioValue)
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
                $(".dob").removeAttr("required");
                $("#country_residence").removeAttr("required");
                $("#nationality").removeAttr("required");
                $("#occupation").removeAttr("required");
                $("#employer_name").removeAttr("required", "required");    
                $("#annual_income").removeAttr("required");
                $(".source_wealth").removeAttr("required");
                $("#source_wealth_other").removeAttr("required"); 

            }
        });

   
        $('#type_company').change(function(){
            if($(this).val() == 6){
                $('.company_others_sub').removeClass('d-none');
            }else{
                $('.company_others_sub').addClass('d-none');
            }
        });

        $('#company_country_corporate').change(function(){
            changeCountry($(this).val());
        });

        $('#country_residence').change(function(){
            changeCountry($(this).val());
        });

        $('#country').change(function(){
            $.ajax({
                url: SITE_URL+'selectBoxStateList?country_id='+$(this).val(),
                type:"GET",
                success: function(data) {
                    var state = data.data;
                    $('#state').empty();
                    for (var key in state) {
                        if (state.hasOwnProperty(key)) {
                            $('#state').append('<option value="'+key+'" >'+state[key]+'</option>');
                        }
                    }
                }
            });

            $('#mobile_prefix').val($(this).val());
        });

        var default_state = "{{ $user->state }}";
        load_state("state", $("#country").val(), default_state);

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

        $('#country').val(country_id).change();
        $('#mobile_prefix').val(country_id);
        $('#nationality').val(country_id);          
    }

    // function saveRegisterForm(){
    //     if ($('#registerForm').parsley().validate('block2')) {
    //         if ($("#registerForm").parsley().isValid()) {

    //             var csrfToken = "";

    //             var form;
    //             let formData = new FormData(form);

    //             var email = $("#email").val();
    //             var otp = $("#users-otp").val();
    //             var secretcode = $("#secretcode").val();

    //             formData.set('email', email);
    //             formData.set('otp', otp);
    //             formData.set('secretcode', secretcode);

    //             axios.post(SITE_URL+'gaotpCheckSignUp',formData,{
    //                     headers: {
    //                         'Content-Type': 'multipart/form-data',
    //                         'X-CSRF-Token': csrfToken}}
    //             ).then(function(response){

    //                 var item =response.data;
    //                 if(item.error == "0"){
    //                     $('#registerForm').submit();
    //                 }else{
    //                     // preloader_off();
    //                     Swal.fire('Sorry!',"OTP code incorrect, please try again.",'error');
    //                 }
    //             })
    //             .catch(function(){
    //                 //preloader_off();
    //                 Swal.fire('Sorry!',"OTP code incorrect, please try again.",'error');
    //             });
    //         }
    //     }
    // }    

</script>
@stop
