@extends('layouts.app')

@section('title', 'View Full Email & Recipients')

@section('styles')

@stop

@section('content')

<div class="container-fluid page-body-wrapper">

    @include("admin.elements.sidebar")

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="d-flex justify-content-between">
                <div class="pageheader">
                    <h4>All Sent News Letter Details</h4>
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
                        <a href="{{ URL::previous() }}" title="Back"><img src="{{ asset('assets/images/icons/back-icon.png') }}" alt="back icon" /></a>
                    </div>
                </div>
            </div>

            <div class="row mt-3 pb-5">
                <div class="col-lg-12 card-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="single-table mt-3">
                                <div class="table-responsive datatable-primary">
                                    <table
                                        class="table table-striped table-bordered table-condensed table-hover ">
                                        <tbody>
                                            <tr>
                                                <th>Email Type</th>
                                                <td>
                                                    <?php if($userEmail['type'] == 'USERS') {
                                                        echo __('Selected Users');
                                                    } else if($userEmail['type'] == 'GROUPS') {
                                                        echo __('Group Users');
                                                    } else if($userEmail['type'] == 'FUNDS') {
                                                        echo __('User Funds');
                                                    } else {
                                                        echo __('Manual Emails');
                                                    } ?>
                                                </td>
                                            </tr>

                                            <?php if($userEmail['type'] == 'GROUPS') { ?>
                                            <tr>
                                                <th>Group(s)</th>
                                                <td><?php echo $userEmail['group_name']; ?></td>
                                            </tr>
                                            <?php } ?>

                                            <tr>
                                                <th>CC Email(s)</th>
                                                <td><?php echo $userEmail['cc_to']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>From Name</th>
                                                <td><?php echo $userEmail['from_name']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>From Email</th>
                                                <td><?php echo $userEmail['from_email']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Email Subject</th>
                                                <td><?php echo $userEmail['subject']; ?></td>
                                            </tr>
                                            <tr>
                                                <th>Email Message</th>
                                                <td>{!! $userEmail['message'] !!}</td>
                                            </tr>
                                            <tr>
                                                <th>Sent By</th>
                                                <td><?php echo $userEmail['users']['first_name'].' '.$userEmail['users']['last_name'];?></td>
                                            </tr>
                                            <tr>
                                                <th>Sent?</th>
                                                <td>
                                                    <?php if(!empty($userEmail['total_sent_emails'])) {
                                                        echo "<span class='label label-success'>".__('Yes')."</span>";
                                                    } else {
                                                        echo "<span class='label label-danger'>".__('No')."</span>";
                                                    } ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Date Sent</th>
                                                <td><?php echo $userEmail['created_at']->format('d-M-Y h:i:s A'); ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="single-table mt-3">
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <h4 class="card_title">Email Recipients</h4>
                                    </div>
                                </div>

                                <div class="table-responsive datatable-primary">
                                    <table
                                        class="table table-striped table-bordered table-condensed table-hover">
                                        <thead class="text-uppercase">
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Sent?</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        @if ($userEmailRecipients->count() > 0)
                                            @foreach ($userEmailRecipients as $key => $row)  
                                                <tr>
                                                    <td>{{ $row['id'] }}</td>
                                                    <td>
                                                        @if ($row['user_id'] == null)
                                                            {{ 'N/A' }}
                                                        @else
                                                            {{ $row['users']['first_name'] }} {{ $row['users']['last_name'] }}
                                                        @endif
                                                    </td>
                                                    <td>{{ $row['email_address'] }}</td>
                                                    <td>
                                                        @if ($row['is_email_sent'])
                                                            <span class='badge badge-soft-success mt-2 mr-2'>Yes</span>
                                                        @else
                                                            <span class='badge badge-soft-danger mt-2 mr-2'>No</span>
                                                        @endif 
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
            </div>

            @include('admin.elements.footer')

        </div>
    </div>

</div>

@endsection

@section('scripts')

@stop