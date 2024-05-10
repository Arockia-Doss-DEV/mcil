
{{-- $photo_passport = {{ asset('img/supporting-docs-samples/passport_upload_ic.png') }}
$photo_address = {{ asset('img/supporting-docs-samples/utility_upload_ic.png') }}
$photo_ic = {{ asset('img/supporting-docs-samples/nric_front_upload_ic.png') }} --}}

<div class="multisteps-form__content">

    <div class="row">
        <div class="col-lg-12">
            <h5>Supporting Documents</h5><br>
            <span class="text-danger">Note: Maximum upload file size: 5MB. Supported file type: PDF, JPEG and PNG</span><br><br>
        </div> 

        <div class="col-lg-6 mt-2">
            <div class="col-lg-12">
                <h5>Company Certificate*</h5>
            </div>
            <div class="col-lg-12 mt-2">
                <input type="file" class="dropify" id="attachment_type11" attr-attachment-type="11" attr-remarks="Company Certificate" data-height="300" data-default-file="{{ asset('img/supporting-docs-samples/passport_upload_ic.png') }}" data-max-file-size="5M" data-allowed-file-extensions="pdf png jpg jpeg" data-parsley-errors-container="#attachment_type11-errors" data-remove-required="0" data-parsley-group="block3" required />
            </div>
            <div id="attachment_type11-errors"></div>
            <div class="col-lg-12">
                <div class="note-full"><img src="{{ asset('assets/images/icons/info-icon.png') }}" alt="info-icon" /> <a href="{{ asset('img/supporting-docs-samples/company_certificate.png') }}" target="_blank">See Sample</a></div>
            </div>
        </div>

        <div class="col-lg-6 mt-2">
            <div class="col-lg-12">
                <h5>Letters of Authorized Signatory*</h5>
            </div>
            <div class="col-lg-12 mt-2">
                <input type="file" class="dropify" id="attachment_type12" attr-attachment-type="12" attr-remarks="Letters of Authorized Signatory" data-height="300" data-default-file="{{ asset('img/supporting-docs-samples/nric_front_upload_ic.png') }}" data-max-file-size="5M" data-allowed-file-extensions="pdf png jpg jpeg" data-parsley-errors-container="#attachment_type12-errors" data-remove-required="0" data-parsley-group="block3" required />
            </div>
            <div id="attachment_type12-errors"></div>
            <div class="col-lg-12">
                <div class="note-full"><img src="{{ asset('assets/images/icons/info-icon.png') }}" alt="info-icon" /> <a href="{{ asset('img/supporting-docs-samples/authorized_signatory.png') }}" target="_blank">See Sample</a></div>
            </div>
        </div>

        <div class="col-lg-6 mt-2">
            <div class="col-lg-12">
                <h5>Board of Directors Agreement Letter*</h5>
            </div>
            <div class="col-lg-12 mt-2">
                <input type="file" class="dropify" id="attachment_type13" attr-attachment-type="13" attr-remarks="Board of Directors Agreement Letter" data-height="300" data-default-file="{{ asset('img/supporting-docs-samples/utility_upload_ic.png') }}" data-max-file-size="5M" data-allowed-file-extensions="pdf png jpg jpeg" data-parsley-errors-container="#attachment_type13-errors" data-remove-required="0" data-parsley-group="block3" required />
            </div>
            <div id="attachment_type13-errors"></div>
            <div class="col-lg-12">
                <div class="note-full"><img src="{{ asset('assets/images/icons/info-icon.png') }}" alt="info-icon" /> <a href="{{ asset('img/supporting-docs-samples/directors_agreement.png') }}" target="_blank">See Sample</a></div>
            </div>
        </div>

    </div> <br><br>

    <div class="row">
        <div class="col-lg-6">
            <label>Authorized Person Name 1 *</label>
            {!! Form::text('position_name1', $edit ? $subscription->position_name1 : old('position_name1'), ['id' => 'position_name1', 'class'=>'form-control search-input', 'data-parsley-group'=>"block3", 'required' => 'required']) !!}
        </div>
        <div class="col-lg-6">
            <label>Authorized Person Name 2*</label>
            {!! Form::text('position_name2', $edit ? $subscription->position_name2 : old('position_name2'), ['id' => 'position_name2', 'class'=>'form-control search-input', 'data-parsley-group'=>"block3", 'required' => 'required']) !!}
        </div>
        <div class="col-lg-6 mt-3">
            <label>Position*</label>
            {!! Form::text('position1', $edit ? $subscription->position1 : old('position1'), ['id' => 'position1', 'class'=>'form-control search-input', 'data-parsley-group'=>"block3", 'required' => 'required']) !!}
        </div>
        <div class="col-lg-6 mt-3">
            <label>Position*</label>
            {!! Form::text('position2', $edit ? $subscription->position2 : old('position2'), ['id' => 'position2', 'class'=>'form-control search-input', 'data-parsley-group'=>"block3"]) !!}
        </div>
    </div> <br>

    
    <div class="row">
        <div class="button-row d-flex mt-4 col-12">
            <button class="btn btn-info js-btn-prev" type="button" title="Prev"
            onclick="scrollToTop()">Back</button>
            <button class="btn btn-info ml-auto js-btn-next" type="button" title="Next"
            onclick="scrollToTop()">Next</button>
        </div>
    </div>

</div>
