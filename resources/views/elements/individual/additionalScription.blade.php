<div class="multisteps-form__content">
    <div class="form-row mt-4">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div id="accordion-3" class="accordion accordion-boxed">
                <div class="card">
                    <div class="card-header" id="headingOne-3">
                        <a href="javscript:void(0)" class="" data-toggle="collapse" data-target="#collapseOne-3" aria-expanded="true" aria-controls="collapseOne-3">
                            <span>SECTION 1 - SUBSCRIPTION</span>
                        </a>
                    </div>
                    <div>
                        <div class="card-body p-5">
                            <div class="row">
                                <div class="col-lg-12">
                                    <label>Fund Subscription *</label>

                                    {!! Form::text('fund_type_desc', $edit ? $fund_type_desc : old('fund_type_desc'), ['id' => 'fund_type_desc', 'class'=>'form-control search-input', 'data-parsley-group'=>"block1", 'readonly']) !!}
                                </div>

                                <div class="col-lg-6 mt-3">
                                    <label>Additional Investment *</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"> <span class="input-group-text" id="basic-addon1">$</span> </div>

                                        {!! Form::text('initial_investment', $edit ? $subscription->initial_investment : old('initial_investment'), ['class'=>'form-control search-input', 'id' => 'initial_investment', 'data-parsley-group'=>"block1", "data-parsley-type"=>"digits", 'required' => 'required', 'data-parsley-min'=> Setting::get('additional_amount'), 'data-parsley-error-message'=>"Minimum additional investment amount is " . Setting::get('additional_amount') . '.00', 'data-parsley-errors-container'=>"#initial_investment_error"]) !!}
                                    </div>
                                    <div id="initial_investment_error"></div>
                                </div>

                                <div class="col-lg-6 mt-3">
                                    <label>Remitting Bank *</label>

                                    {!! Form::text('remittance_bank', $edit ? $subscription->remittance_bank : old('remittance_bank'), ['id' => 'remittance_bank', 'class'=>'form-control search-input', 'data-parsley-group'=>"block1", 'required' => 'required']) !!}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header" id="headingTwo-3">
                        <a href="javscript:void(0)" class="" data-toggle="collapse" data-target="#collapseTwo-3" aria-expanded="false" aria-controls="collapseTwo-3">
                            <span>SECTION 2 - PAYMENT INSTRUCTION FOR DIVIDEND PAYOUTS</span>
                        </a>
                    </div>
                    <div>
                        <div class="card-body p-5">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>Name Of Payee *</label>

                                    {!! Form::text('payee_name', $edit ? $subscription->payee_name : old('payee_name'), ['id' => 'payee_name', 'class'=>'form-control search-input', 'data-parsley-group'=>"block1", "onkeyup"=>"this.value = this.value.toUpperCase();", 'required' => 'required']) !!}
                                </div>

                                <div class="col-lg-6">
                                    <label>Bank Name *</label>

                                    {!! Form::text('bank_name', $edit ? $subscription->bank_name : old('bank_name'), ['id' => 'bank_name', 'class'=>'form-control search-input', 'data-parsley-group'=>"block1", 'required' => 'required']) !!}
                                </div>

                                <div class="col-lg-6 mt-3">
                                    <label>Address Line 1 *</label>

                                    {!! Form::text('address_line_1', $edit ? $subscription->address_line_1 : old('address_line_1'), ['id' => 'address_line_1', 'class'=>'form-control search-input', "placeholder"=>"Address Line 1", 'data-parsley-group'=>"block1", 'required' => 'required']) !!}
                                </div>

                                <div class="col-lg-6 mt-3">
                                    <label>Address Line 2</label>

                                    {!! Form::text('address_line_2', $edit ? $subscription->address_line_2 : old('address_line_2'), ['id' => 'address_line_2', 'class'=>'form-control search-input', "placeholder"=>"Address Line 2", 'data-parsley-group'=>"block1"]) !!}
                                </div>

                                <div class="col-lg-6 mt-3">
                                    <label>Country / Region *</label>

                                    <select name="country_id" id="country_id" class="form-control search-input" data-parsley-group="block1" required>
                                        <option value="">Please select country ...</option>
                                        @foreach ($countries as $country)
                                            @if ($edit)
                                                <option value="{{ $country->id }}" {{ $subscription->country_id == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                                            @else
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endif
                                            
                                        @endforeach
                                    </select>

                                </div>

                                <div class="col-lg-6 mt-3">
                                    <label>State *</label>
                                    <select class="form-control search-input" name="state_id" id="state_id" data-parsley-group="block1" required="required">
                                        <option value="">--</option>
                                    </select>
                                </div>

                                <div class="col-lg-6 mt-3">
                                    <label>City *</label>

                                    {!! Form::text('city', $edit ? $subscription->city : old('city'), ['id' => 'city', 'class'=>'form-control search-input', 'data-parsley-group'=>"block1", 'required' => 'required']) !!}
                                </div>

                                <div class="col-lg-6 mt-3">
                                    <label>Postcode *</label>

                                    {!! Form::text('postcode', $edit ? $subscription->postcode : old('postcode'), ['id' => 'postcode', 'class'=>'form-control search-input', 'data-parsley-group'=>"block1", 'required' => 'required']) !!}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header" id="headingThree-3">
                        <a href="javscript:void(0)" class="" data-toggle="collapse" data-target="#collapseThree-3" aria-expanded="false" aria-controls="collapseThree-3">
                            <span>SECTION 3 - BANK DETAILS</span>
                        </a>
                    </div>
                    <div>
                        <div class="card-body p-5">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>Account Number *</label>

                                    {!! Form::text('account_number', $edit ? $subscription->account_number : old('account_number'), ['id' => 'account_number', 'class'=>'form-control search-input', 'data-parsley-group'=>"block1", 'required' => 'required', "data-parsley-type"=>"digits"]) !!}
                                </div>

                                <div class="col-lg-6">
                                    <label>Account Type *</label>

                                    <?php 
                                        $account_type = ['Saving Account' => 'Saving Account', 'Current Account' => 'Current Account'];
                                    ?>

                                    {!! Form::select('account_type', $account_type, $edit ? $subscription->account_type : old('account_type'), ['placeholder' => 'Please select account type ...', 'class' => 'form-control search-input', 'id' => 'account_type', 'data-parsley-group'=>"block1", 'required' => 'required']) !!}
                                </div>

                                <div class="col-lg-6 mt-3">
                                    <label>SWIFT Code *</label>

                                    {!! Form::text('swift_code', $edit ? $subscription->swift_code : old('swift_code'), ['id' => 'swift_code', 'class'=>'form-control search-input', 'data-parsley-group'=>"block1", 'required' => 'required']) !!}
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header" id="headingFour-4">
                        <a href="javscript:void(0)" class="" data-toggle="collapse" data-target="#collapseFour-4" aria-expanded="false" aria-controls="collapseFour-4">
                            <span>SECTION 4 - BENEFICIARY</span>
                        </a>
                    </div>
                    <div>
                        <div class="card-body p-5">
                            <div class="row">
                                <div class="col-lg-12">In the event of my death,
                                    I designate the following as my BENEFICIARY
                                    1 and BENEFICIARY 2. All amount Capital Sum
                                    including dividend / interest that may be
                                    payable after my death.
                                </div>
                                <div class="col-lg-12 mt-3">
                                    <label>Number of Beneficiaries *</label>

                                    <?php 
                                        $beneficiary_seq = ['1'=> "1","2" => "2"];
                                    ?>

                                    {!! Form::select('beneficiary_seq', $beneficiary_seq, $edit ? $subscription->beneficiary_seq : old('beneficiary_seq'), ['class' => 'form-control search-input', 'id' => 'beneficiary_seq', 'data-parsley-group'=>"block1"]) !!}
                                </div>

                                <div class="col-lg-6 mt-3 bene-amt-1-block beneficiare1" id="bene-amount-1-block">
                                    <label>Beneficiary 1's Amount *</label>
                                    <div class="input-group">

                                        <?php 
                                            if(!empty($subscription['b1_beneficiary_amount'])){
                                                $amount1 = $subscription['b1_beneficiary_amount'];
                                            }else{
                                                
                                                $amount1 = 100;
                                            }
                                        ?>

                                        {!! Form::text('b1_beneficiary_amount', $amount1, ['class'=>'form-control fund-sub-input', 'id' => 'b1_beneficiary_amount', 'data-parsley-group'=>"block1", 'required' => 'required', "data-parsley-type"=>"digits", "data-parsley-beneficiary1"=>"100", 'readonly', 'data-parsley-trigger'=>"focusout", 'data-parsley-min'=>"0", 'data-parsley-max'=>"100"]) !!}

                                        <div class="input-group-append">  
                                            <span class="input-group-text" id="basic-addon2">%</span> 
                                        </div>

                                    </div>
                                </div>

                                <div class="col-lg-6 mt-3 bene-amt-2-block beneficiare2" id="bene-amount-2-block">
                                    <label>Beneficiary 2'nd Amount *</label>
                                    <div class="input-group">

                                        <?php 
                                            if(!empty($subscription['b2_beneficiary_amount'])){
                                                $amount2 = $subscription['b2_beneficiary_amount'];
                                            }else{
                                                
                                                $amount2 = 0;
                                            }
                                        ?>

                                        {!! Form::text('b2_beneficiary_amount', $amount2, ['class'=>'form-control fund-sub-input', 'id' => 'b2_beneficiary_amount', 'data-parsley-group'=>"block1", "data-parsley-type"=>"digits", 'readonly']) !!}

                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2">%</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bene-first-block beneficiare1" id="bene-first-block-id">
                                <div class="row">
                                    <div class="col-lg-12 mt-4">
                                        <h4 class="heading-h4"> Name Of Beneficiary 1 </h4>
                                    </div>
                                    <div class="col-lg-6 mt-3">
                                        <label>Name (As Per NRIC/Passport) *</label>

                                        {!! Form::text('b1_name', $edit ? $subscription->b1_name : old('b1_name'), ['class'=>'form-control search-input', 'id' => 'b1_name', 'data-parsley-group'=>"block1", 'required' => 'required']) !!}
                                    </div>

                                    <div class="col-lg-6 mt-3">
                                        <label id="beneficiares1_passport_label">NRIC / Passport No.*</label>

                                        {!! Form::text('b1_nric_passport', $edit ? $subscription->b1_nric_passport : old('b1_nric_passport'), ['class'=>'form-control search-input', 'id' => 'b1_nric_passport', 'data-parsley-group'=>"block1", 'required' => 'required']) !!}
                                    </div>

                                    <div class="col-lg-6 mt-3">
                                        <label>Email *</label>

                                        {!! Form::email('b1_email', $edit ? $subscription->b1_email : old('b1_email'), ['class'=>'form-control search-input', 'id' => 'b1_email', 'data-parsley-group'=>"block1", 'required' => 'required']) !!}
                                    </div>

                                    <div class="col-lg-6 mt-3">
                                        <label>Date of Birth *</label>
                                        <div class="input-group">

                                            {!! Form::date('b1_dob', $edit ? $subscription->b1_dob : old('b1_dob'), ['class'=>'form-control search-input', 'id' => 'b1_dob', 'data-parsley-group'=>"block1", 'data-parsley-errors-container'=>"#b1_dob_error", 'required' => 'required']) !!}
                                        </div>

                                        <div id="b1_dob_error"></div>
                                    </div>

                                    <div class="col-lg-6 mt-3">
                                        <label>Mobile No Prefix *</label>
                                        <div class="w-100">

                                            {!! Form::select('b1_mobile_prefix', $phone_prefix, $edit ? $subscription->b1_mobile_prefix : old('b1_mobile_prefix'), ['placeholder' => 'Please select ...', 'class' => 'form-control search-input', 'id'=>'b1_mobile_prefix', "data-parsley-group"=>"block1", "required"=>"required"]) !!}
                                        </div>
                                    </div>

                                    <div class="col-lg-6 mt-3">
                                        <label>Mobile No. *</label>
                                        <div class="w-100">

                                            {!! Form::text('b1_mobile_number', $edit ? $subscription->b1_mobile_number : old('b1_mobile_number'), ['class'=>'form-control search-input w-100', 'id' => 'b1_mobile_number', 'data-parsley-group'=>"block1", 'required' => 'required', "data-parsley-type"=>"digits"]) !!}
                                        </div>
                                    </div>

                                    <div class="col-lg-6 mt-3">
                                        <label>Relationship to applicant *</label>

                                        {!! Form::text('b1_relationship', $edit ? $subscription->b1_relationship : old('b1_relationship'), ['class'=>'form-control search-input', 'id' => 'b1_relationship', 'data-parsley-group'=>"block1", 'required' => 'required']) !!}
                                    </div>

                                    <div class="col-lg-6 mt-3">
                                        <label>Occupation *</label>

                                        {!! Form::text('b1_occupation', $edit ? $subscription->b1_occupation : old('b1_occupation'), ['class'=>'form-control search-input', 'id' => 'b1_occupation', 'data-parsley-group'=>"block1", 'required' => 'required']) !!}
                                    </div>

                                    <div class="col-lg-6 mt-3">
                                        <label>Country / Region Of Residence *</label>

                                        <select name="b1_residence_id" id="b1_residence_id" class="form-control search-input" data-parsley-group="block1" required>
                                            <option value="">Please select country ...</option>
                                            @foreach ($countries as $country)
                                                @if ($edit)
                                                    <option value="{{ $country->id }}" {{ $subscription->b1_residence_id == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                                                @else
                                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endif
                                                
                                            @endforeach
                                        </select>

                                    </div>

                                    <div class="col-lg-6 mt-3">
                                        <label>Nationality *</label>

                                        <select name="b1_nationality_id" id="b1_nationality_id" class="form-control search-input" data-parsley-group="block1" required>
                                            <option value="">Please select nationality ...</option>
                                            @foreach ($countries as $country)
                                                @if ($edit)
                                                    <option value="{{ $country->id }}" {{ $subscription->b1_nationality_id == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                                                @else
                                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endif
                                                
                                            @endforeach
                                        </select>
                                        
                                    </div>

                                    <div class="col-lg-6 mt-3">
                                        <label>Address Line 1</label>

                                        {!! Form::text('b1_address_line_1', $edit ? $subscription->b1_address_line_1 : old('b1_address_line_1'), ['class'=>'form-control search-input', 'id' => 'b1_address_line_1', 'data-parsley-group'=>"block1", 'required' => 'required']) !!}
                                    </div>

                                    <div class="col-lg-6 mt-3">
                                        <label>Address Line 2</label>

                                        {!! Form::text('b1_address_line_2', $edit ? $subscription->b1_address_line_2 : old('b1_address_line_2'), ['class'=>'form-control search-input', 'id' => 'b1_address_line_2', 'data-parsley-group'=>"block1"]) !!}
                                    </div>

                                    <div class="col-lg-6 mt-3">
                                        <label>Country / Region *</label>

                                        <select name="b1_country_id" id="b1_country_id" class="form-control search-input" data-parsley-group="block1" required>
                                            <option value="">Please select country ...</option>
                                            @foreach ($countries as $country)
                                                @if ($edit)
                                                    <option value="{{ $country->id }}" {{ $subscription->b1_country_id == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                                                @else
                                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endif
                                                
                                            @endforeach
                                        </select>

                                    </div>

                                    <div class="col-lg-6 mt-3">
                                        <label>State *</label>

                                        <select class="form-control search-input" name="b1_state_id" id="b1_state_id" data-parsley-group="block1" required="required">
                                            <option value="">--</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-6 mt-3">
                                        <label>City *</label>

                                        {!! Form::text('b1_city', $edit ? $subscription->b1_city : old('b1_city'), ['class'=>'form-control search-input', 'id' => 'b1_city', 'data-parsley-group'=>"block1", 'required' => 'required']) !!}
                                    </div>

                                    <div class="col-lg-6 mt-3">
                                        <label>Postcode *</label>

                                        {!! Form::text('b1_postcode', $edit ? $subscription->b1_postcode : old('b1_postcode'), ['class'=>'form-control search-input', 'id' => 'b1_postcode', 'data-parsley-group'=>"block1", 'required' => 'required']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="bene-second-block beneficiare2" id="bene-second-block-id">
                                <div class="row">
                                    <div class="col-lg-12 mt-4">
                                        <h4 class="heading-h4"> Name Of Beneficiary 2 </h4>
                                    </div>
                                    <div class="col-lg-6 mt-3">
                                        <label>Name (As Per NRIC/Passport) *</label>

                                        {!! Form::text('b2_name', $edit ? $subscription->b2_name : old('b2_name'), ['class'=>'form-control search-input', 'id' => 'b2_name', 'data-parsley-group'=>"block1", 'required' => 'required']) !!}
                                    </div>

                                    <div class="col-lg-6 mt-3">
                                        <label id="beneficiares2_passport_label">NRIC / Passport No. *</label>

                                        {!! Form::text('b2_nric_passport', $edit ? $subscription->b2_nric_passport : old('b2_nric_passport'), ['class'=>'form-control search-input', 'id' => 'b2_nric_passport', 'data-parsley-group'=>"block1", 'required' => 'required']) !!}
                                    </div>

                                    <div class="col-lg-6 mt-3">
                                        <label>Email *</label>

                                        {!! Form::email('b2_email', $edit ? $subscription->b2_email : old('b2_email'), ['class'=>'form-control search-input', 'id' => 'b2_email', 'data-parsley-group'=>"block1", 'required' => 'required']) !!}
                                    </div>

                                    <div class="col-lg-6 mt-3">
                                        <label>Date of Birth *</label>
                                        <div class="input-group">
                                            
                                            {!! Form::date('b2_dob', $edit ? $subscription->b2_dob : old('b2_dob'), ['class'=>'form-control search-input', 'id' => 'b2_dob', 'data-parsley-group'=>"block1", 'data-parsley-errors-container'=>"#b2_dob_error", 'required' => 'required']) !!}
                                        </div>

                                        <div id="b2_dob_error"></div>
                                    </div>

                                    <div class="col-lg-6 mt-3">
                                        <label>Mobile No Prefix *</label>
                                        <div class="w-100">

                                            {!! Form::select('b2_mobile_prefix', $phone_prefix, $edit ? $subscription->b2_mobile_prefix : old('b2_mobile_prefix'), ['placeholder' => 'Please select ...', 'class' => 'form-control search-input', 'id'=>'b2_mobile_prefix', "data-parsley-group"=>"block1", "required"=>"required"]) !!}
                                        </div>
                                    </div>

                                    <div class="col-lg-6 mt-3">
                                        <label>Mobile No *</label>
                                        <div class="w-100">

                                            {!! Form::text('b2_mobile_number', $edit ? $subscription->b2_mobile_number : old('b2_mobile_number'), ['class'=>'form-control search-input w-100', 'id' => 'b2_mobile_number', 'data-parsley-group'=>"block1", 'required' => 'required', "data-parsley-type"=>"digits"]) !!}
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6 mt-3">
                                        <label>Relationship *</label>

                                        {!! Form::text('b2_relationship', $edit ? $subscription->b2_relationship : old('b2_relationship'), ['class'=>'form-control search-input', 'id' => 'b2_relationship', 'data-parsley-group'=>"block1", 'required' => 'required']) !!}
                                    </div>

                                    <div class="col-lg-6 mt-3">
                                        <label>Occupation *</label>

                                        {!! Form::text('b2_occupation', $edit ? $subscription->b2_occupation : old('b2_occupation'), ['class'=>'form-control search-input', 'id' => 'b2_occupation', 'data-parsley-group'=>"block1", 'required' => 'required']) !!}
                                    </div>

                                    <div class="col-lg-6 mt-3">
                                        <label>Country / Region Of Residence *</label>
                                        
                                        <select name="b2_residence_id" id="b2_residence_id" class="form-control search-input" data-parsley-group="block1" required>
                                            <option value="">Please select country ...</option>
                                            @foreach ($countries as $country)
                                                @if ($edit)
                                                    <option value="{{ $country->id }}" {{ $subscription->b2_residence_id == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                                                @else
                                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endif
                                                
                                            @endforeach
                                        </select>

                                    </div>

                                    <div class="col-lg-6 mt-3">
                                        <label>Nationality *</label>

                                        <select name="b2_nationality_id" id="b2_nationality_id" class="form-control search-input" data-parsley-group="block1" required>
                                            <option value="">Please select nationality ...</option>
                                            @foreach ($countries as $country)
                                                @if ($edit)
                                                    <option value="{{ $country->id }}" {{ $subscription->b2_nationality_id == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                                                @else
                                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endif
                                                
                                            @endforeach
                                        </select>

                                    </div>

                                    <div class="col-lg-6 mt-3">
                                        <label>Address Line 1 *</label>
                                        
                                        {!! Form::text('b2_address_line_1', $edit ? $subscription->b2_address_line_1 : old('b2_address_line_1'), ['class'=>'form-control search-input', 'id' => 'b2_address_line_1', 'data-parsley-group'=>"block1", 'required' => 'required']) !!}
                                    </div>

                                    <div class="col-lg-6 mt-3">
                                        <label>Address Line 2</label>
                                        
                                        {!! Form::text('b2_address_line_2', $edit ? $subscription->b2_address_line_2 : old('b2_address_line_2'), ['class'=>'form-control search-input', 'id' => 'b2_address_line_2', 'data-parsley-group'=>"block1"]) !!}
                                    </div>

                                    <div class="col-lg-6 mt-3">
                                        <label>Country / Region *</label>
                                        
                                        <select name="b2_country_id" id="b2_country_id" class="form-control search-input" data-parsley-group="block1" required>
                                            <option value="">Please select country ...</option>
                                            @foreach ($countries as $country)
                                                @if ($edit)
                                                    <option value="{{ $country->id }}" {{ $subscription->b2_country_id == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                                                @else
                                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endif
                                                
                                            @endforeach
                                        </select>

                                    </div>

                                    <div class="col-lg-6 mt-3">
                                        <label>State *</label>

                                        <select class="form-control search-input" name="b2_state_id" id="b2_state_id" data-parsley-group="block1" required="required">
                                            <option value="">--</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-6 mt-3">
                                        <label>City *</label>

                                        {!! Form::text('b2_city', $edit ? $subscription->b2_city : old('b2_city'), ['class'=>'form-control search-input', 'id' => 'b2_city', 'data-parsley-group'=>"block1", 'required' => 'required']) !!}
                                    </div>

                                    <div class="col-lg-6 mt-3">
                                        <label>Postcode *</label>
                                        
                                        {!! Form::text('b2_postcode', $edit ? $subscription->b2_postcode : old('b2_postcode'), ['class'=>'form-control search-input', 'id' => 'b2_postcode', 'data-parsley-group'=>"block1", 'required' => 'required']) !!}
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="card">
                    <div class="card-header" id="headingFive-5">
                        <a href="javscript:void(0)" class="" data-toggle="collapse" data-target="#collapseFive-5" aria-expanded="false" aria-controls="collapseFive-5">
                            <span>SECTION 5 - JOINT APPLICANT</span>
                        </a>
                    </div>
                    <div>
                        <div class="card-body p-5">
                            <div class="row">
                                <div class="col-lg-12 mt-3">
                                    <label>Is this a joint application? *</label>

                                    <input type="hidden" name="is_joint_applicant" value="{{ $edit ? $subscription->is_joint_applicant : old('is_joint_applicant') }}">

                                    <?php 
                                        $is_joint_applicant = [0=> 'No',1=> 'Yes'];
                                    ?>

                                    @if ($subscription->is_joint_applicant == 1)

                                        {!! Form::select('is_joint_applicant', $is_joint_applicant, $edit ? $subscription->is_joint_applicant : old('is_joint_applicant'), ['class' => 'form-control search-input', 'id' => 'is_joint_applicant', 'data-parsley-group'=>"block1"]) !!}

                                    @else

                                        {!! Form::text('is_joint_applicant', 'No', ['class'=>'form-control search-input', 'id' => 'is_joint_applicant', 'readonly', 'data-parsley-group'=>"block1"]) !!}

                                    @endif
                                    
                                </div>
                            </div>

                            <div class="mt-3 joint-applicant-blocks" id="joint_applicants_div">
                                <div class="row">
                                    <div class="col-lg-6 mt-3">
                                        <label>Salutation *</label>
                                        
                                        <?php 
                                            $salutation = ['Mr.'=> 'Mr','Mrs.'=> 'Mrs','Ms.'=> 'Ms','Dr.'=> 'Dr','Prof.'=> 'Prof','Assoc. Prof.'=> 'Assoc. Prof','Dato.'=> 'Dato', "Dato Sri."=>"Dato Sri","Datin."=>"Datin", "Datuk."=>"Datuk","Datuk Seri."=>"Datuk Seri", "Haji."=>"Haji","Hajjah."=>"Hajjah","Puteri."=>"Puteri","Puan Sri."=>"Puan Sri","Raja."=>"Raja","Tan Sri."=>"Tan Sri","Tengku."=>"Tengku","Tun."=>"Tun","Tun Poh."=>"Tun Poh", 'Tunku.'=>'Tunku'];
                                        ?>

                                        {!! Form::select('ja_salutation', $salutation, $edit ? $subscription->ja_salutation : old('ja_salutation'), ['class' => 'form-control search-input', 'id' => 'ja_salutation', 'data-parsley-group'=>"block1"]) !!}
                                    </div>

                                    <div class="col-lg-6 mt-3">
                                        <label>Name (As Per NRIC/Passport)</label>

                                        {!! Form::text('ja_name', $edit ? $subscription->ja_name : old('ja_name'), ['class'=>'form-control search-input', 'id' => 'ja_name', 'data-parsley-group'=>"block1", "onkeyup"=>"this.value = this.value.toUpperCase();"]) !!}
                                    </div>

                                    <div class="col-lg-6 mt-3">
                                        <label id="joint_passport_label">NRIC / Passport No.</label>

                                        {!! Form::text('ja_nric_passport', $edit ? $subscription->ja_nric_passport : old('ja_nric_passport'), ['class'=>'form-control search-input', 'id' => 'ja_nric_passport', 'data-parsley-group'=>"block1"]) !!}
                                    </div>

                                    <div class="col-lg-6 mt-3">
                                        <label>Email</label>
                                        {!! Form::email('ja_email', $edit ? $subscription->ja_email : old('ja_email'), ['class'=>'form-control search-input', 'id' => 'ja_email', 'data-parsley-group'=>"block1"]) !!}
                                    </div>

                                    <div class="col-lg-6 mt-3">
                                        <label>Mobile No Prefix *</label>
                                        <div class="w-100">

                                            {!! Form::select('ja_mobileprefix', $phone_prefix, $edit ? $subscription->ja_mobileprefix : old('ja_mobileprefix'), ['placeholder' => 'Please select ...', 'class' => 'form-control search-input w-100', 'id'=>'ja_mobileprefix', "data-parsley-group"=>"block1"]) !!}
                                        </div>
                                    </div>

                                    <div class="col-lg-6 mt-3">
                                        <label>Mobile No.</label>
                                        <div class="w-100">

                                            {!! Form::text('ja_mobile_no', $edit ? $subscription->ja_mobile_no : old('ja_mobile_no'), ['class' => 'form-control search-input w-100', 'id'=>'ja_mobile_no', "data-parsley-group"=>"block1", "data-parsley-type"=>"digits"]) !!}
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6 mt-3">
                                        <label>Date of Birth</label>
                                        <div class="input-group">

                                            {!! Form::date('ja_dob', $edit ? $subscription->ja_dob : old('ja_dob'), ['class'=>'form-control search-input', 'id' => 'ja_dob', 'data-parsley-errors-container'=>"#ja_dob_error", 'data-parsley-group'=>"block1"]) !!}
                                        </div>

                                        <div id="ja_dob_error"></div>
                                    </div>

                                    <div class="col-lg-6 mt-3">
                                        <label>Gender</label>
                                        
                                        <?php 
                                            $gender = ['Male'=>'Male', 'Female'=>'Female'];
                                        ?>

                                        {!! Form::select('ja_gender', $gender, $edit ? $subscription->ja_gender : old('ja_gender'), ['class' => 'form-control search-input', 'id'=>'ja_gender', "data-parsley-group"=>"block1"]) !!}
                                    </div>

                                    <div class="col-lg-6 mt-3">
                                        <label>Relationship</label>
                                        
                                        {!! Form::text('ja_relationship', $edit ? $subscription->ja_relationship : old('ja_relationship'), ['class' => 'form-control search-input', 'id'=>'ja_relationship', "data-parsley-group"=>"block1"]) !!}
                                    </div>

                                    <div class="col-lg-6 mt-3">
                                        <label>Occupation</label>
                                        
                                        {!! Form::text('ja_occupation', $edit ? $subscription->ja_occupation : old('ja_occupation'), ['class' => 'form-control search-input', 'id'=>'ja_occupation', "data-parsley-group"=>"block1"]) !!}
                                    </div>

                                    <div class="col-lg-6 mt-3">
                                        <label>Country / Region of Residence</label>
                                        
                                        <select name="ja_country_residence" id="ja_country_residence" class="form-control search-input" data-parsley-group="block1">
                                            <option value="">Please select country ...</option>
                                            @foreach ($countries as $country)
                                                @if ($edit)
                                                    <option value="{{ $country->id }}" {{ $subscription->ja_country_residence == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                                                @else
                                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endif
                                                
                                            @endforeach
                                        </select>

                                    </div>

                                    <div class="col-lg-6 mt-3">
                                        <label>Nationality</label>
                                        
                                        <select name="ja_nationality_id" id="ja_nationality_id" class="form-control search-input" data-parsley-group="block1">
                                            <option value="">Please select nationality ...</option>
                                            @foreach ($countries as $country)
                                                @if ($edit)
                                                    <option value="{{ $country->id }}" {{ $subscription->ja_nationality_id == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                                                @else
                                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endif
                                                
                                            @endforeach
                                        </select>

                                    </div>

                                    <div class="col-lg-6 mt-3">
                                        <label>Address Line 1</label>

                                        {!! Form::text('ja_addr_line_1', $edit ? $subscription->ja_addr_line_1 : old('ja_addr_line_1'), ['class' => 'form-control search-input', 'id'=>'ja_addr_line_1', "data-parsley-group"=>"block1"]) !!}
                                    </div>

                                    <div class="col-lg-6 mt-3">
                                        <label>Address Line 2</label>

                                        {!! Form::text('ja_addr_line_2', $edit ? $subscription->ja_addr_line_2 : old('ja_addr_line_2'), ['class' => 'form-control search-input', 'id'=>'ja_addr_line_2', "data-parsley-group"=>"block1"]) !!}
                                    </div>

                                    <div class="col-lg-6 mt-3">
                                        <label>Country / Region</label>

                                        <select name="ja_country_id" id="ja_country_id" class="form-control search-input" data-parsley-group="block1">
                                            <option value="">Please select country ...</option>
                                            @foreach ($countries as $country)
                                                @if ($edit)
                                                    <option value="{{ $country->id }}" {{ $subscription->ja_country_id == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                                                @else
                                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endif
                                                
                                            @endforeach
                                        </select>

                                    </div>

                                    <div class="col-lg-6 mt-3">
                                        <label>State</label>
                                        
                                        <select class="form-control search-input" name="ja_state_id" id="ja_state_id" data-parsley-group="block1">
                                            <option value="">--</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-6 mt-3">
                                        <label>City</label>

                                        {!! Form::text('ja_city', $edit ? $subscription->ja_city : old('ja_city'), ['class' => 'form-control search-input', 'id'=>'ja_city', "data-parsley-group"=>"block1"]) !!}
                                    </div>

                                    <div class="col-lg-6 mt-3">
                                        <label>Postcode</label>
                                        
                                        {!! Form::text('ja_postcode', $edit ? $subscription->ja_postcode : old('ja_postcode'), ['class' => 'form-control search-input', 'id'=>'ja_postcode', "data-parsley-group"=>"block1"]) !!}
                                    </div>

                                    <div class="col-lg-6 mt-3">
                                        <label>Employer Name / Name of Business</label>
                                        
                                        {!! Form::text('ja_employer_name', $edit ? $subscription->ja_employer_name : old('ja_employer_name'), ['class' => 'form-control search-input', 'id'=>'ja_employer_name', "data-parsley-group"=>"block1"]) !!}
                                    </div>

                                    <div class="col-lg-6 mt-3">
                                        <label>Annual Income </label>
                                        <?php 
                                            $annual_income = ['< USD 20,000'=> '< USD 20,000', "USD 20,000 – USD 60,000" => "USD 20,000 – USD 60,000", "USD 60,001 – USD 120,000" => "USD 60,001 – USD 120,000", "USD 120,001 – USD 180,000" =>"USD 120,001 – USD 180,000", "USD 180,001 – USD 240,000" => "USD 180,001 – USD 240,000", "Above USD 240,000" =>"Above USD 240,000"];
                                        ?>

                                        {!! Form::select('ja_annual_income', $annual_income, $edit ? $subscription->ja_annual_income : old('ja_annual_income'), ['placeholder' => 'Please select ...', 'class' => 'form-control search-input', 'id'=>'ja_annual_income', "data-parsley-group"=>"block1"]) !!}

                                    </div>

                                    <?php
                                        $sw_option = $edit ? explode(', ', $subscription->ja_source_wealth) : '';
                                    ?>

                                    <div class="col-lg-12 mt-3">
                                        <label>Source of Wealth </label>

                                        <div class=" mt-2 string-check string-check-soft-info  mb-2">
                                            <input type="checkbox" name="ja_source_wealth[]" value="Personal Saving / Salary" {{ (is_array($sw_option) and in_array('Personal Saving / Salary', $sw_option)) ? ' checked' : '' }} id="ja_source_wealth" data-parsley-group="block1" data-parsley-errors-container="#source_wealthError" class="ja_source_wealth" data-parsley-multiple="ja_source_wealth">
                                            <label class="string-check-label">  <span class="ml-2">Personal Saving / Salary</span>   </label>
                                        </div>
                                        <div class=" mt-2 string-check string-check-soft-info  mb-2">
                                            <input type="checkbox" name="ja_source_wealth[]" value="Business Income" {{ (is_array($sw_option) and in_array('Business Income', $sw_option)) ? ' checked' : '' }} id="ja_source_wealth" data-parsley-group="block1" data-parsley-errors-container="#source_wealthError" class="ja_source_wealth" data-parsley-multiple="ja_source_wealth">
                                            <label class="string-check-label"> <span class="ml-2">Business Income </span> </label>
                                        </div>
                                        <div
                                            class=" mt-2 string-check string-check-soft-info  mb-2">
                                            <input type="checkbox" name="ja_source_wealth[]" value="Dividends from other entry" {{ (is_array($sw_option) and in_array('Dividends from other entry', $sw_option)) ? ' checked' : '' }} id="ja_source_wealth" data-parsley-group="block1" data-parsley-errors-container="#source_wealthError" class="ja_source_wealth" data-parsley-multiple="ja_source_wealth">
                                            <label class="string-check-label"> <span class="ml-2">Dividends from other entry </span> </label>
                                        </div>
                                        <div
                                            class=" mt-2 string-check string-check-soft-info  mb-2">
                                            <input type="checkbox" name="ja_source_wealth[]" value="Benefits of transactions due to me all of which are known to me" {{ (is_array($sw_option) and in_array('Benefits of transactions due to me all of which are known to me', $sw_option)) ? ' checked' : '' }} id="ja_source_wealth" data-parsley-group="block1" data-parsley-errors-container="#source_wealthError" class="ja_source_wealth" data-parsley-multiple="ja_source_wealth">
                                            <label class="string-check-label"> <span class="ml-2">Benefits of transactions due to me all of which are known to me </span>  </label>
                                        </div>
                                        <div class=" mt-2 string-check string-check-soft-info  mb-2">
                                            <input type="checkbox" name="ja_source_wealth[]" value="Other" {{ (is_array($sw_option) and in_array('Other', $sw_option)) ? ' checked' : '' }} id="ja_source_wealth" data-parsley-group="block1" data-parsley-errors-container="#source_wealthError" class="ja_source_wealth" data-parsley-multiple="ja_source_wealth">
                                            <label class="string-check-label"> <span class="ml-2">Others (please provide  details)  </span>  </label>
                                        </div>

                                        <div id="source_wealthError"></div>
                                    </div>

                                    <div class="col-lg-6 mt-3 source_wealth_other">
                                        
                                        {!! Form::text('ja_source_wealth_other', $edit ? $subscription->ja_source_wealth_other : old('ja_source_wealth_other'), ['class' => 'form-control search-input', 'id'=>'ja_source_wealth_other', "data-parsley-group"=>"block1"]) !!}
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="card">
                    <div class="card-header" id="headingSix-6">
                        <a href="javscript:void(0)" class="" data-toggle="collapse" data-target="#collapseSix-6" aria-expanded="false" aria-controls="collapseSix-6">
                            <span>SECTION 6 - CRS</span>
                        </a>
                    </div>
                    <div>
                        <div class="card-body p-5">
                            <div class="row">

                                <div class="col-lg-12">
                                    <div class="string-check string-check-soft-info mb-2">

                                        <input type="checkbox" name="is_same_address" value="1" {{ @$subscription->is_same_address == '1' ? 'checked' : '' }} id="is_same_address" format="before input label between after error" data-parsley-group="block1" data-parsley-multiple="is_same_address">
                                        <label class="string-check-label"><span class="ml-2">Same as current address</span></label>
                                    </div>
                                </div>

                                <div class="col-lg-6 mt-3">
                                    <label>Address Line 1</label>

                                    {!! Form::text('tr_addr_line_1', $edit ? $subscription->tr_addr_line_1 : old('tr_addr_line_1'), ['class' => 'form-control search-input', 'id'=>'tr_addr_line_1', 'data-parsley-group'=>"block1", 'required'=>'required']) !!}
                                </div>

                                <div class="col-lg-6 mt-3">
                                    <label>Address Line 2</label>
                                    {!! Form::text('tr_addr_line_2', $edit ? $subscription->tr_addr_line_2 : old('tr_addr_line_2'), ['class' => 'form-control search-input', 'id'=>'tr_addr_line_2', 'data-parsley-group'=>"block1"]) !!}
                                </div>

                                <div class="col-lg-6 mt-3">
                                    <label>Country / Region</label>

                                    <select name="tr_country_id" id="tr_country_id" class="form-control search-input" data-parsley-group="block1" required>
                                        <option value="">Please select country ...</option>
                                        @foreach ($countries as $country)
                                            @if ($edit)
                                                <option value="{{ $country->id }}" {{ $subscription->tr_country_id == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                                            @else
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endif
                                            
                                        @endforeach
                                    </select>

                                </div>

                                <div class="col-lg-6 mt-3">
                                    <label>State</label>
                                    
                                    <select class="form-control search-input" name="tr_state_id" id="tr_state_id" data-parsley-group="block1" required>
                                        <option value="">--</option>
                                    </select>
                                </div>

                                <div class="col-lg-6 mt-3">
                                    <label>City</label>
                                    {!! Form::text('tr_city', $edit ? $subscription->tr_city : old('tr_city'), ['class' => 'form-control search-input', 'id'=>'tr_city', 'data-parsley-group'=>"block1", 'required'=>'required']) !!}
                                </div>

                                <div class="col-lg-6 mt-3">
                                    <label>Postcode</label>
                                    {!! Form::text('tr_postcode', $edit ? $subscription->tr_postcode : old('tr_postcode'), ['class' => 'form-control search-input', 'id'=>'tr_postcode', 'data-parsley-group'=>"block1", 'required'=>'required']) !!}
                                </div>

                            </div>

                            <div class="row mt-3">
                                <div class="col-lg-12">
                                    <div class="widget-9">
                                        <div class="widget-9-list">
                                            <div class="widget-9-items">
                                                <i class="widget-9-option-5"></i>
                                                <div class="widget-9-desc">
                                                    <div class="widget-9-title">Jurisdiction(s) of Residences for Tax Purpose and Related Tax Identification Number or equivalent number ("TIN") <a href="{{ asset('assets/images/sampleImages/CRS-01_Appendix.pdf') }}" target="_blank" class="skyblue-color">See Appendix.</a> </div>
                                                </div>
                                            </div>
                                            <div class="widget-9-items">
                                                <i class="widget-9-option-2"></i>
                                                <div class="widget-9-desc">
                                                    <a href="#" class="widget-9-title">Please complete the following table indicating (i) where the Account Holder is tax resident and (ii) the Account Holder’s TIN for each country/jurisdiction indicated.</a>
                                                </div>
                                            </div>
                                            <div class="widget-9-items">
                                                <i class="widget-9-option-3"></i>
                                                <div class="widget-9-desc">
                                                    <a href="#" class="widget-9-title">If the Account Holder is tax resident in more than three countries please use a separate sheet</a>
                                                </div>
                                            </div>
                                            <div class="widget-9-items">
                                                <i class="widget-9-option-4"></i>
                                                <div class="widget-9-desc">
                                                    <a href="#" class="widget-9-title">If a TIN is unavailable please provide the appropriate reason A,B or C where indicated below:</a>
                                                </div>
                                            </div>
                                            <div class="widget-9-items">
                                                <i class="widget-9-option-1"></i>
                                                <div class="widget-9-desc">
                                                    <a href="#" class="widget-9-title">Reason A – The country/jurisdiction where the Account Holder is liable to pay tax does not issue TINs to its residents</a>
                                                </div>
                                            </div>
                                            <div class="widget-9-items">
                                                <i class="widget-9-option-2"></i>
                                                <div class="widget-9-desc">
                                                    <a href="#" class="widget-9-title">Reason B – The Account Holder is otherwise unable to obtin a TIN or equivalent number (Please explain why you are unable to obtain a TIN in the below table if you have selected this reason)</a>
                                                </div>
                                            </div>
                                            <div class="widget-9-items">
                                                <i class="widget-9-option-3"></i>
                                                <div class="widget-9-desc">
                                                    <a href="#" class="widget-9-title">Reason C – No TIN is required. (Note. Only select this reason if the authorities of the country/jurisdiction of tax residence entered below do not require the TIN to be disclosed)</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">

                                <div class="col-lg-6">
                                    <label>Country or Region / Jurisdiction of Tax Residence 1</label>

                                    <select name="td1_country_id" id="td1_country_id" class="form-control search-input" data-parsley-group="block1" required>
                                        <option value="">Please select country ...</option>
                                        @foreach ($countries as $country)
                                            @if ($edit)
                                                <option value="{{ $country->id }}" {{ $subscription->td1_country_id == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                                            @else
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endif
                                            
                                        @endforeach
                                    </select>

                                </div>

                                <div class="col-lg-6">
                                    <label class="invisible">others</label>

                                    {!! Form::text('td1_tax_number', $edit ? $subscription->td1_tax_number : old('td1_tax_number'), ['placeholder' => 'TIN', 'class' => 'form-control search-input', 'id'=>'td1_tax_number', 'data-parsley-group'=>"block1", 'required']) !!}
                                </div>

                                <div class="col-lg-12 mt-3">

                                    <?php 
                                        $tax_reason_type = [1 =>'Reason A', 2 =>'Reason B', 3 =>'Reason C'];
                                    ?>

                                    {!! Form::select('td1_tax_reason_type', $tax_reason_type, $edit ? $subscription->td1_tax_reason_type : old('td1_tax_reason_type'), ['class' => 'form-control select2', 'id'=>'td1_tax_reason_type', 'placeholder' => 'If no TIN available enter Reason A, B or C', "data-parsley-group"=>"block1"]) !!}
                                </div>

                                <div class="col-lg-12 mt-3">
                                    <div class="myCountry1-reasons tax_details1" id="myCountry1-reason-b">
                                        <textarea name="td1_tax_reason" id="td1_tax_reason" class="form-control search-input" data-parsley-group="block1" placeholder="Please explain in the following boxes why you are unable to obtain a TIN if you selected Reason B above." maxlength="150" rows="5">{{ $edit ? $subscription->td1_tax_reason : old('td1_tax_reason') }}</textarea>
                                    </div>
                                </div>

                            </div>

                            <div class="row mt-3">
                                <div class="col-lg-6">
                                    <label>Country or Region / Jurisdiction of Tax Residence 2</label>
                                    
                                    <select name="td2_country_id" id="td2_country_id" class="form-control search-input" data-parsley-group="block1">
                                        <option value="">Please select country ...</option>
                                        @foreach ($countries as $country)
                                            @if ($edit)
                                                <option value="{{ $country->id }}" {{ $subscription->td2_country_id == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                                            @else
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endif
                                            
                                        @endforeach
                                    </select>

                                </div>

                                <div class="col-lg-6">
                                    <label class="invisible">others</label>

                                    {!! Form::text('td2_tax_number', $edit ? $subscription->td2_tax_number : old('td2_tax_number'), ['placeholder' => 'TIN', 'class' => 'form-control search-input', 'id'=>'td2_tax_number', 'data-parsley-group'=>"block1"]) !!}
                                </div>

                                <div class="col-lg-12 mt-3">

                                    <?php 
                                        $tax_reason_type = [1 =>'Reason A', 2 =>'Reason B', 3 =>'Reason C'];
                                    ?>

                                    {!! Form::select('td2_tax_reason_type', $tax_reason_type, $edit ? $subscription->td2_tax_reason_type : old('td2_tax_reason_type'), ['class' => 'form-control select2', 'id'=>'td2_tax_reason_type', 'placeholder' => 'If no TIN available enter Reason A, B or C', "data-parsley-group"=>"block1"]) !!}
                                </div>

                                <div class="col-lg-12 mt-3">
                                    <div class="myCountry2-reasons tax_details2" id="myCountry2-reason-b">
                                        <textarea name="td2_tax_reason" id="td2_tax_reason" class="form-control search-input" data-parsley-group="block1" placeholder="Please explain in the following boxes why you are unable to obtain a TIN if you selected Reason B above." maxlength="150"  rows="5">{{ $edit ? $subscription->td2_tax_reason : old('td2_tax_reason') }}</textarea>
                                    </div>
                                </div>

                            </div>

                            <div class="row mt-3">
                                <div class="col-lg-6">
                                    <label>Country or Region / Jurisdiction of Tax Residence 3</label>
                                    
                                    <select name="td3_country_id" id="td3_country_id" class="form-control search-input" data-parsley-group="block1">
                                        <option value="">Please select country ...</option>
                                        @foreach ($countries as $country)
                                            @if ($edit)
                                                <option value="{{ $country->id }}" {{ $subscription->td3_country_id == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                                            @else
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endif
                                            
                                        @endforeach
                                    </select>

                                </div>

                                <div class="col-lg-6">
                                    <label class="invisible">others</label>

                                    {!! Form::text('td3_tax_number', $edit ? $subscription->td3_tax_number : old('td3_tax_number'), ['placeholder' => 'TIN', 'class' => 'form-control search-input', 'id'=>'td3_tax_number', 'data-parsley-group'=>"block1"]) !!}
                                </div>

                                <div class="col-lg-12 mt-3">

                                    <?php 
                                        $tax_reason_type = [1 =>'Reason A', 2 =>'Reason B', 3 =>'Reason C'];
                                    ?>

                                    {!! Form::select('td3_tax_reason_type', $tax_reason_type, $edit ? $subscription->td3_tax_reason_type : old('td3_tax_reason_type'), ['class' => 'form-control select2', 'id'=>'td3_tax_reason_type', 'placeholder' => 'If no TIN available enter Reason A, B or C', "data-parsley-group"=>"block1"]) !!}
                                </div>

                                <div class="col-lg-12 mt-3">
                                    <div class="myCountry3-reasons tax_details3" id="myCountry3-reason-b">
                                        <textarea name="td3_tax_reason" id="td3_tax_reason" class="form-control search-input" data-parsley-group="block1" placeholder="Please explain in the following boxes why you are unable to obtain a TIN if you selected Reason B above." maxlength="150"  rows="5">{{ $edit ? $subscription->td3_tax_reason : old('td3_tax_reason') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body p-5" id="joint_applicants_crs_div">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4 class="heading-h4"> Joint Account CRS </h4>
                                </div>

                                <div class="col-lg-12">
                                    <div class="string-check string-check-soft-info mb-2">

                                        <input type="checkbox" name="ja_is_same_address" value="1" {{ @$subscription->ja_is_same_address == '1' ? 'checked' : '' }} id="ja_is_same_address" format="before input label between after error" data-parsley-group="block1" data-parsley-multiple="ja_is_same_address">
                                        <label class="string-check-label"><span class="ml-2">Same as current address</span></label>
                                    </div>
                                </div>

                                <div class="col-lg-6 mt-3">
                                    <label>Address Line 1</label>

                                    {!! Form::text('jatr_addr_line_1', $edit ? $subscription->jatr_addr_line_1 : old('jatr_addr_line_1'), ['class' => 'form-control search-input', 'id'=>'jatr_addr_line_1', 'data-parsley-group'=>"block1", 'required'=>'required']) !!}
                                </div>

                                <div class="col-lg-6 mt-3">
                                    <label>Address Line 2</label>
                                    {!! Form::text('jatr_addr_line_2', $edit ? $subscription->jatr_addr_line_2 : old('jatr_addr_line_2'), ['class' => 'form-control search-input', 'id'=>'jatr_addr_line_2', 'data-parsley-group'=>"block1"]) !!}
                                </div>

                                <div class="col-lg-6 mt-3">
                                    <label>Country / Region</label>

                                    <select name="jatr_country_id" id="jatr_country_id" class="form-control search-input" data-parsley-group="block1" required>
                                        <option value="">Please select country ...</option>
                                        @foreach ($countries as $country)
                                            @if ($edit)
                                                <option value="{{ $country->id }}" {{ $subscription->jatr_country_id == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                                            @else
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endif
                                            
                                        @endforeach
                                    </select>

                                </div>

                                <div class="col-lg-6 mt-3">
                                    <label>State</label>
                                    
                                    <select class="form-control search-input" name="jatr_state_id" id="jatr_state_id" data-parsley-group="block1" required>
                                        <option value="">--</option>
                                    </select>
                                </div>

                                <div class="col-lg-6 mt-3">
                                    <label>City</label>
                                    {!! Form::text('jatr_city', $edit ? $subscription->jatr_city : old('jatr_city'), ['class' => 'form-control search-input', 'id'=>'jatr_city', 'data-parsley-group'=>"block1", 'required'=>'required']) !!}
                                </div>

                                <div class="col-lg-6 mt-3">
                                    <label>Postcode</label>
                                    {!! Form::text('jatr_postcode', $edit ? $subscription->jatr_postcode : old('jatr_postcode'), ['class' => 'form-control search-input', 'id'=>'jatr_postcode', 'data-parsley-group'=>"block1", 'required'=>'required']) !!}
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-lg-12">
                                    <div class="widget-9">
                                        <div class="widget-9-list">
                                            <div class="widget-9-items">
                                                <i class="widget-9-option-5"></i>
                                                <div class="widget-9-desc">
                                                    <div class="widget-9-title">Jurisdiction(s) of Residences for Tax Purpose and Related Tax Identification Number or equivalent number ("TIN") <a href="{{ asset('assets/images/sampleImages/CRS-01_Appendix.pdf') }}" target="_blank" class="skyblue-color">See Appendix.</a> </div>
                                                </div>
                                            </div>
                                            <div class="widget-9-items">
                                                <i class="widget-9-option-2"></i>
                                                <div class="widget-9-desc">
                                                    <a href="#" class="widget-9-title">Please complete the following table indicating (i) where the Account Holder is tax resident and (ii) the Account Holder’s TIN for each country/jurisdiction indicated.</a>
                                                </div>
                                            </div>
                                            <div class="widget-9-items">
                                                <i class="widget-9-option-3"></i>
                                                <div class="widget-9-desc">
                                                    <a href="#" class="widget-9-title">If the Account Holder is tax resident in more than three countries please use a separate sheet</a>
                                                </div>
                                            </div>
                                            <div class="widget-9-items">
                                                <i class="widget-9-option-4"></i>
                                                <div class="widget-9-desc">
                                                    <a href="#" class="widget-9-title">If a TIN is unavailable please provide the appropriate reason A,B or C where indicated below:</a>
                                                </div>
                                            </div>
                                            <div class="widget-9-items">
                                                <i class="widget-9-option-1"></i>
                                                <div class="widget-9-desc">
                                                    <a href="#" class="widget-9-title">Reason A – The country/jurisdiction where the Account Holder is liable to pay tax does not issue TINs to its residents</a>
                                                </div>
                                            </div>
                                            <div class="widget-9-items">
                                                <i class="widget-9-option-2"></i>
                                                <div class="widget-9-desc">
                                                    <a href="#" class="widget-9-title">Reason B – The Account Holder is otherwise unable to obtin a TIN or equivalent number (Please explain why you are unable to obtain a TIN in the below table if you have selected this reason)</a>
                                                </div>
                                            </div>
                                            <div class="widget-9-items">
                                                <i class="widget-9-option-3"></i>
                                                <div class="widget-9-desc">
                                                    <a href="#" class="widget-9-title">Reason C – No TIN is required. (Note. Only select this reason if the authorities of the country/jurisdiction of tax residence entered below do not require the TIN to be disclosed)</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">

                                <div class="col-lg-6">
                                    <label>Country or Region / Jurisdiction of Tax Residence 1</label>

                                    <select name="jatd1_country_id" id="jatd1_country_id" class="form-control search-input" data-parsley-group="block1" data-parsley-errors-container=".errorJatd1_country_id">
                                        <option value="">Please select country ...</option>
                                        @foreach ($countries as $country)
                                            @if ($edit)
                                                <option value="{{ $country->id }}" {{ $subscription->jatd1_country_id == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                                            @else
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endif
                                            
                                        @endforeach
                                    </select>

                                    <span class="errorJatd1_country_id p-1"></span>
                                </div>

                                <div class="col-lg-6">
                                    <label class="invisible">others</label>

                                    {!! Form::text('jatd1_tax_number', $edit ? $subscription->jatd1_tax_number : old('jatd1_tax_number'), ['placeholder' => 'TIN', 'class' => 'form-control search-input', 'id'=>'jatd1_tax_number', 'data-parsley-group'=>"block1", 'data-parsley-errors-container'=>".errorJatd1_tax_number"]) !!}

                                    <span class="errorJatd1_tax_number p-1"></span>
                                </div>

                                <div class="col-lg-12 mt-3">

                                    <?php 
                                        $tax_reason_type = [1 =>'Reason A', 2 =>'Reason B', 3 =>'Reason C'];
                                    ?>

                                    {!! Form::select('jatd1_tax_reason_type', $tax_reason_type, $edit ? $subscription->jatd1_tax_reason_type : old('jatd1_tax_reason_type'), ['class' => 'form-control select2', 'id'=>'jatd1_tax_reason_type', 'placeholder' => 'If no TIN available enter Reason A, B or C', "data-parsley-group"=>"block1"]) !!}
                                </div>

                                <div class="col-lg-12 mt-3">
                                    <div class="myCountry1-reasons ja_tax_details1" id="myCountry1-reason-b">
                                        <textarea name="jatd1_tax_reason" id="jatd1_tax_reason" class="form-control search-input" data-parsley-group="block1" placeholder="Please explain in the following boxes why you are unable to obtain a TIN if you selected Reason B above." maxlength="150" rows="5">{{ $edit ? $subscription->jatd1_tax_reason : old('jatd1_tax_reason') }}</textarea>
                                    </div>
                                </div>

                            </div>

                            <div class="row mt-3">
                                <div class="col-lg-6">
                                    <label>Country or Region / Jurisdiction of Tax Residence 2</label>
                                    
                                    <select name="jatd2_country_id" id="jatd2_country_id" class="form-control search-input" data-parsley-group="block1">
                                        <option value="">Please select country ...</option>
                                        @foreach ($countries as $country)
                                            @if ($edit)
                                                <option value="{{ $country->id }}" {{ $subscription->jatd2_country_id == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                                            @else
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endif
                                            
                                        @endforeach
                                    </select>

                                </div>

                                <div class="col-lg-6">
                                    <label class="invisible">others</label>

                                    {!! Form::text('jatd2_tax_number', $edit ? $subscription->jatd2_tax_number : old('jatd2_tax_number'), ['placeholder' => 'TIN', 'class' => 'form-control search-input', 'id'=>'jatd2_tax_number', 'data-parsley-group'=>"block1"]) !!}
                                </div>

                                <div class="col-lg-12 mt-3">

                                    <?php 
                                        $tax_reason_type = [1 =>'Reason A', 2 =>'Reason B', 3 =>'Reason C'];
                                    ?>

                                    {!! Form::select('jatd2_tax_reason_type', $tax_reason_type, $edit ? $subscription->jatd2_tax_reason_type : old('jatd2_tax_reason_type'), ['class' => 'form-control select2', 'id'=>'jatd2_tax_reason_type', 'placeholder' => 'If no TIN available enter Reason A, B or C', "data-parsley-group"=>"block1"]) !!}
                                </div>

                                <div class="col-lg-12 mt-3">
                                    <div class="myCountry2-reasons ja_tax_details2" id="myCountry2-reason-b">
                                        <textarea name="jatd2_tax_reason" id="jatd2_tax_reason" class="form-control search-input" data-parsley-group="block1" placeholder="Please explain in the following boxes why you are unable to obtain a TIN if you selected Reason B above." maxlength="150"  rows="5">{{ $edit ? $subscription->jatd2_tax_reason : old('jatd2_tax_reason') }}</textarea>
                                    </div>
                                </div>

                            </div>

                            <div class="row mt-3">
                                <div class="col-lg-6">
                                    <label>Country or Region / Jurisdiction of Tax Residence 3</label>
                                    
                                    <select name="jatd3_country_id" id="jatd3_country_id" class="form-control search-input" data-parsley-group="block1">
                                        <option value="">Please select country ...</option>
                                        @foreach ($countries as $country)
                                            @if ($edit)
                                                <option value="{{ $country->id }}" {{ $subscription->jatd3_country_id == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                                            @else
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endif
                                            
                                        @endforeach
                                    </select>
                                    
                                </div>

                                <div class="col-lg-6">
                                    <label class="invisible">others</label>

                                    {!! Form::text('jatd3_tax_number', $edit ? $subscription->jatd3_tax_number : old('jatd3_tax_number'), ['placeholder' => 'TIN', 'class' => 'form-control search-input', 'id'=>'jatd3_tax_number', 'data-parsley-group'=>"block1"]) !!}
                                </div>

                                <div class="col-lg-12 mt-3">

                                    <?php 
                                        $tax_reason_type = [1 =>'Reason A', 2 =>'Reason B', 3 =>'Reason C'];
                                    ?>

                                    {!! Form::select('jatd3_tax_reason_type', $tax_reason_type, $edit ? $subscription->jatd3_tax_reason_type : old('jatd3_tax_reason_type'), ['class' => 'form-control select2', 'id'=>'jatd3_tax_reason_type', 'placeholder' => 'If no TIN available enter Reason A, B or C', "data-parsley-group"=>"block1"]) !!}
                                </div>

                                <div class="col-lg-12 mt-3">
                                    <div class="myCountry3-reasons ja_tax_details3" id="myCountry3-reason-b">
                                        <textarea name="jatd3_tax_reason" id="jatd3_tax_reason" class="form-control search-input" data-parsley-group="block1" placeholder="Please explain in the following boxes why you are unable to obtain a TIN if you selected Reason B above." maxlength="150"  rows="5">{{ $edit ? $subscription->jatd3_tax_reason : old('jatd3_tax_reason') }}</textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header" id="headingSeven-7">
                        <a href="javscript:void(0)" class="" data-toggle="collapse" data-target="#collapseSeven-7" aria-expanded="false" aria-controls="collapseSeven-7">
                            <span>SECTION 7 - FATCA</span>
                        </a>
                    </div>
                    <div>
                        <div class="card-body p-5">
                            <div class="row">
                                <div class="col-lg-12">
                                    <label>Foreign Account Tax Compliance Act (“FATCA”) – Individual Self Certification Identifying Residency and source of income for Tax Purposes</label>
                                </div>
                                <div class="col-lg-12 mt-3">
                                    <label>Are you a U.S. citizen or a U.S. Resident including a green card holder ?</label>

                                    <?php 
                                        $fat_is_green_card_holder = ['0'=>'No'];
                                    ?>

                                    {!! Form::select('fat_is_green_card_holder', $fat_is_green_card_holder, $edit ? $subscription->fat_is_green_card_holder : old('fat_is_green_card_holder'), ['class' => 'form-control search-input', 'id'=>'fat_is_green_card_holder', "data-parsley-group"=>"block1"]) !!}

                                </div>
                            </div><br>

                            <div class="row" id="joint_applicants_fatca_div">
                                <div class="col-lg-12 mt-3">

                                    <h3>JOINT ACCOUNT</h3><br>
                                    <label>Foreign Account Tax Compliance Act (“FATCA”) – Individual Self Certification Identifying Residency and source of income for Tax Purposes</label>
                                </div>
                                <div class="col-lg-12 mt-3">
                                    <label>Are you a U.S. citizen or a U.S. Resident including a green card holder ?</label>

                                    <?php 
                                        $jafat_is_green_card_holder = ['0'=>'No'];
                                    ?>

                                    {!! Form::select('jafat_is_green_card_holder', $jafat_is_green_card_holder, $edit ? $subscription->jafat_is_green_card_holder : old('jafat_is_green_card_holder'), ['class' => 'form-control search-input', 'id'=>'jafat_is_green_card_holder', "data-parsley-group"=>"block1"]) !!}
                                    
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <div class="button-row d-flex mt-4">
        <button class="btn btn-info ml-auto js-btn-next" type="button" title="Next"
        onclick="scrollToTop()">Next</button>
    </div>
</div>