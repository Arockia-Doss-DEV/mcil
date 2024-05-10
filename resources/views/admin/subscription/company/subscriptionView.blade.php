@extends('layouts.app')

@section('title', 'Company Subscription View ')

@section('styles')

@stop

@section('content')

<div class="container-fluid page-body-wrapper">

    @include("admin.elements.sidebar")

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="d-flex justify-content-between">
                <div class="pageheader">
                    <h4>INVESTMENT DETAILS</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb no-bg custom-breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Investment</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Investment Details</li>
                        </ol>
                    </nav>
                </div>
                <div class="d-flex">
                    <div class="save-investemnt mr-2">

                        @if ($user->role_id == 2)
                            <a href="{{ route('individualSubscriptionEdit', ['userId' => $user->id, 'subId' => $subscription->id]) }}"><img src="{{ asset('assets/images/icons/pencil-icon.png') }}" alt="back icon" /></a>
                        @elseif($user->role_id == 3)
                            <a href="{{ route('companySubscriptionEdit', ['userId' => $user->id, 'subId' => $subscription->id]) }}"><img src="{{ asset('assets/images/icons/pencil-icon.png') }}" alt="back icon" /></a>
                        @endif

                    </div>
                    <div class="go-back">

                    <?php 
                        if(isset($_GET['pageId'])) {
                            $page=$_GET['pageId'];
                        } else {
                            $page=1;
                        }

                        if ($subscription->status == 0) {
                            $url = "/subscription/pending?page=$page";
                        } elseif($subscription->status ==1) {
                            $url = "/subscription/funding?page=$page";
                        } elseif($subscription->status ==2) {
                            $url = "/subscription/draft?page=$page";
                        } elseif($subscription->status ==3) {
                            $url = "/subscription/active?page=$page";
                        } elseif($subscription->status ==4) {
                            $url = "/subscription/deActive?page=$page";
                        } elseif($subscription->status ==5) {
                            $url = "/subscription/rejected?page=$page";
                        } elseif($subscription->status ==6) {
                            $url = "/subscription/matured?page=$page";
                        } elseif($subscription->status ==7) {
                            $url = "/subscription/preMaturedRedemption?page=$page";
                        } else {
                            $url = "/subscription/active?page=$page";
                        }

                        if(($subscription->status == 0) && ($subscription->draft == 1) && (($subscription->draft_delete == 1) || ($subscription->draft_delete == 0) )) {
                            $url = "/subscription/draft?page=$page";
                        }

                        if(($subscription->draft == 0) && ($subscription->status == 3) && ($subscription->redemption_request == 1)) {
                            $url = "/subscription/redemption?page=$page";
                        }

                        if(($subscription->draft == 0) && ($subscription->status == 3) && ($subscription->reinvestment_request == 1)) {
                            $url = "/subscription/reInvestment?page=$page";
                        }
                    ?>

                        <a href="{{ url($url)}}"><img src="{{ asset('assets/images/icons/back-icon.png') }}"
                                alt="back icon" /></a>
                    </div>
                </div>
            </div>
            <div class="row mt-3 pb-5">
                <div class="col-lg-12 card-margin">
                    <div class="card">
                        <div class="card-header">
                            <nav class="custom-nav-details-tab">
                                <div class="nav nav-tabs nav-tabs-line" id="nav-tab1" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab1" data-toggle="tab"
                                        href="#nav-home1" role="tab" aria-controls="nav-home1"
                                        aria-selected="true">Overview</a>
                                    <a class="nav-item nav-link" id="nav-profile-tab1" data-toggle="tab"
                                        href="#nav-profile1" role="tab" aria-controls="nav-profile1"
                                        aria-selected="false">Dividend</a>

                                    {{-- <a class="nav-item nav-link" id="nav-contact-tab1" data-toggle="tab"
                                        href="#nav-contact1" role="tab" aria-controls="nav-contact1"
                                        aria-selected="false">Beneficiary/Joint Account</a> --}}
                                        
                                    <a class="nav-item nav-link" id="nav-tax-tab1" data-toggle="tab"
                                        href="#nav-tax1" role="tab" aria-controls="nav-tax1"
                                        aria-selected="false">Tax Residences</a>
                                    <a class="nav-item nav-link" id="nav-declaration-tab1" data-toggle="tab"
                                        href="#nav-declaration1" role="tab" aria-controls="nav-declaration1"
                                        aria-selected="false">Declaration</a>
                                    <a class="nav-item nav-link" id="nav-download-tab1" data-toggle="tab"
                                        href="#nav-download1" role="tab" aria-controls="nav-download1"
                                        aria-selected="false">Download</a>
                                </div>
                            </nav>
                        </div>
                        <div class="card-body custom-nav-details-tab-content">
                            <div class="tab-content" id="nav-tabContent1">
                                <div class="tab-pane fade show active" id="nav-home1" role="tabpanel"
                                    aria-labelledby="nav-home-tab1">


                                    <div>
                                        
                                        <?php if(($subscription->draft == 0) && ($subscription->draft_delete != 1)){ ?>

                                            {{ Form::open(['route' => ['changeStatus', ['id' => $subscription['id']]], 'id'=>'changeStatusForm', 'class'=>'form-horizontal', 'data-parsley-validate', 'autocomplete'=>"off"]) }}

                                                <input type="hidden" name="send_mail" id="send_mail" value="no"/>
                                                <input type="hidden" name="mail_confirm" id="mail_confirm" value="0"/>

                                                <div class="row mb-3">
                                                    <div class="col-lg-4">
                                                        <label class="font-weight-bold skyblue-color"> Change Status*</label>

                                                        <?php 
                                                            $subscriptionStatus = [0=>"Pending", 1=>"Pending Funding", 3=>"Active", 4=>"De-active", 5=>"Rejected", 6=>"Matured", 7=>"Premature Redemption"];
                                                        ?>

                                                        {!! Form::select('form_status', $subscriptionStatus, $subscription->status ? $subscription->status : null, ['class' => 'form-control fund-sub-input', 'id' => 'form_status']) !!}
                                                        
                                                    </div>
                                                    <div class="col-lg-1">
                                                        <label class="invisible">go</label>
                                                        <button class="btn btn-info btn-rounded status-go" id="changeStatusButton"> Go</button>
                                                    </div>

                                                    <div class="row my-3 pl-2">
                                                        <?php if($subscription->reinvestment_request ==1){ ?>

                                                            <button type="button" id="reinvestmentGenerate" class="btn btn-info btn-rounded btn-fw mt-1 mr-1">Generate Re-Investment</button>

                                                        <?php } ?>
                                                        
                                                         <?php if($subscription->reinvestment_status ==1){ ?>

                                                        <a href="{{ url('/subscription/view/'. $subscription->reinvestment_child_id) }}" class="btn btn-success btn-rounded btn-fw mt-1 mr-1">Re-Investment created - <?= $child_investment_no; ?></a>

                                                        <?php }else if(!empty($subscription->reinvestment_parant_id)){ ?>

                                                            <button type="button" class="btn btn-success btn-rounded btn-fw mt-1 mr-1">Re-Investment Generate Successfully</button>

                                                            <a href="{{ url('/subscription/view/'. $subscription->reinvestment_parant_id) }}" target="_blank" class="btn btn-success btn-rounded btn-fw mt-1 mr-1">Actual Investment</a>

                                                        <?php } ?>
                                                    </div>
                                                </div>

                                            {{ Form::close() }}

                                        <?php } ?>

                                        <div class="row my-3 pl-2">

                                            {{-- @php 
                                                $extension = ".pdf";
                                            @endphp --}}

                                            <?php if($subscription->enable_signeddoc ==1){ ?>
                                
                                                <?php if(!empty($subscription->signeddoc_file) && ($subscription->signeddoc_file != "Array")){ ?>
                                                    <a href="{{ asset(Storage::url('')); }}/<?= $subscription->signeddoc_file ?>" target="_blank" class="btn btn-info btn-rounded btn-fw mt-1 mr-1">Download Signed Application</a>
                                                <?php }else if(!empty($subscription->signed_pdf)){ ?>
                                                    <a href="{{ asset('/') }}pdf/docs/signedInstruction/<?php echo $subscription->signed_pdf; ?>" target="_blank" class="btn btn-info btn-rounded btn-fw mt-1 mr-1">Download Signed Application</a>
                                                <?php }else{ ?>
                                                    <a href="{{ url('/subscription/signedApplication', $subscription->id) }}" target="_blank" class="btn btn-info btn-rounded btn-fw mt-1 mr-1">Download Signed Application</a>
                                                <?php } ?>
                                                
                                            <?php }else if(!empty($subscription->signed_pdf)){ ?> 
                                                <a href="{{ asset('/') }}pdf/docs/signedInstruction/<?php echo $subscription->signed_pdf; ?>" target="_blank" class="btn btn-info btn-rounded btn-fw mt-1 mr-1">Download Signed Application</a>
                                            <?php }else{ ?>
                                                <a href="{{ url('/subscription/signedApplication', $subscription->id) }}" target="_blank" class="btn btn-info btn-rounded btn-fw mt-1 mr-1">Download Signed Application</a>
                                            <?php } ?>

                                            <a href="{{ url('/subscription/reGenerateSignedPdf', $subscription->id) }}" id="reGenerateButton" class="btn btn-danger btn-rounded btn-fw mt-1 mr-1 ">Re-Generate SA</a>

                                            <a href="{{ url('/subscription/bankInstruction', $subscription->id) }}"  target="_blank" class="btn btn-info btn-rounded btn-fw mt-1 mr-1">Download Bank Instruction Form</a>

                                            <a href="{{ url('/subscription/pfia', $subscription->id) }}" value="download-signed-application" target="_blank" class="btn btn-info btn-rounded btn-fw mt-1 mr-1">Download PFIA</a>
                                            
                                    
                                            <?php if($subscription->enable_sharecertificate ==1){ ?>
                                                <a href="{{ asset(Storage::url('')); }}/<?= $subscription->sharecertificate_file ?>" target="_blank" class="btn btn-info btn-rounded btn-fw mt-1 mr-1">Download Share Certificate</a>
                                            <?php } ?>
                                                
                                            
                                            <?php if($subscription->redemption_request ==1){ ?>
                                                <?php if($subscription->redemption_status ==0){ ?>
                                                    <button type="button" class="btn btn-info btn-rounded btn-fw mt-1 mr-1" id="redemptionButton" >Redemption Form Requested</button> 
                                                <?php }else if($subscription->redemption_status ==1){ ?>
                                                    <button type="button" class="btn btn-success btn-rounded btn-fw mt-1 mr-1" id="redemptionButton" >Redemption Form Approved</button> 
                                                <?php }else if($subscription->redemption_status ==2){ ?>
                                                    <button type="button" class="btn btn-danger btn-rounded btn-fw mt-1 mr-1" id="redemptionButton" >Redemption Form Rejected</button> 
                                                <?php } ?>   
                                            <?php } ?>

                                        </div>

                                        {{-- <div class="row my-3 pl-2">
                                            <?php if($subscription->status == 3){ ?>
                                                <button type="button" id="reinvestmentGenerate" class="btn btn-info btn-rounded btn-fw mt-1 mr-1">Admin Re-Investment</button>
                                            <?php } ?>
                                        </div> --}}

                                        <div class="d-flex justify-content-between align-items-center mt-2">

                                            <div>
                                                <h5 class="font-weight-bold mb-3">Investment Details :</h5>
                                            </div>
                                            <div>
                                                <a type="button" href="javascript:void(0);" type="button" class="table-view-card mr-1 get-edit-CIdata" get-ci-id='<?= $subscription->id ?>'><i class="fas fa-pencil-alt skyblue-color"></i></a>

                                            </div>
                                        </div>

                                        <?php
                                            if(!empty($subscription['draft_refrence_id'])){
                                                if(($subscription['status'] == 3) || ($subscription['status'] == 6)){
                                                    $investment_no = $subscription['reference_no'].$subscription['refreance_id'];
                                                }else{
                                                    $investment_no = $subscription['draft_refrence_id']."-".$subscription['reference_no'].$subscription['refreance_id'];
                                                }
                                            }else{
                                                $investment_no = $subscription['reference_no'].$subscription['refreance_id'];
                                            }
                                        ?>

                                        <div class="row mt-4">
                                            <div class="col-lg-3 col-6">
                                                <h6>Investment ID</h6>
                                            </div>
                                            <div class="col-lg-8 col-6"><span
                                                    class="font-weight-bold"><?= $investment_no; ?></span>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-lg-3 col-6">
                                                <h6>Name</h6>
                                            </div>
                                            <div class="col-lg-8 col-6"><span class="text-muted">  <?= $subscription->has('user') ? $subscription->user->last_name : '' ?></span>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-lg-3 col-6">
                                                <h6>Email</h6>
                                            </div>
                                            <div class="col-lg-8 col-6"><span
                                                    class="text-muted"><?= $subscription->has('user') ? $subscription->user->email : '' ?></span>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-lg-3 col-6">
                                                <h6>Mobile No</h6>
                                            </div>
                                            <div class="col-lg-8 col-6"><span class="text-muted">+<?= $subscription->has('user') ? $subscription->user->mobilePrefix->calling_code : '' ?> <?= $user->mobile_no;?></span>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-3 col-6">
                                                <h6>Amount</h6>
                                            </div>
                                            <div class="col-lg-8 col-6"><span class="font-weight-bold">$<?= number_format($subscription->initial_investment) ?></span></div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-3 col-6">
                                                <h6>Commencement Date</h6>
                                            </div>
                                            <div class="col-lg-8 col-6"><span class="text-muted">
                                                <?php
                                                    if(!empty($subscription->commence_date)){
                                                        
                                                        echo date('d M, Y', strtotime($subscription->commence_date));
                                                    }else{
                                                        echo "-";
                                                    } ?>
                                                        
                                                </span>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-3 col-6">
                                                <h6>Maturity Date</h6>
                                            </div>
                                            <div class="col-lg-8 col-6"><span class="text-muted">

                                                <?php
                                                if(!empty($subscription->maturity_date)){
                                                
                                                    echo date('d M, Y', strtotime($subscription->maturity_date));
                                                }else{
                                                    echo "-";
                                                } ?>

                                            </span>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-3 col-6">
                                                <h6>Status</h6>
                                            </div>
                                            <div class="col-lg-8 col-6">

                                            <?php 
                                                if($subscription->status  ==0){
                                                    if($subscription->draft  ==1){
                                                        
                                                        if($subscription->draft_delete == 1){

                                                            echo '<span class="badge badge-soft-danger mt-2 mr-2">Delete</span>';
                                                        }else{
                                                            echo '<span class="badge badge-soft-secondary-3 mt-2 mr-2">Draft</span>';
                                                        }
                                                    }else{
                                                        echo '<span class="badge badge-soft-warning mt-2 mr-2">Pending</span>';
                                                    }
                                                    
                                                    
                                                }else if($subscription->status ==1){
                                                    echo '<span class="badge badge-soft-primary mt-2 mr-2">Pending Funding</span>';
                                                }else if($subscription->status ==2){
                                                    echo '<span class="badge badge-soft-danger mt-2 mr-2">Incomplete</span>';
                                                }else if($subscription->status ==3){
                                                    echo '<span class="badge badge-soft-success mt-2 mr-2">Active</span>';
                                                }else if($subscription->status ==4){
                                                    echo '<span class="badge badge-soft-danger mt-2 mr-2">De-Active</span>';
                                                    
                                                }else if($subscription->status ==5){
                                                    echo '<span class="badge badge-soft-danger mt-2 mr-2">Rejected</span>';
                                                    
                                                }else if($subscription->status ==6){
                                                    echo '<span class="badge badge-soft-info mt-2 mr-2">Matured</span>';
                                                }else if($subscription->status ==7){
                                                    echo '<span class="badge badge-soft-primary mt-2 mr-2">Premature Redemption</span>';
                                                }else{
                                                    echo '<span class="badge badge-soft-danger mt-2 mr-2">In-active</span>';
                                                }
                                            ?>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="mt-3">
                                        
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h5 class="font-weight-bold mb-3">Payout :</h5>
                                            </div>
                                            <div id="createPayment">
                                                <a type="button" href="javascript:void(0);" class="add-table-view-card mr-1"><i class="fas fa-plus skyblue-color mr-2"></i> Add New Payout</a>
                                            </div>
                                        </div>
                                        <div class="table-responsive mt-2">
                                            <table id="example" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Payout Type</th>
                                                        <th>Payout Date</th>
                                                        <th>Payout Amount</th>
                                                        <th>Payout (%)</th>
                                                        <th>Reference</th>
                                                        <th>File</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php 
                                                        if (!empty($subscription->payments)){
                                                            $i = 1;
                                                            foreach ($subscription->payments as $payment){
                                                    ?>

                                                    <tr>
                                                        <td class="text-muted"><?= $i; ?></td>
                                                        <td class="text-muted"><?= $payment->payout_type; ?></td>
                                                        <td class="text-muted">

                                                            <?php
                                                                if(!empty($payment->payout_date)){
                                                                    echo $payment->payout_date ? date('d M, Y', strtotime($payment->payout_date)) : '';
                                                                }
                                                            ?>

                                                        </td>
                                                        <td class="text-muted">$<?= $payment->amount; ?></td>
                                                        <td class="text-muted">
                                                            <?php if(!empty($payment->percentage)){ ?>
                                                                <?= $payment->percentage; ?>%
                                                            <?php }else{ echo "N/A";  } ?>
                                                        </td>
                                                        <td class="text-muted"><?= $payment->reference; ?></td>
                                                        <td class="text-muted">

                                                            <?php if(!empty($payment->file)){ ?>
                                                            <a href="{{ asset(Storage::url('')); }}/<?= $payment->file ?>" target="_blank">Open</a>

                                                            <?php }else{ echo "-";  } ?>
                                                        </td>
                                                        <td><a type="button" href="javascript:void(0);" class="table-view-card get-paymentEdit" get-payment-edit="<?= $payment->id; ?>">
                                                            <img src="{{ asset('assets/images/icons/edit-icon.png') }}"
                                                                    alt="view icon" />
                                                            </a>
                                                        </td>
                                                    </tr>

                                                    <?php
                                                            $i++; 
                                                            }
                                                            
                                                        }else {

                                                            echo "<tr><td colspan=8 align='center'>".'No Records Available'."</td></tr>";
                                                        }
                                                    ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    
                                    </div>


                                    <div class="mt-3">
                                        
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h5 class="font-weight-bold mb-3">Investment Details :</h5>
                                            </div>
                                            <div>
                                                <a type="button" href="javascript:void(0);" class="table-view-card mr-1 get-edit-investment" get-investment-id='<?= $subscription->id ?>'><i class="fas fa-pencil-alt skyblue-color"></i></a>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-lg-3 col-6">
                                                <h6>Fund</h6>
                                            </div>
                                            <div class="col-lg-8 col-6"><span class="text-muted"><?= $subscription->has('mcilfund') ? $subscription->mcilfund->name : '' ?></span>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-3 col-6">
                                                <h6>Amount</h6>
                                            </div>
                                            <div class="col-lg-8 col-6"><span
                                                    class="font-weight-bold">$<?= number_format($subscription->initial_investment) ?></span></div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-3 col-6">
                                                <h6>Type</h6>
                                            </div>
                                            <div class="col-lg-8 col-6"><span class="text-muted">
                                                <?php if($subscription->is_first == 1){ ?>
                                                    <b>Initial Investment</b>
                                                <?php }else if($subscription->is_first == 0){ ?>
                                                    <b>Additional Investment</b>
                                                <?php } ?>

                                            </span></div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-3 col-6">
                                                <h6>TT/Cheque No</h6>
                                            </div>
                                            <div class="col-lg-8 col-6"><span
                                                    class="text-muted"><?= $subscription->cheque_no ?></span>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-3 col-6">
                                                <h6>Remitting/Issuing Bank</h6>
                                            </div>
                                            <div class="col-lg-8 col-6"><span
                                                    class="text-muted"><?= $subscription->remittance_bank ?></span>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-3 col-6">
                                                <h6>Subscription Fees (%)</h6>
                                            </div>
                                            <div class="col-lg-8 col-6"><span class="text-muted"><?= number_format($subscription->service_charge) ?></span>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-3 col-6">
                                                <h6>Bank Charge (USD) </h6>
                                            </div>
                                            <div class="col-lg-8 col-6"><span class="text-muted"><?= number_format($subscription->bank_charge) ?></span>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-3 col-6">
                                                <h6>Total Amount (USD) </h6>
                                            </div>
                                            <div class="col-lg-8 col-6"><span
                                                    class="font-weight-bold skyblue-color">
                                                
                                                <?php
                                                    $initial_investment = $subscription->initial_investment;
                                                    $subscription_fee =  $subscription->service_charge;
                                                    $percent = ($initial_investment * $subscription_fee)/100;
                                                    $total = $initial_investment + $percent;
                                                    
                                                    echo number_format($total);
                                                ?>    

                                                </span>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="mt-4">
                                        
                                        <h5 class="font-weight-bold mb-3">Investment Info :</h5>

                                            <div class="row mt-4">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Name</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="font-weight-bold"> <?= $user->last_name ;?></span>
                                                </div>
                                            </div>
                                            <div class="row mt-4">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Type of Member</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted">Company/Club/Society/Partnership</span>
                                                </div>
                                            </div>
                                            <div class="row mt-4">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Company Reg.No</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span
                                                        class="text-muted"><?= $user->has('company') ? $user->company->company_reg_no : '' ?></span>
                                                </div>
                                            </div>

                                            <div class="row mt-4">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Country / Region of Incorporation.</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span
                                                        class="text-muted"><?= $user->has('company') ? $user->company->CompanyCountryCorporate->name : '' ?></span>
                                                </div>
                                            </div>

                                            <div class="row mt-4">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Date of Incorporation</h6>
                                                </div>
                                                <div class="col-lg-8 col-6">
                                                    <span class="text-muted">
                                                        <?php
                                                            if(!empty($user->company->date_corporation)){
                                                                echo $user->has('company') ? date('d M, Y', strtotime($user->company->date_corporation)) : '';
                                                            
                                                            } ?>        
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="row mt-4">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Principal Business Activity</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span
                                                        class="text-muted"><?= $user->has('company') ? $user->company->business_activity : '' ?></span>
                                                </div>
                                            </div>

                                            <div class="row mt-4">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Type Of Company</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span
                                                        class="text-muted">

                                                        <?php 
                                                            if(!empty($user->company->type_company)){

                                                                $type_company = $user->company->type_company;

                                                                switch ($type_company) {
                                                                    case "1":
                                                                        echo "Sole Proprietor";
                                                                        break;
                                                                    case "2":
                                                                        echo "Private Limited";
                                                                        break;
                                                                    case "3":
                                                                        echo "Public Limited";
                                                                        break;
                                                                    case "4":
                                                                        echo "Partnership";
                                                                        break;
                                                                    case "5":
                                                                        echo "Organization/Foundation/Trust";
                                                                        break;
                                                                    case "6":
                                                                        echo "Others";
                                                                        break;
                                                                    default:
                                                                        echo "-";
                                                                }
                                                            }
                                                        ?>
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="row mt-4">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Email</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span
                                                        class="text-muted"><?= $user->email ;?></span>
                                                </div>
                                            </div> 

                                            <div class="row mt-4">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Mobile No</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted">+<?= $subscription->has('user') ? $subscription->user->mobilePrefix->calling_code : '' ?> <?= $user->mobile_no;?></span>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Agent ID</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span
                                                        class="text-muted"><?= $user->agent_email;?></span>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Address</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted"><?= $user->address_line1;?>, <?= !empty($user->address_line2) ? $user->address_line2 . "," : '' ?> <?= $user->has('individual') ? $subscription->user->stateAs->name : '' ?>, <?= $user->has('individual') ? $subscription->user->countryAs->name : '' ?>, <?= $user->post_code;?> </span>
                                                </div>
                                            </div>
                                    </div>

                                </div>


                                <div class="tab-pane fade" id="nav-profile1" role="tabpanel" aria-labelledby="nav-profile-tab1">
                                    <div>
                                        
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h5 class="font-weight-bold mb-3">Payment Instruction for
                                            Dividend Payouts :</h5>
                                            </div>

                                            <div>
                                                <a type="button" href="javascript:void(0);" class="table-view-card mr-1 get-bank-investment" get-investment-id='<?= $subscription->id ?>'><i class="fas fa-pencil-alt skyblue-color"></i></a>

                                            {{-- <?php if($subscription->bankac_status ==1){ ?>
                                                <a type="button" href="javascript:void(0);" class="table-view-card mr-1 get-bank-investment" get-investment-id='<?= $subscription->id ?>'><i class="fas fa-pencil-alt skyblue-color"></i></a>
                                            <?php } ?> --}}
                                            
                                            </div>
                                        </div>

                                        <div class="row mt-4">
                                            <div class="col-lg-3 col-6">
                                                <h6>Name of Payee</h6>
                                            </div>
                                            <div class="col-lg-8 col-6"><span class="font-weight-bold">
                                                <?= $subscription->payee_name ?>
                                            </span>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-3 col-6">
                                                <h6>Bank Name</h6>
                                            </div>
                                            <div class="col-lg-8 col-6"><span
                                                    class="text-muted"><?= $subscription->bank_name ?></span>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-3 col-6">
                                                <h6>Account Type</h6>
                                            </div>
                                            <div class="col-lg-8 col-6"><span class="text-muted"><?= $subscription->account_type ?></span>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-3 col-6">
                                                <h6>Account Number</h6>
                                            </div>
                                            <div class="col-lg-8 col-6"><span
                                                    class="text-muted"><?= $subscription->account_number ?></span>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-3 col-6">
                                                <h6>SWIFT Code</h6>
                                            </div>
                                            <div class="col-lg-8 col-6"><span
                                                    class="font-weight-bold"><?= $subscription->swift_code ?></span></div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-3 col-6">
                                                <h6>Address</h6>
                                            </div>
                                            <div class="col-lg-8 col-6"><span class="text-muted">

                                                <?= $subscription->address_line_1 ?>,
                                                <?= !empty($subscription->address_line_2) ? $subscription->address_line_2 . "," : '' ?> 
                                                <?= $subscription->city ?>,
                                                <?= $subscription->postcode ?>,
                                                <?= $subscription->has('SubscriptionState') ? $subscription->SubscriptionState->name : '' ?>,
                                                <?= $subscription->has('SubscriptionCountry') ? $subscription->SubscriptionCountry->name : '' ?>

                                            </span></div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-3 col-6">
                                                <h6>Last Updated Date</h6>
                                            </div>
                                            <div class="col-lg-8 col-6"><span class="font-weight-bold">
                                                <?= $subscription->bankac_updated_date == null ? '-' : h($subscription->bankac_updated_date) ?>
                                                    
                                                </span></div>
                                        </div>

                                    </div>

                                    <?php if($subscription->bankac_status == 1){ ?>

                                    <div class="mt-4">
                                        <h5 class="font-weight-bold mb-3">Bank Account Change Files :</h5>

                                        <?php if (!empty($subscription->ss_attachments)): ?>
                                        <?php foreach ($subscription->ss_attachments as $ssAttachments): ?>
                                            
                                            <div class="downloadfileblock mt-3">
                                                <?php if($ssAttachments->attachment_type == 21): ?>
                                                    <div class="row pl-2">
                                                        <div class="col-lg-6"> 
                                                            <a href=""><img src="{{ asset('assets/images/icons/pdf-icon.png') }}" />Bank Account File</a>
                                                        </div>
                                                        <div class="col-lg-3"> <a href="<?= $ssAttachments->attachment ?>" class="btn btn-soft-info" target="_blank" download>Download</a></div>
                                                        <div class="col-lg-3"> <a href="<?= $ssAttachments->attachment ?>" class="btn btn-soft-success" target="_blank">Open</a> </div>
                                                    </div>
                                                <?php endif; ?>
                                            </div>

                                        <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>

                                    <?php } ?>

                                </div>


                                <div class="tab-pane fade" id="nav-contact1" role="tabpanel" aria-labelledby="nav-contact-tab1">


                                </div>




                                <div class="tab-pane fade" id="nav-tax1" role="tabpanel" aria-labelledby="nav-tex-tab1">
                                    <div>
                                        <h5 class="font-weight-bold mb-3">Tax Residences Details :</h5>
                                        <div class="row mt-4">
                                            <div class="col-lg-3 col-6">
                                                <h6>Address </h6>
                                            </div>
                                            <div class="col-lg-8 col-6"><span class="text-muted"><?php
                                                    echo $subscription->tr_addr_line_1 .', ';

                                                    echo !empty($subscription->tr_addr_line_2) ? $subscription->tr_addr_line_2 . ", " : '';
                                                    echo $subscription->tr_city .', ';
                                                    echo "&nbsp;";
                                                    echo $subscription->tr_postcode .', ';
                                                    echo "&nbsp;";
                                                    echo !empty($subscription->tr_state_id) ? $subscription->SubscriptionTrState->name .', ' : '';
                                                    echo "&nbsp;";
                                                    echo !empty($subscription->tr_country_id) ? $subscription->SubscriptionTrCountry->name : ''; 
                                                ?>.</span>
                                            </div>
                                        </div>

                                        <div class="mt-4">
                                            <h5 class="font-weight-bold mb-3">CRS/FATCA :</h5>
                                            <div class="table-responsive mt-2">
                                                <table id="example" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>COUNTRY(IES) / JURISDICTION(S) OF TAX RESIDENCE
                                                            </th>
                                                            <th>TIN</th>
                                                            <th>IF NO TIN AVAILABLE ENTER REASON A, B OR C</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="font-weight-bold"><?= $subscription->td1_country_id ? $subscription->SubscriptionTd1Country->name : '' ?> </td>
                                                            <td class="text-muted"><?= $subscription->td1_tax_number ?></td>
                                                            <td class="text-muted">
                                                                <?php 
                                                                    if($subscription->td1_tax_reason_type == 1){
                                                                        echo "Reason A";
                                                                    }else if($subscription->td1_tax_reason_type == 2){
                                                                        echo "Reason B";
                                                                        echo "-".$subscription->td1_tax_reason;

                                                                    }else if($subscription->td1_tax_reason_type == 3){
                                                                        echo "Reason C";
                                                                    }
                                                                ?>

                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="font-weight-bold"><?= $subscription->td2_country_id ? $subscription->SubscriptionTd2Country->name : '' ?> </td>
                                                            <td class="text-muted"><?= $subscription->td2_tax_number ?></td>
                                                            <td class="text-muted">
                                                                <?php 
                                                                    if($subscription->td2_tax_reason_type == 1){
                                                                        echo "Reason A";
                                                                    }else if($subscription->td2_tax_reason_type == 2){
                                                                        echo "Reason B";
                                                                        echo "-".$subscription->td2_tax_reason;

                                                                    }else if($subscription->td2_tax_reason_type == 3){
                                                                        echo "Reason C";
                                                                    }
                                                                ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="font-weight-bold"><?= $subscription->td3_country_id ? $subscription->SubscriptionTd3Country->name : '' ?> </td>
                                                            <td class="text-muted"><?= $subscription->td3_tax_number ?></td>
                                                            <td class="text-muted">
                                                                <?php 
                                                                    if($subscription->td3_tax_reason_type == 1){
                                                                        echo "Reason A";
                                                                    }else if($subscription->td3_tax_reason_type == 2){
                                                                        echo "Reason B";
                                                                        echo "-".$subscription->td3_tax_reason;

                                                                    }else if($subscription->td3_tax_reason_type == 3){
                                                                        echo "Reason C";
                                                                    }
                                                                ?>

                                                            </td>
                                                        </tr>
                                                    
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div>

                                </div>


                                <div class="tab-pane fade" id="nav-declaration1" role="tabpanel"
                                    aria-labelledby="nav-declaration-tab1">
                                    <div>
                                        <h5 class="font-weight-bold mb-3">Certification & Declaration :</h5>
                                        <div class="row mt-4 text-muted">
                                            <div class="col-lg-12"> 1. I/We undersigned have read and agreed to
                                                the Declaration On Source Of Funds. </div>
                                        </div>
                                        <div class="row mt-3 text-muted">
                                            <div class="col-lg-12"> 2. I/We undersigned have read and agreed to
                                                the Application of share subscription terms and conditions.
                                            </div>
                                        </div>
                                        <div class="row mt-3 text-muted">
                                            <div class="col-lg-12"> 3. I/We undersigned confirm the designation
                                                of the beneficiary/ies according to the beneficiary form.</div>
                                        </div>
                                        <div class="row mt-3 text-muted">
                                            <div class="col-lg-12"> 4. I/We undersigned have read and
                                                acknowledged to the information. </div>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <h5 class="font-weight-bold mb-3"> KYC :</h5>
                                        <div class="row mt-3 text-muted">
                                            <div class="col-lg-12"> 1. I/We acknowledge that the intended
                                                investment corresponds with my objectives. </div>
                                        </div>
                                        <div class="row mt-3 text-muted">
                                            <div class="col-lg-12"> 2. None of my business are "high risk
                                                businesses". </div>
                                        </div>
                                        <div class="row mt-3 text-muted">
                                            <div class="col-lg-12"> 3. I/We declare that I do not have business
                                                interest in high risk countries such as Iran, North Korea,
                                                Afghanistan and so on. </div>
                                        </div>
                                        <div class="row mt-3 text-muted">
                                            <div class="col-lg-12"> 4. I/We acknowledge that I can legitimately
                                                make the intended investment having regard to my financial
                                                resources. </div>
                                        </div>
                                        <div class="row mt-3 text-muted">
                                            <div class="col-lg-12"> 5. I/We confirm that I'm not in the
                                                Politically Exposed Person(PEP) list. If yes, I understand that
                                                my application is subjected to the Board of Director's approval.
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="tab-pane fade" id="nav-download1" role="tabpanel" aria-labelledby="nav-download-tab1">
                                    <div>
                                        <div class="downloadfileblock mt-3">
                                            <div class="row pl-2">
                                                <div class="col-lg-6">Manual Signed Application</div>
                                                <div class="col-lg-3"> 
                                                    <button type="button" class="btn btn-soft-info uploadSignedApplicationButton" style="cursor:pointer;">Upload </button>
                                                </div>

                                                <div class="col-lg-6">Share Certificate</div>
                                                <div class="col-lg-3"> 
                                                    <button type="button" class="btn btn-soft-info uploadShareCertificationButton" style="cursor:pointer;">Upload </button>
                                                </div>

                                                <div class="col-lg-6">Manual Bank Slip upload</div>
                                                <div class="col-lg-3"> 
                                                    <button type="button" class="btn btn-soft-info uploadBankSlipButton" style="cursor:pointer;">Upload </button>
                                                </div>
                                            </div>
                                        </div>

                                        <h5 class="font-weight-bold mb-3">Documents & Signature</h5>
                                        <div class="downloadfileblock mt-3">
                                            
                                            <?php if (!$subscription->SsAttachments->isEmpty()): ?>
                                            <?php foreach ($subscription->SsAttachments as $ssAttachments): ?>

                                                <?php if($ssAttachments->attachment_type == 11): ?>
                                                <?php if(!empty($ssAttachments->attachment)): ?>

                                                    <div class="row pl-2">
                                                        <div class="col-lg-6"> <a href="#"><img src="{{ asset('assets/images/icons/pdf-icon.png') }}" /> Company Certificate</a></div>

                                                        <div class="col-lg-1"> 
                                                            <a href="{{ asset(Storage::url('')); }}/<?= $ssAttachments->attachment ?>" class="btn btn-soft-info" target="_blank" download>Download</a> 
                                                        </div>
                                                        <div class="col-lg-1"> 
                                                            <a href="{{ asset(Storage::url('')); }}/<?= $ssAttachments->attachment ?>" class="btn btn-soft-info" target="_blank">Open</a> 
                                                        </div>
                                                        <div class="col-lg-2"> 
                                                            <button class="btn btn-soft-success uploadDocLink" style="cursor:pointer;" get-ss-id="<?= $ssAttachments->id ?>">Re-upload</button> 
                                                        </div>
                                                    </div>

                                                <?php endif; ?>
                                                <?php endif; ?>

                                                <?php if($ssAttachments->attachment_type == 12): ?>
                                                <?php if(!empty($ssAttachments->attachment)): ?>

                                                    <div class="row pl-2">
                                                        <div class="col-lg-6"> <a href="#"><img src="{{ asset('assets/images/icons/pdf-icon.png') }}" /> CompanyLetters of Authorized Signatory</a></div>

                                                        <div class="col-lg-1"> 
                                                            <a href="{{ asset(Storage::url('')); }}/<?= $ssAttachments->attachment ?>" class="btn btn-soft-info" target="_blank" download>Download</a> 
                                                        </div>
                                                        <div class="col-lg-1"> 
                                                            <a href="{{ asset(Storage::url('')); }}/<?= $ssAttachments->attachment ?>" class="btn btn-soft-info" target="_blank">Open</a> 
                                                        </div>
                                                        <div class="col-lg-2"> 
                                                            <button class="btn btn-soft-success uploadDocLink" style="cursor:pointer;" get-ss-id="<?= $ssAttachments->id ?>">Re-upload</button> 
                                                        </div>
                                                    </div>

                                                <?php endif; ?>
                                                <?php endif; ?>

                                                <?php if($ssAttachments->attachment_type == 13): ?>
                                                <?php if(!empty($ssAttachments->attachment)): ?>

                                                    <div class="row pl-2">
                                                        <div class="col-lg-6"> <a href="#"><img src="{{ asset('assets/images/icons/pdf-icon.png') }}" /> Board of Directors Agreement Letter</a></div>

                                                        <div class="col-lg-1"> 
                                                            <a href="{{ asset(Storage::url('')); }}/<?= $ssAttachments->attachment ?>" class="btn btn-soft-info" target="_blank" download>Download</a> 
                                                        </div>
                                                        <div class="col-lg-1"> 
                                                            <a href="{{ asset(Storage::url('')); }}/<?= $ssAttachments->attachment ?>" class="btn btn-soft-info" target="_blank">Open</a> 
                                                        </div>
                                                        <div class="col-lg-2"> 
                                                            <button class="btn btn-soft-success uploadDocLink" style="cursor:pointer;" get-ss-id="<?= $ssAttachments->id ?>">Re-upload</button> 
                                                        </div>
                                                    </div>

                                                <?php endif; ?>
                                                <?php endif; ?>

                                                <?php if($ssAttachments->attachment_type == 15): ?>
                                                <?php if(!empty($ssAttachments->attachment)): ?>

                                                    <div class="row pl-2">
                                                        <div class="col-lg-6"> <a href="#"><img src="{{ asset('assets/images/icons/pdf-icon.png') }}" /> Bank Slip</a></div>

                                                        <div class="col-lg-1"> 
                                                            <a href="{{ asset(Storage::url('')); }}/<?= $ssAttachments->attachment ?>" class="btn btn-soft-info" target="_blank" download>Download</a> 
                                                        </div>
                                                        <div class="col-lg-1"> 
                                                            <a href="{{ asset(Storage::url('')); }}/<?= $ssAttachments->attachment ?>" class="btn btn-soft-info" target="_blank">Open</a> 
                                                        </div>
                                                        <div class="col-lg-2"> 
                                                            <button class="btn btn-soft-success uploadDocLink" style="cursor:pointer;" get-ss-id="<?= $ssAttachments->id ?>">Re-upload</button> 
                                                        </div>

                                                        <div class="col-lg-2"> 

                                                            {{ link_to_route('sendBankSlipConfirm', $title = 'Send Confirmation Email', $parameters = ['userId' => $user->id, 'subId' => $subscription->id], $attributes = ['escape'=>false, 'class' => "btn btn-soft-success", 'title'=> 'Send Confirmation Email', 'onclick' => "if (confirm('Are sure want to send confirmation Email to inform investor that received the Bank In Slip?')){return true;}else{event.stopPropagation(); event.preventDefault();};"]); }}

                                                        </div>

                                                    </div>

                                                <?php endif; ?> 
                                                <?php endif; ?>

                                            <?php endforeach; ?>
                                            <?php endif; ?>
                                            
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <?php 
                $commencement_year = [];
                if(!empty($subscription->commence_date)){
                    if(!empty($subscription->maturity_date)){
                        $quartersCR = get_quarters2(date('Y-m-d', strtotime($subscription->commence_date)), date('Y-m-d', strtotime($subscription->maturity_date)));
                        
                        $i = 0;
                        $per_count = 0;
                        $len = count($quartersCR);
                        foreach ($quartersCR as $value) {
                            $dis_month = $value->start_month;
                            $dis_year = $value->year;

                            if ($i == 1) {

                                $ts1 = date('Y-m-d', strtotime($subscription->commence_date));
                                $ts2 = strtotime($value->period_start);
                                $dyear1 = date('Y', strtotime($ts1));
                                $dyear2 = date('Y', $ts2);
                                $dmonth1 = date('m', strtotime($ts1));
                                $dmonth2 = date('m', $ts2);
                                
                                $month_count = (($dyear2 - $dyear1) * 12) + ($dmonth2 - $dmonth1);

                                if($month_count == 3){
                                   
                                    $commencement_year[$i]['full'] = "Before 15 ".$dis_month." ". $dis_year." (3%)";
                                    $commencement_year[$i]['year'] = $dis_year;
                                    $commencement_year[$i]['month'] = $dis_month;
                                    $commencement_year[$i]['percentage'] = 3;
                                    $commencement_year[$i]['amount'] = ($subscription->initial_investment*3)/100;
                                    $per_count += 3;
                                }else if($month_count == 2){
                                    $commencement_year[$i]['full'] = "Before 15 ".$dis_month." ". $dis_year." (2%)";
                                    $commencement_year[$i]['year'] = $dis_year;
                                    $commencement_year[$i]['month'] = $dis_month;
                                    $commencement_year[$i]['percentage'] = 2;
                                     $commencement_year[$i]['amount'] = ($subscription->initial_investment*2)/100;
                                    $per_count += 2;
                                }else{
                                    $commencement_year[$i]['full'] = "Before 15 ".$dis_month." ". $dis_year." (1%)";
                                    $commencement_year[$i]['year'] = $dis_year;
                                    $commencement_year[$i]['month'] = $dis_month;
                                    $commencement_year[$i]['percentage'] = 1;
                                     $commencement_year[$i]['amount'] = ($subscription->initial_investment*1)/100;
                                    $per_count += 1;
                                }
                                
                            } else if ($i == $len - 1) {
                                $per_count += 3;
                                $commencement_year[$i]['full'] = "Before 15 ".$dis_month." ". $dis_year." (3%)";
                                $commencement_year[$i]['year'] = $dis_year;
                                $commencement_year[$i]['month'] = $dis_month;
                                $commencement_year[$i]['percentage'] = 3;
                                $commencement_year[$i]['amount'] = ($subscription->initial_investment*3)/100;
                            }else if(($i !=0)){
                                $per_count += 3;
                                $commencement_year[$i]['full'] = "Before 15 ".$dis_month." ". $dis_year." (3%)";
                                $commencement_year[$i]['year'] = $dis_year;
                                $commencement_year[$i]['month'] = $dis_month;
                                $commencement_year[$i]['percentage'] = 3;
                                $commencement_year[$i]['amount'] = ($subscription->initial_investment*3)/100;
                            }
                            $i++;
                        }
                        $len = count($quartersCR)-1;
                        $commence_dateee = strtotime($quartersCR[$len]->period_end);
                        $maturity_dateee = strtotime('+28 days', $commence_dateee);

                        if($per_count != 24){
                            $last_val = 24 - $per_count;

                            $commencement_year[$i+1]['full'] = "Before 15 ".date('F', $maturity_dateee)." ". date('Y', $maturity_dateee)." (". $last_val."%)";
                            $commencement_year[$i+1]['year'] = date('Y', $maturity_dateee);
                            $commencement_year[$i+1]['month'] = date('F', $maturity_dateee);
                            $commencement_year[$i+1]['percentage'] = $last_val;
                            $commencement_year[$i+1]['amount'] = ($subscription->initial_investment*$last_val)/100;
                                
                        }
                        
                    }
                }
            ?>


            <!-- Contract Information Add Model-->
            <div class="modal fade" id="editCIModel" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Contract Information</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="#" id="form-editCI" data-parsley-validate method="post" autocomplete="off">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <label>Investment ID</label>

                                        {!! Form::text('reference_no', $subscription->reference_no, ['id' => 'reference_no', 'class'=>'form-control search-input', 'required' => 'required']) !!}
                                    </div>
                                    <div class="col-lg-4">
                                        <label class="invisible">Id</label>

                                        {!! Form::text('refreance_id', $subscription->refreance_id, ['id' => 'refreance_id', 'class'=>'form-control search-input', 'readonly'=> 'readonly',]) !!}
                                    </div>
                                    <div class="col-lg-12 mt-3">
                                        <label>Commencement Date <span class="mandatory">*</span></label>
                                        <div class="input-group">

                                            {!! Form::date('commence_date', $subscription->commence_date ? $subscription->commence_date : '', ['id' => 'commence_date', 'class'=>'form-control search-input', 'data-parsley-errors-container'=>"#commence_date_error", 'required' => 'required']) !!}
                                        </div>

                                        <div id="commence_date_error"></div>
                                    </div>
                                    <div class="col-lg-12 mt-3">
                                        <label>PFIA Issuance Date <span class="mandatory">*</span></label>
                                        <div class="input-group">

                                            {!! Form::date('pfia_date', $subscription->pfia_date ? $subscription->pfia_date : '', ['id' => 'pfia_date', 'class'=>'form-control search-input', 'data-parsley-errors-container'=>"#bi_date_error", 'required' => 'required']) !!}
                                        </div>

                                        <div id="bi_date_error"></div>
                                    </div>
                                    {{-- <div class="col-lg-12 mt-3">
                                        <label>Bank Instruction Date </label>
                                        <div class="input-group">

                                            {!! Form::date('bi_date', $subscription->bi_date ? $subscription->bi_date : '', ['id' => 'bi_date', 'class'=>'form-control search-input']) !!}
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary modal-cancel"
                                    data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-info">Save</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>


            <!-- Redemption Modal -->
            <div class="modal fade" id="redemptionModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">

                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Redemption form</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        {{ Form::open(['url' => '/subscription/view/'.$subscription->id, 'id'=>'formRedemption', 'files' => true, 'data-parsley-validate', 'autocomplete'=>"off"]) }}

                            <input type="hidden" name="sub_id" value="{{ $subscription->id }}">

                            <div class="modal-body">
                                <div class="row">

                                    <div class="col-md-12 mb-3">
                                        <a href="{{ asset(Storage::url('')); }}/<?= $subscription->redemption_file ?>"  download class="btn btn-info btn-rounded btn-fw mt-1 mr-1">Company Redemption Form Download </a>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <label>Select Status</label>

                                        <?php 
                                            $redumption_option = [1=> 'Approved', 2=> 'Reject'];
                                        ?>

                                        {!! Form::select('redemption_status', $redumption_option, null,['class' => 'form-control fund-sub-input', 'id' => 'redemption_status', "required"=>"required"]) !!}
                                    </div>
                                    
                                    <div class="col-md-12 mb-3" id="reasons_div">
                                        <label>Enter reasons</label>

                                        {!! Form::textarea('redemption_msg', old('redemption_msg'), ['id' => 'redemption_msg', 'class'=>'form-control search-input', 'rows' => 5]) !!}
                                    </div>
                                    
                                    
                                    
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary modal-cancel"
                                    data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-info">Save</button>
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>

            </div>

            <!-- payout info Modal -->
            <div class="modal fade" id="createPaymentModel" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog  modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Add New Payout</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="#" id="form-payment-create" data-parsley-validate method="post" autocomplete="off" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <label>Payout Type</label>
                                    <select name="payout_type" class="form-control fund-sub-input" id="create_payout_type" required>
                                        <option value="">Select Payout Type</option>
                                        <option value="Dividend">Dividend</option>
                                        <option value="Bonus">Bonus</option>
                                        <option value="Dividend & Bonus">Dividend & Bonus</option>
                                    </select>
                                </div>
                                <div class="col-lg-6 mt-3 create_payout_date_div">
                                    <label>Payout Date <span class="mandatory">*</span></label>
                                    <select class="form-control search-input" name="divident_date" id="create_payout_date" required>
                                        <option value="">--</option>
                                        <?php 
                                            foreach($commencement_year as $value2){
                                                
                                                $value2_year = $value2['year'];
                                                $value2_month = $value2['month'];
                                                $value2_day = 1;
                                                
                                                $payout_date = strtotime("$value2_year-$value2_month-$value2_day");
                                                $payout_date = date('Y-m-d', $payout_date);

                                                if($value2_year >= date("Y")){
                                                    echo "<option value=".$payout_date."  attr_amount=".$value2['amount']." attr_per=".$value2['percentage'].">".$value2['full']."</option>";
                                                }
                                                
                                            }
                                        ?> 
                                    </select>
                                </div>
                                <div class="col-lg-6 mt-3 create_payout_date_div">
                                    <label>Payout Date <span class="mandatory">*</span></label>
                                    <div class="input-group addpayouterr">
                                        <input type="date" class="form-control search-input" name="payout_date" id="create_divident_date" data-parsley-errors-container="#payout_dateError1" required>
                                    </div>
                                    <div id="payout_dateError1"></div>
                                </div>
                                <div class="col-lg-6 mt-3 create_payout_date1_div">
                                    <label>Payout Date <span class="mandatory">*</span></label>
                                    <div class="input-group addpayouterr">
                                        <input type="date" class="form-control search-input" name="payout_date1" id="create_payout_date1" data-parsley-errors-container="#payout_dateError2">
                                    </div>
                                    <div id="payout_dateError2"></div>
                                </div>
                                <div class="col-lg-6 mt-3 addpayouterr">
                                    <label>Percentage % <span class="mandatory">*</span></label>
                                    <input type="text" name="percentage" id="create_percentage" class="form-control search-input" required>
                                </div>
                                <div class="col-lg-6 mt-3 addpayouterr">
                                    <label> Amount (USD) <span class="mandatory">*</span></label>
                                    <input type="text" name="amount" id="create_amount" class="form-control search-input" required readonly>
                                </div>
                                <div class="col-lg-12 mt-3 addpayouterr">
                                    <label>Reference <span class="mandatory">*</span></label>
                                    <input type="text" name="reference" id="reference" class="form-control search-input " required>
                                </div>
                                <div class="col-lg-12 mt-4">
                                    <label>File</label>
                                    <div class="custom-file addpayouterr">
                                        <input type="file" name="file" class="custom-file-input inputFile" id="file">
                                        <label class="custom-file-label" for="investion-evidence">Choose
                                            file...</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary modal-cancel"
                                data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-info">Save</button>
                        </div>
                        </form>
                    </div>
                </div>

            </div>


            <!-- payout info Modal Edit -->

            <div class="modal fade" id="editPaymentModel" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog  modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Update Payout</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="#" id="form-payment-edit" data-parsley-validate method="post" autocomplete="off" enctype="multipart/form-data">

                        <input type="hidden" name="id" id="payeditID" value="">

                        <div class="modal-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <label>Payout Type</label>
                                    <select name="payout_type" class="form-control fund-sub-input" id="edit_payout_type" required>
                                        <option value="">Select Payout Type</option>
                                        <option value="Dividend">Dividend</option>
                                        <option value="Bonus">Bonus</option>
                                        <option value="Dividend & Bonus">Dividend & Bonus</option>
                                    </select>
                                </div>
                                
                                <div class="col-lg-6 mt-3">
                                    <label>Payout Date <span class="mandatory">*</span></label>
                                    <div class="input-group">
                                        <input type="date" class="form-control search-input" name="payout_date" id="edit_payout_date" data-parsley-errors-container="#payout_dateError3" required>
                                    </div>
                                    <div id="payout_dateError3"></div>
                                </div>
                                
                                <div class="col-lg-6 mt-3">
                                    <label>Percentage % <span class="mandatory">*</span></label>
                                    <input type="text" name="percentage" id="edit_percentage" class="form-control search-input" required>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <label> Amount (USD) <span class="mandatory">*</span></label>
                                    <input type="text" name="amount" id="edit_amount" class="form-control search-input" required readonly>
                                </div>
                                <div class="col-lg-12 mt-3">
                                    <label>Reference <span class="mandatory">*</span></label>
                                    <input type="text" name="reference" id="reference" class="form-control search-input " required>
                                </div>
                                <div class="col-lg-12 mt-4">
                                    <label>File</label>
                                    <div class="custom-file">
                                        <input type="file" name="file" class="custom-file-input inputFile" id="file">
                                        <label class="custom-file-label" for="investion-evidence">Choose
                                            file...</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary modal-cancel"
                                data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-info">Update</button>
                        </div>
                        </form>
                    </div>
                </div>

            </div>


            <!-- Investment update info Modal -->
            <div class="modal fade" id="editInvestmentModel" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Update Investment</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        {{ Form::open(['url' => '/subscription/view/'.$subscription->id, 'id'=>'form-investment-edit', 'files' => true, 'data-parsley-validate', 'autocomplete'=>"off"]) }}

                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <label>Fund <span class="mandatory">*</span></label>
                                        {!! Form::select('fund_type', $fund_types, $subscription->fund_type, ['placeholder' => 'Please select fund ...', 'class' => 'form-control fund-sub-input', 'id' => 'fund_type', 'required'=> 'required']) !!}
                                    </div>
                                    <div class="col-lg-12 mt-3">
                                        <label> Amount (USD) <span class="mandatory">*</span></label>

                                        {!! Form::text('initial_investment', $subscription->initial_investment, ['id' => 'initial_investment', 'class'=>'form-control search-input', 'required'=> 'required']) !!}
                                    </div>
                                    <div class="col-lg-12 mt-3">
                                        <label>TT/Cheque No </label>
                                        {!! Form::text('cheque_no', $subscription->cheque_no, ['id' => 'cheque_no', 'class'=>'form-control search-input']) !!}
                                    </div>
                                    <div class="col-lg-12 mt-3">
                                        <label>Remitting/Issuing Bank <span class="mandatory">*</span></label>
                                        {!! Form::text('remittance_bank', $subscription->remittance_bank, ['id' => 'remittance_bank', 'class'=>'form-control search-input', 'required'=> 'required']) !!}
                                    </div>
                                    <div class="col-lg-12 mt-3">
                                        <label> Subscription Fees(%) <span class="mandatory">*</span></label>
                                        {!! Form::text('service_charge', $subscription->service_charge, ['id' => 'service_charge', 'class'=>'form-control search-input', 'required'=> 'required']) !!}
                                    </div>
                                    <div class="col-lg-12 mt-3">
                                        <label>Bank Charge</label>
                                        {!! Form::text('bank_charge', $subscription->bank_charge, ['id' => 'bank_charge', 'class'=>'form-control search-input']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary modal-cancel"
                                    data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-info">Update</button>
                            </div>

                        {{ Form::close() }}
                    </div>
                </div>
            </div>

            <!-- upload signed application modal -->
            <div class="modal fade" id="uploadSignedApplicationModel" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Upload Signed Application</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        {{ Form::open(['url' => '/subscription/view/'.$subscription->id, 'id'=>'formsigedApplication', 'class'=>'', 'files' => true, 'data-parsley-validate', 'autocomplete'=>"off"]) }}
                            <input type="hidden" name="id" value="{{ $subscription->id }}"/>

                            <div class="modal-body">

                                <?php if($user->company->company_country_corporate == 129): ?>
                                    <div class="col-md-12 mb-3">
                                        <a href="#" class="badge badge-warning">Malaysian Investor</a>
                                    </div>
                                <?php endif;?>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <label>Attach Signed Application </label>
                                        <input type="file" name="signeddoc_file" class="dropify" id="signeddoc_file" data-height="300" data-max-file-size="10M" data-allowed-file-extensions="pdf" data-parsley-errors-container="#signedDoc-errors" data-remove-required="0" required/>
                                    </div>

                                    <div id="signedDoc-errors"></div>

                                    <div class="col-md-12 mt-4">
                                        <div class="string-check string-check-soft-info mb-2">
                                            
                                            <?php 
                                                if($subscription->enable_signeddoc == 1){ 
                                                    $checked_signed_app = true;
                                                }else{
                                                    $checked_signed_app = false;
                                                }
                                            ?>

                                            {!! Form::checkbox('enable_signeddoc',null,['class'=>'form-control', 'id'=>'enable_signeddoc', 'value'=> 1, 'checked'=>$checked_signed_app])!!}

                                            <label class="string-check-label">
                                                <span class="ml-2">Enable / Disable
                                                    Signed Application</span> 
                                            </label>
                                        </div>
                                    </div>
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


            <!-- upload Share Certificate modal -->
            <div class="modal fade" id="uploadShareCertificationModel" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Upload Share Certificate</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        {{ Form::open(['url' => '/subscription/view/'.$subscription->id, 'id'=>'formuploadShareCertification', 'class'=>'', 'files' => true, 'data-parsley-validate', 'autocomplete'=>"off"]) }}

                            <input type="hidden" name="id" id="id" value="{{ $subscription->id }}"/>

                            <div class="modal-body">
                                
                                <?php if($user->company->company_country_corporate == 129): ?>
                                    <div class="col-md-12 mb-3">
                                        <a href="#" class="badge badge-warning">Malaysian Investor</a>
                                    </div>
                                <?php endif;?>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <label>Attach Share Certificate </label>
                                        <input type="file" name="sharecertificate_file" class="dropify" id="sharecertificate_file" data-height="300" data-max-file-size="5M" data-allowed-file-extensions="pdf png jpg jpeg" data-parsley-errors-container="#shareDoc-errors" data-remove-required="0" required/>
                                    </div>

                                    <div id="shareDoc-errors"></div>
                                    
                                    <div class="col-md-12 mt-4">
                                        <div class="string-check string-check-soft-info mb-2">
                                            
                                            <?php 
                                                if($subscription->enable_sharecertificate == 1){ 
                                                    $checked_share_app = true;
                                                }else{
                                                    $checked_share_app = false;
                                                }
                                            ?>

                                            {!! Form::checkbox('enable_sharecertificate',null,['class'=>'form-control', 'id'=>'enable_sharecertificate', 'value'=> 1, 'checked'=>$checked_share_app])!!}

                                            <label class="string-check-label">
                                                <span class="ml-2">Enable / Disable Share Certificate</span> 
                                            </label>
                                        </div>
                                    </div>
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

            <!-- upload Bank Slip modal -->
            <div class="modal fade" id="uploadBankSlipModel" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Upload Bank Slip Document</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        {{ Form::open(['url' => '/subscription/view/'.$subscription->id, 'id'=>'formuploadBankSlip', 'class'=>'', 'files' => true, 'data-parsley-validate', 'autocomplete'=>"off"]) }}

                            <input type="hidden" name="id" id="id" value="{{ $subscription->id }}"/>

                            <div class="modal-body">
                                
                                <?php if($user->company->company_country_corporate == 129): ?>
                                    <div class="col-md-12 mb-3">
                                        <a href="#" class="badge badge-warning">Malaysian Investor</a>
                                    </div>
                                <?php endif;?>

                                <div class="row">
                                    <div class="col-lg-12">
                                        <label>Upload Document </label>
                                        <input type="file" name="bankslip_file[]" multiple class="dropify" id="bankslip_file" data-height="300" data-max-file-size="5M" data-allowed-file-extensions="pdf png jpg jpeg" data-parsley-errors-container="#bankSlipDoc-errors" data-remove-required="0" required />
                                    </div>

                                    <div id="bankSlipDoc-errors"></div>

                                    <div class="col-md-12 mt-4">
                                        <div class="string-check string-check-soft-info mb-2">

                                            {!! Form::checkbox('enable_bank_slip',null,['class'=>'form-control', 'id'=>'enable_bank_slip', 'value'=> 1, 'checked'=>true])!!}

                                            <label class="string-check-label">
                                                <span class="ml-2">Enable / Disable Bank Slip</span> 
                                            </label>
                                        </div>
                                    </div>
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

            <!-- upload passport modal -->
            <div class="modal fade" id="updatepassportDataModel" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Upload Document</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        {{ Form::open(['url' => '/subscription/view/'.$subscription->id, 'id'=>'formupdatepassport', 'class'=>'', 'files' => true, 'data-parsley-validate', 'autocomplete'=>"off"]) }}

                            <input type="hidden" name="ss_att_id" id="ss_att_id">

                            <div class="modal-body">

                                <div class="row">
                                    <div class="col-lg-12 documentModalerr">
                                        <label>Document </label>
                                        <input type="file" name="attachment" class="dropify" id="attachment" data-height="300" data-max-file-size="5M" data-allowed-file-extensions="pdf png jpg jpeg" data-parsley-errors-container="#uploadDoc-errors" data-remove-required="0" required />
                                    </div>
                                    
                                    <div id="uploadDoc-errors"></div>
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


            <!-- update edit BankModel info Modal -->
            <div class="modal fade" id="editBankModel" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Bank account details update</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        {{ Form::open(['url' => '/subscription/view/'.$subscription->id, 'id'=>'form-bank-edit', 'data-parsley-validate'=>'data-parsley-validate', 'autocomplete'=>"off"]) }}

                            <div class="modal-body">
                                <div class="row">

                                    <div class="col-lg-6 mt-3">
                                        <label>Name Payee*</label>
                                        {!! Form::text('payee_name', $subscription->payee_name, ['id' => 'payee_name', 'class'=>'form-control search-input', "onkeyup"=>"this.value = this.value.toUpperCase();", 'required' => 'required']) !!}
                                    </div>

                                    <div class="col-lg-6 mt-3">
                                        <label>Bank Name*</label>
                                        {!! Form::text('bank_name', $subscription->bank_name, ['id' => 'bank_name', 'class'=>'form-control search-input', 'required'=> 'required']) !!}
                                    </div>

                                    <div class="col-lg-12 mt-3">
                                        <label>Address *</label>
                                        {!! Form::text('address_line_1', $subscription->address_line_1, ['id' => 'address_line_1', 'class'=>'form-control search-input', "placeholder"=>"Address Line 1", 'required' => 'required']) !!}
                                    </div>

                                    <div class="col-lg-12 mt-3">
                                        {!! Form::text('address_line_2', $subscription->address_line_2, ['id' => 'address_line_2', 'class'=>'form-control search-input', "placeholder"=>"Address Line 2"]) !!}
                                    </div>

                                    <div class="col-lg-6 mt-3">
                                        <label>City *</label>
                                        {!! Form::text('city', $subscription->city, ['id' => 'city', 'class'=>'form-control search-input', 'required'=> 'required']) !!}
                                    </div>

                                    <div class="col-lg-6 mt-3">
                                        <label>Country / Region *</label>
                                        {!! Form::select('country_id', $countries, $subscription->country_id,['class' => 'form-control fund-sub-input', 'id' => 'country_id', "placeholder"=>"--SELECT--", "required"=>"required"]) !!}
                                    </div>

                                    <div class="col-lg-6 mt-3">
                                        <label>Postcode *</label>
                                        {!! Form::text('postcode', $subscription->postcode, ['id' => 'postcode', 'class'=>'form-control search-input', 'required' => 'required', "data-parsley-type"=>"digits"]) !!}
                                    </div>

                                    <div class="col-lg-6 mt-3">
                                        <label>State *</label>

                                        <select class="form-control search-input" name="state_id" id="state_id" required>
                                            <option value="">--</option>
                                        </select>
                                    </div>

                                    <div class="col-lg-12 mt-3">
                                        <label>Account Number *</label>
                                        {!! Form::text('account_number', $subscription->account_number, ['id' => 'account_number', 'class'=>'form-control search-input', 'required' => 'required', "data-parsley-type"=>"digits"]) !!}
                                    </div>

                                    <div class="col-lg-12 mt-3">
                                        <label>Account Type *</label>
                                        <?php 
                                            $account_type = ['Saving Account' => 'Saving Account', 'Current Account' => 'Current Account'];
                                        ?>

                                        {!! Form::select('account_type', $account_type, $subscription->account_type, ['class' => 'form-control search-input', 'id' => 'account_type']) !!}
                                    </div>

                                    <div class="col-lg-12 mt-3">
                                        <label>SWIFT Code *</label>
                                        {!! Form::text('swift_code', $subscription->swift_code, ['id' => 'swift_code', 'class'=>'form-control search-input', 'required'=> 'required']) !!}
                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary modal-cancel"
                                    data-dismiss="modal">Cancel</button>
                                <button type="submit" class="btn btn-info">Update</button>
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

@section('scripts')
    
    <script src="{{ asset('assets/js/components/date-picker.js') }}"></script>
    <script src="{{ asset('assets/js/components/dropify.js') }}"></script>

    <script type="text/javascript">

        $(function () {
            $('#datepicker').datepicker({
                dateFormat: 'mm/dd/yyyy',
                todayHighlight: true
            });
        });

        $(document).on("click", "#reGenerateButton", function (e) {
            e.preventDefault();
            var currentElement = $(this);
            Swal.fire({
                title: 'Are you sure?',
                text: "Please confirm the Re-Generate Signed Application!",
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

        });

        $(document).on("click","#changeStatusButton",function(e) {
            e.preventDefault();
            if ( $(this).parsley().isValid() ) {

                var formStatus = document.getElementById("form_status");
                var statusValue = formStatus.options[formStatus.selectedIndex].text;
                    
                if($("#form_status").val() == 1 || $("#form_status").val() == 3){
    
                    Swal.fire({
                        // title: 'Are you sure?',
                        // text: "Please confirm the change of status!",
                        title: 'Please confirm the change of status!',
                        html: '<h6> <input type="checkbox" value="1" id="mailConfirm" /> Click here to send an e-mail for '+ statusValue +' </h6>',
                        preConfirm: () => {
                            var mailConfirm = Swal.getPopup().querySelector('#mailConfirm').checked
                            return {mailConfirm: mailConfirm}
                        },
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes'
                    }).then((result) => {
                        if (result.value) {
                            
                            $('#mail_confirm').val(`${result.value.mailConfirm}`);
                            $('#send_mail').val("send");
                            $('#changeStatusForm').submit();
                        }
                    });
                   
                }else{

                    preloader_init();
                   
                   $('#send_mail').val("no");
                   $('#changeStatusForm').submit();
                }
                    
            }
        });

        $(document).on("click",".get-edit-CIdata",function() {
            $('#form-editCI')[0].reset();
            var we_id = $(this).attr('get-ci-id');
    
            axios.get(SITE_URL+'subscription/ajaxCiGet?id='+we_id).then(function (response) {
                ///loaddata2(response.data, "form-editCI");
    
                var item =response.data.data;
                $('#editCIModel').modal('show');
            })
            .catch(function (error) {
                console.log(error);
                Swal.fire('Sorry!','Data retrieve problam, please try after some time !!!','error');
            });           
        });

        $('#form-editCI').submit(function(e) {
            e.preventDefault();
            if ( $(this).parsley().isValid() ) {
                
                preloader_init();

                var csrfToken = "{{ csrf_token() }}";
                
                const form = document.getElementById('form-editCI');
                let formData = new FormData(form);
    
                formData.set('id', <?= $subscription->id ?>);
    
                axios.post(SITE_URL+'subscription/ajaxCiEditSave',formData,{
                        headers: {
                            'Content-Type': 'multipart/form-data',
                            'X-CSRF-Token': csrfToken}}
                ).then(function(response){
                    
                    preloader_off();
                    var item =response.data.data;
    
                    if(item != "null"){
                        
                        Swal.fire('Great Job !','Contract Information create successfully!','success');
    
                        $('#form-editCI')[0].reset();
                        $('#editCIModel').modal('hide');
    
                        setTimeout(location.reload.bind(location), 1500);
                    }else{
                        Swal.fire('Sorry !','Contract Information edit faild!','error');
                    } 
                })
                .catch(function(){
                    Swal.fire('Sorry !','Contract Information edit faild!','error');
                });
            }
        });

        /************************************************/
        $(document).on("click","#createPayment",function() {
            $('#form-payment-create')[0].reset();
            var commence_date = "<?= $subscription->commence_date; ?>";
            
            if(commence_date){
                $('#createPaymentModel').modal('show');
            }else{
                Swal.fire('Sorry !','Please set commencement date first !','error');
            }

            // $('#create_divident_date').datetimepicker({  
            //     minDate:new Date()
            // });
            
        });

        $('#create_payout_type').change(function(){
            if($(this).val() == "Dividend"){
                
                $('.create_payout_date_div').show();
                $('.create_payout_date1_div').hide();
                
                $("#create_payout_date1").removeAttr("required");
                $("#create_payout_date").attr("required", "required");
                $("#create_divident_date").attr("required", "required");
            }else{
                $('.create_payout_date1_div').show();
                $('.create_payout_date_div').hide();
                
                $("#create_payout_date").removeAttr("required");
                $("#create_divident_date").removeAttr("required");
                $("#create_payout_date1").attr("required", "required");

            }
        });

        $('#create_payout_date').change(function(){
            var amount = $('#create_payout_date option:selected').attr("attr_amount");
            var per = $('#create_payout_date option:selected').attr("attr_per");
            $("#create_amount").val(amount);
            $("#create_percentage").val(per);
        });

        $("#create_percentage").on('change', per_calc_create);
        
        function per_calc_create(){
            var initial_amount = "<?= $subscription->initial_investment; ?>";
            
            var per = $("#create_percentage").val();
            var total = (initial_amount*per)/100;
            $("#create_amount").val(total);
    
        }

        $('#form-payment-create').submit(function(e) {
            e.preventDefault();
            if ( $(this).parsley().isValid() ) {
                
                preloader_init();

                var csrfToken = "{{ csrf_token() }}";
    
                const form = document.getElementById('form-payment-create');
                let formData = new FormData(form);
    
                formData.set('subscription_id', {{ $subscription->id }});
    
                axios.post(SITE_URL+'subscription/ajaxPaymentSave',formData,{
                        headers: {
                            'Content-Type': 'multipart/form-data',
                            'X-CSRF-Token': csrfToken}}
                ).then(function(response){
                    
                    preloader_off();

                    var item =response.data.data;
    
                    if(item != "null"){
    
                        Swal.fire('Great Job !','Payments create successfully!','success');
    
                        $('#form-payment-create')[0].reset();
                        $('#createPaymentModel').modal('hide');
    
                        setTimeout(location.reload.bind(location), 1500);
                    }else{
    
                        Swal.fire('Sorry !','Payments create faild!','error');
                    } 
                })
                .catch(function(){
    
                    Swal.fire('Sorry !','Payments create faild!','error');
                });
            }
        });

        $(document).on("click",".get-paymentEdit",function() {
            $('#form-payment-edit')[0].reset();
            var we_id = $(this).attr('get-payment-edit');
    
            axios.get(SITE_URL+'subscription/ajaxPaymentGet?id='+we_id).then(function (response) {
                loaddata2(response.data, "form-payment-edit");
    
                var item =response.data.data;
                $('#editPaymentModel').modal('show');
            })
            .catch(function (error) {
                Swal.fire('Sorry!','Data retrieve problam, please try after some time !!!','error');
            });           
        });

        $('#edit_payout_date--').change(function(){
            var amount = $('#edit_payout_date option:selected').attr("attr_amount");
            var per = $('#edit_payout_date option:selected').attr("attr_per");
            $("#edit_amount").val(amount);
            $("#edit_percentage").val(per);
        });
    
        $("#edit_percentage--").on('change', per_calc_edit);

        function per_calc_edit(){
            var initial_amount = "{{ $subscription->initial_investment }}";
            
            var per = $("#edit_percentage").val();
            var total = (initial_amount*per)/100;
            $("#edit_amount").val(total);
        }

        $('#form-payment-edit').submit(function(e) {
            e.preventDefault();
            if ( $(this).parsley().isValid() ) {
                
                preloader_init();

                var csrfToken = "{{ csrf_token() }}";
    
                const form = document.getElementById('form-payment-edit');
                let formData = new FormData(form);
    
                axios.post(SITE_URL+'subscription/ajaxPaymentEditSave',formData,{
                        headers: {
                            'Content-Type': 'multipart/form-data',
                            'X-CSRF-Token': csrfToken}}
                ).then(function(response){
                    
                    preloader_off();

                    var item =response.data.data;
    
                    if(item != "null"){
    
                        Swal.fire('Great Job !','Payment edit successfully!','success');
    
                        $('#form-payment-edit')[0].reset();
                        $('#editPaymentModel').modal('hide');
    
                        setTimeout(location.reload.bind(location), 1500);
                    }else{
    
                        Swal.fire('Sorry !','Payment edit faild!','error');
                    } 
                })
                .catch(function(){
    
                    Swal.fire('Sorry !','Payment edit faild!','error');
                });
            }
        });

        /*********************************************/
        $(document).on("click",".get-edit-investment",function() {
            $('#form-investment-edit')[0].reset();
            var we_id = $(this).attr('get-investment-id');
    
            axios.get(SITE_URL+'subscription/ajaxInvestmentGet?id='+we_id).then(function (response) {
                //loaddata2(response.data, "form-investment-edit");
    
                var item =response.data.data;
                console.log(item)
                $('#editInvestmentModel').modal('show');
            })
            .catch(function (error) {
                Swal.fire('Sorry!','Data retrieve problam, please try after some time !!!','error');
            });           
        });

        $('#form-investment-edit').submit(function(e) {
            e.preventDefault();
            if ( $(this).parsley().isValid() ) {
                
                preloader_init();

                var csrfToken = "{{ csrf_token() }}";
    
                const form = document.getElementById('form-investment-edit');
                let formData = new FormData(form);
    
                formData.set('id', {{ $subscription->id }});
    
                axios.post(SITE_URL+'subscription/ajaxInvestmentEditSave',formData,{
                        headers: {
                            'Content-Type': 'multipart/form-data',
                            'X-CSRF-Token': csrfToken}}
                ).then(function(response){
                    
                    preloader_off();

                    var item =response.data.data;
    
                    if(item != "null"){
    
                        Swal.fire('Great Job !','Investment create successfully!','success');
    
                        $('#form-investment-edit')[0].reset();
                        $('#editInvestmentModel').modal('hide');
    
                        setTimeout(location.reload.bind(location), 1500);
                    }else{
    
                        Swal.fire('Sorry !','Investment edit faild!','error');
                    } 
                })
                .catch(function(){
    
                    Swal.fire('Sorry !','Investment edit faild!','error');
                });
            }
        });

        $('.uploadSignedApplicationButton').click(function(e){
            $('#uploadSignedApplicationModel').modal('show');
        });

        $('#formsigedApplication').submit(function(e) {
            e.preventDefault();
            if ( $(this).parsley().isValid() ) {
                
                preloader_init();

                var csrfToken = "{{ csrf_token() }}";
    
                const form = document.getElementById('formsigedApplication');
                let formData = new FormData(form);
    
                axios.post(SITE_URL+'subscription/uploadSignedapp',formData,{
                        headers: {
                            'Content-Type': 'multipart/form-data',
                            'X-CSRF-Token': csrfToken}}
                ).then(function(response){
                    
                    preloader_off();

                    var item =response.data;
    
                    if(item.error){
                        Swal.fire('Great Job !','Document upload successfully!','success');
    
                        $('#uploadSignedApplicationModel').modal('hide');
                        setTimeout(location.reload.bind(location), 1500);
                    }else{

                        preloader_off();
                        $('#uploadSignedApplicationModel').modal('hide');
                        Swal.fire('Sorry !','Document upload faild!','error');
                    } 
                })
                .catch(function(){
                    
                    preloader_off();
                    $('#uploadSignedApplicationModel').modal('hide');
                    Swal.fire('Sorry !','Document upload faild!','error');
                });
            }
        });

        $('.uploadShareCertificationButton').click(function(e){
            $('#uploadShareCertificationModel').modal('show');
        });

        $('#formuploadShareCertification').submit(function(e) {
            e.preventDefault();
            if ( $(this).parsley().isValid() ) {
                
                preloader_init();

                var csrfToken = "{{ csrf_token() }}";
    
                const form = document.getElementById('formuploadShareCertification');
                let formData = new FormData(form);
    
                axios.post(SITE_URL+'subscription/formuploadShareCertification',formData,{
                        headers: {
                            'Content-Type': 'multipart/form-data',
                            'X-CSRF-Token': csrfToken}}
                ).then(function(response){
                    
                    preloader_off();

                    var item =response.data;
    
                    if(item.error){
                        Swal.fire('Great Job !','Share certification upload successfully!','success');
    
                        $('#uploadShareCertificationModel').modal('hide');
                        setTimeout(location.reload.bind(location), 1500);
                    }else{

                        preloader_off();
                        $('#uploadShareCertificationModel').modal('hide');
                        Swal.fire('Sorry !','Document upload faild!','error');
                    } 
                })
                .catch(function(){
                    
                    preloader_off();
                    $('#uploadShareCertificationModel').modal('hide');
                    Swal.fire('Sorry !','Document upload faild!','error');
                });
            }
        });

        $('.uploadBankSlipButton').click(function(e){
            $('#uploadBankSlipModel').modal('show');
        });

        $('#formuploadBankSlip').submit(function(e) {
            e.preventDefault();
            if ( $(this).parsley().isValid() ) {
                
                preloader_init();

                var csrfToken = "{{ csrf_token() }}";
    
                const form = document.getElementById('formuploadBankSlip');
                let formData = new FormData(form);
    
                axios.post(SITE_URL+'subscription/formuploadBankSlip',formData,{
                        headers: {
                            'Content-Type': 'multipart/form-data',
                            'X-CSRF-Token': csrfToken}}
                ).then(function(response){
                    
                    preloader_off();

                    var item =response.data;
    
                    if(item.error){
                        Swal.fire('Great Job !','Bank slip document uploaded successfully!','success');
    
                        $('#uploadBankSlipModel').modal('hide');
                        setTimeout(location.reload.bind(location), 1500);
                    }else{
                        $('#uploadBankSlipModel').modal('hide');
                        Swal.fire('Sorry !','Document upload faild!','error');
                    } 
                })
                .catch(function(){
    
                    $('#uploadBankSlipModel').modal('hide');
                    Swal.fire('Sorry !','Document upload faild!','error');
                });
            }
        });

        $('.uploadDocLink').click(function(e){
            $('#formupdatepassport')[0].reset();
            $('#updatepassportDataModel').modal('show');
    
            var source_id = $(this).attr("get-ss-id");
            $("#ss_att_id").val(source_id);
        });

        $('#formupdatepassport').submit(function(e) {
            e.preventDefault();
            if ( $(this).parsley().isValid() ) {
                
                preloader_init();

                var csrfToken = "{{ csrf_token() }}";
    
                const form = document.getElementById('formupdatepassport');
                let formData = new FormData(form);
    
    
                axios.post(SITE_URL+'subscription/documentUpload',formData,{
                        headers: {
                            'Content-Type': 'multipart/form-data',
                            'X-CSRF-Token': csrfToken}}
                ).then(function(response){
                    
                    preloader_off();

                    var item =response.data;
    
                    if(item.error){
    
                        Swal.fire('Great Job !','Document upload successfully!','success');
    
    
                        $('#formupdatepassport')[0].reset();
                        $('#updatepassportDataModel').modal('hide');
    
                        setTimeout(location.reload.bind(location), 1500);
                    }else{
    
                        $('#updatepassportDataModel').modal('hide');
                        Swal.fire('Sorry !','Document upload faild!','error');
                    } 
                })
                .catch(function(){
    
                    $('#updatepassportDataModel').modal('hide');
                    Swal.fire('Sorry !','Document upload faild!','error');
                });
            }
        });

        $('.uploadsignedAppModel').click(function(e){
            $('#uploadsignedAppModel').modal('show');
    
        });

        $('#formupdatesignedApp').submit(function(e) {
            e.preventDefault();
            if ( $(this).parsley().isValid() ) {
                
                preloader_init();

                var csrfToken = "{{ csrf_token() }}";
    
                const form = document.getElementById('formupdatesignedApp');
                let formData = new FormData(form);
    
    
                axios.post(SITE_URL+'subscription/documentUpload16',formData,{
                        headers: {
                            'Content-Type': 'multipart/form-data',
                            'X-CSRF-Token': csrfToken}}
                ).then(function(response){
                    
                    preloader_off();

                    var item =response.data;
    
                    if(item.error){
    
                        Swal.fire('Great Job !','Document upload successfully!','success');
    
    
                        $('#formupdatepassport')[0].reset();
                        $('#uploadsignedAppModel').modal('hide');
    
                        setTimeout(location.reload.bind(location), 1500);
                    }else{
    
                        $('#uploadsignedAppModel').modal('hide');
                        Swal.fire('Sorry !','Document upload faild!','error');
                    } 
                })
                .catch(function(){
    
                    $('#uploadsignedAppModel').modal('hide');
                    Swal.fire('Sorry !','Document upload faild!','error');
                });
            }
        });

        $(document).on("click","#reinvestmentGenerate",function() {
            
            var sub_id = "{{ $subscription->id }}";
            
            Swal.fire({
                title: "Are you sure?",
                text: "Please Enter Investment ID:",
                input: 'text',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
                inputValidator: (value) => {
                    if (!value) {
                        return 'Please enter investment ID ex:MCILIOC'
                    }
                }
            }).then((result) => {
                if (result.value) {
                    
                    preloader_init();
                    
                    var invest_id = result.value;
                    var invest_no = invest_id.toUpperCase(); 
                    axios.get(SITE_URL+'subscription/autoGenerateInvestment?sub_id='+sub_id+"&investment_id="+invest_no).then(function (response) {
                        
                        preloader_off();
                        Swal.fire('Great Job !','The investment cloned successfully!','success');
                        setTimeout(location.reload.bind(location), 3500);
                    })
                    .catch(function (error) {
                        preloader_off();
                        
                        Swal.fire('Sorry!','Data retrieve problam, please try after some time !!!','error');
                    }); 
                }
            });
        });

        /*********************************************/
    
        $(document).on("click",".get-bank-investment",function() {
            $('#editBankModel').modal('show');
        });

        $('#form-bank-edit').submit(function(e) {
            e.preventDefault();
            if ( $(this).parsley().isValid() ) {
                
                preloader_init();

                var csrfToken = "{{ csrf_token() }}";
    
                const form = document.getElementById('form-bank-edit');
                let formData = new FormData(form);
    
                formData.set('id', <?= $subscription->id ?>);
    
                axios.post(SITE_URL+'subscription/ajaxIBankEditSave',formData,{
                        headers: {
                            'Content-Type': 'multipart/form-data',
                            'X-CSRF-Token': csrfToken}}
                ).then(function(response){
                    
                    preloader_off();

                    var item =response.data.data;
                    if(item != "null"){
                        
                        Swal.fire('Great Job !','Bank details updated successfully!','success');
                        $('#editBankModel').modal('hide');
                        setTimeout(location.reload.bind(location), 1500);
                    }else{
                        Swal.fire('Sorry !','Bank details update faild!','error');
                    } 
                })
                .catch(function(){
                    Swal.fire('Sorry !','Bank details update faild!','error');
                });
            }
        });

        $('#country_id').change(function(){
            $.ajax({
                url: SITE_URL+'selectBoxStateList?country_id='+$(this).val(),
                type:"GET",
                success: function(data) {
                    //var json = JSON.parse(data);
                    $('#state_id').empty();
                    for(var i = 0; i < data.length;i++){
                        $('#state_id').append('<option value="'+data[i].id+'">'+data[i].name+'</option>');
                    }
                }
            });

        });

        $.ajax({
            url: SITE_URL+'selectBoxStateList?country_id='+$("#country_id").val(),
            type:"GET",
            success: function(data) {
                //var json = JSON.parse(data);
                var default_state = "{{ $subscription->state_id }}";

                $('#state_id').empty();
                for(var i = 0; i < data.length;i++){
                    $('#state_id').append('<option value="'+data[i].id+'" >'+data[i].name+'</option>');
                }

                $('#state_id').val(default_state);
            }
        });

        
        $('#redemptionButton').click(function(e){
            $('#formRedemption')[0].reset();
            $('#redemptionModal').modal('show');
            
        });
        $('#redemption_status').change(function(){
            if($(this).val() == 1){
                $('#reasons_div').hide();
            }else{
                $('#reasons_div').show();   
            }
        });

        if($('#redemption_status').val() == 1){
            $('#reasons_div').hide();
        }else{
            $('#reasons_div').show();   
        }

        $('#formRedemption').submit(function(e) {
            e.preventDefault();
            if ( $(this).parsley().isValid() ) {
                
                preloader_init();

                var csrfToken = "{{ csrf_token() }}";

                const form = document.getElementById('formRedemption');
                let formData = new FormData(form);

                $('#redemptionModal').modal('hide');
                
                axios.post(SITE_URL+'subscription/redemptionUpdate',formData,{
                        headers: {
                            'Content-Type': 'multipart/form-data',
                            'X-CSRF-Token': csrfToken}}
                ).then(function(response){

                    preloader_off();
                    
                    var item =response.data;

                    if(item.error){

                        Swal.fire('Great Job !','Redemption form status change successfully, and email sent!','success');

                        $('#formRedemption')[0].reset();
                        $('#redemptionModal').modal('hide');

                        setTimeout(location.reload.bind(location), 3500);
                    }else{

                        $('#redemptionModal').modal('hide');
                        Swal.fire('Sorry !','Redemption Form status change faild!','error');
                    } 
                })
                .catch(function(){

                    $('#redemptionModal').modal('hide');
                    Swal.fire('Sorry !','Redemption Form status change faild!','error');
                });
            }
        });

    </script>


    <?php 
        function month_name($month_number){
            return date('F', mktime(0, 0, 0, $month_number, 10));
        }

        function month_end_date($year, $month_number){
            return date("t", strtotime("$year-$month_number-0"));
        }

        function zero_pad($number){
            if($number < 10)
                return "0$number";
            
            return "$number";
        }
        
        function get_quarters2($start_date, $end_date){
            
            $quarters = array();
            
            $start_month = date( 'm', strtotime($start_date) );
            $start_year = date( 'Y', strtotime($start_date) );
            
            $end_month = date( 'm', strtotime($end_date) );
            $end_year = date( 'Y', strtotime($end_date) );
            
            $start_quarter = ceil($start_month/3);
            $end_quarter = ceil($end_month/3);

            $quarter = $start_quarter; 

            for( $y = $start_year; $y <= $end_year; $y++ ){
                if($y == $end_year)
                    $max_qtr = $end_quarter;
                else
                    $max_qtr = 4;
                
                for($q=$quarter; $q<=$max_qtr; $q++){
                    
                    $current_quarter = new stdClass();
                    
                    $end_month_num = zero_pad($q * 3);
                    $start_month_num = ($end_month_num - 2);

                    $q_start_month = month_name($start_month_num);
                    $q_end_month = month_name($end_month_num);
                    
                    //$current_quarter->period = "Qtr $q ($q_start_month - $q_end_month) $y";
                    $current_quarter->start_month = $q_start_month;
                    $current_quarter->end_month = $q_end_month;
                    $current_quarter->year = $y;
                    $current_quarter->period_start = "$y-$start_month_num-01"; 
                    $current_quarter->period_end = "$y-$end_month_num-" . month_end_date($y, $end_month_num);
                    
                    $quarters[] = $current_quarter;
                    unset($current_quarter);
                }

                $quarter = 1;
            }
            return $quarters;
        }
    ?>

@stop