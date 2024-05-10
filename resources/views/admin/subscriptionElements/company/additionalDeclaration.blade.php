<div class="multisteps-form__content">
    <div class="row">
        <div class="col-lg-12">
            <h4>Certification & Declaration</h4>
        </div>
        <div class="col-lg-12 mt-3">
            <div class="my-2 string-check string-check-soft-info  ">
                <input type="checkbox" name="certification_1" {{ @$subscription->certification_1 == '1' ? 'checked' : '' }} value="1" id="certification_1" required="required" data-parsley-group="block2" data-parsley-multiple="certification_1">
                <label class="string-check-label">
                    <span class="ml-2">1. I/We undersigned have read and agreed to the <a href="{{ asset('assets/images/sampleImages/CRS-01_Appendix.pdf') }}" target="_blank" class="skyblue-color">Declaration On Source Of Funds.</a></span>
                </label>

            </div>
            <div class="my-3 string-check string-check-soft-info ">
                <input type="checkbox" name="certification_2" {{ @$subscription->certification_2 == '1' ? 'checked' : '' }} value="1" id="certification_2" required="required" data-parsley-group="block2" data-parsley-multiple="certification_2">
                <label class="string-check-label">
                    <span class="ml-2">2. I/We undersigned have read and agreed to the <a href="{{ asset('img/docs/MCIL-INTL-ShareApplication.pdf') }}" target="_blank" class="skyblue-color shareapplication_link">Application of share subscription terms and conditions.</a></span>
                </label>
            </div>
            <div class="my-3 string-check string-check-soft-info ">
                <input type="checkbox" name="certification_3" {{ @$subscription->certification_3 == '1' ? 'checked' : '' }} value="1" id="certification_3" required="required" data-parsley-group="block2" data-parsley-multiple="certification_3">
                <label class="string-check-label">
                    <span class="ml-2">3. I/We undersigned confirm the designation of the beneficiary/ies according to the beneficiary form. </span>
                </label>
            </div>
            <div class="my-3 string-check string-check-soft-info ">
                <input type="checkbox" name="certification_4" {{ @$subscription->certification_4 == '1' ? 'checked' : '' }} value="1" id="certification_4" required="required" data-parsley-group="block2" data-parsley-multiple="certification_4">
                <label class="string-check-label">
                    <span class="ml-2">4. I/We undersigned have read and acknowledged to the information <a href="{{ asset('img/docs/supplementary.pdf') }}" target="_blank" class="skyblue-color supplementary_link">Supplementary IM.</a> </span>
                </label>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-lg-12">
            <h4>KYC</h4>
        </div>
        <div class="col-lg-12 mt-3">
            <div class="my-2 string-check string-check-soft-info  ">
                <input type="checkbox" name="kyc_1" {{ @$subscription->kyc_1 == '1' ? 'checked' : '' }} value="1" id="kyc_1" required="required" data-parsley-group="block2" data-parsley-multiple="kyc_1">
                <label class="string-check-label">
                    <span class="ml-2">1. I/We acknowledge that the intended investment corresponds with my objectives.</span>
                </label>
            </div>
            <div class="my-3 string-check string-check-soft-info ">
                <input type="checkbox" name="kyc_2" {{ @$subscription->kyc_2 == '1' ? 'checked' : '' }} value="1" id="kyc_2" required="required" data-parsley-group="block2" data-parsley-multiple="kyc_2">
                <label class="string-check-label"><span class="ml-2">2. None of my business are "high risk businesses".</span> </label>
            </div>
            <div class="my-3 string-check string-check-soft-info ">
                <input type="checkbox" name="kyc_3" {{ @$subscription->kyc_3 == '1' ? 'checked' : '' }} value="1" id="kyc_3" required="required" data-parsley-group="block2" data-parsley-multiple="kyc_3">
                <label class="string-check-label">
                    <span class="ml-2">3. I/We understand my responsibilities under the <a href="{{ asset('img/docs/anti-money-laundering-act.pdf') }}" target="_blank" class="skyblue-color">Anti - Money Laundering Act.</a> </span>
                </label>
            </div>
            <div class="my-3 string-check string-check-soft-info ">
                <input type="checkbox" name="kyc_4" {{ @$subscription->kyc_4 == '1' ? 'checked' : '' }} value="1" id="kyc_4" required="required" data-parsley-group="block2" data-parsley-multiple="kyc_4">
                <label class="string-check-label">
                    <span class="ml-2">4. I/We declare that I do not have business interest in high risk countries such as Iran, North Korea, Afghanistan and so on.</span>
                </label>
            </div>
            <div class="my-3 string-check string-check-soft-info ">
                <input type="checkbox" name="kyc_5" {{ @$subscription->kyc_5 == '1' ? 'checked' : '' }} value="1" id="kyc_5" required="required" data-parsley-group="block2" data-parsley-multiple="kyc_5">
                <label class="string-check-label">
                    <span class="ml-2">5. I/We acknowledge that I can legitimately make the intended investment having regard to my financial resources.</span>
                </label>
            </div>
            <div class="my-3 string-check string-check-soft-info ">
                <input type="checkbox" name="kyc_6" {{ @$subscription->kyc_6 == '1' ? 'checked' : '' }} value="1" id="kyc_6" required="required" data-parsley-group="block2" data-parsley-multiple="kyc_6">
                <label class="string-check-label">
                    <span class="ml-2">6. I/We confirm that I'm not in the Politically Exposed Person(PEP) list. If yes, I understand that my application is subjected to the Board of Director's approval.</span>
                </label>
            </div>
        </div>
    </div>
    
    <div class="button-row d-flex mt-4">
        <button class="btn btn-info js-btn-prev" type="button" title="Prev"
        onclick="scrollToTop()">Back</button>
        <button class="btn btn-info ml-auto js-btn-next" type="button" title="Next"
        onclick="scrollToTop()">Next</button>
    </div>
</div>