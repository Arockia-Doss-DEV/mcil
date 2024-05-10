@extends('layouts.app')

@section('title', 'Active')

@section('styles')

@stop

@section('content')

<div class="container-fluid page-body-wrapper">

    @include("admin.elements.sidebar")

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="d-flex justify-content-between">
                <div class="pageheader">
                    <h4>Investment</h4>
                </div>
            </div>
            <div class="row mt-3 mb-5">
                <div class="col-lg-12 card-margin">
                    <div class="card">
                        <div class="card-body">
                            <form method="get" action="{{ url('/subscription/maturing')}}">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="input-group mb-3">
                                            <input type="text" name="q" placeholder="Search By Investment No" class="form-control search-input" value=""/>
                                            <div class="input-group-append">
                                                <button type="submit" id="searchSubmitId" class="btn btn-info"> <i
                                                        data-feather="search"></i> </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive mt-2">
                                <table id="example" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>INVESTMENT ID</th>
                                            <th>AMOUNT</th>
                                            <th>COMMENCEMENT DATE</th>
                                            <th>MATURITY DATE</th>
                                            <th>FUND</th>
                                            <th>STATUS</th>
                                            <th>CREATED AT</th>
                                            <th>ACTIONS</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    @if ($maturity_exps->count() > 0)
                                        
                                        @foreach ($maturity_exps as $key => $ss)
                                            
                                            <tr>
                                                <td class="font-weight-bold">

                                                    <?php 
                                                        if (!empty($ss->draft_refrence_id)) {
                                                            
                                                            if (($ss->status == 3) || ($ss->status == 6)) {
                                                                $investment_no = $ss->reference_no.$ss->refreance_id;
                                                            } else {
                                                                $investment_no = $ss->draft_refrence_id."-".$ss->reference_no.$ss->refreance_id;
                                                            }
                                                        }else{
                                                            $investment_no = $ss->reference_no.$ss->refreance_id;
                                                        }
                                   
                                                    ?>

                                                #{{ $investment_no }} </td>
                                                <td class="text-muted">{{ $ss->initial_investment }}</td>
                                                <td class="text-muted">
                                                    <?php
                                                    if(!empty($ss->commence_date)){
                                                        
                                                        echo date('d M, Y', strtotime($ss->commence_date));
                                                    }else{
                                                        echo "-";
                                                    } ?>
                                                        
                                                </td>
                                                <td class="text-muted"><?php
                                                    if(!empty($ss->maturity_date)){
                                                        
                                                        echo date('d M, Y', strtotime($ss->maturity_date));

                                                    }else{
                                                        echo "-";
                                                    } ?>
                                                        
                                                </td>
                                                <td><span class="badge badge-soft-info mt-2 mr-2">
                                                    {{ $ss->McilFund->name }}
                                                </span></td>
                                                <td><span class="badge badge-soft-success mt-2 mr-2">
                                                    <?php 
                                                    if($ss->status == 3){
                                                        echo "Active";
                                                    } ?>
                                                </span></td>
                                                <td class="text-muted">{{ $ss->created_at->format('d M, Y') }}</td>
                                                <td>
                                                    <?php
                                                        if(isset($_GET['page'])) {
                                                            $pageId=$_GET['page'];
                                                        } else {
                                                            $pageId=1;
                                                        }
                                                    ?>

                                                    <a class="table-view-card" href="{{ route('adminSubscriptionView', ['id' => $ss->id, 'pageId' => $pageId]) }}"><img src="{{ asset('assets/images/icons/view-icon.png') }}" alt="view icon" /></a>
                                                </td>
                                            </tr>

                                        @endforeach

                                    @else

                                      <tr><td colspan=8 align="center">No Records Available..</td></tr>
                                    @endif

                                    </tbody>
                                </table>
                            </div>
                            
                            <br>
                            {{-- {!! $maturity_exps->links('pagination::bootstrap-4') !!}  --}}
                            
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