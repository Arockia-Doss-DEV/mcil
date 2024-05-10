@extends('layouts.app')

@section('title', 'Payouts')

@section('styles')

@stop

@section('content')

<div class="container-fluid page-body-wrapper">

    @include("admin.elements.sidebar")

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="d-flex justify-content-between">
                <div class="pageheader">
                    <h4>Investor Payouts</h4>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-12 card-margin">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title m-0">Investor Subscriptions</h6>
                        </div>
                        <div class="card-body">
                            <form method="get" action="{{ url('/payouts')}}">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="input-group mb-3">
                                            <input type="text" name="q" placeholder="Search By Investment ID, Investor Name..." class="form-control search-input" value=""/>
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
                                            <th>INVESTOR NAME</th>
                                            <th>CREATED AT</th>
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


                                                        echo link_to(url('/payout/view/'.$ss->id), $title = $investment_no, $attributes = [], $secure = null);  
                                                    ?>

                                                </td>
                                                <td><?= $ss->User['first_name'].$ss->User['last_name']; ?></td>
                                                <td class="text-muted">
                                                    <?php
                                                    if(!empty($ss->created_at)){
                                                    
                                                        echo date('d M, Y', strtotime($ss->created_at));
                                                    }else{
                                                        echo "-";
                                                    } ?>
                                                </td>
                                            </tr>

                                        @endforeach

                                    @else
                                      <tr><td colspan=7 align="center">No Records Available..</td></tr>
                                    @endif 

                                    </tbody>
                                </table>

                                <br>
                                {!! $subscriptions->links('pagination::bootstrap-4') !!}
                                
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
