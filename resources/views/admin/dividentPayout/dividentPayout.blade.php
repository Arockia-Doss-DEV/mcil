@extends('layouts.app')

@section('title', 'Dividend Payouts')

@section('content')

<div class="container-fluid page-body-wrapper">

    @include("admin.elements.sidebar")

    <div class="main-panel mb-5">
        <div class="content-wrapper">
            <div class="d-flex justify-content-between">
                <div class="pageheader">
                    <h4>Dividend Payouts</h4>
                </div>
            </div>

            <div class="row mt-3 mb-5">
                <div class="col-lg-12 card-margin">
                    <div class="card">

                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="input-group mb-3">
                                        <div class="card-header">
                                            <h6 class="card-title m-0">Select Dividend Contracts</h6>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-8 text-md-right">
                                    <a href="{{ url('/divident/payouts') }}" class="btn btn-info mr-1"> Back</a>
                                </div>
                            </div>

                            <form action="#" id="form-divident-create" data-parsley-validate method="post" autocomplete="off" enctype="multipart/form-data">
                            <input type="hidden" name="userId" id="userId" value="{{ $data['user']['id'] }}">

                            <div class="modal-body">
                                <div class="row">

                                    <div class="container">
                                        <div class="row mb-5">
                                            <div class="col-lg-3 mt-2">
                                                <label>Payout Type</label>
                                                <select name="payout_type" class="form-control fund-sub-input" id="create_payout_type" onchange="createPayoutType()" required>
                                                    <option value="">Select Payout Type</option>
                                                    <option value="Dividend">Dividend</option>
                                                    <option value="Bonus">Bonus</option>
                                                    {{-- <option value="Dividend & Bonus">Dividend & Bonus</option> --}}
                                                </select>
                                            </div>
                                            
                                            <div class="col-lg-4 mt-2 create_payout_date_div">
                                                <label>Dividend Payout Date <span class="mandatory">*</span></label>
                                                <select class="form-control search-input" name="divident_date" id="create_payout_date" onchange="createPayoutDate()" required>
                                                    <option value="">--</option>
                                                    @foreach ($data['dividend_date'] as $dividend)
                                                        <option attr-date="{{ $dividend['date'] }}" value="{{ $dividend['quarter'] }}">{{ $dividend['full'] }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-lg-3 mt-2 create_payout_date_div">
                                                <label>Payout Date <span class="mandatory">*</span></label>
                                                <div class="input-group addpayouterr">
                                                    <input type="date" class="form-control search-input" name="payout_date" id="create_divident_date" data-parsley-errors-container="#payout_dateError1" required>
                                                </div>
                                                <div id="payout_dateError1"></div>
                                            </div>
                                            <div class="col-lg-3 mt-2 create_payout_date1_div">
                                                <label>Payout Date <span class="mandatory">*</span></label>
                                                <div class="input-group addpayouterr">
                                                    <input type="date" class="form-control search-input" name="payout_date1" id="create_payout_date1" data-parsley-errors-container="#payout_dateError2">
                                                </div>
                                                <div id="payout_dateError2"></div>
                                            </div>  

                                            <div class="col-lg-3 mt-2 addpayouterr">
                                                <label>Reference <span class="mandatory"></span></label>
                                                <input type="text" name="reference" id="reference" class="form-control search-input ">
                                            </div>
                                        
                                            <div class="col-lg-2 mt-2 addpayouterr">
                                                <label>File</label>
                                                <div class="custom-file addpayouterr"><input type="file" name="file" id="file" class="form-control"></div>
                                            </div>

                                            <div class="col-lg-1 mt-4 pt-3">
                                                <button type="button" class="btn btn-soft-primary mr-1" id="dividentButton"><i data-feather="filter"></i></button>
                                            </div>
                                        </div>
                                                    
                                        <table class="table table-bordered">
                                            <tbody id="dynamicadd">

                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="reset" class="btn btn-secondary modal-cancel">Reset</button>
                                <button type="button" id="reviewPdfModel" class="btn btn-info">Continue</button>

                                {{-- <button type="submit" class="btn btn-info">Continue</button> --}}
                            </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="viewReviewPdfModel" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Review Dividend Funds Info</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="#" id="form-divident-payout" data-parsley-validate method="post" autocomplete="off">
                            <div class="modal-body">
                                <div class="row">
                                    <input type="hidden" id="user_id" name="user_id" value="{{ $data['user']['id'] }}">

                                    @php
                                        $fundsGolbal = getFunds();
                                        $getGlobalFund = getDefaultGlobalFund();
                                    @endphp

                                    @foreach ($fundsGolbal as $fund)

                                        @if ($getGlobalFund == "All")

                                            <div class="col-md-12 mb-2">
                                               <button class="btn btn-sm btn-success text-white" fund-attr-id="{{ $fund->id }}" fund-attr-name="{{ $fund->name }}" id="review_payout_form">{{ $fund->name }}</button>
                                            </div>

                                        @elseif(($getGlobalFund == "1") && ($fund->id == "1"))


                                            <div class="col-md-12 mb-2">
                                               <button class="btn btn-sm btn-success text-white" fund-attr-id="{{ $fund->id }}" fund-attr-name="{{ $fund->name }}" id="review_payout_form">{{ $fund->name }}</button>
                                            </div>

                                        @elseif(($getGlobalFund == "2") && ($fund->id == "2"))

                                            <div class="col-md-12 mb-2">
                                               <button class="btn btn-sm btn-success text-white" fund-attr-id="{{ $fund->id }}" fund-attr-name="{{ $fund->name }}" id="review_payout_form">{{ $fund->name }}</button>
                                            </div>

                                        @elseif(($getGlobalFund == "3") && ($fund->id == "3"))

                                            <div class="col-md-12 mb-2">
                                               <button class="btn btn-sm btn-success text-white" fund-attr-id="{{ $fund->id }}" fund-attr-name="{{ $fund->name }}" id="review_payout_form">{{ $fund->name }}</button>
                                            </div>

                                        @else

                                        @endif
                                        
                                    @endforeach

                                    <div class="col-md-12 mt-2 mb-2">
                                        <div class="mt-2 string-check string-check-soft-info  mb-2">
                                            <input type="checkbox" id="divident_mail" name="divident_mail" value="1"/>
                                            <label class="string-check-label"><span class="ml-2"> Click to send dividend mail </span></label>
                                        </div>
                                    </div>

                                    {{-- <div class="col-md-12 mb-2">
                                       <button class="btn btn-sm btn-success" id="review_payout_form">Click to Review Dividend Payout Form</button>
                                    </div>

                                    <div class="col-md-12 mt-2 mb-2">
                                        <input type="checkbox" id="divident_mail" name="divident_mail" value="1"/>
                                        <label class="string-check-label"> <span class="ml-2"> Click to send dividend mail </span></label>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary modal-cancel"
                                    data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-info">Save</button>
                            </div>
                        </form>
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
    $(document).ready(function(){

        $(document).on('click','.remove_row',function(){
            var row_id = $(this).attr("id");
            $('#row_'+row_id+'').remove();
        });

        $('.create_payout_date1_div').hide();

    });

    function createPayoutType(){

        var payout_type = $("#create_payout_type").val();
        if(payout_type == "Dividend"){
            
            $('.create_payout_date_div').show();
            $('.create_payout_date1_div').hide();
            
            $("#create_payout_date1").removeAttr("required");
            $("#create_payout_date").attr("required", "required");
            $("#create_divident_date").attr("required", "required");

        }else{
            $('.create_payout_date1_div').show();
            $('.create_payout_date_div').hide();
            
            $("#create_payout_date").removeAttr("required");
            $("#create_divident_date").removeAttr("required");
            $("#create_payout_date1").attr("required", "required");
        }

        $("#create_payout_date").val("").trigger( "change" );
        $("#create_divident_date").val("");
        $("#create_payout_date1").val("");
        $("#create_percentage").val("");
        $("#create_amount").val("");
        $("#reference").val("");
        $("#file").val("");

        $("#dynamicadd").html("");
    }

    function createPayoutDate() {
        var dividentDate = $('#create_payout_date option:selected').val();
        $("#dynamicadd").html("");
    }

    $(document).on("click","#dividentButton",function(e) {
        if ($('#form-divident-create').parsley().validate()) {

            preloader_init();

            var userId = $("#userId").val();
            var payoutType = $('#create_payout_type option:selected').val();
            var dividentDate = $('#create_payout_date option:selected').val();
            var payoutDate = $("#create_divident_date").val();
            var payoutDate1 = $("#create_payout_date1").val();

            var csrfToken = "{{ csrf_token() }}";
            const form = document.getElementById('form-divident-create');
            let formData = new FormData(form);
            formData.set('user_id', userId);
            formData.set('payout_type', payoutType);
            formData.set('divident_date', dividentDate);
            formData.set('payout_date', payoutDate);
            formData.set('payout_date1', payoutDate1);

            axios.post(SITE_URL+'check/divident/contracts',formData,{
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        'X-CSRF-Token': csrfToken}}
            ).then(function(response){

                var strResult = "";
                var item =response.data.data;

                if (payoutType === "Dividend") {

                    Object.keys(item.commencement_year).forEach(function (key) {
                        Object.keys(item.commencement_year[key]['subscription_id']).forEach(function (key2) {

                            var subscriptionId = item.commencement_year[key]['subscription_id'][key2];
                            var userId = item.commencement_year[key]['user_id'][key2];
                            var fundType = item.commencement_year[key]['fund_type'][key2];
                            var status = item.commencement_year[key]['status'][key2];
                            var investmentId = item.commencement_year[key]['investment_id'][key2];
                            var investorName = item.commencement_year[key]['investor_name'][key2];
                            var investmentAmount = item.commencement_year[key]['investment_amount'][key2];
                            var full = item.commencement_year[key]['full'][key2];
                            var quarter = item.commencement_year[key]['quarter'][key2];
                            var year = item.commencement_year[key]['year'][key2];
                            var month = item.commencement_year[key]['month'][key2];
                            var date = item.commencement_year[key]['date'][key2];
                            var percentage = item.commencement_year[key]['percentage'][key2];
                            var amount = item.commencement_year[key]['amount'][key2];
                            var quarter_year = item.commencement_year[key]['quarterYear'][key2];

                            strResult += '<tr id="row_'+ subscriptionId +'">"<td><input type="hidden" name="subscription_id[]" id="subscription_id_'+ subscriptionId +'" value="'+ subscriptionId +'"><input type="hidden" name="fund_type[]" id="fund_type_'+ subscriptionId +'" value="'+ fundType +'"><input type="hidden" name="status[]" id="status_'+ subscriptionId +'" value="'+ status +'"><input type="hidden" name="subscription_amount[]" id="subscription_amount_'+ subscriptionId +'" value="'+ investmentAmount +'"><input type="hidden" id="investment_no_'+ subscriptionId +'" name="investment_no[]" value="'+ investmentId +'"><input type="hidden" id="quarter_year_'+ subscriptionId +'" name="quarter_year[]" value="'+ quarter_year +'"><input type="hidden" id="divident_date_format_'+ subscriptionId +'" name="divident_date_format" value="'+ date +'"><input type="hidden" id="investor_name_'+ subscriptionId +'" name="investor_name[]" value="'+ investorName +'"><span class="ml-2"><strong>'+ investmentId +'</strong></span></td><td><div class="col-lg-12 mt-3 addpayouterr"><label>Percentage % <span class="mandatory">*</span></label><input type="text" name="percentage[]" id="create_percentage_'+ subscriptionId +'" value="'+ percentage +'" class="form-control search-input" onchange="createPercentage('+ subscriptionId +')" required></div></td><td><div class="col-lg-12 mt-3 addpayouterr"><label> Amount (USD) <span class="mandatory">*</span></label><input type="text" name="amount[]" id="create_amount_'+ subscriptionId +'" value="'+ amount +'" class="form-control search-input" required readonly></div></td><td><button type="button" id="'+ subscriptionId +'" class="btn btn-danger remove_row">-</button></td>"</tr>';
                        });
                    });

                } else {

                    Object.keys(item.commencement_year['subscription_id']).forEach(function (key) {

                        var subscriptionId = item.commencement_year['subscription_id'][key];
                        var userId = item.commencement_year['user_id'][key];
                        var fundType = item.commencement_year['fund_type'][key];
                        var status = item.commencement_year['status'][key];
                        var investmentId = item.commencement_year['investment_id'][key];
                        var investorName = item.commencement_year['investor_name'][key];
                        var investmentAmount = item.commencement_year['investment_amount'][key];
                        var quarter = item.commencement_year['quarter'][key];
                        var year = item.commencement_year['year'][key];
                        var month = item.commencement_year['month'][key];
                        var quarter_year = item.commencement_year['quarterYear'][key];

                        strResult += '<tr id="row_'+ subscriptionId +'">"<td><input type="hidden" name="subscription_id[]" id="subscription_id_'+ subscriptionId +'" value="'+ subscriptionId +'"><input type="hidden" name="fund_type[]" id="fund_type_'+ subscriptionId +'" value="'+ fundType +'"><input type="hidden" name="status[]" id="status_'+ subscriptionId +'" value="'+ status +'"><input type="hidden" name="subscription_amount[]" id="subscription_amount_'+ subscriptionId +'" value="'+ investmentAmount +'"><input type="hidden" id="investment_no_'+ subscriptionId +'" name="investment_no[]" value="'+ investmentId +'"><input type="hidden" id="quarter_year_'+ subscriptionId +'" name="quarter_year[]" value="'+ quarter_year +'"><input type="hidden" id="investor_name_'+ subscriptionId +'" name="investor_name[]" value="'+ investorName +'"><span class="ml-2"><strong>'+ investmentId +'</strong></span></td><td><div class="col-lg-12 mt-3 addpayouterr"><label> Amount (USD) <span class="mandatory">*</span></label><input type="text" name="amount[]" id="create_amount_'+ subscriptionId +'" class="form-control search-input" required></div></td><td><button type="button" id="'+ subscriptionId +'" class="btn btn-danger remove_row">-</button></td>"</tr>';
                    });
                }

                $("#dynamicadd").html("");
                $("#dynamicadd").html(strResult);

                preloader_off();
            })
            .catch(function(){

                Swal.fire('Sorry !','Dividend Payments create faild!','error');
                preloader_off();
            });
        }
    });
        
    function createPercentage(arg_id){
        var initial_amount = $("#subscription_amount_"+arg_id).val();
        
        var per = $("#create_percentage_"+arg_id).val();
        var total = (initial_amount*per)/100;

        $("#create_amount_"+arg_id).val(total);

    }

    $('#form-divident-payout').submit(function(e) {
        e.preventDefault();

            $('#viewReviewPdfModel').modal('hide');

            preloader_init();

            var csrfToken = "{{ csrf_token() }}";
            // var divident_mail_status = $("#divident_mail").val();
            var divident_mail_status = $("input[type='checkbox'][id='divident_mail']:checked").val();
            var file = $("#file")[0].files[0];

            const form = document.getElementById('form-divident-create');
            let formData = new FormData(form);
            formData.set('divident_mail_status', divident_mail_status);
            formData.set('file', file);
            
            axios.post(SITE_URL+'subscription/ajaxDividentSave',formData,{
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        'X-CSRF-Token': csrfToken}}
            ).then(function(response){
                
                preloader_off();

                var item =response.data;
                if(item.error === 0){

                    toastr.success(item.msg);
                    $("#form-divident-create")[0].reset();
                    setTimeout(location.reload.bind(location), 300);

                } else if(item.error === 1){ 
                    toastr.error(item.msg);
                    $("#form-divident-create")[0].reset();
                    setTimeout(location.reload.bind(location), 300);
                }

            })
            .catch(function(){

                Swal.fire('Sorry !','Dividend Payments create faild!','error');
                preloader_off();
            });

        // }
    });

    $(document).on("click","#reviewPdfModel",function() {

        var userId = $("#userId").val();
        var payoutType = $('#create_payout_type option:selected').val();
        var dividentDate = $('#create_payout_date option:selected').val();
        var payoutDate = $("#create_divident_date").val();
        var payoutDate1 = $("#create_payout_date1").val();

        if(payoutType != null && payoutType != '') {
            if(payoutType == "Dividend"){
                if((payoutType != null && payoutType != '') && (dividentDate != null && dividentDate != '') && (payoutDate != null && payoutDate != '')) {
                    $('#viewReviewPdfModel').modal('show');
                } else {
                    alert('Please select required fields!')
                }
            } else {
                if((payoutType != null && payoutType != '') && (payoutDate1 != null && payoutDate1 != '')) {
                    $('#viewReviewPdfModel').modal('show');
                } else {
                    alert('Please select required fields!')
                }
            }

        } else {
            alert('Please select required fields!')
        }
    });

    $(document).on("click","#review_payout_form",function(e) {

        e.preventDefault();

        preloader_init();
        var csrfToken = "{{ csrf_token() }}";
        var user_id = $("#user_id").val();

        var fundId = $(this).attr('fund-attr-id');
        var fundName = $(this).attr('fund-attr-name');

        // const form = document.getElementById('form-divident-payout');
        const form = document.getElementById('form-divident-create');
        let formData = new FormData(form);
        formData.set('fund_id', fundId);
        formData.set('fund_name', fundName);

        axios.post(SITE_URL+'review/divident/payout',formData,{
                headers: {
                    'Content-Type': 'multipart/form-data',
                    'X-CSRF-Token': csrfToken}}
        ).then(function(response){
            
            if(response.data.data === "success"){ 
                preloader_off();

                var user_id = response.data.user_id;
                var file = response.data.filename;
                var filename = base_url+"pdf/docs/dividentPayment/"+file;
                //window.open(filename, "_blank")

                var link = document.createElement("a");
                // link.download = user_id+'.pdf';
                // link.href = filename;
                window.open(filename);
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
                delete link;

            } else if(response.data.data === "empty") {

                Swal.fire('Sorry!', response.data.msg ,'warning');
                preloader_off();

            } else {
                Swal.fire('Sorry!',"Please try again.",'error');
                preloader_off();
            }
        })
        .catch(function(){
            Swal.fire('Sorry !','Something went wrong!','error');
            preloader_off();
        });

    });

    
    // $('#review_payout_form').on('click', function (e) {
    //     e.preventDefault();

    //     preloader_init();
    //     var csrfToken = "{{ csrf_token() }}";
    //     var user_id = $("#user_id").val();

    //     // const form = document.getElementById('form-divident-payout');
    //     const form = document.getElementById('form-divident-create');
    //     let formData = new FormData(form);

    //     axios.post(SITE_URL+'review/divident/payout',formData,{
    //             headers: {
    //                 'Content-Type': 'multipart/form-data',
    //                 'X-CSRF-Token': csrfToken}}
    //     ).then(function(response){
            
    //         if(response.data.data === "success"){ 
    //             preloader_off();

    //             var user_id = response.data.user_id;
    //             var file = response.data.filename;
    //             var filename = base_url+"pdf/docs/dividentPayment/"+file;
    //             //window.open(filename, "_blank")

    //             var link = document.createElement("a");
    //             // link.download = user_id+'.pdf';
    //             // link.href = filename;
    //             window.open(filename);
    //             document.body.appendChild(link);
    //             link.click();
    //             document.body.removeChild(link);
    //             delete link;

    //         }else{
    //             Swal.fire('Sorry!',"Please try again.",'error');
    //             preloader_off();
    //         }
    //     })
    //     .catch(function(){
    //         Swal.fire('Sorry !','Something went wrong!','error');
    //         preloader_off();
    //     });
    // });

</script>

@stop