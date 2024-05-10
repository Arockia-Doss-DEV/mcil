<div class="multisteps-form__content">
    <div class="row">
        <div class="col-lg-6">
            <h5>Review Info</h5>
            <div class="my-4"><button class="btn btn-info w-100" id="reviewDoc">Review Uploaded Documents</button></div>
            <div class="my-3">
                <button type="button" target="_blank" class="btn btn-secondary bg-white w-100 application-btn download_signed_application">
                    <img src="{{ asset('assets/images/icons/download-icon.png') }}" class="mr-1" alt="download icon" /> Download Application Form
                </button>
            </div>
            <input type="hidden" name="review_signed_application" id="input_review_signed_application" value="0">
        </div>

        {{-- @if (@$userData->company->company_country_corporate !== 129) --}}

        <div class="col-lg-6">
            <h5 class="mb-4">Upload Signed Application*</h5>
            <input type="file" name="signeddoc_file" class="dropify" required="required" data-parsley-group="block4"/>
        </div>

        {{-- @endif --}}
        
        <div class="col-lg-12 mt-3">
            <div class="my-2 string-check string-check-soft-info">

                <?php

                    $name = "";
                    if(auth()->user()) {
                        $name = auth()->user()->first_name . auth()->user()->last_name;
                    }
                ?>

                <input type="checkbox" name="accept" value="1" id="accept" required="required" data-parsley-group="block4" data-parsley-multiple="accept">
                <label class="string-check-label">
                    <span class="ml-2">I {{ $name }} hereby declare, accept and acknowledge the information provided is true and accurate.</span>
                </label>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="login-img">
                <img src="{{ asset('assets/images/icons/verification-icon.png') }}" alt="logo" />
            </div>
        </div>
        <div class="col-lg-12">
            <div class="text-center mt-4">
                <h4 class="font-weight-bold">Verification</h4>

                @if ($userData['2fa_status'] == 1)

                    <h6 class="mt-3">Please Enter 2FA Authenticator OTP</h6>
                    <div class="row mt-4">
                        <div class="col-12 col-lg-4 m-auto pb-4">
                            {!! Form::text('otp', null, ['id'=> "users-otp", 'class'=>'form-control fund-sub-input', "required"=>"required", "data-parsley-group"=>"block4", 'data-parsley-errors-container'=>"#users_otp-errors", "data-parsley-type"=>"digits", "maxlength"=>"6", "pattern"=>"\d{6}"]) !!}
                        </div>
                    </div>

                @else

                    <h6 class="mt-3">{{ Auth()->user()->first_name . Auth()->user()->last_name }} 's OTP has been sent to SMS + {{ $userData['mobile_no'] }}</h6>
                    
                    <div class="row mt-4">
                        <div class="col-12 col-lg-4 m-auto pb-4">
                            {!! Form::text('otp', null, ['id'=> "users-otp", 'class'=>'form-control fund-sub-input', "required"=>"required", "data-parsley-group"=>"block4", 'data-parsley-errors-container'=>"#users_otp-errors", "data-parsley-type"=>"digits", "maxlength"=>"6", "pattern"=>"\d{6}"]) !!}
                        </div>
                    </div>

                    <div class="button-row">
                        <button class="btn btn-info" type="button" title="Re-send OTP" onclick="registerOTP();">Re-send OTP</button>
                    </div>

                @endif

            </div>
        </div>
    </div>
    <div class="button-row d-flex mt-4">
        <button class="btn btn-info js-btn-prev" type="button" title="Prev">Back</button>
        <button class="btn btn-info finitsh-btn ml-auto" type="button" title="Submit" onclick="saveScubscription();">Finish</button>
    </div>
</div>