@extends('layouts.app')

@section('title', 'Create Newsletter')

@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/plugins/fileinput/fileinput.css') }}">
@stop

@section('content')

<div class="container-fluid page-body-wrapper">

    @include("admin.elements.sidebar")

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="d-flex justify-content-between">
                <div class="pageheader">
                    <h4>CREATE NEWSLETTER </h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb no-bg custom-breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Newsletter</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Create Newsletter </li>
                        </ol>
                    </nav>
                </div>
                <div class="d-flex">
                    <div class="go-back">
                        <a href="{{ url('/newsletters') }}" title="Back"><img src="{{ asset('assets/images/icons/back-icon.png') }}" alt="back icon" /></a>
                    </div>
                </div>
            </div>

            @if (count($errors) > 0)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i data-feather="alert-octagon" class="alert-icon"></i>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <span class="alert-text"><li>{{ $error }}</li></span>
                        @endforeach
                    </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i data-feather="x" class="alert-close"></i>
                    </button>
                </div>
            @endif

            <div class="row mt-3 pb-5">
                <div class="col-lg-12 card-margin">
                    <div class="card">

                    {{ Form::open(['url'=> ['/newsletter/create'], 'method'=>'POST', 'id'=>'sendMailForm', 'files' => true, 'data-parsley-validate' => 'data-parsley-validate', "data-parsley-trigger"=>"keyup", 'autocomplete'=>"off"]) }}

                        <div class="card-body">
                            <div class="row">

                                <script type="text/javascript">
                                    $(document).ready(function(e) {
                                        if($.fn.chosen) {
                                            $("#useremails-user-group-id").chosen();
                                            $("#useremails-user-id").ajaxChosen({
                                                dataType: 'json',
                                                type: 'POST',
                                                url: base_url+'newsletter/searchEmails'
                                            },{
                                                loadingImg: base_url+'newsletter/img/loading-circle.gif'
                                            });
                                        }
                                        $('#useremails-type-users').click(function() {
                                            $("#groupSearch").hide();
                                            $("#manualEmail").hide();
                                            $("#userFunds").hide();
                                            $("#userSearch").show();
                                        });
                                        $('#useremails-type-groups').click(function() {
                                            $("#userSearch").hide();
                                            $("#manualEmail").hide();
                                            $("#userFunds").hide();
                                            $("#groupSearch").show();
                                        });
                                        $('#useremails-type-manual').click(function() {
                                            $("#userSearch").hide();
                                            $("#groupSearch").hide();
                                            $("#userFunds").hide();
                                            $("#manualEmail").show();
                                        });
                                        $('#useremails-type-funds').click(function() {
                                            $("#userSearch").hide();
                                            $("#groupSearch").hide();
                                            $("#manualEmail").hide();
                                            $("#userFunds").show();
                                        });
                                    });
                                </script>

                                <div class="col-lg-12">

                                    <?php
                                        $userSearch = $groupSearch = $manualEmail = $userFunds = 'none';
                                        if(!isset($userEmailEntity['type']) || (isset($userEmailEntity['type']) && $userEmailEntity['type'] == 'GROUPS')) {
                                            $groupSearch = '';
                                        }

                                        if(isset($userEmailEntity['type']) && $userEmailEntity['type'] == 'USERS') {
                                            $userSearch = '';
                                        }

                                                
                                        if(isset($userEmailEntity['type']) && $userEmailEntity['type'] == 'MANUAL') {
                                            $manualEmail = '';
                                        }

                                        if(isset($userEmailEntity['type']) && $userEmailEntity['type'] == 'FUNDS') {
                                            $userFunds = '';
                                        }
                                    ?>

                                    <label class="required">Type </label>
                                    <div class=" mt-2 string-check string-check-soft-info  mb-2">
                                        <input type="radio" name="UserEmails[type]" value="GROUPS" id="useremails-type-groups" checked="checked" autocomplete="off" required="required">
                                        <label class="string-check-label"> <span class="ml-2">User Group </span>
                                        </label>
                                    </div>
                                    <div class=" mt-2 string-check string-check-soft-info  mb-2">
                                        <input type="radio" name="UserEmails[type]" value="USERS" id="useremails-type-users" autocomplete="off">
                                        <label class="string-check-label"> <span class="ml-2">Country </span>
                                        </label>
                                    </div>
                                    <div class=" mt-2 string-check string-check-soft-info  mb-2">
                                        <input type="radio" name="UserEmails[type]" value="MANUAL" id="useremails-type-manual" autocomplete="off">
                                        <label class="string-check-label"> <span class="ml-2">Emails </span>
                                        </label>
                                    </div>
                                    <div class=" mt-2 string-check string-check-soft-info  mb-2">
                                        <input type="radio" name="UserEmails[type]" value="FUNDS" id="useremails-type-funds" autocomplete="off">
                                        <label class="string-check-label"> <span class="ml-2">Funds </span>
                                        </label>
                                    </div>
                                </div>

                                <div class="col-lg-6 mt-3" id='userSearch' style="display:<?php echo $userSearch; ?>">
                                    <label class="required">Select Country <span class="mandatory">*</span></label>
                                    <select name="UserEmails[user_id][]" multiple="multiple" autocomplete="off" data-placeholder="Select User(s)" class="form-control search-input" id="useremails-user-id">

                                        @foreach ($userCountrys as $key => $country)
                                            <option value="{{ $key }}">{{ $country }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <?php
                                    $groups = ['ALL' => 'All', 'IA' => 'Investors Active', 'IIA'=> 'Investors In-active','AA' => 'Agents Active', 'AIA'=> 'Agents In-active'];
                                ?>
                                <div class="col-lg-6 mt-3" id='groupSearch' style="display:<?php echo $groupSearch; ?>">
                                    <label class="required">Select Groups(s) <span class="mandatory">*</span></label>
                                    <select name="UserEmails[user_group_id][]" multiple="multiple" autocomplete="off" data-placeholder="Select Group(s)" class="form-control search-input" id="useremails-user-group-id">
                                        @foreach ($groups as $key => $group)
                                            <option value="{{ $key }}">{{ $group }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-lg-6 mt-3" id='manualEmail' style="display:<?php echo $manualEmail; ?>">
                                    <label class="required">To Email(s) <span class="mandatory">*</span></label>
                                    <textarea name="UserEmails[to_email]" class="form-control search-input" id="useremails-to-email" rows="6"></textarea>
                                    <code class="my-3">multiple emails comma separated</code>
                                </div>

                                <div class="col-lg-6 mt-3" id='userFunds' style="display:<?php echo $userFunds; ?>">
                                    <label class="required">Select Fund(s) <span class="mandatory">*</span></label>
                                    <select name="UserEmails[user_fund_id][]" multiple="multiple" autocomplete="off" data-placeholder="Select Fund(s)" class="form-control search-input" id="useremails-user-fund-id">
                                        <option value="0"> All</option>
                                        @foreach ($funds as $key => $fund)
                                            <option value="{{ $fund->id }}">{{ $fund->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="col-lg-6 mt-3">
                                    <label>CC To</label>
                                    <input type="text" class="form-control search-input" name="UserEmails[cc_to]" id="useremails-cc-to">
                                    <code class="my-3">multiple emails comma separated</code>
                                </div>
                                
                                <div class="col-lg-6 mt-3">
                                    <label class="required">From Name <span class="mandatory">*</span></label>
                                    <input type="text" class="form-control search-input" name="UserEmails[from_name]" maxlength="200" id="useremails-from-name" data-parsley-group="block1" required value="{{ Setting::get('email_from_name') }}">
                                </div>

                                <div class="col-lg-6 mt-3">
                                    <label class="required">From Email <span class="mandatory">*</span></label>
                                    <input type="text" class="form-control search-input" name="UserEmails[from_email]" maxlength="200" data-parsley-group="block1" required id="useremails-from-email" value="{{ Setting::get('email_from_address') }}">
                                </div>

                                <div class="col-lg-12 mt-3">
                                    <label class="required">Subject <span class="mandatory">*</span></label>
                                    <input type="text" class="form-control search-input" name="UserEmails[subject]" maxlength="500" data-parsley-group="block1" id="useremails-subject" required>
                                </div>

                                <input type="hidden" name="UserEmails[template]" options="No Template" autocomplete="off" class="form-control" id="useremails-template">
                                <input type="hidden" name="UserEmails[signature]" options="No Signature" autocomplete="off" class="form-control" id="useremails-signature">
                                <input type="hidden" name="UserEmails[schedule_date]" class="form-control daterange-single" autocomplete="off" id="useremails-schedule-date">

                                <div class="col-lg-12 mt-3">
                                    <label>Message <span class="mandatory">*</span></label>
                                    <div class="h-150">

                                        {!! Form::textarea('UserEmails[message]', null, ['class'=>'form-control','id'=>"editor1", 'data-parsley-group'=>"block1", "required"=>"required", 'data-parsley-mintextsize'=>"10",  'parsley-trigger'=> "keyup" , 'data-parsley-errors-container'=>"#message-errors"]) !!}

                                    </div>
                                    <span id="message-errors"></span>
                                </div>
                                <div class="col-lg-12 mt-3">
                                    <label class="required">Attachment <span class="mandatory">*</span></label>

                                    <input type="file" name="attachment" id="attachment" class="form-control" data-parsley-group="block1" />
                                </div>

                                <span id="uploadDoc-errors"></span>
                            </div>

                            <div class="mt-3 text-right">
                                <button type="button" onclick="sendNewsletter()" class="btn btn-info">Next</button>
                            </div>

                            {{ Form::close() }}

                        </div>
                    </div>
                </div>

                @include('admin.elements.footer')

            </div>
        </div>
    </div>

</div>

@endsection

@section('scripts')
    
    <script src="{{ asset('assets/js/components/summernote.js') }}"></script>

    {{-- <script src="{{ asset('assets/js/components/dropify.js') }}"></script> --}}
    <script src="{{ asset('assets/plugins/fileinput/fileinput.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/fileinput/fa/theme.js') }}"></script>

    <script type="text/javascript">
        
        $('#editor1').summernote({
            placeholder: 'Type a message!',
            height: 180,   //set editable area's height
            codemirror: { // codemirror options
                theme: 'monokai'
            }
        });

        $('.note-insert').first().remove();

        $("#attachment").fileinput({
            showUpload: false,
            theme: 'fa',
            browseClass: "btn btn-warning",
            dropZoneEnabled: false,
            allowedFileTypes: ["image", "pdf"],
            maxFileSize: 20120, 
        });

        function sendNewsletter(){
            if ($('#sendMailForm').parsley().validate('block1')) {
                preloader_init();

                $('#sendMailForm').submit();
            } else {
                alert('Please fill out all the mandatory fields!');
            }
        }

    </script>

@stop
