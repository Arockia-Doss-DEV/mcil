@extends('layouts.app')

@section('title', 'Additional Investment')

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
    #myCountry1-reason-b{
        display: none;
    }
    #myCountry2-reason-b{
        display: none;
    }
    #myCountry3-reason-b{
        display: none;
    }
 </style>

@stop

@section('content')

<div class="container-fluid page-body-wrapper">

    @include("individual.elements.sidebar")

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="d-flex justify-content-between">
                <div class="pageheader">
                    <h4>ADDITIONAL INVESTMENT</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb no-bg custom-breadcrumb">
                            <li class="breadcrumb-item"><a href="#">My Investment</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Additional Investment</li>
                        </ol>
                    </nav>
                </div>
                <div class="d-flex">
                    <div class="save-investemnt mr-2">
                        <a href="#" onclick="savedAndDaft();"><img src="{{ asset('assets/images/icons/save-icon.png') }}"
                                alt="back icon" /></a>
                    </div>
                    <div class="go-back">
                        <a href="{{ url('/individual/subscriptions') }}"><img src="{{ asset('assets/images/icons/back-icon.png') }}"
                                alt="back icon" /></a>
                    </div>
                </div>
            </div>
            <div class="row create-investemnt mt-3">
                <div class="col-lg-12">
                    <div class="card card-margin">
                        <div class="card-header">
                            <h5 class="card-title">
                                <img src="{{ asset('assets/images/icons/pencil-icon.png') }}"
                                    alt="edit-icon" class="mr-2" />Create Additional Investment</h5>
                        </div>
                        <div class="card-body">
                            <div class="multisteps-form__progress pt-4">
                                <button class="multisteps-form__progress-btn js-active" type="button" title="subscriptions"><i class="far fa-user"></i>
                                   <span>Subscription Details</span>
                                  </button>
                                <button class="multisteps-form__progress-btn" type="button" title="Declaration"> <i class="fas fa-user-friends"></i>
                                  <span>Declaration</span></button>
                                <button class="multisteps-form__progress-btn" type="button" title="Upload Documents"><i class="fas fa-clipboard-check"></i>
                                   <span> Upload Documents</span>
                                </button>
                                <button class="multisteps-form__progress-btn" type="button" title="Reviews"> <i class="far fa-eye"></i>
                                  <span>Reviews</span>
                                </button>
                            </div>

                            {{ Form::open(['route' => ['subscriptionAdditionalSave',['userId' => $user->id, 'subId' => $subscription->id]], 'method' => 'POST', 'id'=>'subscriptionform', 'class' => 'multisteps-form__form', 'data-parsley-validate'=>'data-parsley-validate', 'autocomplete'=>"off",'enctype'=>'multipart/form-data']) }}

                                <input type="hidden" name="user_id" id="user_id" value="{{ $user['id'] }}"/>
                                <input type="hidden" name="subscription_id" id="subscription_id" value="{{ @$subscription['id'] }}"/>
                                <input type="hidden" name="old_subscription_id" id="old_subscription_id" value="{{ @$subscription_id }}">
                                <input type="hidden" name="fund_type" id="fund_type" value="{{ $fund_type }}">

                                <div class="multisteps-form__panel  p-4 rounded bg-white js-active" data-animation="scaleIn">
                                    @include("elements.individual.additionalScription")
                                </div>

                                <div class="multisteps-form__panel  p-4 rounded bg-white" data-animation="scaleIn">
                                    @include("elements.individual.additionalDeclaration")
                                </div>

                                <!--single form panel-->
                                <div class="multisteps-form__panel  p-4 rounded bg-white" data-animation="scaleIn">
                                    @include("elements.individual.additionalDocuments")
                                </div>
                                
                                <!--single form panel-->
                                <div class="multisteps-form__panel  p-4 rounded bg-white" data-animation="scaleIn">
                                    @include("elements.individual.additionalReviews")
                                </div>

                            {{ Form::close() }}

                        </div>
                    </div>
                </div>
            </div>
            
            @include('individual.elements.footer')

        </div>
    </div>

</div>

<div class="col-md-12">
    <div id="divResult2"></div>
</div>

@endsection

@section('scripts')

<script src="{{ asset('assets/js/components/subscriptions-add-wizard.js') }}"></script>
<script src="{{ asset('assets/js/components/date-picker.js') }}"></script>
<script src="{{ asset('assets/js/components/intlTelInput.js') }}"></script>
<script src="{{ asset('assets/js/components/dropify.js') }}"></script>
<script src="{{ asset('assets/js/components/EZView.js') }}"></script>
<script src="{{ asset('common/js/genrel.js') }}"></script>
<script src="{{ asset('assets/js/vendor.bundle.js') }}"></script>

<script type="text/javascript">
    function scrollToTop() {
    window.scrollTo(0, 0);
}

$(function () {
    $('#date').datepicker({
        format: 'mm/dd/yyyy',
        startDate: '-3d'
    });

    $('.datepicker').datepicker({
        format: 'mm/dd/yyyy',
        todayHighlight: true
    });
});

</script>

