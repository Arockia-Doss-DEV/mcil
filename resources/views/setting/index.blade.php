@extends('layouts.app')

@section('title', 'Master Settings')

@section('styles')

@stop

@section('content')

<div class="container-fluid page-body-wrapper">

    @include("admin.elements.sidebar")

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="d-flex justify-content-between">
                <div class="pageheader">
                    <h4>MASTER SETTINGS</h4>
                </div>
            </div>
            <div class="row mt-3 pb-5">
                <div class="col-lg-12 card-margin">
                    <div class="card">

                    {{ Form::open(['url' => '/update/settings', 'files' => true, 'id'=>'settingForm', 'data-parsley-validate' => 'data-parsley-validate', "data-parsley-trigger"=>"keyup", 'autocomlete'=>"off"]) }}

                        <div class="card-body">
                            <div class="row">

                                <div class="col-lg-7 mt-3">
                                    <label>Site Name <span class="mandatory">*</span></label>
                                    {!! Form::text('site_name', Setting::get('site_name', ''), ['id' => 'site_name', 'class'=>'form-control search-input', 'data-parsley-group'=>"block1", 'required' => 'required']) !!}
                                </div>

                                 <div class="col-lg-5 mt-3">
                                    <label>Site Short Name <span class="mandatory">*</span></label>

                                    {!! Form::text('site_name_short', Setting::get('site_name_short', ''), ['id' => 'site_name_short', 'div'=>false, 'class'=>'form-control search-input', 'data-parsley-group'=>"block1", "required"=>"required"]) !!}
                                </div>

                                <div class="col-lg-6 mt-3">
                                    <label>Email From Name <span class="mandatory">*</span></label>
                                    <div class="w-100">

                                    {!! Form::text('email_from_name', Setting::get('email_from_name', ''), ['id' => 'email_from_name', 'div'=>false, 'class'=>'form-control search-input', 'data-parsley-group'=>"block1", "required"=>"required"]) !!}
                                    </div>
                                </div>
                                
                                
                                <div class="col-lg-6 mt-3">
                                    <label>Email From Address <span class="mandatory">*</span></label>
                                    {!! Form::email('email_from_address', Setting::get('email_from_address', ''), ['id' => 'email_from_address', 'class'=>'form-control search-input', 'data-parsley-group'=>"block1", "required"=>"required"]) !!}
                                </div>
                                
                                <div class="col-lg-3 mt-3">
                                    <label>Initial Investment Amount <span class="mandatory">*</span></label>
                                    {!! Form::text('initial_amount', Setting::get('initial_amount', ''), ['id' => 'initial_amount', 'class'=>'form-control search-input', 'data-parsley-group'=>"block1", "required"=>"required", "data-parsley-type"=>"digits"]) !!}
                                </div>
                                <div class="col-lg-3 mt-3">
                                    <label>Additional Investment Amount <span class="mandatory">*</span></label>
                                    {!! Form::text('additional_amount', Setting::get('additional_amount', ''), ['id' => 'additional_amount', 'class'=>'form-control search-input', 'data-parsley-group'=>"block1", "required"=>"required", "data-parsley-type"=>"digits"]) !!}
                                </div>

                                <div class="col-lg-3 mt-3">
                                    <label>Service Charges <span class="mandatory">*</span></label>
                                    {!! Form::text('service_charge', Setting::get('service_charge', ''), ['id' => 'service_charge', 'class'=>'form-control search-input', 'data-parsley-group'=>"block1", "required"=>"required", "data-parsley-type"=>"digits"]) !!}
                                </div>
                                <div class="col-lg-3 mt-3">
                                    <label>Bank Charges <span class="mandatory">*</span></label>
                                    {!! Form::text('bank_charge', Setting::get('bank_charge', ''), ['id' => 'bank_charge', 'class'=>'form-control search-input', 'data-parsley-group'=>"block1", "required"=>"required", "data-parsley-type"=>"digits"]) !!}
                                </div>

                                <div class="col-lg-12 mt-3">
                                    <label>Mail Status <span class="mandatory">*</span></label>
                                    <div class=" mt-2 string-check string-check-soft-info  mb-2">
                                        <input type="radio" name="send_mail_conf" value="1" {{ Setting::get('send_mail_conf') == 1 ? 'checked' : '' }}>
                                        <label class="string-check-label"> 
                                            <span class="ml-2"> Active </span> 
                                        </label>
                                    </div>

                                    <div class=" mt-2 string-check string-check-soft-info  mb-2">
                                        <input type="radio" name="send_mail_conf" value="0" {{ Setting::get('send_mail_conf') == 0 ? 'checked' : '' }}>
                                        <label class="string-check-label"> 
                                            <span class="ml-2"> In-Active</span> 
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-12 mt-3">
                                    <label>SMS Status <span class="mandatory">*</span></label>
                                    <div class=" mt-2 string-check string-check-soft-info  mb-2">
                                        <input type="radio" name="send_sms_conf" value="1" {{ Setting::get('send_sms_conf') == 1 ? 'checked' : '' }}>
                                        <label class="string-check-label"> 
                                            <span class="ml-2"> Active</span> 
                                        </label>
                                    </div>

                                    <div class=" mt-2 string-check string-check-soft-info  mb-2">
                                        <input type="radio" name="send_sms_conf" value="0" {{ Setting::get('send_sms_conf') == 0 ? 'checked' : '' }}>
                                        <label class="string-check-label"> 
                                            <span class="ml-2"> In-Active</span> 
                                        </label>
                                    </div>

                                </div>

                            </div>
                            <div class="row mt-3">
                                <div class="col-lg-12">
                                    <h5 class="font-weight-bold mb-3"> Authenticator App Information :</h5>
                                </div>
                                <div class="col-lg-12">
                                    <label>Link (Android)
                                        <span class="mandatory">*</span>
                                    </label>
                                    {!! Form::text('android_authenticator_link', Setting::get('android_authenticator_link', ''), ['class'=>'form-control search-input', 'id'=>'android_authenticator_link', 'data-parsley-type'=>"url", 'data-parsley-group'=>"block1", "required"=>"required", 'data-parsley-trigger'=>"focusout"]) !!}
                                </div>

                                <div class="col-lg-12 mt-3">
                                    <label>Link (Apple)
                                        <span class="mandatory">*</span>
                                    </label>
                                    {!! Form::text('apple_authenticator_link', Setting::get('apple_authenticator_link', ''), ['class'=>'form-control search-input', 'id'=>'apple_authenticator_link', 'data-parsley-type'=>"url", 'data-parsley-group'=>"block1", "required"=>"required", 'data-parsley-trigger'=>"focusout"]) !!}
                                </div>
                            
                            </div>

                            <div class="row mt-3">
                                <div class="col-lg-12">
                                    <h5 class="font-weight-bold mb-3"> Others :</h5>
                                </div>
                                <div class="col-lg-12">

                                    <label><a href="{{ url('/clear-cache') }}" class="btn btn-soft-success mr-1"> Clear App Cache</a> </label> <br>
                                    <label><a href="{{ url('/clear-otp') }}" class="btn btn-soft-success mr-1"> Clear Expired OTP History</a> </label> <br>
                                    <label><a href="{{ url('/clear-notifications') }}" class="btn btn-soft-success mr-1"> Clear All Notifications</a> </label>

                                </div>
                            
                            </div>

                            <div class="text-right mt-3">
                                <input type="submit" class="btn btn-info" id="updateSetting" value="Update" />
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

<script type="text/javascript">

</script>

@stop
