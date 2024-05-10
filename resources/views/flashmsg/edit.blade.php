@extends('layouts.app')

@section('title', 'Update Flash Message')

@section('styles')

@stop

@section('content')

<div class="container-fluid page-body-wrapper">

    @include("admin.elements.sidebar")

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="d-flex justify-content-between">
                <div class="pageheader">
                    <h4>UPDATE FLASH MESSAGE </h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb no-bg custom-breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Flash Message</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Update Flash Message </li>
                        </ol>
                    </nav>
                </div>
                <div class="d-flex">
                    <div class="go-back">
                        <a href="{{ url('/flash/messages') }}" title="Back"><img src="{{ asset('assets/images/icons/back-icon.png') }}" alt="back icon" /></a>
                    </div>
                </div>
            </div>
            <div class="row mt-3 pb-5">
                <div class="col-lg-12 card-margin">
                    <div class="card">

                    {{ Form::open(['url'=> ['/flash/message/update/'.$fmsg->id,], 'method'=>'POST', 'id'=>'flashMsgFormEdit', 'class'=>'', 'data-parsley-validate'=>'data-parsley-validate', 'autocomlete'=>"off",'type'=>'file']) }}

                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 mt-3">
                                    <label>Subject <span class="mandatory">*</span></label>
                                    <input type="text" name="title" id="title" class="form-control search-input" value="{{ $fmsg->title }}" required>
                                </div>

                                <div class="col-lg-12 mt-3">
                                    <label>Message <span class="mandatory">*</span></label>
                                    <div class="h-150">
                                        <div id="editor1">{!! $fmsg->description !!}</div>
                                    </div>
                                </div>

                                {{-- <div class="col-lg-12 mt-3">
                                    <label>Flash Image <span class="mandatory">*</span></label>
                                    <input type="file" name="file" id="file" class="dropify" data-height="300" data-default-file="{{ $fmsg->file ? asset('/project_img/flashmsgs/images/'.$fmsg->file) : '' }}" data-max-file-size="2M" data-allowed-file-extensions="png jpg jpeg" data-parsley-errors-container="#uploadDoc-errors" data-remove-required="0" />
                                </div> --}}

                                <div class="col-lg-12 mt-3">
                                    <label>Flash Image <span class="mandatory">*</span></label>
                                    <input type="file" name="file" id="file" class="dropify" data-height="300" data-max-file-size="2M" data-allowed-file-extensions="png jpg jpeg" data-parsley-errors-container="#uploadDoc-errors" data-remove-required="0" />
                                </div>

                                <span id="uploadDoc-errors"></span>

                                <input type="hidden" name="start_date" id="start_date" class="datepicker" value="{{ $fmsg->start_date ? $fmsg->start_date : '' }}" required>
                                <input type="hidden" name="end_date" id="end_date" class="datepicker" value="{{ $fmsg->end_date ? $fmsg->end_date : '' }}" required>

                                <?php 
                                    $sdate = $fmsg->start_date ? date('Y-m-d', strtotime($fmsg->start_date)): '';
                                    $edate = $fmsg->end_date ? date('Y-m-d', strtotime($fmsg->end_date)): '';
                                    $rdate = $sdate." - ".$edate;
                                ?>

                                <div class="col-lg-6 mt-3">
                                    <label>Date Duration <span class="mandatory">*</span></label>
                                    <div class="input-group">
                                        <input type="text" name="daterange" id="daterange" class="form-control search-input" data-parsley-errors-container="#dateDurationError" value="{{ $rdate }}" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text"> <svg data-feather="calendar"
                                                    width="16px" height="16px"></svg> </span>
                                        </div>
                                    </div>
                                    <span id="dateDurationError"></span>
                                </div>

                                <div class="col-lg-6 mt-3">
                                    <label>Active</label>
                                    <div class=" mt-2 string-check string-check-soft-info  mb-2">
                                        <input type="checkbox" name="active" id="active" {{ $fmsg->active == 1 ? 'checked' : '' }} value="1">
                                        <label class="string-check-label"> <span class="ml-2"> Click To Active</span> </label>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-3 text-right">
                                <button type="submit" class="btn btn-info">Submit</button>
                            </div>
                        </div>

                    {{ Form::close() }}

                    </div>
                </div>
                

                @include('admin.elements.footer')

            </div>
        </div>
    </div>

</div>

@endsection

@section('scripts')
    
<script src="{{ asset('assets/js/components/dropify.js') }}"></script>
<script src="{{ asset('assets/js/components/summernote.js') }}"></script>
<script src="{{ asset('assets/js/components/daterange-picker.js') }}"></script>

<script type="text/javascript">

    // $(document).ready(function () {
    //     // $('#editor1').summernote();

    //     const form = document.getElementById('flashMsgForm');
    //     let formData = new FormData(form);
    //     formData.append("summernote", $('#editor1').text() );
    // });

    $('#editor1').summernote({
        placeholder: 'Type a message!',
        height: 180,   //set editable area's height
        codemirror: { // codemirror options
            theme: 'monokai'
        }
    });

    $(".datepicker").datepicker({
        format: 'yyyy-mm-dd',
    }).datepicker("setDate", new Date());

    $(function() {
        $('input[name="daterange"]').daterangepicker({
            opens: 'left',
            locale: {
                format: 'YYYY-MM-DD'
            }
        }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
            $("#start_date").val(start.format('YYYY-MM-DD'));
            $("#end_date").val(end.format('YYYY-MM-DD'));
        });
    });

    $('#flashMsgFormEdit').submit(function(e) {
        e.preventDefault();
        if ( $(this).parsley().isValid() ) {
            
            var csrfToken = "{{ csrf_token() }}";
            
            const form = document.getElementById('flashMsgFormEdit');
            let formData = new FormData(form);

            var messageData = $('#editor1').summernote('code');
            formData.set('id', {{ $fmsg->id }});
            formData.set('messageData', messageData);


            axios.post(SITE_URL+'flash/message/update',formData,{
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        'X-CSRF-Token': csrfToken}}
            ).then(function(response){

                var item =response.data.data;

                if(item != "null"){
                    
                    Swal.fire('Great Job !','Your flash message has been updated!','success');

                    setTimeout(location.reload.bind(location), 1500);
                }else{
                    Swal.fire('Sorry !','Flash message has not saved!','error');
                } 
            })
            .catch(function(){
                Swal.fire('Sorry !','Flash message has not saved!','error');
            });
        }
    });

</script>

@stop