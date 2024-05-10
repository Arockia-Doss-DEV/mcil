@extends('layouts.app')

@section('title', 'Subscriptions')

@section('content')

<div class="container-fluid page-body-wrapper">

	@include("company.elements.sidebar")

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="d-flex justify-content-between">
                <div class="pageheader">
                    <h4>MY INVESTMENT</h4>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-12 card-margin">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <nav class="custom-investment-nav">
                                        <div class="nav nav-tabs nav-tabs-line" id="nav-tab1" role="tablist">
                                            <a class="nav-item nav-link active" id="nav-home-tab1"
                                                data-toggle="tab" href="#nav-home1" role="tab"
                                                aria-controls="nav-home1" aria-selected="true">All <span
                                                    class="text-muted ml-2"> ({{ $subscriptions->count() }})</span></a>
                                            <a class="nav-item nav-link" id="nav-profile-tab1" data-toggle="tab"
                                                href="#nav-profile1" role="tab" aria-controls="nav-profile1"
                                                aria-selected="false">Draft <span class="text-muted ml-2">
                                                    ( {{ $subscriptionsDraft->count() }} )</span></a>
                                        </div>
                                    </nav>
                                </div>

                                @if (!empty($enable_subscription))
                                    <div class="col-lg-8 text-md-right">
                                        <a class="btn btn-info mr-1" href="{{ url('/company/additionalCreate') }}"> + Additional Investment</a>
                                    </div>
                                @endif
                            </div>

                            @if (auth()->user()->role_id == 2)
                                <form method="get" action="{{ url('/individual/subscriptions') }}">
                            @elseif(auth()->user()->role_id == 3)
                                <form method="get" action="{{ url('/company/subscriptions') }}">
                            @else
                                <form method="get" action="{{ url('/individual/subscriptions') }}">
                            @endif

                            <div class="row col-lg-12 mt-2">
                                <div class="col-md-4">
                                    <div class="input-group">
                                        <input type="text" name="q" id="query" placeholder="Search By Investment No" class="form-control search-input" value="{{request()->get('q','')}}" />
                                        <div class="input-group-append">
                                            <button type="submit" id="search_btn" class="btn btn-info"> 
                                                <i data-feather="search"></i> </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <?php 
                                        $options = [""=> "Please select status", "0"=> "Pending", "1"=>"Pending Funding", "2" =>"Incomplete", "3"=>"Active", "6"=>"Matured" ];
                                    ?>
                                    {!! Form::select('status', $options, null, ['class' => 'form-control fund-sub-input', 'id' => 'status']) !!}
                                </div>

                                <div class="col-md-2">
                                    <div class="input-group mt-1">
                                        <div class="input-group-append">
                                            <button type="submit" id="searchSubmitId" class="btn btn-primary"> 
                                                <i data-feather="search"></i> 
                                            </button>
                                        </div>
                                        <input type="hidden" name="clear" class="form-control search-input" value="" autocomplete="off"/>
                                        <div class="input-group-append">
                                            <button type="submit" id="searchSubmitId" class="btn btn-danger"> 
                                                <i data-feather="x"></i> 
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form>

                            <div class="tab-content" id="nav-tabContent1">
                                <div class="tab-pane fade show active" id="nav-home1" role="tabpanel" aria-labelledby="nav-home-tab1">
                                    <div class="table-responsive mt-2">
                                        <table id="example" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Investment ID</th>
                                                    <th>Amount</th>
                                                    <th>Commencement Date</th>
                                                    <th>Maturity Date</th>
                                                    <th>Fund</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            @if ($subscriptions->count() > 0)    

                                                @foreach ($subscriptions as $key => $ss)   

                                                    <tr>
                                                        <td class="font-weight-bold">#

                                                            <?php 
                                                                if(!empty($ss['draft_refrence_id'])){
                                                                    
                                                                    if(($ss['status'] == 3) || ($ss['status'] == 6)){
                                                                        $investment_no = $ss['reference_no'].$ss['refreance_id'];
                                                                    }else{
                                                                        $investment_no = $ss['draft_refrence_id']."-".$ss['reference_no'].$ss['refreance_id'];
                                                                    }
                                                                }else{
                                                                    $investment_no = $ss['reference_no'].$ss['refreance_id'];
                                                                }


                                                                echo link_to(url('/company/view/subscription/'.$ss->id), $title = $investment_no, $attributes = [], $secure = null);  
                                                            ?>

                                                        </td>
                                                        <td class="text-muted">${{$ss->initial_investment}}</td>
                                                        <td class="text-muted">
                                                            <?php
                                                            if(!empty($ss->commence_date)){
                                                            
                                                                echo date('d M, Y', strtotime($ss->commence_date));
                                                            }else{
                                                                echo "-";
                                                            } ?>
                                                        </td>
                                                        <td class="text-muted">
                                                            <?php
                                                            if(!empty($ss->maturity_date)){
                                                            
                                                                echo date('d M, Y', strtotime($ss->maturity_date));
                                                            }else{
                                                                echo "-";
                                                            } ?>
                                                        </td>
                                                        <td><span class="badge badge-soft-info mt-2 mr-2">
                                                            {{ $ss->McilFund->name }}
                                                        </span></td>
                                                        <td>
                                                            <?php 
                                                                if($ss->draft == 0){
                                                                    if($ss->status  ==0){
                                                                        echo '<span class="badge badge-soft-warning mt-2 mr-2">Pending</span>';
                                                                    }else if($ss->status ==1){
                                                                        echo '<span class="badge badge-soft-primary mt-2 mr-2">Pending Funding</span>';
                                                                    }else if($ss->status ==2){
                                                                        echo '<span class="badge badge-soft-danger mt-2 mr-2">Incomplete</span>';
                                                                    }else if($ss->status ==3){
                                                                        echo '<span class="badge badge-soft-success mt-2 mr-2">Active</span>';
                                                                    }else if($ss->status ==4){
                                                                        echo '<span class="badge badge-soft-danger mt-2 mr-2">De-Active</span>';
                                                                    }else if($ss->status ==5){
                                                                        echo '<span class="badge badge-soft-danger mt-2 mr-2">Rejected</span>';
                                                                    }else if($ss->status ==6){
                                                                        echo '<span class="badge badge-soft-info mt-2 mr-2">Matured</span>';
                                                                    }else if($ss->status ==7){
                                                                        echo '<span class="badge badge-soft-primary mt-2 mr-2">Premature Redemption</span>';
                                                                    }
                                                                }else{
                                                                    echo '<span class="badge badge-soft-secondary-3 mt-2 mr-2">Draft</span>';  
                                                                }
                                                            ?>

                                                        </td>
                                                        <td><a class="table-view-card" href="{{ url('/company/view/subscription/'.$ss->id) }}">
                                                                <img src="{{ asset('assets/images/icons/view-icon.png') }}"
                                                                    alt="view icon" />
                                                            </a>
                                                        </td>
                                                    </tr>

                                                @endforeach

                                            @else

                                              <tr><td colspan=7 align="center">No Records Available..</td></tr>
                                            @endif 
                                            
                                            </tbody>
                                        </table>
                                    </div>

                                    <br>
                                    {{ $subscriptions->appends(Request::except('page'))->links('pagination::bootstrap-4') }}

                                </div>

                                <div class="tab-pane fade" id="nav-profile1" role="tabpanel"  aria-labelledby="nav-profile-tab1">
                                    <div class="table-responsive mt-2">
                                        <table id="example" class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Investment ID</th>
                                                    <th>Amount</th>
                                                    <th>Commencement Date</th>
                                                    <th>Maturity Date</th>
                                                    <th>Status</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            @if ($subscriptionsDraft->count() > 0)    

                                                @foreach ($subscriptionsDraft as $key => $ss)

                                                    <tr>
                                                        <td class="font-weight-bold">#
                                                            <?php
                                                                if(!empty($ss['draft_refrence_id'])){
                                                                    
                                                                    if(($ss['status'] == 3) || ($ss['status'] == 6)){
                                                                        $investment_no = $ss['reference_no'].$ss['refreance_id'];
                                                                    }else{
                                                                        $investment_no = $ss['draft_refrence_id']."-".$ss['reference_no'].$ss['refreance_id'];
                                                                    }
                                                                }else{
                                                                    $investment_no = $ss['reference_no'].$ss['refreance_id'];
                                                                }
                                                            ?>

                                                            <?= $investment_no; ?>
                                                         </td>
                                                        <td class="text-muted">${{$ss->initial_investment}}</td>
                                                        <td class="text-muted">
                                                            <?php
                                                            if(!empty($ss->commence_date)){
                                                            
                                                                echo date('d M, Y', strtotime($ss->commence_date));
                                                            }else{
                                                                echo "-";
                                                            } ?>
                                                        </td>
                                                        <td class="text-muted">
                                                            <?php
                                                            if(!empty($ss->maturity_date)){
                                                            
                                                                echo date('d M, Y', strtotime($ss->maturity_date));
                                                            }else{
                                                                echo "-";
                                                            } ?>
                                                        </td>
                                                        <td>
                                                            <?php 
                                                                if($ss->draft == 0){
                                                                    if($ss->status  ==0){
                                                                        echo '<span class="badge badge-soft-warning mt-2 mr-2">Pending</span>';
                                                                    }else if($ss->status ==1){
                                                                        echo '<span class="badge badge-soft-primary mt-2 mr-2">Pending Funding</span>';
                                                                    }else if($ss->status ==2){
                                                                        echo '<span class="badge badge-soft-danger mt-2 mr-2">Incomplete</span>';
                                                                    }else if($ss->status ==3){
                                                                        echo '<span class="badge badge-soft-success mt-2 mr-2">Active</span>';
                                                                    }else if($ss->status ==4){
                                                                        echo '<span class="badge badge-soft-danger mt-2 mr-2">De-Active</span>';
                                                                    }else if($ss->status ==5){
                                                                        echo '<span class="badge badge-soft-danger mt-2 mr-2">Rejected</span>';
                                                                    }else if($ss->status ==7){
                                                                        echo '<span class="badge badge-soft-primary mt-2 mr-2">Premature Redemption</span>';
                                                                    }
                                                                }else{
                                                                    echo '<span class="badge badge-soft-secondary-3 mt-2 mr-2">Draft</span>';  
                                                                }
                                                            ?>

                                                        </td>
                                                        <td class="d-flex">
                                                            <a class="table-view-card mr-1" href="{{ url('/company/subscriptionEdit/'.$ss->id) }}">
                                                                <img src="{{ asset('assets/images/icons/edit-icon.png') }}"
                                                                    alt="view icon" />
                                                            </a>

                                                            <form action="{{ route('companySubscriptionDelete', $ss->id)}}" method="post">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button type="submit" class="table-view-card ml-1 table-delete-card"><img src="{{ asset('assets/images/icons/delete-icon.png') }}">
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach

                                            @else

                                              <tr><td colspan=7 align="center">No Records Available..</td></tr>
                                            @endif

                                            </tbody>
                                        </table>
                                    </div>

                                    <br>
                                    {!! $subscriptionsDraft->links('pagination::bootstrap-4') !!}
                                    
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