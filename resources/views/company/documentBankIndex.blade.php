@extends('layouts.app')

@section('title', 'Upload Bank Slip')

@section('content')

<div class="container-fluid page-body-wrapper">

	@include("company.elements.sidebar")

	<div class="main-panel">
        <div class="content-wrapper">
            <div class="d-flex justify-content-between">
                <div class="pageheader">
                    <h4>Upload Bank Slip</h4>
                </div>
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb no-bg custom-breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('/company/myprofile') }}">Profile</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Upload Documents</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-12 card-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive mt-2">
                                <table id="example" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Investment ID</th>
                                            <th>Amount</th>
                                            <th>Commencement Date</th>
                                            <th>Maturity Date</th>
                                            <th>Status</th>
                                            <th>Bank Slip</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    @if ($subscriptions->count() > 0)    

                                        @foreach ($subscriptions as $key => $ss)

                                        	<tr>
	                                            <td class="font-weight-bold">#

	                                            	<?php 
	                                                if(!empty($ss['draft_refrence_id'])){
	                                                    
	                                                    if(($ss['status'] == 3) || ($ss['status'] == 6)){
	                                                        $investment_no = $ss['reference_no'].$ss['refreance_id'];
	                                                    }else{
	                                                        $investment_no = $ss['draft_refrence_id']."-".$ss['reference_no'].$ss['refreance_id'];
	                                                    }
	                                                }else{
	                                                    $investment_no = $ss['reference_no'].$ss['refreance_id'];
	                                                }

	                                                echo $investment_no; ?>

	                                            </td>
	                                            <td class="text-muted">$<?= $ss->initial_investment ?></td>
	                                            <td class="text-muted">
	                                            	<?php
                                                    if(!empty($ss->commence_date)){
                                                    
                                                        echo date('d M, Y', strtotime($ss->commence_date));
                                                    }else{
                                                        echo "-";
                                                    } ?>
	                                            </td>
	                                            <td class="text-muted">
	                                            	<?php
                                                    if(!empty($ss->maturity_date)){
                                                    
                                                        echo date('d M, Y', strtotime($ss->maturity_date));
                                                    }else{
                                                        echo "-";
                                                    } ?>
	                                            </td>
	                                            <td>
	                                            	<?php 
	                                                    if($ss->draft == 0){
	                                                        if($ss->status  ==0){
	                                                            echo '<span class="badge badge-soft-warning mt-2 mr-2">Pending</span>';
	                                                        }else if($ss->status ==1){

	                                                            if($ss->notification_doc_hidden == 1){
	                                                            	echo '<span class="badge badge-soft-info mt-2 mr-2">Admin Approval Pending</span>';
	                                                            }else{
	                                                            	echo '<span class="badge badge-soft-primary mt-2 mr-2">Pending Funding</span>';   
	                                                            }
	                                                            
	                                                        }else if($ss->status ==2){
	                                                            echo '<span class="badge badge-soft-danger mt-2 mr-2">Incomplete</span>';
	                                                        }else if($ss->status ==3){
	                                                            echo '<span class="badge badge-soft-success mt-2 mr-2">Active</span>';
	                                                        }else if($ss->status ==4){
	                                                            echo '<span class="badge badge-soft-danger mt-2 mr-2">De-Active</span>';
	                                                        }else if($ss->status ==5){
	                                                            echo '<span class="badge badge-soft-danger mt-2 mr-2">Rejected</span>';
	                                                        }
	                                                    }else{
	                                                        echo '<span class="badge badge-soft-secondary-3 mt-2 mr-2">Draft</span>';  
	                                                    }
	                                                ?>
	                                            </td>
	                                            <td>
                                                    <div class="d-flex">
                                                        @if ($attachment)
                                                            <a type="button" href="javascript:void(0);" type="button" class="table-view-card mr-1 reviewDoc" get-subs-id='<?= $ss->id ?>'><img src="{{ asset('assets/images/icons/view-icon.png') }}" alt="view icon" /></a>
                                                        @endif
                                                    </div>
	                                            </td>
	                                            <td>
                                                    <a href="#" class="table-view-card table-upload-card uploadDocLink" get-sub-id="<?= $ss->id ?>">
                                                       <img src="{{ asset('assets/images/icons/upload-icon.png') }}" alt="view icon" />
                                                    </a>
	                                            </td>
	                                        </tr>

										@endforeach

                                    @else

                                      <tr><td colspan=7 align="center">No Records Available..</td></tr>
                                    @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- upload file Modal -->
            <div class="modal fade" id="uploadFileModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Upload Bank Slip <span class="mandatory">*</span></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        {{ Form::open(['url' => '/company/documentBankIndex', 'id'=>'formupdatepassport', 'files' => true, 'data-parsley-validate', 'autocomplete'=>"off"]) }}

                        <div class="modal-body">
                            <div class="row">

                                <input type="hidden" name="sub_att_id" id="sub_att_id">

                                <div class="col-lg-12">
                                    <div class="note-full"><img src="{{ asset('assets/images/icons/info-icon.png') }}"
                                            alt="info-icon" class="mr-2" />Multiple file attachment supported.
                                        Maximum upload file size: 5MB. Supported file type: PDF, JPEG and PNG
                                    </div>
                                </div>

                                <div class="col-lg-12 mt-2">

                                    <input type="file" name="ss_attachments[]" class="inputFilePassport" required="required" multiple="multiple" id="ss_attachments" />
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary modal-cancel" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-info">Upload</button>
                        </div>

                        {{ Form::close() }}

                    </div>
                </div>

            </div>
            
            @include('company.elements.footer')

        </div>
    </div>

