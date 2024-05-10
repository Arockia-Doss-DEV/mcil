@extends('layouts.app')

@section('title', 'DASHBOARD')

@section('content')

<div class="container-fluid page-body-wrapper">

	@include("company.elements.sidebar")

	<div class="main-panel">
        <div class="content-wrapper custom-dashboard-card">

            <div class="d-flex justify-content-between">
                <div class="pageheader">
                    <h4>DASHBOARD</h4>
                </div>
                <div><span class="text-muted">Welcome to Dashboard</span></div>
            </div>

            @php
                $globalSubscription = subscriptionGlobal();
            @endphp

           <?php if(!empty($globalSubscription)): ?>
                <?php if($globalSubscription->notification_doc == 1): ?>

                    <?php if($globalSubscription->notification_doc_hidden == 0): ?>
                        
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i data-feather="alert-octagon" class="alert-icon"></i>
                            <span class="alert-text">Your Investment status is PENDING FUNDING, Please upload the Bank Slip to confirm the investment !</span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i data-feather="x" class="alert-close"></i>
                            </button>
                        </div>
                    
                    <?php endif; ?>
                <?php endif; ?>
            <?php endif; ?>

            <div class="row mt-3">

                <div class="col-lg-3">
                    <a href="#" onclick="javascript:location.href='{{ url('/company/subscriptions') }}'">
                        <div class="card card-margin">
                            <div class="card-header no-border">
                                <h6 class="card-title">Total Active Investment Count</h6>
                            </div>
                            <div class="card-body p-0">
                                <div class="widget-55">
                                    <div class="widget-55-header">
                                        <div class="widget-55-header-left">
                                            <h4>{{ number_format($investment_count, 2) }}</h4>
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
                    <a href="#" onclick="javascript:location.href='{{ url('/company/subscriptions') }}'">
                        <div class="card card-margin">
                            <div class="card-header no-border">
                                <h6 class="card-title">Total Active Investment Amount</h6>
                            </div>
                            <div class="card-body p-0">
                                <div class="widget-55">
                                    <div class="widget-55-header">
                                        <div class="widget-55-header-left">
                                            <h4>${{ number_format($investment_amount) }}</h4>
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
                    <div class="card card-margin">
                        <div class="card-header no-border">
                            <h6 class="card-title">Total Reinvestment Count</h6>
                        </div>
                        <div class="card-body p-0">
                            <div class="widget-55">
                                <div class="widget-55-header">
                                    <div class="widget-55-header-left">
                                        <h4>{{ number_format($reinvestment_count, 2) }}</h4>
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

                <div class="col-lg-3">
                    <div class="card card-margin">
                        <div class="card-header no-border">
                            <h6 class="card-title">Total Reinvestment Amount</h6>
                        </div>
                        <div class="card-body p-0">
                            <div class="widget-55">
                                <div class="widget-55-header">
                                    <div class="widget-55-header-left">
                                        <h4>${{ number_format($reinvestment_amount) }}</h4>
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

            </div>

            <div class="row mt-3">

                <?php if($redemption_investment_count != 0){ ?>
                <div class="col-lg-3">
                    <a href="#" onclick="javascript:location.href='{{ url('/company/subscriptions') }}'">
                        <div class="card card-margin">
                            <div class="card-header no-border">
                                <h6 class="card-title">Total Redemption Count</h6>
                            </div>
                            <div class="card-body p-0">
                                <div class="widget-55">
                                    <div class="widget-55-header">
                                        <div class="widget-55-header-left">
                                            <h4>{{ number_format($redemption_investment_count, 2) }}</h4>
                                        </div>
                                        <div class="widget-55-header-right">
                                            <img src="{{ asset('assets/images/icons/total-redemption-icon.png') }}" alt="sales" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <?php } ?>

                <?php if($redemption_investment_amount != 0){ ?>
                <div class="col-lg-3">
                    <a href="#" onclick="javascript:location.href='{{ url('/company/subscriptions') }}'">
                        <div class="card card-margin">
                            <div class="card-header no-border">
                                <h6 class="card-title">Total Redemption Amount <?= number_format($redemption_investment_amount); ?></h6>
                            </div>
                            <div class="card-body p-0">
                                <div class="widget-55">
                                    <div class="widget-55-header">
                                        <div class="widget-55-header-left">
                                            <h4>${{ number_format($redemption_investment_amount, 2) }}</h4>
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
                <?php } ?>

                <?php if($upcoming_investment_count != 0){ ?>
                <div class="col-lg-3">
                    <a href="#" onclick="javascript:location.href='{{ url('/company/subscriptions') }}'">
                        <div class="card card-margin">
                            <div class="card-header no-border">
                                <h6 class="card-title">Total Upcoming Reinvestment</h6>
                            </div>
                            <div class="card-body p-0">
                                <div class="widget-55">
                                    <div class="widget-55-header">
                                        <div class="widget-55-header-left">
                                            <h4>{{ number_format($upcoming_investment_count, 2) }}</h4>
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
                <?php } ?>

                <?php if($redemption_upcoming_count != 0){ ?> 

                <div class="col-lg-3">
                    <a href="#" onclick="javascript:location.href='{{ url('/company/subscriptions') }}'">
                        <div class="card card-margin">
                            <div class="card-header no-border">
                                <h6 class="card-title">Total Redemption Count</h6>
                            </div>
                            <div class="card-body p-0">
                                <div class="widget-55">
                                    <div class="widget-55-header">
                                        <div class="widget-55-header-left">
                                            <h4>{{ number_format($redemption_upcoming_count, 2) }}</h4>
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
                <?php } ?>
            </div>

            @if ($maturity_exps->count() > 0)
            
            <div class="row">  
                <div class="col-lg-12 card-margin">
                    <div class="card ">
                        <div class="card-header">
                            <h5 class="card-title text-danger m-0">
                                Maturing investment details
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive mt-2">
                                <table class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Investment ID</th>
                                            <th>Amount</th>
                                            <th>Commencement Date</th>
                                            <th>Maturity Date</th>
                                            <th>Status</th>
                                            <th class="actions">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                               
                                            foreach($maturity_exps as $maturity_exp){ ?>
                                                <tr>
                                                    <td><?php 
                                                            if(!empty($maturity_exp['draft_refrence_id'])){
                                                                
                                                                if(($maturity_exp['status'] == 3) || ($maturity_exp['status'] == 6)){
                                                                    $investment_no = $maturity_exp['reference_no'].$maturity_exp['refreance_id'];
                                                                }else{
                                                                    $investment_no = $maturity_exp['draft_refrence_id']."-".$maturity_exp['reference_no'].$maturity_exp['refreance_id'];
                                                                }
                                                            }else{
                                                                $investment_no = $maturity_exp['reference_no'].$maturity_exp['refreance_id'];
                                                            }

                                                            echo link_to(url('/individual/view/subscription/'.$maturity_exp->id), $title = $investment_no, $attributes = [], $secure = null);  

                                                        ?></td>
                                                    <td><?= $maturity_exp->initial_investment ?></td>
                                                    <td><?php
                                                            if(!empty($maturity_exp->commence_date)){
                                                            
                                                                echo date('Y-M-d', strtotime($maturity_exp->commence_date));
                                                            }else{
                                                                echo "-";
                                                            } ?></td>
                                                    <td><?php
                                                            if(!empty($maturity_exp->maturity_date)){
                                                            
                                                                echo date('Y-M-d', strtotime($maturity_exp->maturity_date));
                                                            }else{
                                                                echo "-";
                                                            } ?></td>
                                                    <td><span class="btn btn-bold btn-sm btn-font-sm  btn-label-success">
                                                        <?php 
                                                            if($maturity_exp->draft == 0){
                                                                if($maturity_exp->status  ==0){
                                                                    echo "Pending";
                                                                }else if($maturity_exp->status ==1){
                                                                    echo "Pending Funding";
                                                                }else if($maturity_exp->status ==2){
                                                                    echo "Incomplete";
                                                                }else if($maturity_exp->status ==3){
                                                                    echo "Active";
                                                                }else if($maturity_exp->status ==4){
                                                                    echo "De-Active";
                                                                }else if($maturity_exp->status ==5){
                                                                    echo "Rejected";
                                                                }else if($maturity_exp->status ==6){
                                                                    echo "Closed";
                                                                }
                                                            }else{
                                                                echo "Draft";   
                                                            }
                                                        ?></span> 
                                                    </td>
                        
                                                    <td class="actions">
                                                        <?php 
                                                            if($maturity_exp->redemption_status == 0){
                                                                if($maturity_exp->reinvestment_request == 1){ ?>
                                                                    <span class="text-info"> Re-investment Request Sent</span>
                                                                <?php }elseif($maturity_exp->reinvestment_status == 1){ ?>
                                                                    <span class="text-info"> Re-investment Created</span>
                                                                <?php }else{ ?>

                                                                    {{-- {{ link_to(url('/individual/reinvestmentCreate/'.$maturity_exp->id), $title = $investment_no, $attributes = ['id'=> 'reinvestmentCreate', 'above_investment_count' => $above_investment_count], $secure = null); }}  --}}

                                                                    
                                                                    {{-- <button type="button" class="btn btn-primary mt-1 mr-1 reinvestButton" attr-sub_id="<?= $maturity_exp->id; ?>">Re-Investment</button> --}}

                                                                <?php }
                                                            } 
                                                        ?>
                                                        
                                                        <?php
                                                            if(($maturity_exp->reinvestment_request == 0) && ($maturity_exp->reinvestment_status == 0)){
                                                                if($maturity_exp->redemption_request == 1){ 
                                                                    if($maturity_exp->redemption_status == 0){
                                                                        echo '<span class="text-info"> Redemption Request Sent</span>';
                                                                    }else if($maturity_exp->redemption_status == 1){
                                                                        echo '<span class="text-info"> Redemption Request Approved</span>';
                                                                    }else if($maturity_exp->redemption_status == 2){
                                                                        echo '<span class="text-info"> Redemption Request Reject</span>';
                                                                    }
                                                                
                                                                       
                                                                }else{ ?>
                                                                    <button type="button" class="btn btn-warning mt-1 mr-1 redemptionButton" attr-sub_id="<?= $maturity_exp->id; ?>" attr-sub_type="<?= $maturity_exp->fund_type; ?>" above_investment_count = "<?= $above_investment_count; ?>">Redemption</button>
                                                        <?php }} ?>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @endif
            
            <div class="row mt-3">
                <div class="col-lg-4">
                    <div class="card userbox">
                        <div class="top-loginbox">
                            <div class="top-loginbox-text">
                                <h4 class="mb-3">Welcome Back!</h4>
                                <h6>MCIL Dashboard</h6>
                            </div>
                            <div> <img src="{{ asset('assets/images/login/login-img.png') }}" alt="login-img" class="dashboard-userImg-1"/></div>
                        </div>
                        <div class="card">
                            <div class="text-center dashboard-userImgBlock"> 
                                <img src="{{ asset('assets/images/avatars/avatar.png') }}" alt="login-img" class="dashboard-userImg" />
                            </div>
                        </div>
                        <div class="text-center mt-5 mb-5">
                            <h5 class="py-1">{{ auth()->user()->last_name }}</h5>
                            <h6 class="text-muted py-1">Company</h6>
                            <a class="btn btn-info" href="{{ url('/company/myprofile') }}">View Profile <i data-feather="arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 m-mt-2">
                    <div class="card ">
                        <div class="card-header">
                            <h6 class="card-title m-0">Total Initial Investment VS Total Additional Investment
                            </h6>
                            @if (!empty($enable_subscription))
                                <div class="col-lg-5 text-md-right">
                                    <a href="{{ url('/company/additionalCreate') }}" class="btn btn-info mr-1"> + Create Additional Investment</a>
                                </div>
                            @endif
                        </div>
                        <div class="card-body">
                            <div id="donut-chart" class="chart"></div>
                            <div class="row mt-3">
                                <div class="col-lg-6">
                                    <div class="text-center">
                                        <div><span class="blue-ball"></span>Total {{ $initial_obj[0]['label'] }}</div>
                                        <div class="py-2">
                                            <h3 class="font-weight-bold">{{ $initial_obj[0]['value'] }}</h3>
                                        </div>
                                        <div class="text-muted invisible">Last 6 months</div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="text-center">
                                        <div><span class="violet-ball"></span>Total {{ $initial_obj[1]['label'] }}</div>
                                        <div class="py-2">
                                            <h3 class="font-weight-bold">{{ $initial_obj[1]['value'] }}</h3>
                                        </div>
                                        <div class="text-muted invisible">Last 6 months</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-12 card-margin">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title m-0">Dividend Payout Details</h6>
                        </div>
                        <div class="card-body">
                            <form method="get" action="{{ route('company.dashboard') }}">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="input-group mb-3">
                                            <input type="text" name="q" placeholder="Search By Investment No, Payout Type, Percentage, Reference..." class="form-control search-input" value=""/>
                                            <div class="input-group-append">
                                                <button type="submit" id="searchSubmitId" class="btn btn-info"> <i
                                                        data-feather="search"></i> </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <?php $total_dividend = 0; ?>

                            <div class="table-responsive mt-2">
                                <table id="example" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Investment ID</th>
                                            <th>Payout Type</th>
                                            <th>Payout Amount</th>
                                            <th>Payout Date</th>
                                            <th>Payout (%)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        
                                        if(!empty($subscription4)) {
                                            foreach($subscription4 as $subscription_pay){

                                                if(!empty($subscription_pay->payments)){
                                                    foreach($subscription_pay->payments as $payment){ 

                                                        if(!empty($payment->payout_date)){
                                                            $currentDate = date('Y-m-d');
                                                            $startDate = date('Y-m-d', strtotime($payment->payout_date));
                                                            // if($currentDate >= $startDate){
                                                                
                                                                 $total_dividend += $payment->amount;
                                                    ?>

                                                        <tr>
                                                            <td><?= $subscription_pay->reference_no ?><?= $subscription_pay->refreance_id ?></td>
                                                            <td><?= $payment->payout_type; ?></td>
                                                            <td><?= $payment->amount; ?></td>
                                                            <td><?= date('Y-m-d', strtotime($payment->payout_date));  ?></td>
                                                            <td><?= $payment->percentage; ?></td>
                                                            <td>
                                                                
                                                                <?php if(!empty($payment->file)){ ?>
                                                                <a href="{{ asset(Storage::url('')); }}/<?= $payment->file ?>" target="_blank">Open</a>
                                                                <?php }else{ echo "-";  } ?>

                                                            </td>
                                                        </tr>

                                                    <?php 
                                                            // }
                                                        }
                                                    }
                                                }
                                            }
                                        }else{
                                            echo "<tr><td colspan=6><br/><br/>".'No Records Available'."</td></tr>";
                                        }
                                        ?>

                                    </tbody>

                                    <?php if(!empty($subscription4)) { ?>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th>Total</th>
                                            <th>$ <?= $total_dividend; ?></th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
                                    <?php } ?>

                                </table>
                            </div>

                            <div class="row mt-3">
                                <div class="col-lg-4">
                                </div>
                                <div class="col-lg-8 text-md-right"> Total: <span
                                        class="font-weight-bold">$<?= number_format($total_dividend) ?> </span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="row mt-3 mb-5">
                <div class="col-lg-12 card-margin">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title m-0">Quarterly Payout Projection</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive mt-2">
                                <table id="example" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Quarter-Year</th>
                                            <th>Payout amount (USD)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-muted">January-2022</td>
                                            <td class="font-weight-bold">$ 20000</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">April-2022</td>
                                            <td class="font-weight-bold">$ 30000</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">July-2022</td>
                                            <td class="font-weight-bold">$ 20000</td>
                                        </tr>
                                        <tr>
                                            <td class="text-muted">October-2022</td>
                                            <td class="font-weight-bold">$ 10000</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

            <?php  if(!empty($flash_msg)){ ?>  

            <div id="myModal" class="modal fade">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header1">
                            <button type="button" class="close first-close-res first-close" data-dismiss="modal" aria-hidden="true" style="font-size: 30px; color: white;position: absolute; background: #000000;padding: 0px 7px; border-radius: 88%;cursor: pointer; top: -11px; right: -13px; z-index: 99;">&times;</button>
                        </div>
                        <div class="modal-body" style="padding:1px 1px 1px 1px;">
                            <div class="row p-2">
                                <div class="col-lg-12">
                                    <a href="{{ url('/company/fmsgView',$flash_msg->id) }}"><img src="{{ $flash_msg->file ? asset('/project_img/flashmsgs/images/'.$flash_msg->file) : asset('assets/images/avatars/default.png') }}" alt="Message" class="responsive" width="100%" height="500" style="width: 100%;" />
                                </a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>

            <!-- redemptionModal -->
            <div class="modal fade" id="redemptionModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Redemption form</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        {{ Form::open(['url' => ['company/view/subscription','id'], 'id'=>'formRedemption', 'class'=>'','type'=>'file', 'data-parsley-validate', 'autocomplete'=>"off"]) }}

                            <input type="hidden" name="sub_att_id" id="sub_att_id">

                            <div class="modal-body">

                                <div class="row">

                                    <div class="col-md-12 mb-3">
                                        <a href="{{ asset('/') }}img/docs/MCIL-redemption-form.pdf" download> Download redemption form</a>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <span class="text-danger">Please fill and upload redemption form for processing</span>
                                    </div>

                                    <div class="col-lg-12">
                                        <input type="file" name="redemption_file" class="dropify" id="redemption_file" data-height="300" data-max-file-size="5M" data-allowed-file-extensions="pdf" data-parsley-errors-container="#redemptionDoc-errors" data-remove-required="0" required />
                                    </div>
                                    <div id="redemptionDoc-errors"></div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary modal-cancel"
                                    data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-info">Upload</button>
                            </div>

                        {{ Form::close() }}
                    </div>
                </div>
            </div>
            
            @include('company.elements.footer')

        </div>

    </div>
</div>

@endsection

@section('scripts')

<script src="{{ asset('assets/js/components/date-picker.js') }}"></script>
<script src="{{ asset('assets/js/components/dropify.js') }}"></script>

<script type="text/javascript">
    Morris.Donut({
        element: 'donut-chart',
        data: <?php echo json_encode($initial_obj); ?>,
        labelColor: '#313233',
        colors: [
            '#52C2FB',
            '#BD52FB',
        ],
        resize: true,
        formatter: function (x) { return x + "%" }
    });

    $(document).on("click","#reinvestmentCreate",function(e) {
            
        e.preventDefault();
        var currentElement = $(this);
        var count = currentElement.attr("above_investment_count");

        if(count == '0'){
            Swal.fire('!','You can reinvest only when you have any investment above 70k USD. Contact admin for further details','error');
        }else{
            Swal.fire({
                title: 'Are you sure?',
                text: "Please confirm the re-investment!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.value) {
                    
                    window.location.href = currentElement.attr('href');
                }
            });
        }
    });

    //reinvestment
    $(document).on("click",".reinvestButton",function() {
        var sub_id = $(this).attr("attr-sub_id");
        Swal.fire({
            title: 'Are you sure?',
            text: "Please confirm the re-investment!",
            icon: 'success',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.value) {

                preloader_init();
                axios.get(SITE_URL+'company/reinvestRequest?sub_id='+sub_id).then(function (response) {
                    
                    preloader_off();

                    Swal.fire('Great Job !','You request has been sent successfully!','success');
                    setTimeout(location.reload.bind(location), 3500);
                })
                .catch(function (error) {

                    preloader_off();
                    Swal.fire('Sorry!','Data retrieve problam, please try after some time !!!','error');
                });  
            }
        });
    });    
    
    $(document).ready(function(){
        $("#myModal").modal('show');
    });

    // $(".inputFilePassport").fileinput({
    //     showUpload: false,
    //     theme: 'fa',
    //     browseClass: "btn btn-warning",
    //     dropZoneEnabled: false,
    //     allowedFileTypes: ["image", "pdf"],
    //     maxFileSize: 5120, 
    // });

    
    $('.redemptionButton').click(function(e){
        $('#formRedemption')[0].reset();

        var count = $(this).attr("above_investment_count");
        var sub_type = $(this).attr("attr-sub_type");

        if(count == '1'){

            if (sub_type == '3') {

                Swal.fire({
                    title: 'Are you sure?',
                    text: "Before confirming the redemption, please ensure you have a contract valued at USD 125,000 or more in your portfolio. This requirement ensures the continuation of your small contracts’ reinvestment.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                }).then((result) => {
                    if (result.value) {

                        $('#redemptionModal').modal('show');
                        var source_id = $(this).attr("attr-sub_id");
                        $("#sub_att_id").val(source_id);
                    }
                });
                
            } else {

                Swal.fire({
                    title: 'Are you sure?',
                    text: "Before confirming the redemption, please ensure you have a contract valued at USD 70,000 or more in your portfolio. This requirement ensures the continuation of your small contracts’ reinvestment.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                }).then((result) => {
                    if (result.value) {

                        $('#redemptionModal').modal('show');
                        var source_id = $(this).attr("attr-sub_id");
                        $("#sub_att_id").val(source_id);
                    }
                });
            }
            
        }else{
            $('#redemptionModal').modal('show');
            var source_id = $(this).attr("attr-sub_id");
            $("#sub_att_id").val(source_id);
        }
    });
    
  

    $('#formRedemption').submit(function(e) {
        e.preventDefault();
        if ( $(this).parsley().isValid() ) {
            
            preloader_init();

            var csrfToken = "{{ csrf_token() }}";

            const form = document.getElementById('formRedemption');
            let formData = new FormData(form);

            $('#redemptionModal').modal('hide');
            
            axios.post(SITE_URL+'company/redemptionUpload',formData,{
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        'X-CSRF-Token': csrfToken}}
            ).then(function(response){

                preloader_off();

                var item =response.data;

                if(item.error){

                    Swal.fire('Great Job !','You have uploaded redemption form successfully, MCIL team will verify the Redemption Form!','success');

                    $('#formRedemption')[0].reset();
                    $('#redemptionModal').modal('hide');

                    setTimeout(location.reload.bind(location), 3500);
                }else{

                    $('#redemptionModal').modal('hide');
                    Swal.fire('Sorry !','Redemption Form upload faild!','error');
                } 
            })
            .catch(function(){

                $('#redemptionModal').modal('hide');
                Swal.fire('Sorry !','Redemption Form upload faild!','error');
            });
        }
    });

    $('.redemptionButton2').click(function(e){
        $('#formRedemption2')[0].reset();
        $('#redemptionModal2').modal('show');
        
        var source_id = $(this).attr("attr-sub_id");
        $("#sub_att_id2").val(source_id);
    });

    $('#formRedemption2').submit(function(e) {
        e.preventDefault();
        if ( $(this).parsley().isValid() ) {
            
            preloader_init();

            var csrfToken = "{{ csrf_token() }}";

            const form = document.getElementById('formRedemption2');
            let formData = new FormData(form);

            $('#redemptionModal2').modal('hide');
            
            axios.post(SITE_URL+'company/redemptionUpload',formData,{
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        'X-CSRF-Token': csrfToken}}
            ).then(function(response){

                preloader_off();
                
                var item =response.data;

                if(item.error){

                    Swal.fire('Great Job !','You have uploaded redemption form successfully, MCIL team will verify the Redemption Form!','success');

                    $('#formRedemption2')[0].reset();
                    $('#redemptionModal2').modal('hide');

                    setTimeout(location.reload.bind(location), 3500);
                }else{

                    $('#redemptionModal2').modal('hide');
                    Swal.fire('Sorry !','Redemption Form upload faild!','error');
                } 
            })
            .catch(function(){

                $('#redemptionModal2').modal('hide');
                Swal.fire('Sorry !','Redemption Form upload faild!','error');
            });
        }
    });

</script>
@stop