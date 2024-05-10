@extends('layouts.app')

@section('title', 'Admin Notifications')

@section('styles')
    <style type="text/css">
       div.p {
          text-align: center;
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
            
            <div class="row mt-3">
                <div class="col-lg-12 card-margin">
                    <div class="card">
                        <div class="card-body">
                            <div id="accordion-3" class="accordion accordion-boxed notification-accordion">

                            @if ($notificationGlobal->count() > 0)    
                                @foreach ($notificationGlobal as $key => $notification) 

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

                                    {{-- <div class="card-header" id="heading{{$notification->id}}-3">
                                        <a href="{{ url('/').$notification->link }}" class="collapsed" data-toggle="collapse"
                                            data-target="#collapse{{$notification->id}}-3" aria-expanded="false"
                                            aria-controls="collapse{{$notification->id}}-3">
                                            <img src="{{ asset('assets/images/icons/redemption-icon.svg') }}" alt="icon"
                                                class="mr-2 p-1 sky-background rounded-circle" />
                                            <span>{{ $notification->message }}</span>
                                            <span class="header-arrows">
                                                <img src="{{ asset('assets/images/icons/date-icon.svg') }}" class="mr-1" />
                                                {{ $notification->created_at->format('d-M-Y h:m') }}
                                                <i data-feather="chevron-right" class="arrow-icon"></i>
                                            </span>
                                        </a>
                                    </div>
                                    <div id="collapse{{$notification->id}}-3" class="collapse" aria-labelledby="heading{{$notification->id}}-3"
                                        data-parent="#accordion-3">
                                        <div class="card-body">
                                            <a href="{{ url('/').$notification->link }}" class="skyblue-color">{{ $notification->message }}</a>
                                        </div>
                                        <input type="hidden" name="notification_id" value="{{$notification->id}}">
                                    </div> --}}

                                </div>

                                @endforeach

                            @else

                                <div class="col-md-12 text-center">
                                    Notifications are not available...
                                </div>
                                <hr>
                            @endif
                                
                                <div class="col-md-12 mt-2 text-center">
                                    <a href="{{ url('/notification') }}" class="btn btn-info btn-fw mt-1 mr-1">View All Notifications</a>
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




