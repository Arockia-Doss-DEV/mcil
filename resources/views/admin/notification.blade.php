@extends('layouts.app')

@section('title', 'Notifications')

@section('styles')

<style>
    .accordion.accordion-boxed .card .read .card-header{
        background: 36afff;
    }
 </style>

@stop

@section('content')

<div class="container-fluid page-body-wrapper">

	@include("admin.elements.sidebar")

	<div class="main-panel">
        <div class="content-wrapper">
            <div class="d-flex justify-content-between">
                <div class="pageheader">
                    <h4>NOTIFICATIONS</h4>
                </div>
            </div>

            <div class="row mt-3 pb-5">
                <div class="col-lg-12 card-margin">
                    <div class="card">

                        <div class="card-body">
                            <form method="get" action="#">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="input-group mb-3">
                                            <input type="text" name="q" placeholder="Search by Subject"
                                                class="form-control search-input" value="" />
                                            <div class="input-group-append">
                                                <button type="submit" id="searchSubmitId" class="btn btn-info"> <i
                                                        data-feather="search"></i> </button>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- <div class="col-lg-8 text-md-right">
                                        <a href="#" class="btn btn-info mr-1"> + Create</a>
                                    </div> --}}

                                </div>
                            </form>

                            <div class="card-header">
                                <nav class="custom-nav-details-tab">
                                    <div class="nav nav-tabs nav-tabs-line" id="nav-tab1" role="tablist">
                                        <a class="nav-item nav-link active" id="nav-home-tab1" data-toggle="tab" href="#nav-home1" role="tab" aria-controls="nav-home1" aria-selected="true">Unread</a>
                                        <a class="nav-item nav-link" id="nav-profile-tab1" data-toggle="tab" href="#nav-profile1" role="tab" aria-controls="nav-profile1" aria-selected="false">Read</a>
                                    </div>
                                </nav>
                            </div>

                            <div class="card-body custom-nav-details-tab-content">
                                <div class="tab-content" id="nav-tabContent1">
                                    <div class="tab-pane fade active show" id="nav-home1" role="tabpanel" aria-labelledby="nav-home-tab1">

                                        <div id="accordion-3" class="accordion accordion-boxed notification-accordion">

                                            @if ($unreadNotifications->count() > 0)    
                                                @foreach ($unreadNotifications as $key => $notification) 

                                                <div class="card">

                                                    <div class="card-header" id="heading{{$notification->id}}-3">
                                                        <a href="{{ url('/').$notification->link }}" class="collapsed">
                                                            <img src="{{ asset('assets/images/icons/redemption-icon.svg') }}" alt="icon" class="mr-2 p-1 sky-background rounded-circle" />
                                                            <span>{{ $notification->message }}</span>
                                                            <span class="header-arrows">
                                                                <img src="{{ asset('assets/images/icons/date-icon.svg') }}" class="mr-1" />
                                                                {{ $notification->created_at->format('d-M-Y h:m') }}
                                                                <i data-feather="chevron-right" class="arrow-icon"></i>
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>

                                                @endforeach

                                                {!! $unreadNotifications->links('pagination::bootstrap-4') !!}

                                            @else
                                                <div class="col-md-12 text-center">
                                                    <strong>Notifications are not available...</strong>
                                                </div>
                                            @endif

                                        </div>

                                    </div>

                                    <div class="tab-pane fade" id="nav-profile1" role="tabpanel" aria-labelledby="nav-profile-tab1">
                                        
                                        <div id="accordion-3" class="accordion accordion-boxed notification-accordion">

                                            @if ($readNotifications->count() > 0)    
                                                @foreach ($readNotifications as $key => $notification) 

                                                <div class="card">

                                                    <div class="read">
                                                        <div class="card-header" id="heading{{$notification->id}}-3">
                                                            <a href="{{ url('/').$notification->link }}" class="collapsed">
                                                                <img src="{{ asset('assets/images/icons/redemption-icon.svg') }}" alt="icon" class="mr-2 p-1 sky-background rounded-circle" />
                                                                <span>{{ $notification->message }}</span>
                                                                <span class="header-arrows">
                                                                    <img src="{{ asset('assets/images/icons/date-icon.svg') }}" class="mr-1" />
                                                                    {{ $notification->created_at->format('d-M-Y h:m') }}
                                                                    <i data-feather="chevron-right" class="arrow-icon"></i>
                                                                </span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>

                                                @endforeach

                                                {!! $readNotifications->links('pagination::bootstrap-4') !!}

                                            @else
                                                <div class="col-md-12 text-center">
                                                    <strong>Notifications are not available...</strong>
                                                </div>
                                            @endif

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