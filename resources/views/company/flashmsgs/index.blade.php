@extends('layouts.app')

@section('title', 'Flash Messages')

@section('styles')

@stop

@section('content')

<div class="container-fluid page-body-wrapper">

    @include("company.elements.sidebar")

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="d-flex justify-content-between">
                <div class="pageheader">
                    <h4>Flash Messages</h4>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-12 card-margin">
                    <div class="card">
                        <div class="card-body">
            
                            <div class="row pb-5">
                                <div class="col-lg-12 card-margin">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">

                                            @if ($flash_msgs->count() > 0)

                                                @foreach ($flash_msgs as $key => $msg)

                                                <div class="col-lg-4 col-md-6">
                                                    <div class="card card-margin">
                                                        <div class="card-body p-0">
                                                            <div class="widget-20">
                                                                <div class="widget-20-header">
                                                                    <img src="{{ asset('assets/images/avatars/default.png') }}"
                                                                        alt="Profile Picture" />
                                                                    <div class="widget-20-post-info">
                                                                        <span class="author-name">Admin</span>
                                                                        <span class="time">{{ $msg->created_at->format('d M, Y h:i A') }}</span>
                                                                    </div>

                                                                    <div class="dropdown widget-20-post-action">
                                                                        <button class="btn btn-sm btn-flash-primary" type="button" id="ticket-action-panel-4"
                                                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                <i data-feather="more-vertical" class="toolbar-icon"></i>
                                                                        </button>
                                                                        <ul class="dropdown-menu dropdown-menu-right" >
                                                                            <li class="dropdown-item"><span class="dropdown-title">Action </span></li>
                                                                            <li class="dropdown-item">
                                                                                <a href="{{ url('/company/fmsgView',$msg->id) }}" class="dropdown-link" title="View"><i
                                                                                    data-feather="eye"></i> Show</a>
                                                                            </li>
                                                                        </ul>
                                                                    </div>

                                                                </div>
                                                                <div class="widget-20-body">
                                                                    <img src="{{ $msg->file ? asset('/project_img/flashmsgs/thumbnail/'.$msg->file) : asset('assets/images/avatars/default.png') }}"
                                                                        alt="Blog Image" class="newsDetailsImage" />
                                                                    <div class="widget-20-post-container">
                                                                        <a href="{{ url('/company/fmsgView',$msg->id) }}" class="text-center title">{{ substr($msg->title,0, 30)."..." }}</a>
                                                                        <div class="desc">

                                                                            <p> {!! strip_tags(substr($msg->description,0, 180)."...") !!} </p>

                                                                        </div>
                                                                        <div>
                                                                            <div class="my-4">
                                                                                <a href="{{ url('/company/fmsgView',$msg->id) }}"
                                                                                    class="btn btn-info w-100">View More</a>
                                                                            </div>
        
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                @endforeach

                                            @else

                                                <tr><td colspan=7 align="center">No Records Available..</td></tr>
                                            @endif    


                                            </div>

                                            <br>

                                            {!! $flash_msgs->links('pagination::bootstrap-4') !!}

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('company.elements.footer')

        </div>
    </div>

</div>

@endsection

@section('scripts')

@stop
