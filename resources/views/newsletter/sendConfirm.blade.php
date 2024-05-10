@extends('layouts.app')

@section('title', 'Newsletters')

@section('styles')

@stop

@section('content')

<div class="container-fluid page-body-wrapper">

    @include("admin.elements.sidebar")

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="d-flex justify-content-between">
                <div class="pageheader">
                    <h4>Confirm Sending Newsletter </h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb no-bg custom-breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Newsletter</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Newsletter Create</li>
                        </ol>
                    </nav>
                </div>
                <div class="d-flex">
                    <div class="go-back">
                        <a href="#" onclick="history.back()" title="Back">
                            <img src="{{ asset('assets/images/icons/edit-icon.png') }}" alt="back icon" /></a>
                    </div>
                </div>
            </div>
            <div class="row mt-3 pb-5">
                <div class="col-lg-12 card-margin">
                    <div class="card">

                    {{ Form::open(['url'=> ['/newsletter/create'], 'method'=>'POST', 'onSubmit'=>'return validateForm()']) }}
                        
                        <div class="card-body">
                            <div class="single-table mt-3">
                                <div class="table-responsive datatable-primary">
                                    <table
                                        class="table table-striped table-bordered table-condensed table-hover ">
                                        <tbody>
                                            <tr>
                                                <th>Email Type</th>
                                                <td>
                                                    <?php if($userEmailEntity['UserEmails']['type'] == 'USERS') {
                                                        echo __('Country');
                                                    } else if($userEmailEntity['UserEmails']['type'] == 'GROUPS') {
                                                        echo __('User Group');
                                                    } else if($userEmailEntity['UserEmails']['type'] == 'FUNDS') {
                                                        echo __('User Funds');
                                                    } else {
                                                        echo __('Emails');
                                                    } ?>

                                                </td>
                                            </tr>
                                            
                                            <?php if($userEmailEntity['UserEmails']['type'] == 'GROUPS') { ?>
                                            <tr>
                                                <th>Group(s)</th>
                                                <td><?php

                                                $groupNames = [];
                                                foreach($userEmailEntity['UserEmails']['user_group_id'] as $groupId) {
                                        
                                                    if('ALL' == $groupId){
                                                        echo '<span class="kt-badge kt-badge--danger kt-badge--inline"> All </span>';
                                                        echo "&nbsp;";
                                                    }
                                                    
                                                    if('IA' == $groupId){
                                                        echo '<span class="kt-badge kt-badge--danger kt-badge--inline"> Investors Active </span>';
                                                        echo "&nbsp;";
                                                    }

                                                    if('IIA' == $groupId){
                                                        echo '<span class="kt-badge kt-badge--danger kt-badge--inline">Investors In-active</span>';
                                                        echo "&nbsp;";
                                                    }

                                                    if('AA' == $groupId){
                                                        echo '<span class="kt-badge kt-badge--danger kt-badge--inline">Agents Active</span>';
                                                        echo "&nbsp;";
                                                    }

                                                    if('AIA' == $groupId){
                                                        echo '<span class="kt-badge kt-badge--danger kt-badge--inline">Agents In-active</span>';
                                                        echo "&nbsp;";
                                                    }
                                                }
                                                ?>
                                                </td>
                                            </tr>
                                            <?php } ?>

                                            <tr>
                                                <th>CC Email(s)</th>
                                                <td><?php echo $userEmailEntity['UserEmails']['cc_to']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>From Name</th>
                                                <td><?php echo $userEmailEntity['UserEmails']['from_name']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>From Email</th>
                                                <td><?php echo $userEmailEntity['UserEmails']['from_email']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Email Subject</th>
                                                <td><?php echo $userEmailEntity['UserEmails']['subject']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Email Message</th>
                                                <td>{!! $userEmailEntity['UserEmails']['modified_message'] !!}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="single-table mt-3">
                                <div class="table-responsive datatable-primary">
                                    <table
                                        class="table table-striped table-bordered table-condensed table-hover">
                                        <thead class="text-uppercase">
                                            <tr>
                                                <th>#</th>
                                                <th>
                                                    <div class="mt-2 string-check string-check-bordered-info mb-2">
                                                        <input type="hidden" name="UserEmails[sel_all]" value="0">
                                                        <input type="checkbox" name="UserEmails[sel_all]" value="1" checked="checked" class="emailcheckall" style="margin-left:0px;" id="useremails-sel-all">
                                                        <label class="string-check-label"></label>
                                                    </div>
                                                </th>
                                                <th>Name</th>
                                                <th>Email</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        @if (!empty($users))
                                            @foreach ($users as $key => $row)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>
                                                        <div class="form-group">
                                                            <div class="mt-2 string-check string-check-bordered-info mb-2">
                                                                <input type="checkbox" name="UserEmails[EmailList][{{ $key }}][emailcheck]" value="1" checked="checked" class="emailcheck" style="margin-left:0px" id="useremails-emaillist-{{ $key }}-emailcheck">
                                                                <label class="string-check-label"></label>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="UserEmails[EmailList][{{ $key }}][uid]" id="useremails-emaillist-{{ $key }}-uid" value="{{ $row['id'] }}">
                                                        <input type="hidden" name="UserEmails[EmailList][{{ $key }}][email]" id="useremails-emaillist-{{ $key }}-email" value="{{ $row['email'] }}">
                                                    </td>
                                                    <td>{{ $row['first_name']." ".$row['last_name'] }}</td>
                                                    <td>{{ $row['email'] }}</td>

                                                </tr>
                                            @endforeach
                                        @else
                                          <tr><td colspan=10 align="center">Users Not Available..</td></tr>
                                        @endif        

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="mt-4 float-sm-right mb-4">

                                @if (!empty($userEmailEntity['UserEmails']['schedule_date']))
                                    <input type="submit" name="confirmEmail" id="confirmEmail" value="Schedule Email" class="btn btn-info" />
                                @else
                                    <input type="submit" name="confirmEmail" id="confirmEmail" value="Send Newsletter" class="btn btn-info" />
                                @endif
                                
                            </div>
                        </div>

                    {{ Form::close() }}

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

    $(document).on("click","#confirmEmail",function() {
        preloader_init();
    });
    
    $(function(){
        $('.emailcheckall').change(function() {
            if($(this).is(':checked')) {
                $(".emailcheck").prop("checked", true);
            } else {
                $(".emailcheck").prop("checked", false);
            }
        });
    });

    function validateForm() {
        if(!$(".emailcheck").is(':checked')) {
            alert("<?php echo __('Please select atleast one user to send email');?>");
            return false;
        } else {
            if(<?php echo (empty($userEmailEntity['UserEmails']['schedule_date'])) ? 1 : 0; ?>) {
                if(!confirm("<?php echo __('Confirmation: Are you sure, you want to continue sending emails?\n\nNote: The following emails are taking some time to sending, So please don`t refresh the page!');?>")) {

                    preloader_off();
                    return false;
                }
            }
        }
        return true;
    }
</script>

<style type="text/css">
    .input.checkbox {
        margin:0;
    }
</style>

@stop