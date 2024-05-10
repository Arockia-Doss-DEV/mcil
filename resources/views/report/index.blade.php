@extends('layouts.app')

@section('title', 'Contract Reports')

@section('styles')

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />

  <style type="text/css">

    .multiselect-container {
      width: 100% !important;
    }

    .dropdown-menu {width:100% !important;}

  </style>
@stop

@section('content')

<div class="container-fluid page-body-wrapper">

    @include("admin.elements.sidebar")

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="d-flex justify-content-between">
                <div class="pageheader">
                    <h4>REPORTS</h4>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Contract Summary Reports</h5>
                        </div>
                        <div class="card-body">
                        
                            {{ Form::open(['url' => '/contract/reports', 'id'=>'reportsForm', 'class'=>'', 'data-parsley-validate'=>'data-parsley-validate', 'autocomlete'=>"off",'type'=>'file']) }}

                                <div class="row">
                                    <form method="get" action="{{ url('/contract/reports') }}">
                                        <div class="col-lg-3">
                                             <label>Search by </label>
                                            <div class="input-group mb-3">
                                                <input type="text" name="q" id="query" placeholder=" Name, Investment ID, Bank, Account Name, Account Number" class="form-control search-input" value="{{request()->get('q','')}}" />
                                                <div class="input-group-append">
                                                    <button type="submit" id="search_btn" class="btn btn-info"> 
                                                        <i data-feather="search"></i> </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                    <div class="col-lg-3">
                                        <label>Start Date: </label>
                                        <input type="date" class="form-control search-input" name="start_date" id="start_date" data-parsley-errors-container="#start_date_error" required="required">
                                        <div id="start_date_error"></div>
                                    </div>
                                
                                    <div class="col-lg-3">
                                        <label>End Date: </label>
                                        <input type="date" class="form-control search-input" name="end_date" id="end_date" data-parsley-errors-container="#end_date_error" required="required">
                                        <div id="end_date_error"></div>
                                    </div>
                                    <div class="col-lg-2">
                                        <label>Status</label><br>
                                        <?php 
                                            $options = ["0"=> "Pending", "1"=>"Pending Funding", "2" =>"Incomplete", "3"=>"Active", "4"=>"Deactive", "5"=>"Rejected", "6"=>"Matured" ];
                                        ?>
                                        {!! Form::select('status[]', $options, null, ['class' => 'form-control fund-sub-input', 'id' => 'status', 'multiple' => '', 'required'=> 'required']) !!}
                                    </div>
                                    <div class="col-lg-1 text-md-left mt-4 pt-2">
                                        <button type="button" class="btn btn-info" id="viewButton"><i data-feather="filter"></i></button>
                                    </div>

                                </div>
                            
                            {{ Form::close() }}
                            
                            <div class="table-responsive mt-2" id="data">
                                
                                @include('report.child')

                            </div>

                            <div class="mt-3 text-right">
                                <button type="button" id="exportButton" class="btn btn-info"><i data-feather="download"></i> Export</button>
                            </div>

                        </div>
                    </div><br><br>
                </div>

            </div>

            @include('admin.elements.footer')

        </div>
    </div>


</div>

@endsection

@section('scripts')
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>

    <script type="text/javascript">
        $('#excelButton').click(function(){
            $('#excelButton').button('please wait ...');
        });

        $(document).ready(function(){

            $('#status').multiselect({
                nonSelectedText: 'Select status',
                enableFiltering: true,
                enableCaseInsensitiveFiltering: true,
                buttonClass: 'form-control fund-sub-input',
            });

            $(document).on('click', '.page-link', function(e){
                e.preventDefault();

                var status=[];
                var $el=$("#status");
                $el.find('option:selected').each(function(){
                    status.push($(this).val());
                });

                $('.pagination li').removeClass('active');
                $(this).parent('li').addClass('active');

                var url = $(this).attr('href').split('page=')[1];
                history.pushState(null,null,'?page=' + url);
                getReport(url);
            });

            function getReport(url) {

                let _token = $("input[name=_token]").val();

                var status=[];
                var $el=$("#status");
                $el.find('option:selected').each(function(){
                    status.push($(this).val());
                });

                let start_date = $("#start_date").val();
                let end_date = $("#end_date").val();

                if(start_date != null && start_date != '' || end_date != null && end_date != '') {
                   
                    var date = '&start_date=' + start_date + '&end_date=' + end_date;
                } else {
                    var date = "";
                }

                $.ajax({
                    
                    url:SITE_URL+"contract/reports/?page=" + url + '&status=' + status + date,
                    type: 'GET',
                    datatype: 'html',
                    data:{status:status, _token:_token},

                }).done(function (data) {

                    // $('#data').html(data);
                    $('#data').empty().html(data);

                }).fail(function () {
                    alert('Reports could not be loaded.');
                });
            }

            $(document).on("click","#viewButton",function(e) {
                if ($('#reportsForm').parsley().validate()) {

                    var status=[];
                    var $el=$("#status");
                    $el.find('option:selected').each(function(){
                        status.push($(this).val());
                    });

                    var start_date = $("#start_date").val();
                    var end_date = $("#end_date").val();

                    // if(start_date != null && start_date != '' || end_date != null && end_date != '') {
                    //     var date = '&start_date=' + start_date + '&end_date=' + end_date;
                    // } else {
                    //     var date = "";
                    // }

                    let page = 1;
                    history.pushState(null,null,'?page=' + page);
                    $.ajax({
                        url:SITE_URL+"contract/reports/?page=" + page,
                        type: 'get',
                        datatype: 'html',
                        data:{status:status, start_date:start_date, end_date:end_date},
                        success:function(data){
                            $('#data').empty().html(data);
                            // $('#data').html(data);
                        }
                    });
                }
            });

            $(document).on('click', '#search_btn', function(e){
                e.preventDefault();

                var query = $("#query").val();

                let page = 1;
                history.pushState(null,null,'?page=' + page);
                $.ajax({
                    url:SITE_URL+"contract/reports/?page=" + page,
                    type: 'get',
                    datatype: 'html',
                    data:{query:query},
                    success:function(data){
                        $('#data').empty().html(data);
                        // $('#data').html(data);
                    }
                });
            });

        });
        
        $(document).on("click","#exportButton",function(e) {

            if ($('#reportsForm').parsley().validate()) {

                e.preventDefault();
                preloader_init();

                var csrfToken = "{{ csrf_token() }}";
                var start_date = $("#start_date").val();
                var end_date = $("#end_date").val();

                var status=[];
                var $el=$("#status");
                $el.find('option:selected').each(function(){
                    status.push($(this).val());
                });

                const form = document.getElementById('reportsForm');
                let formData = new FormData(form);
                formData.set('start_date', start_date);
                formData.set('end_date', end_date);
                formData.set('status', status);

                axios.post(SITE_URL+'reports/contractSummeryExcel',formData,{
                        headers: {
                            'Content-Type': 'multipart/form-data',
                            'X-CSRF-Token': csrfToken}}
                ).then(function(response){
                    
                    preloader_off();

                    if(response.data.data === "success"){ 

                        var file = response.data.filename;
                        var filename = base_url+"img/reports/"+file;

                        var link = document.createElement("a");
                        link.download = 'contract-summary'+'.xlsx';
                        link.href = filename;
                        document.body.appendChild(link);
                        link.click();
                        document.body.removeChild(link);
                        delete link;

                    }else{
                        Swal.fire('Sorry!',"Please try again.",'error');
                    }

                })
                .catch(function(error){
                    preloader_off();
                });
            }
        });
        
    </script>  

@stop
