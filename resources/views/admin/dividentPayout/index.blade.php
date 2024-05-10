@extends('layouts.app')

@section('title', 'Dividend Payouts')

@section('styles')

@stop

@section('content')

<div class="container-fluid page-body-wrapper">

    @include("admin.elements.sidebar")

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="d-flex justify-content-between">
                <div class="pageheader">
                    <h4>Dividend Payouts</h4>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-12 card-margin">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title m-0">Investor Dividend Payouts</h6>
                        </div>
                        <div class="card-body">
                            <form method="get" action="{{ url('/divident/payouts')}}">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="input-group mb-3">
                                            <input type="text" name="q" placeholder="Search Investor Name..." class="form-control search-input" value=""/>
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
                                            <th>INVESTOR NAME</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    @if ($subscriptions->count() > 0)    
                                        @foreach ($subscriptions->unique('user_id') as $key => $ss)
                                            <tr>
                                                <td>
                                                    <?php 
                                                    $investor_name = $ss->User['first_name'].$ss->User['last_name']; 
                                                    echo link_to(url('/divident/payout/view/'.$ss->User->id), $title = $investor_name, $attributes = [], $secure = null); 
                                                    ?>
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
