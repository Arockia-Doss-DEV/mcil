
{{-- $photo_passport = {{ asset('img/supporting-docs-samples/passport_upload_ic.png') }}
$photo_address = {{ asset('img/supporting-docs-samples/utility_upload_ic.png') }}
$photo_ic = {{ asset('img/supporting-docs-samples/nric_front_upload_ic.png') }} --}}

<input type="hidden" name="user_nationality_id" id="user_nationality_id" value="<?= @$user->individual->nationality; ?>">

<div class="multisteps-form__content">

    @if(@$user->individual->nationality == 129)

        <div class="row">
            <div class="col-lg-12">
                <h5>Supporting Documents</h5><br>
            </div>

            <div class="col-lg-6 mt-2">

                <div class="col-lg-12">
                    <h5>Passport 1st page of Principal Applicant*</h5>
                </div>
                <div class="col-lg-12 mt-2">
                    <input type="file" class="dropify" id="attachment_type1" attr-attachment-type="1" attr-remarks="Passport 1st page of Principal Applicant" data-height="300" data-default-file="{{ asset('img/supporting-docs-samples/passport_upload_ic.png') }}" data-max-file-size="5M" data-allowed-file-extensions="pdf png jpg jpeg" data-parsley-errors-container="#attachment_type1-errors" data-remove-required="0" data-parsley-group="block3" />
                </div>

                <div id="attachment_type1-errors"></div>

            </div>

            <div class="col-lg-6 mt-2">

                <div class="col-lg-12">
                    <h5>IC of Principal Applicant *</h5>
                </div>
                <div class="col-lg-12 mt-2">
                    <input type="file" class="dropify" id="attachment_type2" attr-attachment-type="2" attr-remarks="IC of Principal Applicant" data-height="300" data-default-file="{{ asset('img/supporting-docs-samples/nric_front_upload_ic.png') }}" data-max-file-size="5M" data-allowed-file-extensions="pdf png jpg jpeg" data-parsley-errors-container="#attachment_type2-errors" data-remove-required="0" data-parsley-group="block3" />
                </div>

                <div id="attachment_type2-errors"></div>
                
            </div>

            <div class="col-lg-12">
                <div class="note-full"><img src="{{ asset('assets/images/icons/info-icon.png') }}" alt="info-icon" /><span class="note">Note: </span>Maximum upload file size:5MB. Supported file type: PDF, JPEG and PNG</div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-lg-12">
                <h5>Proof of Address (ie. Utility bill, Bank Statements)</h5>
            </div>
            <div class="col-lg-12 mt-2">
                <input type="file" class="dropify" id="attachment_type3" attr-attachment-type="3" attr-remarks="Proof of Address (ie. Utility bill, Bank Statements)" data-height="300" data-default-file="{{ asset('img/supporting-docs-samples/utility_upload_ic.png') }}" data-max-file-size="5M" data-allowed-file-extensions="pdf png jpg jpeg" data-parsley-errors-container="#attachment_type3-errors" data-remove-required="0" data-parsley-group="block3" />
            </div>

            <div id="attachment_type3-errors"></div>

            <div class="col-lg-12">
                <div class="note-full"><img src="{{ asset('assets/images/icons/info-icon.png') }}" alt="info-icon" /><span class="note">Note: </span>Latest bill not more than 3 months from current date <a href="{{ asset('img/supporting-docs-samples/sample-proofaddress.jpg') }}" target="_blank">See Sample</a></div>
            </div>
        </div>

    @else

        <div class="row">
            <div class="col-lg-12">
                <h5>Supporting Documents</h5><br>
            </div>

            <div class="col-lg-6 mt-2">
                <div class="col-lg-12">
                    <h5>Passport 1st page of Principal Applicant*</h5>
                </div>
                <div class="col-lg-12 mt-2">
                    <input type="file" class="dropify" id="attachment_type1" attr-attachment-type="1" attr-remarks="Passport 1st page of Principal Applicant" data-height="300" data-default-file="{{ asset('img/supporting-docs-samples/passport_upload_ic.png') }}" data-max-file-size="5M" data-allowed-file-extensions="pdf png jpg jpeg" data-parsley-errors-container="#attachment_type1-errors" data-remove-required="0" data-parsley-group="block3" />
                </div>

                <div id="attachment_type1-errors"></div>

                <div class="col-lg-12">
                    <div class="note-full"><img src="{{ asset('assets/images/icons/info-icon.png') }}" alt="info-icon" /><span class="note">Note: </span><a href="{{ asset('img/supporting-docs-samples/sample-passport.jpg') }}" target="_blank">See Sample</a></div>
                </div>
            </div>

            <div class="col-lg-6 mt-2">
                <div class="col-lg-12">
                    <h5>Proof of Address (ie. Utility bill, Bank Statements)*</h5>
                </div>
                <div class="col-lg-12 mt-2">
                    <input type="file" class="dropify" id="attachment_type3" attr-attachment-type="3" attr-remarks="Proof of Address (ie. Utility bill, Bank Statements)" data-height="300" data-default-file="{{ asset('img/supporting-docs-samples/utility_upload_ic.png') }}" data-max-file-size="5M" data-allowed-file-extensions="pdf png jpg jpeg" data-parsley-errors-container="#attachment_type3-errors" data-remove-required="0" data-parsley-group="block3" />
                </div>

                <div id="attachment_type3-errors"></div>

                <div class="col-lg-12">
                    <div class="note-full"><img src="{{ asset('assets/images/icons/info-icon.png') }}" alt="info-icon" /><span class="note">Note: </span>Latest bill not more than 3 months from current date <a href="{{ asset('img/supporting-docs-samples/sample-proofaddress.jpg') }}" target="_blank">See Sample</a></div>
                </div>
            </div>

        </div>

    @endif

    <div class="row">
        <div class="col-lg-6 mt-2 b1-pass-attachment">
            <div class="col-lg-12">
                <h5>Passport 1st Page of Beneficiary 1* </h5>
            </div>
            <div class="col-lg-12 mt-2">
                <input type="file" class="dropify" id="attachment_type4" attr-attachment-type="4" attr-remarks="Passport 1st Page of Beneficiary 1" data-height="300" data-default-file="{{ asset('img/supporting-docs-samples/passport_upload_ic.png') }}" data-max-file-size="5M" data-allowed-file-extensions="pdf png jpg jpeg" data-parsley-errors-container="#attachment_type4-errors" data-remove-required="0" data-parsley-group="block3" />
            </div>

            <div id="attachment_type1-errors"></div>

            <div class="col-lg-12">
                <div class="note-full"><img src="{{ asset('assets/images/icons/info-icon.png') }}" alt="info-icon" /><span class="note">Note: </span><a href="{{ asset('img/supporting-docs-samples/sample-passport.jpg') }}" target="_blank">See Sample</a></div>
            </div>
        </div>

        <div class="col-lg-6 mt-2 b1-ic-attachment">
            <div class="col-lg-12">
                <h5>IC / Passport of Beneficiary 1*</h5>
            </div>
            <div class="col-lg-12 mt-2">
                <input type="file" class="dropify" id="attachment_type5" attr-attachment-type="5" attr-remarks="IC of Beneficiary 1" data-height="300" data-default-file="{{ asset('img/supporting-docs-samples/nric_front_upload_ic.png') }}" data-max-file-size="5M" data-allowed-file-extensions="pdf png jpg jpeg" data-parsley-errors-container="#attachment_type5-errors" data-remove-required="0" data-parsley-group="block3" />
            </div>

            <div id="attachment_type5-errors"></div>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-6 mt-2 b2-pass-attachment">
            <div class="col-lg-12">
                <h5>Passport 1st Page of Beneficiary 2*</h5>
            </div>
            <div class="col-lg-12 mt-2">
                <input type="file" class="dropify" id="attachment_type6" attr-attachment-type="6" attr-remarks="Passport 1st Page of Beneficiary 2" data-height="300" data-default-file="{{ asset('img/supporting-docs-samples/passport_upload_ic.png') }}" data-max-file-size="5M" data-allowed-file-extensions="pdf png jpg jpeg" data-parsley-errors-container="#attachment_type6-errors" data-remove-required="0" data-parsley-group="block3" />
            </div>

            <div id="attachment_type6-errors"></div>

            <div class="col-lg-12">
                <div class="note-full"><img src="{{ asset('assets/images/icons/info-icon.png') }}" alt="info-icon" /><span class="note">Note: </span><a href="{{ asset('img/supporting-docs-samples/sample-passport.jpg') }}" target="_blank">See Sample</a></div>
            </div>
        </div>

        <div class="col-lg-6 mt-2 b2-ic-attachment">
            <div class="col-lg-12">
                <h5>IC / Passport of Beneficiary 2*</h5>
            </div>
            <div class="col-lg-12 mt-2">
                <input type="file" class="dropify" id="attachment_type7" attr-attachment-type="7" attr-remarks="IC of Beneficiary 2" data-height="300" data-default-file="{{ asset('img/supporting-docs-samples/nric_front_upload_ic.png') }}" data-max-file-size="5M" data-allowed-file-extensions="pdf png jpg jpeg" data-parsley-errors-container="#attachment_type7-errors" data-remove-required="0" data-parsley-group="block3" />
            </div>

            <div id="attachment_type7-errors"></div>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-6 mt-2 ja-pass-attachment">
            <div class="col-lg-12">
                <h5>Passport 1st page of Joint Applicant* </h5>
            </div>
            <div class="col-lg-12 mt-2">
                <input type="file" class="dropify" id="attachment_type8" attr-attachment-type="8" attr-remarks="Passport 1st page of Principal Applicant" data-height="300" data-default-file="{{ asset('img/supporting-docs-samples/passport_upload_ic.png') }}" data-max-file-size="5M" data-allowed-file-extensions="pdf png jpg jpeg" data-parsley-errors-container="#attachment_type8-errors" data-remove-required="0" data-parsley-group="block3" />
            </div>

            <div id="attachment_type8-errors"></div>

            <div class="col-lg-12">
                <div class="note-full"><img src="{{ asset('assets/images/icons/info-icon.png') }}" alt="info-icon" /><span class="note">Note: </span><a href="{{ asset('img/supporting-docs-samples/sample-passport.jpg') }}" target="_blank">See Sample</a></div>
            </div>
        </div>

        <div class="col-lg-6 mt-2 ja-ic-attachment">
            <div class="col-lg-12">
                <h5>IC of Joint Applicant*</h5>
            </div>
            <div class="col-lg-12 mt-2">
                <input type="file" class="dropify" id="attachment_type9" attr-attachment-type="9" attr-remarks="IC of Joint Applicant" data-height="300" data-default-file="{{ asset('img/supporting-docs-samples/nric_front_upload_ic.png') }}" data-max-file-size="5M" data-allowed-file-extensions="pdf png jpg jpeg" data-parsley-errors-container="#attachment_type9-errors" data-remove-required="0" data-parsley-group="block3" />
            </div>

            <div id="attachment_type9-errors"></div>
        </div>

        <div class="col-lg-6 mt-2 ja-address-attachment">
            <div class="col-lg-12">
                <h5>Proof of Address Joint Applicant* (ie. Utility bill, Bank Statements)*</h5>
            </div>
            <div class="col-lg-12 mt-2">
                <input type="file" class="dropify" id="attachment_type10" attr-attachment-type="10" attr-remarks="Proof of Address Joint Applicant* (ie. Utility bill, Bank Statements)" data-height="300" data-default-file="{{ asset('img/supporting-docs-samples/utility_upload_ic.png') }}" data-max-file-size="5M" data-allowed-file-extensions="pdf png jpg jpeg" data-parsley-errors-container="#attachment_type10-errors" data-remove-required="0" data-parsley-group="block3" />
            </div>

            <div id="attachment_type10-errors"></div>

            <div class="col-lg-12">
                <div class="note-full"><img src="{{ asset('assets/images/icons/info-icon.png') }}" alt="info-icon" /><span class="note">Note: </span class="text-danger">Latest bill not more than 3 months from current date <a href="{{ asset('img/supporting-docs-samples/sample-proofaddress.jpg') }}" target="_blank">See Sample</a></div>
            </div>
        </div>

    </div>
    
    <div class="row">
        <div class="button-row d-flex mt-4 col-12">
            <button class="btn btn-info js-btn-prev" type="button" title="Prev"
            onclick="scrollToTop()">Back</button>
            <button class="btn btn-info ml-auto js-btn-next" type="button" title="Next"
            onclick="scrollToTop()">Next</button>
        </div>
    </div>

</div>
