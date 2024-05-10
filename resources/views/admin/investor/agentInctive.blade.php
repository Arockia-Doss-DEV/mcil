@extends('layouts.app')

@section('title', 'Agent Active')

@section('styles')

@stop

@section('content')

<div class="container-fluid page-body-wrapper">

    @include("admin.elements.sidebar")

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="d-flex justify-content-between">
                <div class="pageheader">
                    <h4>Agents</h4>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-12 card-margin">
                    <div class="card">
                        <div class="card-body">
                            <form method="get" action="{{ url('/agents/inActive')}}">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="input-group mb-3">
                                            <input type="text" name="q" placeholder="Search by Users, Email, Mobile no"
                                                class="form-control search-input" value="" />
                                            <div class="input-group-append">
                                                <button type="submit" id="searchSubmitId" class="btn btn-info"> <i
                                                        data-feather="search"></i> </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 text-md-right"><a href="{{ url('/investor/create') }}" class="btn btn-info mr-1"> + Create</a>
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive mt-2">
                                <table id="example" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>SIGNUP DATE</th>
                                            <th>MEMBER NAME</th>
                                            <th>MEMBER EMAIL</th>
                                            <th>MEMBER MOBILE NO</th>
                                            <th>COUNTRY</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    @if ($users->count() > 0)
                                        
                                        @foreach ($users as $key => $user)    
                                            <tr>
                                                <td class="text-muted">{{ $user->created_at->format('d M, Y h:i A') }}</td>
                                                <td class="text-muted"><?= $user->first_name ?><?= $user->last_name ?></td>
                                                <td class="text-muted"><?= $user->email ?></td>
                                                <td class="text-muted">+<?= $user->mobile_prefix ? $user->mobilePrefix->calling_code : '' ?>-<?= $user->mobile_no;?></td>
                                                <td class="text-muted"><?= $user->country ? $user->countryAs->name : '' ?></td>
                                                <td>

                                                    <?php
                                                        if(isset($_GET['page'])) {
                                                            $pageId=$_GET['page'];
                                                        } else {
                                                            $pageId=1;
                                                        }
                                                    ?>
                                                    
                                                    <div class="d-flex">

                                                        <a class="table-view-card mr-2" href="{{ route('viewInvestor', ['id' => $user->id, 'pageId' => $pageId, 'pageView' => "AI"]) }}"><img src="{{ asset('assets/images/icons/view-icon.png') }}" title="View" alt="view icon" />
                                                        </a>
                                                        <a class="table-view-card mr-2" href="{{ url('/investor/edit/'.$user->id) }}">
                                                            <img src="{{ asset('assets/images/icons/edit-icon.png') }}" title="Edit" alt="Edit icon" />
                                                        </a>
                                                        
                                                        {{ link_to_route('activeAgent', $title = 'Active', $parameters = ['userId' => $user->id], $attributes = ['escape'=>false, 'class' => "btn btn-success text-white", 'title'=> 'Active', 'onclick' => "if (confirm('Are you sure you want to active agent?')){return true;}else{event.stopPropagation(); event.preventDefault();};"]); }}

                                                        {{-- @if ($user->is_agent == 0)

                                                            {{ link_to_route('activeAgent', $title = 'Active', $parameters = ['userId' => $user->id], $attributes = ['escape'=>false, 'class' => "btn btn-soft-success", 'title'=> 'Active', 'onclick' => "if (confirm('Are you sure you want to active agent?')){return true;}else{event.stopPropagation(); event.preventDefault();};"]); }}
                                                        
                                                        @elseif($user->is_agent == 1)

                                                            {{ link_to_route('deactiveAgent', $title = 'De-active', $parameters = ['userId' => $user->id], $attributes = ['escape'=>false, 'class' => "btn btn-soft-success", 'title'=> 'De-active', 'onclick' => "if (confirm('Are you sure you want to de-active agent?')){return true;}else{event.stopPropagation(); event.preventDefault();};"]); }}

                                                        @endif --}}

                                                    </div>
                                                        
                                                </td>
                                            </tr>
                                        @endforeach

                                    @else

                                      <tr><td colspan=7 align="center">No Records Available..</td></tr>
                                    @endif 

                                    </tbody>
                                </table>
                                
                                <br>
                                {!! $users->links('pagination::bootstrap-4') !!}

                            </div>
                        </div>
                    </div><br><br>
                </div>
            </div>

            @include('admin.elements.footer')

        </div>
    </div>

</div>
@endsection

@section('scripts')

@stop
