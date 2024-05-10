@extends('layouts.app')

@section('title', 'Create Newsletter')

@section('styles')
    {{-- <link rel="stylesheet" href="{{ asset('assets/plugins/fileinput/fileinput.css') }}"> --}}
@stop

@section('content')

<div class="container-fluid page-body-wrapper">

    @include("admin.elements.sidebar")

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="d-flex justify-content-between">
                <div class="pageheader">
                    <h4>SUBCRIPTION NEWSLETTER </h4>
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

            <div class="row mt-3 pb-5">
                <div class="col-lg-12 card-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">

                                {{ Form::open(['url'=> ['/subscribe'], 'method'=>'POST', 'id'=>'subscribeMailForm', 'files' => true]) }}

                                <div class="col-lg-6 mt-3">
                                    <label class="required">Email</label>
                                    <input type="email" class="form-control search-input" name="email" id="email">
                                </div>
                                <div class="col-lg-12 mt-3">
                                    <label class="required">FirstName</label>
                                    <input type="text" class="form-control search-input" name="firstName" id="firstName">
                                </div>
                                <div class="col-lg-12 mt-3">
                                    <label class="required">LastName</label>
                                    <input type="text" class="form-control search-input" name="lastName" id="lastName">
                                </div>
                                <div class="col-lg-12 mt-3">
                                    <label class="required">Phone Number</label>
                                    <input type="text" class="form-control search-input" name="phone" id="phone">
                                </div>


                                <div class="col-lg-12 mt-3">
                                    <label>Message</label>
                                    <div class="h-150">

                                        {!! Form::textarea('message', null, ['class'=>'form-control','id'=>"message", 'data-parsley-mintextsize'=>"10",  'parsley-trigger'=> "keyup" , 'data-parsley-errors-container'=>"#message-errors"]) !!}

                                    </div>
                                    <span id="message-errors"></span>
                                </div>

                            </div>

                            <div class="mt-3 text-right">
                                <button type="submit" class="btn btn-info">Subscribe</button>
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
@stop
