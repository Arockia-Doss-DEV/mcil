@extends('layouts.app')

@section('title', 'Edit Role')

@section('styles')

@stop

@section('content')

<div class="container-fluid page-body-wrapper">

    @include("admin.elements.sidebar")

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="d-flex justify-content-between">
                <div class="pageheader">
                    <h4>UPDATE ROLE</h4>
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

                        {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id], 'data-parsley-validate' => 'data-parsley-validate', "data-parsley-trigger"=>"keyup", 'autocomlete'=>"off"]) !!}

                            <div class="card-body">
                                <div class="row">
                                    
                                   <div class="col-lg-6 mt-3 individual">
                                        <label> <strong>Role Name  <span class="mandatory">*</span></strong></label>
                                        {!! Form::text('name', $role->name, ['id' => 'name', 'class'=>'form-control search-input', 'data-parsley-group'=>"block1", 'required' => 'required', 'readonly']) !!}
                                    </div>
                                   
                                    <div class="col-lg-12 mt-3">
                                        <label> <strong>Permissions <span class="mandatory">*</span></strong> </label>

                                        @foreach($permission as $value)
                                        <div class=" mt-2 string-check string-check-soft-info  mb-2">
                                            {{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                            <label class="string-check-label"> <span class="ml-2">{{ $value->name }}</span> </label> 
                                        </div>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="text-right mt-3">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>

                            </div>

                        {{ Form::close() }}

                    </div>
                </div>
            </div>
            
            @include('admin.elements.footer')

        </div>
    </div>
</div>

@endsection