</div>

<div class="col-md-12">
    <div id="divResult2"></div>
</div>

@endsection

@section('scripts')

<script src="{{ asset('assets/js/components/dropify.js') }}"></script>
<script src="{{ asset('assets/js/components/cms.js') }}"></script>

<link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/fileinput/fileinput.css') }}">
<script src="{{ asset('assets/plugins/fileinput/fileinput.min.js') }}"></script>
<script src="{{ asset('assets/plugins/fileinput/fa/theme.js') }}"></script>

<script src="{{ asset('assets/js/components/EZView.js') }}"></script>

<script type="text/javascript">

    $(".inputFilePassport").fileinput({
        showUpload: false,
        theme: 'fa',
        browseClass: "btn btn-warning",
        dropZoneEnabled: false,
        allowedFileTypes: ["image", "pdf"],
        maxFileSize: 5120, 
    });

    $('.uploadDocLink').click(function(e){
        $('#formupdatepassport')[0].reset();
        $('#uploadFileModal').modal('show');
        
        var source_id = $(this).attr("get-sub-id");
        $("#sub_att_id").val(source_id);
    });

    $('#formupdatepassport').submit(function(e) {
        e.preventDefault();
        if ( $(this).parsley().isValid() ) {
            
            preloader_init();

            var csrfToken = "{{ csrf_token() }}";

            const form = document.getElementById('formupdatepassport');
            let formData = new FormData(form);

            $('#uploadFileModal').modal('hide');
            
            axios.post(SITE_URL+'company/documentBankUpload',formData,{
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        'X-CSRF-Token': csrfToken}}
            ).then(function(response){

                preloader_off();
                
                var item =response.data;

                if(item.error === 0){

                    Swal.fire('Great Job !','You have uploaded Bank Slip successfully, MCIL team will verify the Bank Slip!','success');

                    $('#formupdatepassport')[0].reset();
                    $('#uploadFileModal').modal('hide');

                    setTimeout(location.reload.bind(location), 3500);
                }else{

                    $('#uploadFileModal').modal('hide');
                    Swal.fire('Sorry !','Bank Slip upload faild!','error');
                } 
            })
            .catch(function(){

                $('#createPrescriptionDataModel').modal('hide');
                Swal.fire('Sorry !','Bank Slip upload faild!','error');
            });
        }
    });

    $('.reviewDoc').on('click', function () {
        
        $('#divResult2').empty();

        var id = $(this).attr('get-subs-id');
        axios.get(SITE_URL+'company/bankDocReview?id='+id).then(function (response) {
            
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

</script>

@stop