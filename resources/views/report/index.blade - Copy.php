@extends('layouts.app')

@section('title', 'Reports')

@section('styles')

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
                <div class="col-lg-6">
                    <div class="card report-card">
                        <div class="card-header">
                            <h5 class="card-title">Contract Summary Reports</h5>
                        </div>
                        <div class="card-body">

                        {{ Form::open(['url' => '/reports/contractSummeryExcel', 'id'=>'reportsForm', 'class'=>'', 'data-parsley-validate'=>'data-parsley-validate', 'autocomlete'=>"off",'type'=>'file']) }}
                            <div class="row">
                                <div class="col-lg-6 mt-3">
                                    <label>Start Date: </label>
                                    <input type="date" class="form-control search-input" name="start_date" id="start_date" data-parsley-errors-container="#start_date_error" required="required">
                                    <div id="start_date_error"></div>
                                </div>
                                
                                <div class="col-lg-6 mt-3">
                                    <label>End Date: </label>
                                    <input type="date" class="form-control search-input" name="end_date" id="end_date" data-parsley-errors-container="#end_date_error" required="required">
                                    <div id="end_date_error"></div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 mt-3">
                                    <label>Status</label>

                                    <?php 
                                        $options = ["-1" => "All", "0"=> "Pending", "1"=>"Pending Funding", "2" =>"Incomplete", "3"=>"Active", "4"=>"Deactive", "5"=>"Rejected", "6"=>"Matured" ];
                                    ?>

                                    {!! Form::select('status', $options, null, ['class' => 'form-control fund-sub-input', 'id' => 'status', 'required'=> 'required']) !!}
                                </div>
                                <div class="col-md-12 mt-5 text-center">
                                    <div class="submit">
                                        <button type="button" class="btn btn-info button-size" id="exportButton">Generate</button>
                                    </div>
                                </div>
                            </div>

                        {{ Form::close() }}

                        </div>
                    </div>
                </div>
                <div class="col-lg-6 m-mt-2">
                    <div class="card">
                        <div class="fa2-img"><img src="{{ asset('assets/images/icons/2fa-img.png') }}" alt="2fa img" />
                        </div>
                        <div class="card-header">
                            <h5 class="card-title">Reinvestment Summary Reports</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <div>
                                        <button type="button" id="exportreinvestmentButton" class="btn btn-info button-size">Generate</button>
                                    </div>
                                </div>
                            </div>
                        </div>
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
        $('#excelButton').click(function(){
            $('#excelButton').button('please wait ...');
        });
        
        $(document).on("click","#exportButton",function(e) {

            if ($('#reportsForm').parsley().validate()) {

                e.preventDefault();
                preloader_init();

                var csrfToken = "{{ csrf_token() }}";

                var start_date = $("#start_date").val();
                var end_date = $("#end_date").val();
                var status = $("#status").val();

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
                    console.log(response)
                    //window.location.href = response.data;

                    if(response.data.data === "success"){ 

                        var file = response.data.filename;
                        var filename = base_url+"img/reports/"+file;
                        //window.open(filename, "_blank")

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
                    console.log(error);
                    // alert('File not detected');
                    preloader_off();
                });
            }
        });

        $(document).on("click","#exportreinvestmentButton",function(e) {

            e.preventDefault();
            preloader_init();
            var csrfToken = "{{ csrf_token() }}";
            
            var status = $("#status").val();
            axios.post(SITE_URL+'reports/reinvestmentExcel',{
                    params: {
                        status: status
                    },
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        'X-CSRF-Token': csrfToken}}
            ).then(function(response){
                
                preloader_off();
                //window.location.href = response.data;

                if(response.data.data === "success"){ 

                    var file = response.data.filename;
                    var filename = base_url+"img/reports/"+file;
                    //window.open(filename, "_blank")

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
            });
                  
        })
        .catch(function(error){
            console.log(error);
            // alert('File not detected');
            preloader_off();
        });
    </script>  

@stop
