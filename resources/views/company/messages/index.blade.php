@extends('layouts.app')

@section('title', 'Newsletters')

@section('content')

<div class="container-fluid page-body-wrapper">

	@include("company.elements.sidebar")

	<div class="main-panel">
        <div class="content-wrapper">
            <div class="d-flex justify-content-between">
                <div class="pageheader">
                    <h4>NEWSLETTERS</h4>
                </div>
            </div>
            <div class="row pb-5">
                <div class="col-lg-12 card-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">

                            @if ($emails->count() > 0)

                                @foreach ($emails as $key => $email) 

                                <div class="col-lg-4 col-md-6">
                                    <div class="card card-margin">
                                        <div class="card-body p-0">
                                            <div class="widget-22">
                                                <div class="widget-22-header">
                                                    <img src="{{ asset('/project_img/newsletter/newsletter-icon.jpg') }}"
                                                        alt="Blog Image" title="Blog Image" />
                                                </div>
                                                <div class="widget-22-body">
                                                    <div class="widget-22-post-container">
                                                        <a href="{{ url('/company/newsletter/view',$email->id) }}" class="title text-center"><?php echo substr($email->UserEmails->subject,0, 30)."..." ?></a>
                                                        <div class="desc"><?php echo strip_tags(substr($email->UserEmails->message,0, 180)."...") ?> </div>
                                                        <div>
                                                            <div class="my-4">
                                                                <a href="{{ url('/company/newsletter/view',$email->id) }}" class="btn btn-info w-100">View More</a>
                                                            </div>
                                                            <div class="my-3">
                                                                <a href="{{ asset('storage/'.$email->UserEmails->attachment) }}" class="btn btn-secondary bg-white w-100 application-btn" download>
                                                                <img src="{{ asset('assets/images/icons/download-icon.png') }}" class="news-download-icon mr-2" alt="download icon" /> Download Attachment</a>
                                                              </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="widget-22-footer">
                                                    <img src="{{ asset('assets/images/avatars/default.png') }}"
                                                        alt="Support User" title="Support User" />
                                                    <div class="widget-22-post-info">
                                                        <span class="author-name">Admin</span>
                                                        <span class="time">{{ $email->UserEmails->created_at->format('d M, Y h:i A') }}</span>
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
                        </div>
                    </div>
                </div>
            </div>

            @include('company.elements.footer')

        </div>
    </div>

</div>

@endsection