@extends('layouts.app')

@section('title', 'Messages')

@section('styles')

@stop

@section('content')

<div class="container-fluid page-body-wrapper">

    @include("admin.elements.sidebar")

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="d-flex justify-content-between">
                <div class="pageheader">
                    <h4>MESSAGES</h4>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-12 card-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="input-group mb-3">
                                        <input type="text" placeholder="Search Subject"
                                            class="form-control search-input" />
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-info"> <i
                                                    data-feather="search"></i> </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive mt-2">
                                <table id="example" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Subject</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <span class="round-icon-list ml-3"></span>
                                                <span class="ml-4 message-text">Lorem ipsum dolor sit amet,
                                                    consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                                                    in...</span>
                                            </td>
                                            <td class="text-muted">26-10-2021 22:16:18</td>
                                            <td><a class="table-view-card"
                                                    href="adminMessageDetails.html"><img
                                                        src="../Assets/images/icons/view-icon.png"
                                                        alt="view icon" /></a></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="round-icon-list ml-3"></span>
                                                <span class="ml-4 message-text">Lorem ipsum dolor sit amet,
                                                    consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                                                    in...</span>
                                            </td>
                                            <td class="text-muted">26-10-2021 22:16:18</td>
                                            <td><a class="table-view-card"
                                                    href="adminMessageDetails.html"><img
                                                        src="../Assets/images/icons/view-icon.png"
                                                        alt="view icon" /></a></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="round-icon-list ml-3"></span>
                                                <span class="ml-4 message-text">Lorem ipsum dolor sit amet,
                                                    consetetur sadipscing elitr, sed diam nonumy eirmod tempor
                                                    in...</span>
                                            </td>
                                            <td class="text-muted">26-10-2021 22:16:18</td>
                                            <td><a class="table-view-card"
                                                    href="adminMessageDetails.html"><img
                                                        src="../Assets/images/icons/view-icon.png"
                                                        alt="view icon" /></a></td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="round-icon-list ml-3"></span>
                                                <span class="ml-4 message-text">Lorem ipsum dolor sit
                                                    amet,consetetur sadipscing elitr, sed diam nonumy eirmod
                                                    tempor in...</span>
                                            </td>
                                            <td class="text-muted">26-10-2021 22:16:18</td>
                                            <td><a class="table-view-card"
                                                    href="adminMessageDetails.html"><img
                                                        src="../Assets/images/icons/view-icon.png"
                                                        alt="view icon" /></a></td>
                                        </tr>
                                    </tbody>
                                </table>
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
