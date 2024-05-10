@extends('layouts.app')

@section('title', 'View Flash Message')

@section('styles')

@stop

@section('content')

<div class="container-fluid page-body-wrapper">

    @include("admin.elements.sidebar")

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="d-flex justify-content-between">
                <div class="pageheader">
                    <h4>FLASH MESSAGES</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb no-bg custom-breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Flash Messages</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Messages Details</li>
                        </ol>
                    </nav>
                </div>
                <div class="go-back"><a href="{{ url('/flash/messages') }}"><img
                            src="{{ asset('assets/images/icons/back-icon.png') }}" alt="back icon" /></a></div>
            </div>
            <div class="row pb-5">
                <div class="col-lg-12 card-margin">
                    <div class="card">
                        <div class="card-body news-details-card-body">
                            <div class="widget-20">
                                <div class="widget-20-header">
                                    <img src="{{ asset('assets/images/avatars/default.png') }}" alt="Profile Picture" />
                                    <div class="widget-20-post-info">
                                        <span class="author-name">Admin</span>
                                        <span class="time">{{ $fmsg->created_at->format('d M, Y h:i A') }}</span>
                                    </div>

                                    <div class="dropdown widget-20-post-action">
                                        <div class="email-subject">
                                        Status  &nbsp; : <span class="badge badge-success mt-2 mr-2 text-white"><?php 
                                                if($fmsg->active == 1){
                                                    echo "Active";
                                                }else{
                                                    echo "De-active";
                                                }
                                                ?></span>
                                        </div>
                                    </div>

                                    <div class="dropdown widget-20-post-action">
                                        <button class="btn btn-sm btn-flash-primary flash-time" type="button">
                                            <div class="flash-time-text">
                                                <img src="{{ asset('assets/images/icons/date-icon.png') }}" alt="calendar"
                                                    class="mr-2" />{{ date('d/m/Y', strtotime($fmsg->start_date)) }} - {{ date('d/m/Y', strtotime($fmsg->end_date)) }}
                                            </div>
                                        </button>
                                    </div>
                                </div>
                                <div class="widget-20-body">
                                    <img src="{{ $fmsg->file ? asset('/project_img/flashmsgs/images/'.$fmsg->file) : asset('assets/images/avatars/default.png') }}" alt="Blog Image"
                                        class="newsDetailsImage" />
                                    <div class="widget-20-post-container">
                                        <a href="#" class="text-center title">{{ $fmsg->title }}</a>
                                        <div class="desc">
                                            {!! $fmsg->description !!}
                                        </div>
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

@stop