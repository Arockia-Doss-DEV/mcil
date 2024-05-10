@extends('layouts.app')

@section('title', 'SUBSCRIPTION')

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

<div class="container-fluid page-body-wrapper full-page-wrapper">
    <nav class="navbar fixed-top custom-form-navbar">
        <div class="navbar-menu-container d-flex align-items-center justify-content-center">
            <nav class="secondary-navbar">
                <div class="d-flex justify-content-center">
                    <a class="brand-logo custom-form-navbar-logo">
                        <img src="{{ asset('assets/images/logo/login-logo.png') }}" alt="Dashboard" title="Dashboard" />
                    </a>
                </div>
            </nav>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item">
                    <button class="nav-link" href="#" onclick="savedAndDaft();" title="Save Draft"> <i data-feather="save" class="navfeathericon"></i></button>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" title="Logout">
                        <i data-feather="log-out" class="navfeathericon"></i>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </nav>
</div>

<div class="main-panel custom-subscrption-main-panel">
    <div class="content-wrapper">
        <div class="multisteps-form">
            <div class="row">
                <div class="col-12 col-lg-8 m-auto pb-4">
                    <div class="bg-white">

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

                        {{ Form::open(['class' => 'multisteps-form__form', 'route' => 'companyInitialSubscriptionSave', 'files' => true, 'id'=>'subscriptionform', 'data-parsley-validate' => 'data-parsley-validate', "data-parsley-trigger"=>"keyup", 'autocomplete'=>"off"]) }}

                            <input type="hidden" name="user_id" id="user_id" value="{{ $userData['id'] }}"/>                                
                            <input type="hidden" name="subscription_id" id="subscription_id" value="{{ @$subscription['id'] }}"/>

                        <div class="formWizardDiv">

                            <div class="multisteps-form__panel  p-4 rounded bg-white js-active" data-animation="scaleIn">
        
                                @include("elements.company.subscription")
                            </div>

                            <div class="multisteps-form__panel  p-4 rounded bg-white" data-animation="scaleIn">
                                @include("elements.company.declaration")
                            </div>

                            <!--single form panel-->
                            <div class="multisteps-form__panel  p-4 rounded bg-white" data-animation="scaleIn">
                                @include("elements.company.documents")
                            </div>

                            <!--single form panel-->
                            <div class="multisteps-form__panel  p-4 rounded bg-white" data-animation="scaleIn">
                                
                                @include("elements.company.reviews")
                            </div>

                        </div>

                        {{ Form::close() }}

                    </div>
                </div>
            </div>
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

    $(document).ready(function () {

        $('#fund_type').change(function(){

            if($(this).val() == "1"){
                var download_url = base_url+"img/docs/supplementary.pdf";
                var download_url2 = base_url+"img/docs/MCIL-INTL-ShareApplication.pdf";

                $(".supplementary_link").attr("href", download_url);
                $(".shareapplication_link").attr("href", download_url2);

                $("#initial_investment").attr("data-parsley-min", {{ Setting::get('initial_amount') }});
                $("#initial_investment").attr("data-parsley-error-message", "Minimum initial investment amount is {{ Setting::get('initial_amount') }}.00");

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

                $("#initial_investment").attr("data-parsley-min", "125000");
                $("#initial_investment").attr("data-parsley-error-message", "Minimum initial investment amount is 125000.00");

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

            $("#initial_investment").attr("data-parsley-min", "125000");
            $("#initial_investment").attr("data-parsley-error-message", "Minimum initial investment amount is 125000.00");

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
        
        $('#is_same_address').click(function(){
            if($(this). is(":checked")){
                $("#tr_addr_line_1").val("{{ $userData->address_line1; }}");
                $("#tr_addr_line_2").val("{{ $userData->address_line2; }}");
                $("#tr_city").val("{{ $userData->city; }}");
                $("#tr_country_id").val("{{ $userData->country; }}");
                $("#tr_postcode").val("{{ $userData->post_code; }}");
                $("#tr_state_id").val("{{ $userData->state; }}");

                var default_state = "{{ @$userData['state']; }}";
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

            axios.post(SITE_URL+'company/uploadDocumentRemove',fd,{
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

                axios.post(SITE_URL+'company/uploadDocument',fd,{
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

    });

    function registerOTP(){

        var csrfToken = "{{ csrf_token() }}";  

        var form;
        let formData = new FormData(form);

        formData.set('mobile', {{ $userData['mobile_no']; }});
        formData.set('country_id', {{ $userData['country']; }});
        formData.set('email', "{{ $userData['email']; }}");


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

    <?php if($userData['2fa_status'] == 1){ ?>

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
                    var email = "<?= $userData['email']; ?>";
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

                    preloader_init();

                    var form;
                    let formData = new FormData(form);

                    var email = "<?= $userData['email']; ?>";
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

    <?php } ?>

    function saveSubscriptionDraft(){

        if ($('#subscriptionform').parsley().validate('block1')) {

            const form = document.getElementById('subscriptionform');
            let formData = new FormData(form);
            formData.set('is_first', 1);
            
            axios.post(SITE_URL+'company/initialsubscriptionSaveDraft',formData,{
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        'X-CSRF-Token': csrfToken}}
            ).then(function(response){
                var item =response.data;
                if(item.error === 0){
                    $('#subscription_id').val(item.data.id);
                    
                    $("#review_signed_application").attr("href", SITE_URL+'company/signedApplication/'+item.data.id);

                    $("#link_declaration_of_source").attr("href", SITE_URL+'company/sourceDeclaration/'+item.data.id); 
                }
            });
        }
    }

    function savedAndDaft(){

        // if ($('#subscriptionform').parsley().validate('block1')) {

            const form = document.getElementById('subscriptionform');
            let formData = new FormData(form);
            formData.set('is_first', 1);
            
            axios.post(SITE_URL+'company/initialsubscriptionSaveDraft',formData,{
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

    documentGet();

    function documentGet(){

        var id = $('#subscription_id').val();
        if(id){
            axios.get(SITE_URL+'company/getDocument?id='+id).then(function (response){
            
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

    $('#reviewDoc').on('click', function () {
        
        $('#divResult2').empty();
        var id = $('#subscription_id').val();
        axios.get(SITE_URL+'company/reviewImage?id='+id).then(function (response) {
            
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
        $("#input_review_signed_application").val(1);

        if(id){

            preloader_init();

            var csrfToken = "{{ csrf_token() }}"; 

            const form = document.getElementById('subscriptionform');
            let formData = new FormData(form);
            formData.set('id', id);
                
            axios.post(SITE_URL+'company/signedPdfDownload',formData,{
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
                    var filename = base_url+"pdf/company/signedPdf/"+file;
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
                preloader_off();
            });
        }
    }); 

</script>

@stop



