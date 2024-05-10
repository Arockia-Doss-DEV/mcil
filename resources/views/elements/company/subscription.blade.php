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

                                    {!! Form::select('fund_type', $fund_types, $edit ? $subscription->fund_type : old('fund_type'), ['placeholder' => 'Please select fund ...', 'class' => 'form-control fund-sub-input', 'id' => 'fund_type', 'data-parsley-group'=>"block1", 'required' => 'required']) !!}
                                </div>

                                <div class="col-lg-6 mt-3">
                                    <label>Initial Investment *</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend"> <span class="input-group-text" id="basic-addon1">$</span> </div>

                                        {!! Form::text('initial_investment', $edit ? $subscription->initial_investment : old('initial_investment'), ['class'=>'form-control search-input', 'id' => 'initial_investment', 'data-parsley-group'=>"block1", "data-parsley-type"=>"digits", 'required' => 'required', 'data-parsley-min'=> Setting::get('initial_amount'), 'data-parsley-error-message'=>"Minimum initial investment amount is " . Setting::get('initial_amount') . '.00', 'data-parsley-errors-container'=>"#initial_investment_error"]) !!}
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

                                    <?php
                                        if($edit){
                                            $name = $subscription->payee_name;
                                        }else{
                                            $name = "";
                                            if(auth()->user()) {
                                                $name = auth()->user()->first_name. auth()->user()->last_name;
                                            }   
                                        }
                                    ?>

                                    {!! Form::text('payee_name', $name, ['id' => 'payee_name', 'class'=>'form-control search-input', 'data-parsley-group'=>"block1", "onkeyup"=>"this.value = this.value.toUpperCase();", 'required' => 'required']) !!}
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
                    <div class="card-header" id="headingSix-6">
                        <a href="javscript:void(0)" class="" data-toggle="collapse" data-target="#collapseSix-6" aria-expanded="false" aria-controls="collapseSix-6">
                            <span>SECTION 4 - CRS</span>
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

                    </div>
                </div>


                <div class="card">
                    <div class="card-header" id="headingSeven-7">
                        <a href="javscript:void(0)" class="" data-toggle="collapse" data-target="#collapsedSeven-7" aria-expanded="false" aria-controls="collapsedSeven-7">
                            <span>SECTION 5 - FATCA</span>
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
                            
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <div class="button-row d-flex mt-4">
        <button class="btn btn-warning ml-auto mr-2" type="button" title="Save Draft"
        onclick="savedAndDaft();">Save Draft</button>
        <button class="btn btn-info js-btn-next" type="button" title="Next"
        onclick="scrollToTop()">Next</button>
    </div>
</div>