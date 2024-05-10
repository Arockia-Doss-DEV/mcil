@extends('layouts.app')

@section('title', 'View Newsletter')

@section('content')

<div class="container-fluid page-body-wrapper">

	@include("individual.elements.sidebar")

	<div class="main-panel">
        <div class="content-wrapper">
            <div class="d-flex justify-content-between">
                <div class="pageheader">
                    <h4>NEWSLETTER</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb no-bg custom-breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Newsletter</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Campaign Details</li>
                        </ol>
                    </nav>
                </div>
                <div class="go-back">
                    <a href="{{ url('/individual/newsletters') }}"><img src="{{ asset('assets/images/icons/back-icon.png') }}" alt="back icon" /></a>
                </div>
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
                                        <span class="time">{{ $email->UserEmails->created_at->format('d M, Y h:i A') }}</span>
                                    </div>
                                </div>
                                <div class="widget-20-body">
                                    <img src="{{ asset('/project_img/newsletter/newsletter-icon.jpg') }}" alt="Newsletter Image" class="newsDetailsImage" />
                                    <div class="widget-20-post-container">
                                        <a href="#" class="text-center title">{{ $email->UserEmails->subject }}</a>
                                        <div class="desc">
                                            {!! $email->UserEmails->message !!}
                                        </div>
                                        <div>
                                            <div class="text-center my-3">
                                                <a href="{{ asset('storage/'.$email->UserEmails->attachment) }}" class="btn btn-secondary bg-white w-50 application-btn" download>
                                                    <img src="{{ asset('assets/images/icons/download-icon.png') }}"
                                                        class="news-download-icon mr-2" alt="download icon" />
                                                    Download Attachment</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('individual.elements.footer')

        </div>
    </div>

</div>

@endsection