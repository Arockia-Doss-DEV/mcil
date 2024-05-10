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
                <div class="d-flex">
                    <div class="go-back">
                        <a href="{{ url('/payouts') }}"><img src="{{ asset('assets/images/icons/back-icon.png') }}"
                                alt="back icon" /></a>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-lg-12 card-margin">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title m-0">Quarterly Payout Projection</h6>
                        </div>
                        <div class="card-body">
                            
                            {{-- <form method="get" action="">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="input-group mb-3">
                                            <input type="text" name="q" placeholder="Search By Name, Year, Percentage..." class="form-control search-input" value=""/>
                                            <div class="input-group-append">
                                                <button type="submit" id="searchSubmitId" class="btn btn-info"> <i
                                                        data-feather="search"></i> </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form> --}}

                            <div class="table-responsive mt-2">
                                <table id="example" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Investor Name</th>
                                            <th>Quarter-Year</th>
                                            <th>Payout (%)</th>
                                            <th>Payout Amount (USD)</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php $total_payout = 0; ?>      
                                    <?php
                                        $unique_array = [];

                                        if(!empty($final)) {
                                            foreach($final as $key => $element) {
                                                $hash = $element['quarter'];
                                                $unique_array[$hash][$key] = $element;
                                            }
                                        }
                                        
                                        $result = array_values($unique_array);

                                        if(!empty($result)) {

                                            foreach ($result as $key => $value) {

                                                $total = 0;
                                                foreach($value as $key2 => $value2){

                                                    echo "<tr>";
                                                    
                                                    $perq_amount = $value2['amount'];
                                                    $total += $perq_amount;

                                                    $total_payout += $total;
                                                }
                                                
                                                echo "<td class='text-muted'>".$value2['investor_name']."</td>";
                                                echo "<td class='text-muted'>".$value2['month']. '-' .$value2['year']."</td>";

                                                echo "<td class='text-muted'>".$value2['percentage']."</td>";
                                                echo "<th class='font-weight-bold'> $ ".$total."</th>";
                                                echo "<td class='text-muted'>".'-'."</td>";
                                                echo "</tr>";
                                            }
                                           
                                        }else{
                                            echo "<tr><td colspan=6 align='center'>".'No Records Available ...'."</td></tr>";
                                        }

                                    ?>

                                    </tbody>
                                    <?php if(!empty($final)) { ?>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th></th>
                                            <th>Total</th>
                                            <th>$ <?= number_format($total_payout); ?></th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <?php } ?>
                                </table>
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
