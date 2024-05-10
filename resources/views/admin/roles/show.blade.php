@extends('layouts.app')

@section('title', 'Show Role')

@section('styles')

@stop

@section('content')

<div class="container-fluid page-body-wrapper">

    @include("admin.elements.sidebar")

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="d-flex justify-content-between">
                <div class="pageheader">
                    <h4>SHOW ROLE</h4>
                </div>
                <div class="d-flex">
                    <div class="go-back">
                        <a href="{{ url('roles') }}" title="Back">
                            <img src="{{ asset('assets/images/icons/back-icon.png') }}" alt="back icon" />
                        </a>
                    </div>
                </div>
            </div>
            <div class="row mt-3 pb-5">
                <div class="col-lg-12 card-margin">
                    <div class="card">

                        <div class="card-body">
                            <div class="row">
                                
                                <div class="col-lg-12 mt-3 individual">
                                    <label> <strong>Name:</strong> </label> <span class="">{{ $role->name }}</span> 
                                </div>
                               
                                <div class="col-lg-12">
                                    <label> <strong>Permissions:</strong> </label>

                                    @if(!empty($rolePermissions))
                                        @foreach($rolePermissions as $v)
                                            <div class="mt-2 string-check string-check-soft-info mb-2">
                                                <input type="checkbox" name="active" checked>
                                                <label class="string-check-label"> 
                                                    <span class="ml-2"> {{ $v->name }}</span> 
                                                </label>                                        
                                            </div>
                                        @endforeach
                                    @endif
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