<script type="text/javascript">  

    window.Parsley.addValidator('beneficiary1', {
        validateNumber: function(value, requirement) {

            var a = parseInt($("#b1_beneficiary_amount").val());
            var b = parseInt($("#b2_beneficiary_amount").val());
            var c = b ? b : 0;
            var total = a+c;
            
            if(total <= 100){
                return true;
            }else{
                return false;
            }
        },
        requirementType: 'integer',
        messages: {
            en: 'This value should be a below 100 %.',
        }
    });

    function beneficiary2Required(){

        $('.beneficiare2').show();
        $('.beneficiary2_div').show();
        
        $("#b1_beneficiary_amount").removeAttr("readonly");
        // $("#b1_beneficiary_amount").val("50");
        // $("#b2_beneficiary_amount").val("50");
        $("#b1_beneficiary_amount").val({{ @$subscription['b1_beneficiary_amount'] != '' ? @$subscription['b1_beneficiary_amount'] : "50" }});
        $("#b2_beneficiary_amount").val({{ @$subscription['b2_beneficiary_amount'] != '' ? @$subscription['b2_beneficiary_amount'] : "50" }});

        $("#b2_beneficiary_amount").attr("required", "required");
        $("#b2_name").attr("required", "required");
        $("#b2_nric_passport").attr("required", "required");
        $("#b2_residence_id").attr("required", "required");
        $("#b2_nationality_id").attr("required", "required");
        $("#b2_dob").attr("required", "required");
        $("#b2_occupation").attr("required", "required");
        $("#b2_address_line_1").attr("required", "required");
        $("#b2_city").attr("required", "required");
        $("#b2_country_id").attr("required", "required");
        $("#b2_postcode").attr("required", "required");
        $("#b2_state_id").attr("required", "required");
        $("#b2_mobile_prefix").attr("required", "required");
        $("#b2_mobile_number").attr("required", "required");
        $("#b2_email").attr("required", "required");
        $("#b2_relationship").attr("required", "required");
    }

    function beneficiary2UnRequired(){

        $("#b1_beneficiary_amount").attr("readonly", "readonly");
        $("#b1_beneficiary_amount").val("100");
        $("#b2_beneficiary_amount").val("0");
        
        $('.beneficiare2').hide();
        $('.beneficiary2_div').hide();
        
        $("#b2_beneficiary_amount").removeAttr("required");
        $("#b2_name").removeAttr("required");
        $("#b2_nric_passport").removeAttr("required");
        $("#b2_residence_id").removeAttr("required");
        $("#b2_nationality_id").removeAttr("required");
        $("#b2_dob").removeAttr("required");
        $("#b2_occupation").removeAttr("required");
        $("#b2_address_line_1").removeAttr("required");
        $("#b2_city").removeAttr("required");
        $("#b2_country_id").removeAttr("required");
        $("#b2_postcode").removeAttr("required");
        $("#b2_state_id").removeAttr("required");
        $("#b2_mobile_prefix").removeAttr("required");
        $("#b2_mobile_number").removeAttr("required");
        $("#b2_email").removeAttr("required");
        $("#b2_relationship").removeAttr("required");
    }

    function jointapplicantsRequired(){
        $('#joint_applicants_div').show();
        $('#joint_applicants_crs_div').show();
        $('#joint_applicants_fatca_div').show();
        $('#joint_applicants_doc_div').show();
        
        $("#ja_salutation").attr("required", "required");
        $("#ja_name").attr("required", "required");
        $("#ja_nric_passport").attr("required", "required");
        $("#ja_dob").attr("required", "required");
        $("#ja_country_residence").attr("required", "required");
        $("#ja_nationality_id").attr("required", "required");
        $("#ja_addr_line_1").attr("required", "required");
        $("#ja_city").attr("required", "required");
        $("#ja_country_id").attr("required", "required");
        $("#ja_postcode").attr("required", "required");
        $("#ja_state_id").attr("required", "required");
        $("#ja_mobileprefix").attr("required", "required");
        $("#ja_mobile_no").attr("required", "required");
        $("#ja_email").attr("required", "required");
        $("#ja_occupation").attr("required", "required");
        $("#ja_employer_name").attr("required", "required");
        $("#ja_annual_income").attr("required", "required");
        $("#ja_source_wealth").attr("required", "required");
        
        $("#jatr_addr_line_1").attr("required", "required");
        $("#jatr_city").attr("required", "required");
        $("#jatr_country_id").attr("required", "required");
        $("#jatr_state_id").attr("required", "required");
        $("#jatr_postcode").attr("required", "required");

        $("#jatd1_country_id").attr("required", "required");
        $("#jatd1_tax_number").attr("required", "required");
    }

    function jointapplicantsUnRequired(){
        $('#joint_applicants_div').hide();
        $('#joint_applicants_doc_div').hide();
        $('#joint_applicants_crs_div').hide();
        $('#joint_applicants_fatca_div').hide();
        
        
        $("#ja_salutation").removeAttr("required");
        $("#ja_name").removeAttr("required");
        $("#ja_nric_passport").removeAttr("required");
        $("#ja_dob").removeAttr("required");
        $("#ja_country_residence").removeAttr("required");
        $("#ja_nationality_id").removeAttr("required");
        $("#ja_addr_line_1").removeAttr("required");
        $("#ja_city").removeAttr("required");
        $("#ja_country_id").removeAttr("required");
        $("#ja_postcode").removeAttr("required");
        $("#ja_state_id").removeAttr("required");
        $("#ja_mobileprefix").removeAttr("required");
        $("#ja_mobile_no").removeAttr("required");
        $("#ja_email").removeAttr("required");
        $("#ja_occupation").removeAttr("required");
        $("#ja_employer_name").removeAttr("required");
        $("#ja_annual_income").removeAttr("required");
        $("#ja_source_wealth").removeAttr("required");
        
        $("#jatr_addr_line_1").removeAttr("required");
        $("#jatr_city").removeAttr("required");
        $("#jatr_country_id").removeAttr("required");
        $("#jatr_state_id").removeAttr("required");
        $("#jatr_postcode").removeAttr("required");

        $("#jatd1_country_id").removeAttr("required");
        $("#jatd1_tax_number").removeAttr("required");
    }

    $(document).ready(function () {

        $('#fund_type').change(function(){

            if($(this).val() == "1"){
                var download_url = base_url+"img/docs/supplementary.pdf";
                var download_url2 = base_url+"img/docs/MCIL-INTL-ShareApplication.pdf";

                $(".supplementary_link").attr("href", download_url);
                $(".shareapplication_link").attr("href", download_url2);

            }else if($(this).val() == "2"){
                var download_url = base_url+"img/docs/mcil2/supplementary-IM.pdf";
                var download_url2 = base_url+"img/docs/mcil2/MCIL-INTL-ShareApplication.pdf";

                $(".supplementary_link").attr("href", download_url);
                $(".shareapplication_link").attr("href", download_url2);

            }else if($(this).val() == "3"){
                var download_url = base_url+"img/docs/mcil3/supplementary-IM.pdf";
                var download_url2 = base_url+"img/docs/mcil3/MCIL-INTL-ShareApplication.pdf";

                $(".supplementary_link").attr("href", download_url);
                $(".shareapplication_link").attr("href", download_url2);

                // $("#initial_investment").attr("data-parsley-min", "125000");
                // $("#initial_investment").attr("data-parsley-error-message", "Minimum initial investment amount is 125000.00");

            } else {
                var download_url = base_url+"img/docs/supplementary.pdf";
                var download_url2 = base_url+"img/docs/MCIL-INTL-ShareApplication.pdf";

                $(".supplementary_link").attr("href", download_url);
                $(".shareapplication_link").attr("href", download_url2);
            }
        });

        if($("#fund_type").val() == "1"){
            var download_url = base_url+"img/docs/supplementary.pdf";
            var download_url2 = base_url+"img/docs/MCIL-INTL-ShareApplication.pdf";

            $(".supplementary_link").attr("href", download_url);
            $(".shareapplication_link").attr("href", download_url2);

            /*$("#initial-investment").attr("data-parsley-min", "70000");
            $("#initial-investment").attr("data-parsley-error-message", "Minimum additional investment amount is 70000.00");*/

        }else if($("#fund_type").val() == "2"){
            var download_url = base_url+"img/docs/mcil2/supplementary-IM.pdf";
            var download_url2 = base_url+"img/docs/mcil2/MCIL-INTL-ShareApplication.pdf";

            $(".supplementary_link").attr("href", download_url);
            $(".shareapplication_link").attr("href", download_url2);

        }else if($("#fund_type").val() == "3"){
            var download_url = base_url+"img/docs/mcil3/supplementary-IM.pdf";
            var download_url2 = base_url+"img/docs/mcil3/MCIL-INTL-ShareApplication.pdf";

            $(".supplementary_link").attr("href", download_url);
            $(".shareapplication_link").attr("href", download_url2);

            // $("#initial_investment").attr("data-parsley-min", "125000");
            // $("#initial_investment").attr("data-parsley-error-message", "Minimum initial investment amount is 125000.00");

        } else {
            var download_url = base_url+"img/docs/supplementary.pdf";
            var download_url2 = base_url+"img/docs/MCIL-INTL-ShareApplication.pdf";

            $(".supplementary_link").attr("href", download_url);
            $(".shareapplication_link").attr("href", download_url2);
        }

        $('#country_id').change(function(){
            var _this = $(this).val();
            var default_state = ""; 
            load_state("state_id", _this, default_state); 
        });

        var default_state = "{{ @$subscription['state_id']; }}";
        load_state("state_id", $("#country_id").val(), default_state);

        $('#b1_residence_id').change(function(){

            $('#b1_nationality_id').val($(this).val()).change();
            $('#b1_country_id').val($(this).val()).change();
        });

        $('#b1_country_id').change(function(){

            var _this = $(this).val();
            var default_b1_state = ""; 
            load_state("b1_state_id", _this, default_b1_state);
            // $('#b1_mobile_prefix').val($(this).val()).change();
        });

        var default_b1_state = "{{ @$subscription['b1_state_id']; }}";
        load_state("b1_state_id", $("#b1_country_id").val(), default_b1_state);

        $('#b2_residence_id').change(function(){

            $('#b2_nationality_id').val($(this).val()).change();
            $('#b2_country_id').val($(this).val()).change();
        });

        $('#b2_country_id').change(function(){

            var _this = $(this).val();
            var default_b2_state = ""; 
            load_state("b2_state_id", _this, default_b2_state);
            // $('#b2_mobile_prefix').val($(this).val()).change();

        });

        var default_b2_state = "{{ @$subscription['b2_state_id']; }}";
        load_state("b2_state_id", $("#b2_country_id").val(), default_b2_state);

        $("#b1_beneficiary_amount").on('keyup change', netsalery);

        function netsalery(){
            var addition_sum = 0;
            var add_val = parseInt($("#b1_beneficiary_amount").val());
            if (!isNaN(add_val)) {
                addition_sum = 100 - add_val;
            }
            $("#b2_beneficiary_amount").val(addition_sum);
        }

        
        $('#beneficiary_seq').change(function(){
            
            var beneficiary = $(this).val();
            if(beneficiary == "2"){

                beneficiary2Required();
            }else{
                beneficiary2UnRequired();
            }

            dropifyImageDiv();
        });

        if($("#beneficiary_seq").val() == 2){
            beneficiary2Required();
        }else{

            $(".beneficiare1").show();
            beneficiary2UnRequired();
        }

        $(".beneficiare1").show();

        dropifyImageDiv();

        
        $('#b1_nationality_id').change(function(){
            if($(this).val() == 129){
                $(".beneficiary0_ic").show();
                $('#beneficiares1_passport_label').html("NRIC*");
            }else{
                $(".beneficiary0_ic").hide();
                $('#beneficiares1_passport_label').html("Passport No*");
            }

            dropifyImageDiv();
        });

        if($("#b1_nationality_id").val() == 129){
            $(".beneficiary0_ic").show();
            $('#beneficiares1_passport_label').html("NRIC*");
        }else{
            $(".beneficiary0_ic").hide();
            $('#beneficiares1_passport_label').html("Passport No*");

            dropifyImageDiv();
        }


        $('#b2_nationality_id').change(function(){
            if($("#b2_nationality_id").val() == 129){
                $(".beneficiary1_ic").show();
                $('#beneficiares2_passport_label').html("NRIC*");
            }else{
                $(".beneficiary1_ic").hide();
                $('#beneficiares2_passport_label').html("Passport No*");
            }

            dropifyImageDiv();
        });
        
        if($("#beneficiary_seq").val() == 2){
            if($("#b2_nationality_id").val() == 129){
                $(".beneficiary1_ic").show();
                $('#beneficiares2_passport_label').html("NRIC*");
            }else{
                $(".beneficiary1_ic").hide();
                $("#ss-attachments-6-attachment").removeAttr("required");
                $('#beneficiares2_passport_label').html("Passport No*");
            }

            dropifyImageDiv();
        }
        
        
        $('#joint_applicants_div').hide();
        $('#is_joint_applicant').change(function(){

            if($(this).val() == "1"){
                
                jointapplicantsRequired();
            }else{
                jointapplicantsUnRequired();
            }

            dropifyImageDiv();
        });

        if($("#is_joint_applicant").val() == "1"){
            jointapplicantsRequired();
        }else{
            jointapplicantsUnRequired();
        }

        $('#ja_nationality_id').change(function(){

            if($(this).val() == 129){
                $('#joint_passport_label').html("NRIC*");
                
                $('#ja_passport_div').hide();
                $('#ja_ic_div').show();                
            }else{
                $('#joint_passport_label').html("Passport No*");
                
                $('#ja_passport_div').show();
                $('#ja_ic_div').hide();
            }

            dropifyImageDiv();
        });
        
        if($("#is_joint_applicant").val() == "1"){
            if($("#ja_nationality_id").val() == 129){
                $('#joint_passport_label').html("NRIC*");
                
                $('#ja_passport_div').hide();
                $('#ja_ic_div').show();
            }else{
                $('#joint_passport_label').html("Passport No*");
                
                $('#ja_passport_div').show();
                $('#ja_ic_div').hide();
            }

            dropifyImageDiv();
        }


        $('#ja_country_id').change(function(){

            var _this = $(this).val();
            var default_ja_state = ""; 
            load_state("ja_state_id", _this, default_ja_state);
            // $('#ja_mobileprefix').val($(this).val()).change();
        });

        var default_ja_state = "{{ @$subscription['ja_state_id']; }}";
        load_state("ja_state_id", $("#ja_country_id").val(), default_ja_state);

        $('#jatr_country_id').change(function(){

            $.ajax({
                url: SITE_URL+'selectBoxStateList?country_id='+$(this).val(),
                type:"GET",
                success: function(data) {
                    var state = data.data;
                    $('#jatr_state_id').empty();
                    for (var key in state) {
                        if (state.hasOwnProperty(key)) {
                            $('#jatr_state_id').append('<option value="'+key+'" >'+state[key]+'</option>');
                        }
                    }
                }
            });
        });
        
        if($("#is_joint_applicant").val() == "1"){
            $(".ja_source_wealth:checked").each(function(){
                var radioValue =$(this).val();

                if(radioValue == "Other"){
                    
                    $('.source_wealth_other').show();
                    $("#ja_source_wealth_other").attr("required", "required");
                }else{
                    $('.source_wealth_other').hide();
                    $("#ja_source_wealth_other").removeAttr("required"); 
                }
            });

        } else {
            $('.source_wealth_other').hide();
        }

        $(".ja_source_wealth").click(function(){
            $(".ja_source_wealth:checked").each(function(){
                var radioValue =$(this).val();

                if(radioValue == "Other"){
                    $('.source_wealth_other').show();
                    $("#ja_source_wealth_other").attr("required", "required");
                }else{
                    $('.source_wealth_other').hide();
                    $("#ja_source_wealth_other").removeAttr("required"); 
                }
            });
        });
        
        $('#is_same_address').click(function(){
            if($(this). is(":checked")){
                $("#tr_addr_line_1").val("{{ $user->address_line1; }}");
                $("#tr_addr_line_2").val("{{ $user->address_line2; }}");
                $("#tr_city").val("{{ $user->city; }}");
                $("#tr_country_id").val("{{ $user->country; }}");
                $("#tr_postcode").val("{{ $user->post_code; }}");
                $("#tr_state_id").val("{{ $user->state; }}");

                var default_state = "{{ @$user['state']; }}";
                load_state("tr_state_id", $("#tr_country_id").val(), default_state);

            }else if($(this). is(":not(:checked)")){
                $("#tr_addr_line_1").val("");
                $("#tr_addr_line_2").val("");
                $("#tr_city").val("");
                $("#tr_country_id").val("");
                $("#tr_postcode").val("");
                $("#tr_state_id").val("");
            }
        });
        
        
        $('#ja_is_same_address'). click(function(){
            if($(this). is(":checked")){
                
                var ja_addr_line1 = $("#ja_addr_line_1").val();
                var ja_addr_line2 = $("#ja_addr_line_2").val();
                var ja_city = $("#ja_city").val();
                var ja_country = $("#ja_country_id").val();
                var ja_postcode = $("#ja_postcode").val();
                var ja_state= $("#ja_state_id").val();

                $("#jatr_addr_line_1").val(ja_addr_line1);
                $("#jatr_addr_line_2").val(ja_addr_line2);
                $("#jatr_city").val(ja_city);
                $("#jatr_country_id").val(ja_country);
                $("#jatr_postcode").val(ja_postcode);
                $("#jatr_state_id").val(ja_state);

                var default_state = $("#ja_state_id").val();
                load_state("jatr_state_id", $("#jatr_country_id").val(), default_state);

            }else if($(this). is(":not(:checked)")){
                $("#jatr_addr_line_1").val("");
                $("#jatr_addr_line_2").val("");
                $("#jatr_city").val("");
                $("#jatr_country_id").val("");
                $("#jatr_postcode").val("");
                $("#jatr_state_id").val("");
            }
        });
        


        $('#tr_country_id').change(function(){

            $.ajax({
                url: SITE_URL+'selectBoxStateList?country_id='+$(this).val(),
                type:"GET",
                success: function(data) {
                    var state = data.data;
                    $('#tr_state_id').empty();
                    for (var key in state) {
                        if (state.hasOwnProperty(key)) {
                            $('#tr_state_id').append('<option value="'+key+'" >'+state[key]+'</option>');
                        }
                    }
                }
            });
        });


        var default_state = "{{ @$subscription['tr_state_id']; }}";
        load_state("tr_state_id", $("#tr_country_id").val(), default_state);

        
        var default_state = "{{ @$subscription['jatr_state_id']; }}";
        load_state("jatr_state_id", $("#jatr_country_id").val(), default_state);


        $('.tax_details1').hide();
        $('.tax_details2').hide();
        $('.tax_details3').hide();

        $('#td1_tax_reason_type').change(function(){

            if($(this).val() == "2"){
                $('.tax_details1').show();
            }else{
                $('.tax_details1').hide();
            }
        });

        if($("#td1_tax_reason_type").val() == "2"){
            $('.tax_details1').show();
        }else{
            $('.tax_details1').hide();
        }

        $('#td2_tax_reason_type').change(function(){

            if($(this).val() == "2"){
                $('.tax_details2').show();
            }else{
                $('.tax_details2').hide();
            }
        });

        if($("#td2_tax_reason_type").val() == "2"){
            $('.tax_details2').show();
        }else{
            $('.tax_details2').hide();
        }

        $('#td3_tax_reason_type').change(function(){

            if($(this).val() == "2"){
                $('.tax_details3').show();
            }else{
                $('.tax_details3').hide();
            }
        });

        if($("#td3_tax_reason_type").val() == "2"){
            $('.tax_details3').show();
        }else{
            $('.tax_details3').hide();
        }

        /////////////////
        $('.ja_tax_details1').hide();
        $('.ja_tax_details2').hide();
        $('.ja_tax_details3').hide();

        $('#jatd1_tax_reason_type').change(function(){

            if($(this).val() == "2"){
                $('.ja_tax_details1').show();
            }else{
                $('.ja_tax_details1').hide();
            }
        });

        if($("#jatd1_tax_reason_type").val() == "2"){
            $('.ja_tax_details1').show();
        }else{
            $('.ja_tax_details1').hide();
        }

        $('#jatd2_tax_reason_type').change(function(){

            if($(this).val() == "2"){
                $('.ja_tax_details2').show();
            }else{
                $('.ja_tax_details2').hide();
            }
        });

        if($("#jatd2_tax_reason_type").val() == "2"){
            $('.ja_tax_details2').show();
        }else{
            $('.ja_tax_details2').hide();
        }

        $('#jatd3_tax_reason_type').change(function(){

            if($(this).val() == "2"){
                $('.ja_tax_details3').show();
            }else{
                $('.ja_tax_details3').hide();
            }
        });

        if($("#jatd3_tax_reason_type").val() == "2"){
            $('.ja_tax_details3').show();
        }else{
            $('.ja_tax_details3').hide();
        }


        var drEvent = $('.dropify').dropify();

        drEvent.on('dropify.beforeClear', function(event, element){
            console.log(element);
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element){
            var attachment_type = $(this).attr('attr-attachment-type')
            var _this = this;
            var csrfToken = "{{ csrf_token() }}";
            var fd = new FormData();
            var file = $(this)[0].files[0];
            fd.append('subscription_id', $("#subscription_id").val());
            fd.append('attachment_type', attachment_type);  

            axios.post(SITE_URL+'individual/uploadDocumentRemove',fd,{
                headers: {
                    'Content-Type': 'multipart/form-data',
                    'X-CSRF-Token': csrfToken}}
            ).then(function(response){
                alert('File deleted');
                $(_this).attr("required", "required");                 
            })
            .catch(function(){
                //alert('Faild File deleted');
            });
        });

        /////////////////////
        $('.dropify').change(function() {
            
            if ($(this).get(0).files.length) {

                var _this = this;
                var csrfToken = "{{ csrf_token() }}";
                var fd = new FormData();
                var file = $(this)[0].files[0];

                console.log(file)

                fd.append('subscription_id', $("#subscription_id").val());
                fd.append('attachment', file);
                fd.append('attachment_type', $(this).attr('attr-attachment-type'));
                fd.append('remarks', $(this).attr('attr-remarks'));  

                axios.post(SITE_URL+'individual/uploadDocument',fd,{
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        'X-CSRF-Token': csrfToken}}
                ).then(function(response){ 

                    $(_this).removeAttr("required");

                }).catch(function(){ });
            }else{
                $(this).attr("required", "required");
            }
        });

        documentGet();

        function documentGet(){

            var id = $('#old_subscription_id').val();
            if(id){
                axios.get(SITE_URL+'individual/getDocument?id='+id).then(function (response){
                
                    var item =response.data.data;
                    $.each(item, function (i) {
                        if(item[i].attachment){
                            
                            var attachment_type = item[i].attachment_type;
                            var imagenUrl = "{{ asset(Storage::url('')); }}/" + item[i].attachment;
                            
                            console.log("#attachment_type"+attachment_type);
                                
                            var drEvent = $("#attachment_type"+attachment_type).dropify();
                            drEvent = drEvent.data('dropify');
                            drEvent.resetPreview();
                            //drEvent.clearElement();
                            drEvent.settings.defaultFile = imagenUrl;
                            drEvent.destroy();
                            drEvent.init();
                            $('.dropify#attachment_type'+attachment_type).dropify({
                                defaultFile: imagenUrl,
                            });

                            //$("#attachment_type"+attachment_type).attr("data-default-file", imagenUrl);
                            $("#attachment_type"+attachment_type).removeAttr("required");
                            $("#attachment_type"+attachment_type).attr("data-remove-required", 1);
                        }
                    });
                });
            }
        }

    });

    function dropifyImageDiv(){

        if($("#user_nationality_id").val() == 129){

            var remove_required1 = $("#attachment_type1").attr("data-remove-required");
            var remove_required2 = $("#attachment_type2").attr("data-remove-required");
            var remove_required3 = $("#attachment_type3").attr("data-remove-required");

            if(remove_required1 == 1){
                $("#attachment_type1").removeAttr("required");
            }else{
                $("#attachment_type1").attr("required", "required");
            }
            
            if(remove_required2 == 1){
                $("#attachment_type2").removeAttr("required");
            }else{
                $("#attachment_type2").attr("required", "required");
            }

            if(remove_required3 == 1){
                $("#attachment_type3").removeAttr("required");
            }else{
                $("#attachment_type3").attr("required", "required");
            }
        }else{

            var remove_required1 = $("#attachment_type1").attr("data-remove-required");
            var remove_required3 = $("#attachment_type3").attr("data-remove-required");

            if(remove_required1 == 1){
                $("#attachment_type1").removeAttr("required");
            }else{
                $("#attachment_type1").attr("required", "required");
            }

            if(remove_required3 == 1){
                $("#attachment_type3").removeAttr("required");
            }else{
                $("#attachment_type3").attr("required", "required");
            }
        }
        /*=========================*/

        if($("#b1_nationality_id").val() == 129){

            $(".b1-pass-attachment").hide();
            $(".b1-ic-attachment").show();

            var remove_required4 = $("#attachment_type4").attr("data-remove-required");
            var remove_required5 = $("#attachment_type5").attr("data-remove-required");

            
            if(remove_required5 == 1){
                $("#attachment_type5").removeAttr("required");
            }else{
                $("#attachment_type5").attr("required", "required");
            }
            $("#attachment_type4").removeAttr("required");

        }else{

            $(".b1-pass-attachment").show();
            $(".b1-ic-attachment").hide();

            var remove_required4 = $("#attachment_type4").attr("data-remove-required");
            var remove_required5 = $("#attachment_type5").attr("data-remove-required");

            if(remove_required4 == 1){
                $("#attachment_type4").removeAttr("required");
            }else{
                $("#attachment_type4").attr("required", "required");
            }            
            $("#attachment_type5").removeAttr("required");
        }
        /*=========================*/

        if($("#beneficiary_seq").val() == 2){

            if($("#b2_nationality_id").val() == 129){

                $(".b2-pass-attachment").hide();
                $(".b2-ic-attachment").show();

                var remove_required6 = $("#attachment_type6").attr("data-remove-required");
                var remove_required7 = $("#attachment_type7").attr("data-remove-required");

                /*if(remove_required6 == 1){
                    $("#attachment_type6").removeAttr("required");
                }else{
                    $("#attachment_type6").attr("required", "required");
                }*/
                
                if(remove_required7 == 1){
                    $("#attachment_type7").removeAttr("required");
                }else{
                    $("#attachment_type7").attr("required", "required");
                }

                $("#attachment_type6").removeAttr("required");

            }else{

                $(".b2-pass-attachment").show();
                $(".b2-ic-attachment").hide();

                var remove_required6 = $("#attachment_type6").attr("data-remove-required");
                var remove_required7 = $("#attachment_type7").attr("data-remove-required");

                if(remove_required6 == 1){
                    $("#attachment_type6").removeAttr("required");
                }else{
                    $("#attachment_type6").attr("required", "required");
                }
                $("#attachment_type7").removeAttr("required");
            }
        }else{

            $(".b2-pass-attachment").hide();
            $(".b2-ic-attachment").hide();
            $("#attachment_type6").removeAttr("required");
            $("#attachment_type7").removeAttr("required");
        }

        /*=========================*/
        if($("#is_joint_applicant").val() == "1"){

            if($("#ja_nationality_id").val() == 129){

                $(".ja-pass-attachment").show();
                $(".ja-address-attachment").show();
                $(".ja-ic-attachment").show();
                
                var remove_required8 = $("#attachment_type8").attr("data-remove-required");
                var remove_required9 = $("#attachment_type9").attr("data-remove-required");
                var remove_required10 = $("#attachment_type10").attr("data-remove-required");

                if(remove_required8 == 1){
                    $("#attachment_type8").removeAttr("required");
                }else{
                    $("#attachment_type8").attr("required", "required");
                }
                
                if(remove_required9 == 1){
                    $("#attachment_type9").removeAttr("required");
                }else{
                    $("#attachment_type9").attr("required", "required");
                }

                if(remove_required10 == 1){
                    $("#attachment_type10").removeAttr("required");
                }else{
                    $("#attachment_type10").attr("required", "required");
                }

            }else{

                $(".ja-pass-attachment").show();
                $(".ja-address-attachment").show();
                $(".ja-ic-attachment").hide();

                var remove_required8 = $("#attachment_type8").attr("data-remove-required");
                var remove_required10 = $("#attachment_type10").attr("data-remove-required");

                if(remove_required8 == 1){
                    $("#attachment_type8").removeAttr("required");
                }else{
                    $("#attachment_type8").attr("required", "required");
                }
                
                $("#attachment_type9").removeAttr("required");

                if(remove_required10 == 1){
                    $("#attachment_type10").removeAttr("required");
                }else{
                    $("#attachment_type10").attr("required", "required");
                }
            }
        }else{
            $(".ja-pass-attachment").hide();
            $(".ja-address-attachment").hide();
            $(".ja-ic-attachment").hide();

            $("#attachment_type8").removeAttr("required");
            $("#attachment_type9").removeAttr("required");
            $("#attachment_type10").removeAttr("required");
        }
    }

    var csrfToken = "{{ csrf_token() }}";

    function registerOTP(){

        var csrfToken = "{{ csrf_token() }}";  

        var form;
        let formData = new FormData(form);

        formData.set('mobile', {{ $user['mobile_no']; }});
        formData.set('country_id', {{ $user['country']; }});
        formData.set('email', "{{ $user['email']; }}");


        axios.post(SITE_URL+'sendRegisterOtp',formData,{
                headers: {
                    'Content-Type': 'multipart/form-data',
                    'X-CSRF-Token': csrfToken}}
        ).then(function(response){

            var item = response.data;
            if(item.error === 0){

                Swal.fire('Dear User','OTP has been sent your mobile number, please verify!','success');
                
            }else{

                Swal.fire('Sorry!',"We're facing some issue on sending SMS, please try again.",'error');
            } 
        })
        .catch(function(e){
            Swal.fire('Sorry!',"We're facing some issue on sending SMS, please try again.",'error');
        });
    }


    var csrfToken = "{{ csrf_token() }}";

    <?php if($user['2fa_status'] == 1){ ?>

        function saveScubscription(){
            if ($('#subscriptionform').parsley().validate()) {

                var review_signed_application = $("#input_review_signed_application").val();
                if(review_signed_application == "1"){
                    var application_confirm = true;
                }else{
                    Swal.fire('Sorry!',"Please ensure you have downloaded the signed application form before you submit..",'error');
                    var application_confirm = false;
                    return false;
                }

                if(application_confirm){

                    preloader_init();

                    var form;
                    let formData = new FormData(form);
                    var email = "<?= $user['email']; ?>";
                    //var otp = $("#users-otp").val();

                    var element = $('[id=users-otp]');
                    var otp= '';
                    for(var i=0; i<element.length; i++) {
                        otp+= element[i].value;
                    }

                    formData.set('email', email);
                    formData.set('otp', otp);
                    
                    axios.post(SITE_URL+'gaotpCheck',formData,{
                            headers: {
                                'Content-Type': 'multipart/form-data',
                                'X-CSRF-Token': csrfToken}}
                    ).then(function(response){

                        var item = response.data;
                        if(item.error === 0){
                            $('#subscriptionform').submit();
                        }else{

                            preloader_off();
                            Swal.fire('Sorry!',"OTP code incorrect, please try again.",'error');
                        }
                    })
                    .catch(function(){

                        preloader_off();
                        Swal.fire('Sorry!',"OTP code incorrect, please try again.",'error');
                    });
                }else{
                    Swal.fire('Sorry!',"Please ensure you have downloaded the signed application form before you submit..",'error');
                }
            }
        }

    <?php }else{ ?>

        function saveScubscription(){

            if ($('#subscriptionform').parsley().validate()) {
            
                var review_signed_application = $("#input_review_signed_application").val();
                if(review_signed_application == "1"){
                    var application_confirm = true;
                }else{
                    Swal.fire('Sorry!',"Please ensure you have downloaded the signed application form before you submit..",'error');
                    var application_confirm = false;
                    return false;
                }

                if(application_confirm){

                    //preloader_init();

                    var form;
                    let formData = new FormData(form);

                    var email = "<?= $user['email']; ?>";
                    //var otp = $("#users-otp").val();

                    var element = $('[id=users-otp]');
                    var otp= '';
                    for(var i=0; i<element.length; i++) {
                        otp+= element[i].value;
                    }

                    formData.set('email', email);
                    formData.set('otp', otp);
                    
                    axios.post(SITE_URL+'otpCheck',formData,{
                            headers: {
                                'Content-Type': 'multipart/form-data',
                                'X-CSRF-Token': csrfToken}}
                    ).then(function(response){

                        var item = response.data;
                        if(item.error === 0){
                            $('#subscriptionform').submit();
                        }else{
                            
                            //preloader_off();
                            Swal.fire('Sorry!',"OTP code incorrect, please try again.",'error');
                        }
                    })
                    .catch(function(){
                        //preloader_off();
                        Swal.fire('Sorry!',"OTP code incorrect, please try again.",'error');
                    });
                }else{
                    Swal.fire('Sorry!',"Please ensure you have downloaded the signed application form before you submit..",'error');
                }
            }
        }

    <?php } ?>

    function saveSubscriptionDraft(){

        if ($('#subscriptionform').parsley().validate('block1')) {

            const form = document.getElementById('subscriptionform');
            let formData = new FormData(form);
            formData.set('is_first', 0);
            
            axios.post(SITE_URL+'individual/additionalDraft',formData,{
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        'X-CSRF-Token': csrfToken}}
            ).then(function(response){
                var item =response.data;
                if(item.error === 0){
                    $('#subscription_id').val(item.data.id);
                    $("#review_signed_application").attr("href", SITE_URL+'individual/signedApplication/'+item.data.id);
                    $("#link_declaration_of_source").attr("href", SITE_URL+'individual/sourceDeclaration/'+item.data.id); 
                }
            });
        }
    }

    function savedAndDaft(){

        // if ($('#subscriptionform').parsley().validate('block1')) {

            const form = document.getElementById('subscriptionform');
            let formData = new FormData(form);
            formData.set('is_first', 0);
            
            axios.post(SITE_URL+'individual/additionalDraft',formData,{
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        'X-CSRF-Token': csrfToken}}
            ).then(function(response){
                var item =response.data;
                if(item.error === 0){
                    $('#subscription_id').val(item.data.id);
                    toastr.success("Your data saved successfully");
                }
            });
        // }
    }

    $('#reviewDoc').on('click', function () {
        
        $('#divResult2').empty();
        var id = $('#subscription_id').val();
        axios.get(SITE_URL+'individual/reviewImage?id='+id).then(function (response) {
            
            var strResult = "";
            var item =response.data.data;

            var j =1;
            $.each(item, function (i) {
                if(item[i].attachment){
                    
                    var download_url = "{{ asset(Storage::url('')); }}/"+item[i].attachment;
                    strResult += '<p class="ez_view_group ez_view_click'+j+'" src="" href="'+download_url+'" alt="'+item[i].remarks+'"></p>';
                    j++;
                }
            });
            
            $("#divResult2").html(strResult);
            ez_viewcall();
        });
    });


    
    function ez_viewcall(){
        $('.ez_view_group').EZView();
        $('.ez_view_click1').trigger('click');
    }

    $(document).on("click",".download_signed_application",function() {
        var id = $('#subscription_id').val();
        var userId = $('#user_id').val();
        $("#input_review_signed_application").val(1);

        if(id){

            preloader_init();

            var csrfToken = "{{ csrf_token() }}"; 

            const form = document.getElementById('subscriptionform');
            let formData = new FormData(form);
            formData.set('id', id);
            formData.set('userId', userId);
                
            axios.post(SITE_URL+'individual/signedPdfDownload',formData,{
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        'X-CSRF-Token': csrfToken
                    }
                }
            ).then(function(response){

                preloader_off();

                console.log(response.data);
                if(response.data.data === "success"){ 

                    var subscription_id = response.data.subscription_id;
                    var file = response.data.filename;
                    var filename = base_url+"pdf/signedPdf/"+file;
                    //window.open(filename, "_blank")

                    var link = document.createElement("a");
                    link.download = subscription_id+'.pdf';
                    link.href = filename;
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                    delete link;

                }else{
                    Swal.fire('Sorry!',"Please try again.",'error');
                }

            }).catch(function(){
                alert('File not detected');
            });
        }
    }); 

</script>

@stop