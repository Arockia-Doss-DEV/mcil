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
                    <h4>Home - All Sent Newsletters</h4>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-12 card-margin">
                    <div class="card">
                        <div class="card-body">
                            <form method="get" action="{{ url('/newsletters')}}">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="input-group mb-3">
                                            <input type="text" name="q" placeholder="Search by Name, From Email, Subject, Message" class="form-control search-input" value="" />
                                            <div class="input-group-append">
                                                <button type="submit" id="searchSubmitId" class="btn btn-info"> <i
                                                        data-feather="search"></i> </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 text-md-right"><a href="{{ url('/newsletter/create') }}"
                                            class="btn btn-info mr-1"> + Create</a>
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive mt-2">
                                <table id="example" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Type</th>
                                            <th>Groups(s)</th>
                                            <th>From Name</th>
                                            <th>From Email</th>
                                            <th>Subject</th>
                                            <th>Sent By</th>
                                            <th>Sent</th>
                                            <th>Date Sent</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    @if ($userEmails->count() > 0)
                                        @foreach ($userEmails as $key => $row)  
                                            <tr>
                                                <td class="text-muted">{{ $key+1 }}</td>
                                                <td class="text-muted">
                                                <?php
                                                    if($row['type'] == 'USERS') {
                                                       echo 'Selected Users';
                                                    } else if($row['type'] == 'GROUPS') {
                                                        echo 'Group Users';
                                                    } else if($row['type'] == 'FUNDS') {
                                                        echo 'Fund Users';
                                                    } else {
                                                        echo 'Manual Emails';
                                                    }
                                                ?>
                                                </td>
                                                <td class="text-muted">
                                                <?php 

                                                    if(!empty($row['user_group_id'])) {
                                                        echo $row['group_name'];
                                                    } else {
                                                        if($row['type'] == 'USERS') {
                                                            echo "Country Wise Users";
                                                        } else if($row['type'] == 'FUNDS') {
                                                            echo "Funds Wise Users";
                                                        } else {
                                                            echo 'N/A';
                                                        }
                                                    }
                                                ?>
                                                </td>
                                                <td class="text-muted">{{ $row['from_name'] }}</td>
                                                <td class="text-muted">{{ $row['from_email'] }}</td>
                                                <td class="text-muted">{{ $row['subject'] }}</td>
                                                <td class="text-muted">{{ $row['users']['first_name'].' '.$row['users']['last_name'] }}</td>
                                                <td class="text-muted">
                                                <?php
                                                    if($row['total_sent_emails'] > 0) {
                                                        echo "<span class='badge badge-soft-success mt-2 mr-2'>".'Yes'."</span>";
                                                    } else {
                                                        echo "<span class='badge badge-soft-danger mt-2 mr-2'>".'No'."</span>";
                                                    }
                                                ?>
                                                </td>
                                                <td class="text-muted"> {{ $row->created_at->format('d M, Y h:i A') }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a class="table-view-card mr-2" title="View Full Email & Recipients" href="{{ url('/newsletter/view/'.$row->id) }}">
                                                            <img src="{{ asset('assets/images/icons/view-icon.png') }}"
                                                                alt="view icon" />
                                                        </a>
                                                    </div>

                                                </td>
                                            </tr>
                                        @endforeach
                                    @else

                                      <tr><td colspan=10 align="center">No Records Available..</td></tr>
                                    @endif     
                                        
                                    </tbody>
                                </table>

                                <br>
                                {!! $userEmails->links('pagination::bootstrap-4') !!}

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

@stop
