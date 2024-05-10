@extends('layouts.app')

@section('title', 'ADMIN DASHBOARD')

@section('content')

<div class="container-fluid page-body-wrapper">

	@include("admin.elements.sidebar")

    <div class="main-panel">
        <div class="content-wrapper custom-dashboard-card">
            <div class="d-flex justify-content-between">
                <div class="pageheader">
                    <h4>DASHBOARD</h4>
                </div>
                <div><span class="text-muted">Welcome to Dashboard</span></div>
            </div>
            
            @if ($maturity_exps->count() > 0)
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <i data-feather="alert-circle" class="alert-icon"></i>
                    <span class="alert-text"><strong>Maturing Contracts Alert!</strong> <a href="{{ url('/subscription/maturing') }}" style="color: white;" class="alert-text">Please click to view the not renewing maturity contracts.</a></span>
                    <button type="button" style="color:black;" class="close" data-dismiss="alert" aria-label="Close">
                        <i data-feather="x" class="alert-close"></i>
                    </button>
                </div>
            @endif

            @php
                $fundsGolbal = getFunds();
            @endphp

            <div class="row d-block d-sm-none mb-3">
                <div class="col-lg-6">
                    <select class="selectpicker" id="mcil_fund_gobal2" onchange="mcilfundsetdefault2();">
                        <option value="0"> All</option>
                        
                        <?php foreach($fundsGolbal as $key=>$fund){ ?>

                            <?php 
                                $sel = ''; 
                                if($fund['setdefault'] == 1){ 
                                    $sel = 'selected'; 
                                }
                            ?>

                            <option <?= $sel; ?> value="<?= $fund->id ?>"><?= $fund->name ?></option>
                        <?php } ?>    

                    </select>
                </div>
            </div> 
            
            <div class="row mt-3">
                <div class="col-lg-3">
                    <a href="#" onclick="javascript:location.href='{{ url('/subscription/active')}}'">
                        <div class="card card-margin">
                            <div class="card-header no-border">
                                <h6 class="card-title">Total Active Investment</h6>
                            </div>
                            <div class="card-body p-0">
                                <div class="widget-55">
                                    <div class="widget-55-header">
                                        <div class="widget-55-header-left">
                                            <h4>{{ number_format($total_active_count, 2) }}</h4>
                                         </div>
                                        <div class="widget-55-header-right">
                                            <img src="{{ asset('assets/images/icons/total-active-investment-icon.png') }}"
                                                alt="sales" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3">
                    <a href="#" onclick="javascript:location.href='{{ url('/subscription/initialInvestments') }}'">
                        <div class="card card-margin">
                            <div class="card-header no-border">
                                <h6 class="card-title">Total Initial Investments</h6>
                            </div>
                            <div class="card-body p-0">
                                <div class="widget-55">
                                    <div class="widget-55-header">
                                        <div class="widget-55-header-left">
                                            <h4>{{ number_format($total_investment_count, 2) }}</h4>
                                        </div>
                                        <div class="widget-55-header-right">
                                            <img src="{{ asset('assets/images/icons/total-redemption-icon.png') }}"
                                                alt="sales" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3">
                    <a href="#" onclick="javascript:location.href='{{ url('/subscription/additionalInvestments') }}'">
                        <div class="card card-margin">
                            <div class="card-header no-border">
                                <h6 class="card-title">Total Additional Investments</h6>
                            </div>
                            <div class="card-body p-0">
                                <div class="widget-55">
                                    <div class="widget-55-header">
                                        <div class="widget-55-header-left">
                                            <h4>{{ number_format($total_add_investment_count, 2) }}</h4>
                                        </div>
                                        <div class="widget-55-header-right">
                                            <img src="{{ asset('assets/images/icons/total-reinvestment-amount-icon.png') }}"
                                                alt="sales" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3">
                    <a href="#" onclick="javascript:location.href='{{ url('/investor/active')}}'">
                        <div class="card card-margin">
                            <div class="card-header no-border">
                                <h6 class="card-title">Number Of Active Investors</h6>
                            </div>
                            <div class="card-body p-0">
                                <div class="widget-55">
                                    <div class="widget-55-header">
                                        <div class="widget-55-header-left">
                                            <h4>{{ number_format($active_investor_count, 2) }} </h4>
                                        </div>
                                        <div class="widget-55-header-right">
                                            <img src="{{ asset('assets/images/icons/total-payout-amount-icon.png') }}"
                                                alt="sales" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                
            </div>

            <div class="row mt-3">
                
                <div class="col-lg-3">
                    <a href="#" onclick="javascript:location.href='{{ url('/subscription/pending')}}'">
                        <div class="card card-margin">
                            <div class="card-header no-border">
                                <h6 class="card-title">Total Pending Investment</h6>
                            </div>
                            <div class="card-body p-0">
                                <div class="widget-55">
                                    <div class="widget-55-header">
                                        <div class="widget-55-header-left">
                                            <h4>{{ number_format($total_pending_count, 2) }}</h4>
                                        </div>
                                        <div class="widget-55-header-right">
                                            <img src="{{ asset('assets/images/icons/total-active-investment-amount-icon.png') }}"
                                                alt="sales" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3">
                    <a href="#" onclick="javascript:location.href='{{ url('/subscription/funding') }}'">
                        <div class="card card-margin">
                            <div class="card-header no-border">
                                <h6 class="card-title">Total Pending Funding</h6>
                            </div>
                            <div class="card-body p-0">
                                <div class="widget-55">
                                    <div class="widget-55-header">
                                        <div class="widget-55-header-left">
                                            <h4>{{ number_format($total_pendingFunding_count, 2) }}</h4>
                                        </div>
                                        <div class="widget-55-header-right">
                                            <img src="{{ asset('assets/images/icons/total-reinvestment-icon.png') }}"
                                                alt="sales" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3">
                    <a href="#" onclick="javascript:location.href='{{ url('/subscription/redemption') }}'">
                        <div class="card card-margin">
                            <div class="card-header no-border">
                                <h6 class="card-title">Number Of Redemptions</h6>
                            </div>
                            <div class="card-body p-0">
                                <div class="widget-55">
                                    <div class="widget-55-header">
                                        <div class="widget-55-header-left">
                                            <h4>{{ number_format($total_reduption_count, 2) }}</h4>
                                        </div>
                                        <div class="widget-55-header-right">
                                            <img src="{{ asset('assets/images/icons/total-payout-icon.png') }}" alt="sales" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-3">
                    <a href="#" onclick="javascript:location.href='{{ url('/subscription/jointAccounts')}}'">
                        <div class="card card-margin">
                            <div class="card-header no-border">
                                <h6 class="card-title">Number Of Joint Accounts</h6>
                            </div>
                            <div class="card-body p-0">
                                <div class="widget-55">
                                    <div class="widget-55-header">
                                        <div class="widget-55-header-left">
                                            <h4>{{ number_format($total_joint_account_count, 2) }}</h4>
                                        </div>
                                        <div class="widget-55-header-right">
                                            <img src="{{ asset('assets/images/icons/next-payout-projection-icon.png') }}"
                                                alt="sales" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

            </div>

            {{-- <div class="row mt-3">
                <div class="col-lg-3">
                    <div class="card card-margin">
                        <div class="card-header no-border">
                            <h6 class="card-title">Total Investment Amount</h6>
                        </div>
                        <div class="card-body p-0">
                            <div class="widget-55">
                                <div class="widget-55-header">
                                    <div class="widget-55-header-left">
                                        <h4>${{ number_format($total_investment_amount, 2) }}</h4>
                                    </div>
                                    <div class="widget-55-header-right">
                                        <img src="{{ asset('assets/images/icons/total-active-investment-amount-icon.png') }}"
                                            alt="sales" />

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card card-margin">
                        <div class="card-header no-border">
                            <h6 class="card-title">Total Dividend paid</h6>
                        </div>
                        <div class="card-body p-0">
                            <div class="widget-55">
                                <div class="widget-55-header">
                                    <div class="widget-55-header-left">
                                        <h4>${{ number_format($total_dividends_count, 2) }}</h4>
                                    </div>
                                    <div class="widget-55-header-right">
                                        <img src="{{ asset('assets/images/icons/total-active-investment-icon.png') }}"
                                            alt="sales" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="card card-margin">
                        <div class="card-header no-border">
                            <h6 class="card-title">Total Earnings</h6>
                        </div>
                        <div class="card-body p-0">
                            <div class="widget-55">
                                <div class="widget-55-header">
                                    <div class="widget-55-header-left">
                                        <h4>${{ number_format($total_earning, 2) }}</h4>
                                    </div>
                                    <div class="widget-55-header-right">
                                        <img src="{{ asset('assets/images/icons/total-reinvestment-amount-icon.png') }}"
                                            alt="sales" />

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php 
                    $online_user_count = 0;            
                    if(!empty($userActivities)){ 
                        foreach ($userActivities as $user){

                            if (\Cache::has('user-is-online-' . $user->id)) {
                               $online_user_count +=1;
                            }
                        }
                    }
                ?>

                <div class="col-lg-3">
                    <div class="card card-margin">
                        <div class="card-header no-border">
                            <h6 class="card-title">Total Online Users</h6>
                        </div>
                        <div class="card-body p-0">
                            <div class="widget-55">
                                <div class="widget-55-header">
                                    <div class="widget-55-header-left">
                                        <h4>{{ $online_user_count }}</h4>
                                    </div>
                                    <div class="widget-55-header-right">
                                        <img src="{{ asset('assets/images/icons/total-reinvestment-icon.png') }}"
                                            alt="sales" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

            <div class="row mt-3">
                <div class="col-lg-6">
                    <div class="card card-margin">
                        <div class="card-header no-border">
                            <h6 class="card-title">Total Investment Amount</h6>
                        </div>
                        <div class="card-body p-0">
                            <div class="widget-55">
                                <div class="widget-55-header">
                                    <div class="widget-55-header-left">
                                        <h4>${{ number_format($total_investment_amount, 2) }}</h4>
                                    </div>
                                    <div class="widget-55-header-right">
                                        <img src="{{ asset('assets/images/icons/total-active-investment-amount-icon.png') }}"
                                            alt="sales" />

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-margin">
                        <div class="card-header no-border">
                            <h6 class="card-title">Total Dividend paid</h6>
                        </div>
                        <div class="card-body p-0">
                            <div class="widget-55">
                                <div class="widget-55-header">
                                    <div class="widget-55-header-left">
                                        <h4>${{ number_format($total_dividends_count, 2) }}</h4>
                                    </div>
                                    <div class="widget-55-header-right">
                                        <img src="{{ asset('assets/images/icons/total-active-investment-icon.png') }}"
                                            alt="sales" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-margin">
                        <div class="card-header no-border">
                            <h6 class="card-title">Total Earnings</h6>
                        </div>
                        <div class="card-body p-0">
                            <div class="widget-55">
                                <div class="widget-55-header">
                                    <div class="widget-55-header-left">
                                        <h4>${{ number_format($total_earning, 2) }}</h4>
                                    </div>
                                    <div class="widget-55-header-right">
                                        <img src="{{ asset('assets/images/icons/total-reinvestment-amount-icon.png') }}"
                                            alt="sales" />

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php 
                    $online_user_count = 0;            
                    if(!empty($userActivities)){ 
                        foreach ($userActivities as $user){

                            if (\Cache::has('user-is-online-' . $user->id)) {
                               $online_user_count +=1;
                            }
                        }
                    }
                ?>

                <div class="col-lg-6">
                    <div class="card card-margin">
                        <div class="card-header no-border">
                            <h6 class="card-title">Total Online Users</h6>
                        </div>
                        <div class="card-body p-0">
                            <div class="widget-55">
                                <div class="widget-55-header">
                                    <div class="widget-55-header-left">
                                        <h4>{{ $online_user_count }}</h4>
                                    </div>
                                    <div class="widget-55-header-right">
                                        <img src="{{ asset('assets/images/icons/total-reinvestment-icon.png') }}"
                                            alt="sales" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Month wise investment bar chart -->
            <div class="row mt-3">
                <div class="col-lg-6 col-md-6 card-margin">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title m-0">Month initial investment (USD) </h6>
                        </div>
                        <div class="card-body">
                            <div id="month-wise-investment"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 card-margin">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title m-0">Month additional investment (USD) </h6>
                        </div>
                        <div class="card-body">
                            <div id="additional-investment-bar-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Month wise  new investment bar chart -->
            <div class="row">
                <div class="col-lg-6 col-md-6 card-margin">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title m-0">Number of new investments </h6>
                        </div>
                        <div class="card-body">
                            <div id="new-investment-bar-chart"></div>
                        </div>
                    </div>
                </div>
                <!--source of income  -->
                <div class="col-lg-6 col-md-6 card-margin">
                    <div class="card ">
                        <div class="card-header">
                            <h6 class="card-title m-0">Investors source of income</h6>
                        </div>
                        <div class="card-body">
                            <div id="donut-chart"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- country wise chart -->
            <div class="row">
                <div class="col-lg-12 card-margin">
                    <div class="card card-rounded">
                        <div class="card-header">
                            <h5 class="card-title">Country investments</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="table-responsive">
                                        <table class="table widget-6">
                                            <tbody>
                                            
                                                @foreach ($country_wise as $key => $data)
                                                   
                                                    <tr>
                                                        <td class="border-top-0">
                                                            <div class="widget-6-title-wrapper">
                                                                <div class="widget-6-product-info">
                                                                    <div class="title"><i class="flag-icon flag-icon-{{ strtolower($data->iso_code_2) }}" title="gb" id="gb"></i> {{ $data->name }}</div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td class="border-top-0">
                                                            <div class="widget-6-desc">
                                                                <div class="widget-6-order-wrapper">
                                                                    <div class="figure">{{ $data->TotalInvestment }}</div>
                                                                    <div class="desc">Number of investments</div>
                                                                </div>
                                                             
                                                                <div class="widget-6-earning-wrapper">
                                                                    <div class="figure">{{ $data->TotalInvestmentAmount }} </div>
                                                                    <div class="desc">Total Investments</div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div id="map-world2"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3 mb-5">
                <div class="col-lg-12 card-margin">
                    <div class="card card-rounded">
                        <div class="card-header">
                            <h5 class="card-title">Online Users</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table class="table widget-6">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Browser</th>
                                                    <th>Ip Address</th>
                                                    <th>Last Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            @if ($userActivities->count() > 0)  

                                                @foreach ($userActivities as $key => $user)
                                                    
                                                    @if(\Cache::has('user-is-online-' . $user->id))

                                                    <tr>
                                                        <td>{{ $key+1 }}</td>
                                                        <td>{{ $user->first_name }} {{ $user->last_name }} </td>
                                                        <td>{{ $user->email }}</td>
                                                        <td>{{ $user->userActivity->user_browser }}</td>
                                                        <td>{{ $user->userActivity->ip_address }}</td>
                                                        <td>{{ Carbon::parse($user->userActivity->last_seen)->diffForHumans() }}</td>
                                                    </tr>

                                                    @endif
                                                    
                                                @endforeach   

                                            @else

                                                <tr><td colspan=7 align="center">No Records Available..</td></tr>
                                            @endif 
                                                
                                            </tbody>
                                        </table>
                                    </div>
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

@section('scripts')

<script type="text/javascript">

    (function () {
        'use strict';
        //Chart #3
        var options = {
            chart: {
                height: 350,
                type: 'bar',
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded',
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            series: [{
                name: 'Total Investment Amount',
                data: <?php echo json_encode($investment_amount_rows); ?>
            }],
            xaxis: {
                categories: <?php echo json_encode($investment_month_rows); ?>,
            },
            yaxis: {
                title: {
                    text: 'USD'
                }
            },
            fill: {
                opacity: 1

            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return val + " USD"
                    }
                }
            }
        }

        var chart = new ApexCharts(
            document.querySelector("#month-wise-investment"),
            options
        );

        chart.render();


        //Chart #3
        var options = {
            chart: {
                height: 350,
                type: 'bar',
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            series: [{
                name: 'Total Investment Amount',
                data: <?php echo json_encode($addinvestment_amount_rows); ?>
            }],
            xaxis: {
                categories: <?php echo json_encode($addinvestment_month_rows); ?>,
            },
            yaxis: {
                title: {
                    text: 'USD'
                }
            },
            fill: {
                opacity: 1

            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return val + " USD"
                    }
                }
            }
        }

        var chart = new ApexCharts(
            document.querySelector("#additional-investment-bar-chart"),
            options
        );

        chart.render();
        // Number Of New Investments
        Morris.Bar({
            element: 'new-investment-bar-chart',
            data: <?php echo json_encode($month_wise_new_investment_rows); ?>,
            xkey: 'y',
            ykeys: ['a'],
            labels: ['No Of Investment'],
            lineColors: ['#09AD95'],
            barColors: ['#09AD95'],
            lineWidth: '2px',
            resize: true,
            redraw: true
        });
        // pie chart source of income
        Morris.Donut({
            element: 'donut-chart',
            data: <?php echo json_encode($source_wealth_obj); ?>,
            labelColor: '#637CF9',
            colors: [
                '#FBA752',
                '#1A9CDF',
                '#AC7E00',
                '#F34100',
                '#DE1BD1',
                '#8A52FB',
            ],
            resize: true,
            formatter: function (x) { return x + "%" }
        });


    })(jQuery);


    // WorldMap Starts //
    $('#map-world2').css({ "height": "390px" });
    $('#map-world2').vectorMap({
        map: 'world_en',
        backgroundColor: '#FFF',
        borderColor: '#444655',
        borderOpacity: 0.25,
        borderWidth: 1,
        color: '#F4F7FD',
        enableZoom: true,
        hoverOpacity: .7,
        normalizeFunction: 'linear',
        scaleColors: ['#b6d6ff', '#005ace'],
        selectedColor: '#1627D3',
        selectedRegions: null,
        showTooltip: true,
        onRegionClick: function (element, code, region) {
            var message = 'You clicked "'
                + region
                + '" which has the code: '
                + code.toUpperCase();
        }
    });

    $('#map-world2').vectorMap('set', 'colors', <?php echo json_encode($country_list); ?>);

// WorldMap Ends //
</script>

@stop