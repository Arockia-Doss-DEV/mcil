@extends('layouts.app')

@section('title', 'Company Subscription View ')

@section('styles')

@stop

@section('content')

<div class="container-fluid page-body-wrapper">

    @include("company.elements.sidebar")

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="d-flex justify-content-between">
                <div class="pageheader">
                    <h4>INVESTMENT DETAILS
                        <?php if($subscription->reinvestment_request ==1){ ?>
                            <span class="text-danger">(Applied for re-investment)</span>
                        <?php } ?>
                        <?php if($subscription->reinvestment_status ==1){ ?>
                            <span class="text-success">(Re-investment created)</span>
                        <?php } ?>
                        
                        <?php if($subscription->redemption_request ==1){ ?>
                            <?php if($subscription->redemption_status ==0){ ?>
                                <span class="text-success">(Redemption Form Requested)</span> 
                            <?php }else if($subscription->redemption_status ==1){ ?>
                                <span class="text-success">(Redemption Form Approved)</span> 
                            <?php }else if($subscription->redemption_status ==2){ ?>
                                <span class="text-success">(Redemption Form Rejected)</span> 
                            <?php } ?>   
                        <?php } ?>
                    </h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb no-bg custom-breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Investment</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Investment Details</li>
                        </ol>
                    </nav>
                </div>
                <div class="d-flex">
                    <div class="go-back">
                        <a href="{{ url('/company/subscriptions') }}"><img src="{{ asset('assets/images/icons/back-icon.png') }}"
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
                                        
                                        <div class="row my-3 pl-2">

                                            <?php if($subscription->draft != 1){ ?>
                                                <?php if($subscription->enable_signeddoc ==1){ ?>

                                                    <?php if(!empty($subscription->signeddoc_file) && ($subscription->signeddoc_file != "Array")){  ?>
                                                        <a href="{{ asset(Storage::url('')); }}/<?= $subscription->signeddoc_file ?>" target="_blank" class="btn btn-info btn-rounded btn-fw mt-1 mr-1">Download Signed Application</a>
                                                    
                                                    <?php }else if(!empty($subscription->signed_pdf)){ ?>
                                                        <a href="{{ asset('/') }}pdf/docs/signedInstruction/<?php echo $subscription->signed_pdf; ?>" target="_blank" class="btn btn-info btn-rounded btn-fw mt-1 mr-1">Download Signed Application</a>
                                                    <?php }else{ ?>
                                                       <a href="{{ url('/company/signedApplication', $subscription->id) }}" target="_blank" class="btn btn-info btn-rounded btn-fw mt-1 mr-1">Download Signed Application</a> 
                                                    <?php } ?>


                                                <?php }else if(!empty($subscription->signed_pdf)){ ?> 
                                                    <a href="{{ asset('/') }}pdf/docs/signedInstruction/<?php echo $subscription->signed_pdf; ?>" target="_blank" class="btn btn-info btn-rounded btn-fw mt-1 mr-1">Download Signed Application</a>

                                                <?php }else{ ?>
                                                    <a href="{{ url('/company/signedApplication', $subscription->id) }}" target="_blank" class="btn btn-info btn-rounded btn-fw mt-1 mr-1">Download Signed Application</a>                    
                                                <?php } ?>

                                                <?php if($subscription->status != 0){ ?>
                                                    <a href="{{ url('/company/bankInstruction', $subscription->id) }}"  target="_blank" class="btn btn-info btn-rounded btn-fw mt-1 mr-1">Download Bank Instruction Form</a>
                                                <?php } ?>   
                                                
                                                <?php if($subscription->status ==3){ ?>
                                                    <a href="{{ url('/company/pfia', $subscription->id) }}" value="download-signed-application" target="_blank" class="btn btn-info btn-rounded btn-fw mt-1 mr-1">Download PFIA</a>
                                                <?php } ?>  
                                                
                                                <?php if($subscription->enable_sharecertificate ==1){ ?>
                                                    <a href="{{ asset(Storage::url('')); }}/<?= $subscription->sharecertificate_file ?>" target="_blank" class="btn btn-info btn-rounded btn-fw mt-1 mr-1">Download Share Certificate</a>
                                                <?php } ?>                                
                                            <?php } ?>

                                        </div>

                                        <div class="d-flex justify-content-between align-items-center mt-2">

                                            <div>
                                                <h5 class="font-weight-bold mb-3">Investment Details :</h5>
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
                                                    </tr>

                                                    <?php
                                                            $i++; 
                                                            }

                                                        } else {

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
   
                                                <a type="button" href="javascript:void(0);" class="table-view-card mr-1" id="changeBankButton" attr-sub_id="<?= $subscription->id; ?>"><i class="fas fa-pencil-alt skyblue-color"></i></a>
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
                                                <?= $subscription->bankac_updated_date == null ? '-' : $subscription->bankac_updated_date ?>
                                                    
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

                                                <?php if($ssAttachments->attachment_type == 22): ?>
                                                    <div class="row pl-2">
                                                        <div class="col-lg-6"> 
                                                            <a href=""><img src="{{ asset('assets/images/icons/pdf-icon.png') }}" />Bank Statement</a>
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
                                                    echo !empty($subscription->tr_addr_line_2) ? $subscription->tr_addr_line_2 . ', ' : '';
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

                                        {{-- <div class="downloadfileblock mt-3">
                                            <div class="row pl-2">
                                                <div class="col-lg-6">Manual Signed Application</div>
                                                <div class="col-lg-3"> 
                                                    <button type="button" class="btn btn-soft-info uploadSignedApplicationButton" style="cursor:pointer;">Upload </button>
                                                </div>

                                                <div class="col-lg-6">Share Certificate</div>
                                                <div class="col-lg-3"> 
                                                    <button type="button" class="btn btn-soft-info uploadShareCertificationButton" style="cursor:pointer;">Upload </button>
                                                </div>

                                            </div>
                                        </div> --}}

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
                                                        
                                                        {{-- <div class="col-lg-2"> 
                                                            <button class="btn btn-soft-success uploadDocLink" style="cursor:pointer;" get-ss-id="<?= $ssAttachments->id ?>">Re-upload</button> 
                                                        </div> --}}

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

            <!-- changeBankModal modal -->
            <div class="modal fade" id="changeBankModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Upload Document</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        {{ Form::open(['url' => ['company/view/subscription','id'=>$subscription->id], 'id'=>'formChangeBank', 'class'=>'', 'files' => true, 'data-parsley-validate', 'autocomplete'=>"off"]) }}

                            <input type="hidden" name="sub_att_id" id="sub_att_id">

                            <div class="modal-body">

                                <div class="row">

                                    <div class="col-md-12 mb-3">
                                        <?php if($subscription->fund_type == 1){ ?>
                                            <a href="{{ asset('/') }}img/docs/MCIL-Change_of_bank_letter_request.docx" download> 1. Download bank account change request form</a>
                                        <?php }else if($subscription->fund_type == 2){ ?>
                                            <a href="{{ asset('/') }}img/docs/mcil2/MCIL-Change_of_bank_letter_request.docx" download> 1. Download bank account change request form</a>
                                        <?php }else if($subscription->fund_type == 3){ ?>
                                            <a href="{{ asset('/') }}img/docs/mcil3/MCIL-Change_of_bank_letter_request.docx" download> 1. Download bank account change request form</a>
                                        <?php } ?>
                                    </div>

                                     <div class="col-md-12 mb-3">
                                        <span class="text-danger">2. Please fill and upload</span>
                                    </div>

                                    <div class="col-lg-12 company-reupload">
                                        <input type="file" name="attachment" class="dropify" id="attachment" data-max-file-size="2M" data-allowed-file-extensions="pdf xlsx docx" data-parsley-errors-container="#uploadDoc1-errors" required />
                                    </div>
                                    <span id="uploadDoc1-errors"></span>

                                    <div class="col-md-12 mb-3"><br>
                                        <span class="text-danger">3. Please upload bank statement</span>
                                    </div>

                                    <div class="col-lg-12 company-reupload">
                                        <input type="file" name="bank_statement" class="dropify" id="bank_statement" data-max-file-size="2M" data-allowed-file-extensions="png jpg jpeg pdf xlsx docx xlx csv" data-parsley-errors-container="#uploadDoc2-errors" required />
                                    </div>
                                    <span id="uploadDoc2-errors"></span>
                                    
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

        $(function () {
            $('#datepicker').datepicker({
                dateFormat: 'mm/dd/yyyy',
                todayHighlight: true
            });
        });

        $('#changeBankButton').click(function(e){
            $('#formChangeBank')[0].reset();
            $('#changeBankModal').modal('show');
            
            var source_id = $(this).attr("attr-sub_id");
            $("#sub_att_id").val(source_id);
        });
        
        $('#formChangeBank').submit(function(e) {
            e.preventDefault();
            if ( $(this).parsley().isValid() ) {
                
                preloader_init();

                var csrfToken = "{{ csrf_token() }}";

                const form = document.getElementById('formChangeBank');
                let formData = new FormData(form);

                $('#changeBankModal').modal('hide');
                
                axios.post(SITE_URL+'company/changeBankDetailsUpload',formData,{
                        headers: {
                            'Content-Type': 'multipart/form-data',
                            'X-CSRF-Token': csrfToken}}
                ).then(function(response){

                    preloader_off();
                    
                    var item =response.data;

                    if(item.error){

                        Swal.fire('Great Job !','You have uploaded bank account form successfully, MCIL team will verify the bank account form!','success');

                        $('#formChangeBank')[0].reset();
                        $('#changeBankModal').modal('hide');

                        setTimeout(location.reload.bind(location), 3500);
                    }else{

                        $('#changeBankModal').modal('hide');
                        Swal.fire('Sorry !','Bank account form upload faild!','error');
                    } 
                })
                .catch(function(){

                    $('#changeBankModal').modal('hide');
                    Swal.fire('Sorry !','Bank account form upload faild!','error');
                });
            }
        });


        $(document).on("click",".deletebankaccount",function() {
            
            var ss_id = $(this).attr('attr-bankaccount-id');
            Swal.fire({
                title: 'Are you sure?',
                text: "Please confirm delete bank account details!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.value) {
                    
                    axios.get(SITE_URL+'company/uploadAttachImageRemove/'+ss_id).then(function (response) {
                        Swal.fire('Great Job !','You bank account details delete successfully...','success');
                        setTimeout(location.reload.bind(location), 1500);
                    })
                    .catch(function (error) {
                        Swal.fire('Sorry!','Data retrieve problam, please try after some time !!!','error');
                    }); 
                    
                }
            });

        });  


        $(document).on("click",".deleteBeneficiary",function() {
            
            var ss_id = $(this).attr('attr-beneficiary-id');
            Swal.fire({
                title: 'Are you sure?',
                text: "Please confirm delete beneficiary details!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes'
            }).then((result) => {
                if (result.value) {
                    
                    axios.get(SITE_URL+'company/uploadAttachImageRemove/'+ss_id).then(function (response) {
                        Swal.fire('Great Job !','You beneficiary details delete successfully...','success');
                        setTimeout(location.reload.bind(location), 1500);
                    })
                    .catch(function (error) {
                        Swal.fire('Sorry!','Data retrieve problam, please try after some time !!!','error');
                    }); 
                    
                }
            });

        });    
    </script>
@stop