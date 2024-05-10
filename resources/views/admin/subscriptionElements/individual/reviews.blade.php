<div class="multisteps-form__content">

    <div class="row mt-3">
        <div class="col-lg-10 mt-3">
        <label>Investment ID</label>

            {!! Form::text('reference_no', $edit ? $subscription->reference_no : old('reference_no'), ['id' => 'reference_no', 'class'=>'form-control search-input', 'data-parsley-group'=>"block4", 'required' => 'required']) !!}
        </div>

        <div class="col-lg-2 mt-3">
          <label>&nbsp;</label>
            {!! Form::text('refreance_id', $edit ? $subscription->refreance_id : old('refreance_id'), ['id' => 'refreance_id', 'class'=>'form-control search-input', 'data-parsley-group'=>"block4", 'readonly'=> 'readonly']) !!}
       </div>

    </div>

    <div class="row mt-3">
        <div class="col-lg-6 mt-3">
            <label>Commencement Date *</label>
            <div class="input-group">

                {!! Form::date('commence_date', $edit ? $subscription->commence_date : old('commence_date'), ['class'=>'form-control search-input', 'id' => 'commence_date', 'data-parsley-group'=>"block4", 'data-parsley-errors-container'=>"#commenceDate_error", 'required' => 'required']) !!}
            </div>
            <div id="commenceDate_error"></div>
        </div>
    </div>

    <div class="row mt-3">
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

        <div class="col-lg-6">
            <h5 class="mb-4">Upload Signed Application*</h5>
            <input type="file" name="signeddoc_file" class="dropify" required="required" data-parsley-group="block4"/>
        </div>

    </div>

    <div class="button-row d-flex mt-4">
        <button class="btn btn-info js-btn-prev" type="button" title="Prev">Back</button>
        <button class="btn btn-info finitsh-btn ml-auto" type="button" title="Submit" onclick="saveScubscription();">Finish</button>
    </div>
</div>