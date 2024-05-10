@extends('layouts.app')

@section('title', 'Subscription View')

@section('content')

<div class="container-fluid page-body-wrapper">

	@include("individual.elements.sidebar")

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
                            <li class="breadcrumb-item"><a href="#">Investment</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Investment Details</li>
                        </ol>
                    </nav>
                </div>
                <div class="d-flex">
                    <div class="go-back">
                        <a href="{{ url('/individual/subscriptions') }}"><img src="{{ asset('assets/images/icons/back-icon.png') }}"
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
                                    <a class="nav-item nav-link" id="nav-contact-tab1" data-toggle="tab"
                                        href="#nav-contact1" role="tab" aria-controls="nav-contact1"
                                        aria-selected="false">Beneficiary/Joint Account</a>
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
				                                       <a href="{{ url('/individual/signedApplication', $subscription->id) }}" target="_blank" class="btn btn-info btn-rounded btn-fw mt-1 mr-1">Download Signed Application</a> 
				                                    <?php } ?>


				                                <?php }else if(!empty($subscription->signed_pdf)){ ?> 
				                                    <a href="{{ asset('/') }}pdf/docs/signedInstruction/<?php echo $subscription->signed_pdf; ?>" target="_blank" class="btn btn-info btn-rounded btn-fw mt-1 mr-1">Download Signed Application</a>

				                                <?php }else{ ?>
				                                    <a href="{{ url('/individual/signedApplication', $subscription->id) }}" target="_blank" class="btn btn-info btn-rounded btn-fw mt-1 mr-1">Download Signed Application</a>                    
				                                <?php } ?>

				                                <?php if($subscription->status != 0){ ?>
				                                    <a href="{{ url('/individual/bankInstruction', $subscription->id) }}"  target="_blank" class="btn btn-info btn-rounded btn-fw mt-1 mr-1">Download Bank Instruction Form</a>
				                                <?php } ?>   
				                                
				                                <?php if($subscription->status ==3){ ?>
				                                    <a href="{{ url('/individual/pfia', $subscription->id) }}" value="download-signed-application" target="_blank" class="btn btn-info btn-rounded btn-fw mt-1 mr-1">Download PFIA</a>
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
                                            <div class="col-lg-8 col-6"><span class="text-muted"><?= $subscription->has('individual') ? $subscription->individual->salutation : '' ?>  <?= $subscription->has('user') ? $subscription->user->first_name : '' ?></span>
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


                                    @if ($maturity_exps->count() > 0)

                                    <div class="mt-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h5 class="font-weight-bold mb-3">Maturing investment details :</h5>
                                            </div>
                                        </div>
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

                                                    <?php 
                                                           
                                                        foreach($maturity_exps as $maturity_exp){ ?>
                                                        <tr>
                                                            <td class="text-muted"><?php 
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
                                                            <td class="text-muted"><?= $maturity_exp->initial_investment ?></td>
                                                            <td class="text-muted"><?php
                                                                    if(!empty($maturity_exp->commence_date)){
                                                                        
                                                                        echo date('Y-M-d', strtotime($maturity_exp->commence_date));
                                                                    }else{
                                                                        echo "-";
                                                                    } ?></td>
                                                            <td class="text-muted"><?php
                                                                    if(!empty($maturity_exp->maturity_date)){
                                                                    
                                                                        echo date('Y-M-d', strtotime($maturity_exp->maturity_date));
                                                                    }else{
                                                                        echo "-";
                                                                    } ?></td>
                                                            <td class="text-muted"><span class="btn btn-bold btn-sm btn-font-sm  btn-label-success">
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
                                                                        }else if($maturity_exp->status ==7){
                                                                            echo "Premature Redemption";
                                                                        }
                                                                    }else{
                                                                        echo "Draft";   
                                                                    }
                                                                ?></span> 
                                                            </td>
                                
                                                            <td>
                                                                <?php 
                                                                    if($maturity_exp->redemption_status == 0){
                                                                        if($maturity_exp->reinvestment_request == 1){ ?>
                                                                            <span class="text-info"> Re-investment Request Sent</span>
                                                                        <?php }elseif($maturity_exp->reinvestment_status == 1){ ?>
                                                                            <span class="text-info"> Re-investment Created</span>
                                                                        <?php }else{ ?>
                                                                            <!-- //echo $this->Html->link(__('Re-Investment'), ['action'=>'reinvestmentCreate', $maturity_exp['id']], ['escape'=>false, 'class'=>'btn btn-primary mt-1 mr-1', 'title'=> 'Re-Investment', 'id'=> 'reinvestmentCreate', 'above_investment_count' => $above_investment_count]); -->
                                                                            
                                                                            
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

                                    @endif


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
                                    

                                    <br>
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

                                        <?php if($user->role_id == 2): ?>
                                            <div class="row mt-4">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Name</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="font-weight-bold"><?= $subscription->has('individual') ? $subscription->individual->salutation : '' ?>  <?= $user->first_name ;?></span>
                                                </div>
                                            </div>
                                            <div class="row mt-4">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Type of Member</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted">Individual /
                                                        Self Employment</span>
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
                                                    <h6>Passport</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted"><?= $subscription->has('individual') ? $subscription->individual->passport : '' ?></span>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Date of Birth</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted">
                                                <?php
                                                if(!empty($user->individual->dob)){
                                                    echo $user->has('individual') ? date('d M, Y', strtotime($user->individual->dob)) : '';
                                                
                                                } ?></span>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Gender</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted"><?= $subscription->has('individual') ? $subscription->individual->gender : '' ?></span>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Employer Name</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted"><?= $user->has('individual') ? $user->individual->employer_name : '' ?></span>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Occupation</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted"><?= $user->has('individual') ? $user->individual->occupation : '' ?></span>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Country of Residence</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted"><?= $subscription->has('individual') ? $subscription->individual->IndiResidence->name : '' ?></span>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Nationality</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted"><?= $subscription->has('individual') ? $subscription->individual->IndiNationality->name : '' ?></span>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Address</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted"><?= $user->address_line1;?>, <?= !empty($user->address_line2) ? $user->address_line2 . ", " : '' ?> <?= $user->has('individual') ? $subscription->user->stateAs->name : '' ?>, <?= $user->has('individual') ? $subscription->user->countryAs->name : '' ?>, <?= $user->post_code;?> </span>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Annual Income</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted">
                                                        < <?= $user->has('individual') ? $user->individual->annual_income : '' ?></span>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Source of Wealth</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted">
                                                    <?= $user->has('individual') ? $user->individual->source_wealth : '' ?>
                                                     <?= $user->has('individual') ? $user->individual->source_wealth_other : '' ?>    
                                                    </span>
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

                                        <?php endif ?>

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

                                        <?php if (!$subscription->SsAttachments->isEmpty()): ?>
                                        <?php foreach ($subscription->SsAttachments as $ssAttachments): ?>
                                            
                                            <div class="downloadfileblock">
                                                <?php if($ssAttachments->attachment_type == 21): ?>
                                                    <div class="row pl-2">
                                                        <div class="col-lg-6"> 
                                                            <a href="#"><img src="{{ asset('assets/images/icons/pdf-icon.png') }}" />Bank Account File</a>
                                                        </div>
                                                        <div class="col-lg-3"> <a href="{{ asset(Storage::url('')); }}/<?= $ssAttachments->attachment ?>" class="btn btn-soft-info" target="_blank" download>Download</a></div>
                                                        <div class="col-lg-3"> <a href="{{ asset(Storage::url('')); }}/<?= $ssAttachments->attachment ?>" class="btn btn-soft-success" target="_blank">Open</a> </div>
                                                    </div>
                                                <?php endif; ?>

                                                <?php if($ssAttachments->attachment_type == 22): ?>
                                                    <div class="row pl-2">
                                                        <div class="col-lg-6"> 
                                                            <a href="#"><img src="{{ asset('assets/images/icons/pdf-icon.png') }}" />Bank Statement</a>
                                                        </div>
                                                        <div class="col-lg-3"> <a href="{{ asset(Storage::url('')); }}/<?= $ssAttachments->attachment ?>" class="btn btn-soft-info" target="_blank" download>Download</a></div>
                                                        <div class="col-lg-3"> <a href="{{ asset(Storage::url('')); }}/<?= $ssAttachments->attachment ?>" class="btn btn-soft-success" target="_blank">Open</a> </div>
                                                    </div>
                                                <?php endif; ?>
                                            </div>

                                        <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>

                                    <?php } ?>

                                </div>


                                <div class="tab-pane fade" id="nav-contact1" role="tabpanel" aria-labelledby="nav-contact-tab1">

                                    <div>

                                        <h5 class="font-weight-bold mb-3">Beneficiary :</h5>

                                        <?php if($subscription->beneficiary_seq == 1){ ?>
                                            <div class="row mt-4">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Beneficiary 1's amount</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted">
                                                    <?= number_format($subscription->b1_beneficiary_amount) ?> %
                                                </span>
                                                </div>
                                            </div>

                                        <?php } else if($subscription->beneficiary_seq == 2){ ?>

                                            <div class="row mt-4">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Beneficiary 1's amount</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted">
                                                    <?= number_format($subscription->b1_beneficiary_amount) ?> %
                                                </span>
                                                </div>
                                            </div>

                                            <div class="row mt-4">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Beneficiary 2's amount</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted">
                                                    <?= number_format($subscription->b2_beneficiary_amount) ?> %
                                                </span>
                                                </div>
                                            </div>
                                        <?php } ?>

                                        <br>
                                    </div>

                                    <?php if($subscription->beneficiary_seq == 1){ ?>  


                                        <div class="mt-3">
                                        
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h5 class="font-weight-bold mb-3">Name and Particulars of Beneficiary 1 :</h5>
                                                </div>
                                                <div>
                                                    <a type="button" href="javascript:void(0);" class="table-view-card mr-1" id="beneficiary1Button" attr-sub_id="<?= $subscription->id; ?>"><i class="fas fa-pencil-alt skyblue-color"></i></a>
                                                </div>
                                            </div>

                                            <div class="row mt-4">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Name </h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted"><?= $subscription->b1_name ?></span>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Beneficiary 1's Amount</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted"><?= number_format($subscription->b1_beneficiary_amount) ?> %</span>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>NRIC/Passport No.</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted"><?= $subscription->b1_nric_passport ?></span>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Email</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span
                                                        class="text-muted"><?= $subscription->b1_email ?></span></div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Mobile No.</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted">
                                                    +<?= $subscription->has('SubscriptionB1PhonePrefix') ? $subscription->SubscriptionB1PhonePrefix->calling_code : '' ?> <?= $subscription->b1_mobile_number ?>
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Date of Birth</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted">
                                                    <?= $subscription->b1_dob ? date('d M, Y', strtotime($subscription->b1_dob)) : '' ?></span>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Relationship</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted">
                                                    <?= $subscription->b1_relationship ?></span>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Occupation</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted">
                                                    <?= $subscription->b1_occupation ?>
                                                </span>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Country</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted"><?= $subscription->has('SubscriptionB1Country') ? $subscription->SubscriptionB1Country->name : '' ?></span>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Residence</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span
                                                        class="text-muted"><?= $subscription->has('SubscriptionB1Residence') ? $subscription->SubscriptionB1Residence->name : '' ?></span></div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Nationality</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span
                                                        class="text-muted"><?= $subscription->has('SubscriptionB1Nationality') ? $subscription->SubscriptionB1Nationality->name : '' ?></span></div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Address</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted"><?= $subscription->b1_address_line_1 ?>,
                                                <?= !empty($subscription->b1_address_line_2) ? $subscription->b1_address_line_2 . "," : '' ?>
                                                <?= $subscription->b1_city ?>,
                                                <?= $subscription->b1_postcode ?>,
                                                <?= $subscription->has('SubscriptionB1State') ? $subscription->SubscriptionB1State->name : '' ?>,
                                                <?= $subscription->has('SubscriptionB1Country') ? $subscription->SubscriptionB1Country->name : '' ?></span></div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Last Updated Date</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted">
                                                    <?= $subscription->b1_updated_date == null ? '-' : date('d M, Y', strtotime($subscription->b1_updated_date)) ?>
                                                </span>
                                                </div>
                                            </div>


                                        </div>

                                    <?php } else if($subscription->beneficiary_seq == 2){ ?>

                                        <div class="mt-3">
                                        
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h5 class="font-weight-bold mb-3">Name and Particulars of Beneficiary 1 :</h5>
                                                </div>
                                                <div>
                                                    <a type="button" href="javascript:void(0);" class="table-view-card mr-1" id="beneficiary1Button" attr-sub_id="<?= $subscription->id; ?>"><i class="fas fa-pencil-alt skyblue-color"></i></a>
                                                </div>
                                            </div>

                                            <div class="row mt-4">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Name </h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted"><?= $subscription->b1_name ?></span>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Beneficiary 1's Amount</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted"><?= number_format($subscription->b1_beneficiary_amount) ?> %</span>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>NRIC/Passport No.</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted"><?= $subscription->b1_nric_passport ?></span>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Email</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span
                                                        class="text-muted"><?= $subscription->b1_email ?></span></div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Mobile No.</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted">
                                                    +<?= $subscription->has('SubscriptionB1PhonePrefix') ? $subscription->SubscriptionB1PhonePrefix->calling_code : '' ?> <?= $subscription->b1_mobile_number ?>
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Date of Birth</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted">
                                                    <?= $subscription->b1_dob ? date('d M, Y', strtotime($subscription->b1_dob)) : '' ?></span>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Relationship</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted">
                                                    <?= $subscription->b1_relationship ?></span>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Occupation</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted">
                                                    <?= $subscription->b1_occupation ?>
                                                </span>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Country</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted"><?= $subscription->has('SubscriptionB1Country') ? $subscription->SubscriptionB1Country->name : '' ?></span>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Residence</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span
                                                        class="text-muted"><?= $subscription->has('SubscriptionB1Residence') ? $subscription->SubscriptionB1Residence->name : '' ?></span></div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Nationality</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span
                                                        class="text-muted"><?= $subscription->has('SubscriptionB1Nationality') ? $subscription->SubscriptionB1Nationality->name : '' ?></span></div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Address</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted"><?= $subscription->b1_address_line_1 ?>,
                                                <?= !empty($subscription->b1_address_line_2) ? $subscription->b1_address_line_2 . "," : '' ?>
                                                <?= $subscription->b1_city ?>,
                                                <?= $subscription->b1_postcode ?>,
                                                <?= $subscription->has('SubscriptionB1State') ? $subscription->SubscriptionB1State->name : '' ?>,
                                                <?= $subscription->has('SubscriptionB1Country') ? $subscription->SubscriptionB1Country->name : '' ?></span></div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Last Updated Date</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted">
                                                    <?= $subscription->b1_updated_date == null ? '-' : date('d M, Y', strtotime($subscription->b1_updated_date)) ?>
                                                </span>
                                                </div>
                                            </div>
                                        
                                        </div>

                                        <div class="mt-3">
                                        
                                            <div class="d-flex justify-content-between align-items-center">
                                                <div>
                                                    <h5 class="font-weight-bold mb-3">Name and Particulars of Beneficiary 2 :</h5>
                                                </div>
                                                <div>
                                                    <a type="button" href="javascript:void(0);" class="table-view-card mr-1" id="beneficiary2Button" attr-sub_id="<?= $subscription->id; ?>"><i class="fas fa-pencil-alt skyblue-color"></i></a>
                                                </div>
                                            </div>

                                            <div class="row mt-4">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Name </h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted"><?= $subscription->b2_name ?></span>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Beneficiary 1's Amount</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted"><?= number_format($subscription->b2_beneficiary_amount) ?> %</span>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>NRIC/Passport No.</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted"><?= $subscription->b2_nric_passport ?></span>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Email</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span
                                                        class="text-muted"><?= $subscription->b2_email ?></span></div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Mobile No.</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted">
                                                    +<?= $subscription->has('SubscriptionB2PhonePrefix') ? $subscription->SubscriptionB2PhonePrefix->calling_code : '' ?><?= $subscription->b2_mobile_number ?>
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Date of Birth</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted">
                                                    <?= $subscription->b2_dob ? date('d M, Y', strtotime($subscription->b2_dob)) : '' ?></span>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Relationship</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted">
                                                    <?= $subscription->b2_relationship ?></span>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Occupation</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted">
                                                    <?= $subscription->b2_occupation ?>
                                                </span>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Country</h6>
                                                </div>
                                                <div class="col-lg-8 col-6">
                                                    <span class="text-muted">
                                                    <?= $subscription->has('SubscriptionB2Country') ? $subscription->SubscriptionB2Country->name : '' ?>
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Residence</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted">
                                                    <?= $subscription->has('SubscriptionB2Residence') ? $subscription->SubscriptionB2Residence->name : '' ?></span>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Nationality</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted">
                                                    <?= $subscription->has('SubscriptionB2Nationality') ? $subscription->SubscriptionB2Nationality->name : '' ?>
                                                </span></div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Address</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted">
                                                    <?= $subscription->b2_address_line_1 ?>,
                                                    <?= !empty($subscription->b2_address_line_2) ? $subscription->b2_address_line_2 . "," : '' ?>
                                                    <?= $subscription->b2_city ?>,
                                                    <?= $subscription->b2_postcode ?>,
                                                    <?= $subscription->has('SubscriptionB2State') ? $subscription->SubscriptionB2State->name : '' ?>,
                                                    <?= $subscription->has('SubscriptionB2Country') ? $subscription->SubscriptionB2Country->name : '' ?>
                                                </span>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Last Updated Date</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted">
                                                    <?= $subscription->b2_updated_date == null ? '-' : $subscription->b2_updated_date ?>
                                                </span>
                                                </div>
                                            </div>
                                        </div>

                                    <?php } ?>

                                    <?php if($subscription->beneficiary_status == 1){ ?>

                                        <div class="mt-4">
                                            <h5 class="font-weight-bold mb-3">Beneficiary Change Files :</h5>

                                            <?php if (!$subscription->SsAttachments->isEmpty()): ?>
                                            <?php foreach ($subscription->SsAttachments as $ssAttachments): ?>
                                                
                                                <div class="downloadfileblock mt-3">
                                                    <?php if($ssAttachments->attachment_type == 31): ?>
                                                        <div class="row pl-2">
                                                            <div class="col-lg-6"> 
                                                                <a href="#"><img src="{{ asset('assets/images/icons/pdf-icon.png') }}" />Beneficiary File</a>
                                                            </div>
                                                            <div class="col-lg-2"> 
                                                                <a href="{{ asset(Storage::url('')); }}/<?= $ssAttachments->attachment ?>" class="btn btn-soft-info" target="_blank" download>Download</a>
                                                            </div>
                                                            <div class="col-lg-2"> 
                                                                <a href="{{ asset(Storage::url('')); }}/<?= $ssAttachments->attachment ?>" class="btn btn-soft-success" target="_blank">Open</a> 
                                                            </div>

                                                            <div class="col-lg-2">
                                                                <button class="btn btn-danger btn-sm deleteBeneficiary" type="button" attr-beneficiary-id="<?= $ssAttachments->id ?>">Delete</button>
                                                            </div>

                                                        </div>
                                                    <?php endif; ?>
                                                </div>

                                            <?php endforeach; ?>
                                            <?php endif; ?>
                                        </div>

                                    <?php } ?>


                                    <?php if($subscription->is_joint_applicant == 1){ ?>
                                        <div class="mt-5">
                                            <h5 class="font-weight-bold mb-3">Particulars of Joint Account :</h5>
                                            <div class="row mt-4">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Name </h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted">
                                                    <?= $subscription->ja_salutation; ?> <?= $subscription->ja_name ?>
                                                </span>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Passport No.</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted">
                                                    <?= $subscription->ja_nric_passport ?></span>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Email</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted">
                                                    <?= $subscription->ja_email ?>
                                                </span></div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Mobile No.</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted">
                                                    +<?= $subscription->has('SubscriptionJaMobilePrefix') ? $subscription->SubscriptionJaMobilePrefix->calling_code : '' ?><?= $subscription->ja_mobile_no ?>
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Gender</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted">
                                                    <?= $subscription->ja_gender ?>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Date of Birth</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted">
                                                    <?= $subscription->ja_dob ? date('d M, Y', strtotime($subscription->ja_dob)) : '' ?>
                                                </span></div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Relationship</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted">Friend</span>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Occupation</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted">
                                                    <?= $subscription->ja_occupation ?>
                                                </span>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Country</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted">
                                                    <?= $subscription->has('SubscriptionJaCountry') ? $subscription->SubscriptionJaCountry->name : '' ?>
                                                </span>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Country of Residence</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted">
                                                    <?= $subscription->has('SubscriptionJaResidence') ? $subscription->SubscriptionJaResidence->name : '' ?>
                                                </span></div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Nationality</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted">
                                                    <?= $subscription->has('SubscriptionJaNationality') ? $subscription->SubscriptionJaNationality->name : '' ?>
                                                </span></div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Address</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted">
                                                    <?= $subscription->ja_addr_line_1 ?>,
                                                    <?= !empty($subscription->ja_addr_line_2) ? $subscription->ja_addr_line_2 . "," : '' ?>
                                                    <?= $subscription->ja_city ?>,
                                                    <?= $subscription->ja_postcode ?>,
                                                    <?= $subscription->has('SubscriptionJaState') ? $subscription->SubscriptionJaState->name : '' ?>,
                                                    <?= $subscription->has('SubscriptionJaCountry') ? $subscription->SubscriptionJaCountry->name : '' ?>.
                                                </span></div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Employer Name</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted">
                                                    <?= $subscription->ja_employer_name ?>
                                                </span>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Annual Income</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted">
                                                        < <?= $subscription->ja_annual_income ?></span>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-lg-3 col-6">
                                                    <h6>Source of Wealth</h6>
                                                </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted">
                                                    <?php
                                                    if(!empty($subscription->ja_source_wealth)){
                                                        echo $subscription->ja_source_wealth;    
                                                    }?> <?= $subscription->ja_source_wealth_other ?>
                                                </span></div>
                                            </div>
                                        </div>

                                    <?php } else { ?>

                                    <div class="mt-4">
                                        <h5 class="font-weight-bold mb-3"><center>Joint applicant information are not available...</center></h5>
                                    </div>

                                    <?php } ?>

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
                                                    echo !empty($subscription->tr_addr_line_2) ? $subscription->tr_addr_line_2 .', ' : '';
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

                                    </div> <br>

                                    <?php if($subscription->is_joint_applicant == 1){ ?>

                                    <div>
                                        <h5 class="font-weight-bold mb-3">Joint Applicant Taxs Residences Details :</h5>
                                        <div class="row mt-4">
                                            <div class="col-lg-3 col-6">
                                                <h6>Address </h6>
                                            </div>
                                            <div class="col-lg-8 col-6"><span class="text-muted"><?php
                                                    echo $subscription->jatr_addr_line_1 .', ';
                                                    echo !empty($subscription->jatr_addr_line_2) ? $subscription->jatr_addr_line_2 . ', ' : '';
                                                    echo $subscription->jatr_city .', ';
                                                    echo "&nbsp;";
                                                    echo $subscription->jatr_postcode .', ';
                                                    echo "&nbsp;";
                                                    echo $subscription->jatr_state_id ? $subscription->SubscriptionJaTrState->name .', ' : '';
                                                    echo "&nbsp;";
                                                    echo $subscription->jatr_country_id ? $subscription->SubscriptionJaTrCountry->name : ''; 
                                                ?>.</span>
                                            </div>
                                        </div>

                                        <div class="mt-4">
                                            <h5 class="font-weight-bold mb-3">Joint Applicant CRS/FATCA :</h5>
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
                                                            <td class="font-weight-bold"><?= $subscription->jatd1_country_id ? $subscription->SubscriptionJaTd1Country->name : '' ?> </td>
                                                            <td class="text-muted"><?= $subscription->jatd1_tax_number ?></td>
                                                            <td class="text-muted">
                                                                <?php 
                                                                    if($subscription->jatd1_tax_reason_type == 1){
                                                                        echo "Reason A";
                                                                    }else if($subscription->jatd1_tax_reason_type == 2){
                                                                        echo "Reason B";
                                                                        echo "-".$subscription->jatd1_tax_reason;

                                                                    }else if($subscription->jatd1_tax_reason_type == 3){
                                                                        echo "Reason C";
                                                                    }
                                                                ?>

                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="font-weight-bold"><?= $subscription->jatd2_country_id ? $subscription->SubscriptionJaTd2Country->name : '' ?> </td>
                                                            <td class="text-muted"><?= $subscription->jatd2_tax_number ?></td>
                                                            <td class="text-muted">
                                                                <?php 
                                                                    if($subscription->jatd2_tax_reason_type == 1){
                                                                        echo "Reason A";
                                                                    }else if($subscription->jatd2_tax_reason_type == 2){
                                                                        echo "Reason B";
                                                                        echo "-".$subscription->jatd2_tax_reason;

                                                                    }else if($subscription->jatd2_tax_reason_type == 3){
                                                                        echo "Reason C";
                                                                    }
                                                                ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="font-weight-bold"><?= $subscription->jatd3_country_id ? $subscription->SubscriptionJaTd3Country->name : '' ?> </td>
                                                            <td class="text-muted"><?= $subscription->jatd3_tax_number ?></td>
                                                            <td class="text-muted">
                                                                <?php 
                                                                    if($subscription->jatd3_tax_reason_type == 1){
                                                                        echo "Reason A";
                                                                    }else if($subscription->jatd3_tax_reason_type == 2){
                                                                        echo "Reason B";
                                                                        echo "-".$subscription->td3_tax_reason;

                                                                    }else if($subscription->jatd3_tax_reason_type == 3){
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

                                    <?php } else { ?>

                                    <div class="mt-4">
                                        <h5 class="font-weight-bold mb-3"><center>Joint applicant tax residences information are not available...</center></h5>
                                    </div>
                                    
                                    <?php } ?>

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
                                   

                                        <h5 class="font-weight-bold mb-3">Documents & Signature</h5>
                                        <div class="downloadfileblock mt-3">
                                            
                                            

                                            <?php if (!$subscription->SsAttachments->isEmpty()): ?>
                                            <?php foreach ($subscription->SsAttachments as $ssAttachments): ?>

                                                <?php if($ssAttachments->attachment_type == 1): ?>
                                                <?php if(!empty($ssAttachments->attachment)): ?>

                                                    <div class="row pl-2">
                                                        <div class="col-lg-6"> <a href="#"><img src="{{ asset('assets/images/icons/pdf-icon.png') }}" />Passport 1st Page of Principal Applicant</a></div>

                                                        <div class="col-lg-1"> 
                                                            <a href="{{ asset(Storage::url('')); }}/<?= $ssAttachments->attachment ?>" class="btn btn-soft-info" target="_blank" download>Download</a> 
                                                        </div>
                                                        <div class="col-lg-1"> 
                                                            <a href="{{ asset(Storage::url('')); }}/<?= $ssAttachments->attachment ?>" class="btn btn-soft-info" target="_blank">Open</a> 
                                                        </div>
                                                        
                                                    </div>

                                                <?php endif; ?>
                                                <?php endif; ?>

                                                <?php if($subscription->individual->nationality == 129): ?>
                                                <?php if($ssAttachments->attachment_type == 2): ?>
                                                <?php if(!empty($ssAttachments->attachment)): ?>

                                                    <div class="row pl-2">
                                                        <div class="col-lg-6"> <a href="#"><img src="{{ asset('assets/images/icons/pdf-icon.png') }}" />IC of Principal Applicant</a></div>

                                                        <div class="col-lg-1"> 
                                                            <a href="{{ asset(Storage::url('')); }}/<?= $ssAttachments->attachment ?>" class="btn btn-soft-info" target="_blank" download>Download</a> 
                                                        </div>
                                                        <div class="col-lg-1"> 
                                                            <a href="{{ asset(Storage::url('')); }}/<?= $ssAttachments->attachment ?>" class="btn btn-soft-info" target="_blank">Open</a> 
                                                        </div>
                                                        
                                                    </div>

                                                <?php endif; ?>
                                                <?php endif; ?>
                                                <?php endif; ?>

                                                <?php if($ssAttachments->attachment_type == 3): ?>
                                                <?php if(!empty($ssAttachments->attachment)): ?>

                                                    <div class="row pl-2">
                                                        <div class="col-lg-6"> <a href="#"><img src="{{ asset('assets/images/icons/pdf-icon.png') }}" /> Proof Address</a></div>

                                                        <div class="col-lg-1"> 
                                                            <a href="{{ asset(Storage::url('')); }}/<?= $ssAttachments->attachment ?>" class="btn btn-soft-info" target="_blank" download>Download</a> 
                                                        </div>
                                                        <div class="col-lg-1"> 
                                                            <a href="{{ asset(Storage::url('')); }}/<?= $ssAttachments->attachment ?>" class="btn btn-soft-info" target="_blank">Open</a> 
                                                        </div>
                                                        
                                                    </div>

                                                <?php endif; ?>
                                                <?php endif; ?>

                                                <?php if($ssAttachments->attachment_type == 4): ?>
                                                <?php if(!empty($ssAttachments->attachment)): ?>

                                                    <div class="row pl-2">
                                                        <div class="col-lg-6"> <a href="#"><img src="{{ asset('assets/images/icons/pdf-icon.png') }}" /> Passport 1st Page of Beneficiary 1</a></div>

                                                        <div class="col-lg-1"> 
                                                            <a href="{{ asset(Storage::url('')); }}/<?= $ssAttachments->attachment ?>" class="btn btn-soft-info" target="_blank" download>Download</a> 
                                                        </div>
                                                        <div class="col-lg-1"> 
                                                            <a href="{{ asset(Storage::url('')); }}/<?= $ssAttachments->attachment ?>" class="btn btn-soft-info" target="_blank">Open</a> 
                                                        </div>
                                                        
                                                    </div>

                                                <?php endif; ?>
                                                <?php endif; ?>

                                                <?php if($subscription->b1_nationality_id == 129): ?>
                                                <?php if($ssAttachments->attachment_type == 5): ?>
                                                <?php if(!empty($ssAttachments->attachment)): ?>

                                                    <div class="row pl-2">
                                                        <div class="col-lg-6"> <a href="#"><img src="{{ asset('assets/images/icons/pdf-icon.png') }}" /> IC of Beneficiary 1</a></div>

                                                        <div class="col-lg-1"> 
                                                            <a href="{{ asset(Storage::url('')); }}/<?= $ssAttachments->attachment ?>" class="btn btn-soft-info" target="_blank" download>Download</a> 
                                                        </div>
                                                        <div class="col-lg-1"> 
                                                            <a href="{{ asset(Storage::url('')); }}/<?= $ssAttachments->attachment ?>" class="btn btn-soft-info" target="_blank">Open</a> 
                                                        </div>
                                                        
                                                    </div>

                                                <?php endif; ?>
                                                <?php endif; ?>
                                                <?php endif; ?>


                                                <?php if($ssAttachments->attachment_type == 6): ?>
                                                <?php if($subscription->beneficiary_seq == 2): ?>
                                                <?php if(!empty($ssAttachments->attachment)): ?>

                                                    <div class="row pl-2">
                                                        <div class="col-lg-6"> <a href="#"><img src="{{ asset('assets/images/icons/pdf-icon.png') }}" /> Passport 1st Page of Beneficiary 2</a></div>

                                                        <div class="col-lg-1"> 
                                                            <a href="{{ asset(Storage::url('')); }}/<?= $ssAttachments->attachment ?>" class="btn btn-soft-info" target="_blank" download>Download</a> 
                                                        </div>
                                                        <div class="col-lg-1"> 
                                                            <a href="{{ asset(Storage::url('')); }}/<?= $ssAttachments->attachment ?>" class="btn btn-soft-info" target="_blank">Open</a> 
                                                        </div>
                                                        
                                                    </div>


                                                <?php endif; ?>
                                                <?php endif; ?>
                                                <?php endif; ?>

                                                <?php if($subscription->beneficiary_seq == 2): ?>
                                                <?php if($subscription->b2_nationality_id == 129): ?>
                                                <?php if($ssAttachments->attachment_type == 7): ?>
                                                <?php if(!empty($ssAttachments->attachment)): ?>

                                                    <div class="row pl-2">
                                                        <div class="col-lg-6"> <a href="#"><img src="{{ asset('assets/images/icons/pdf-icon.png') }}" /> IC of Beneficiary 2</a></div>

                                                        <div class="col-lg-1"> 
                                                            <a href="{{ asset(Storage::url('')); }}/<?= $ssAttachments->attachment ?>" class="btn btn-soft-info" target="_blank" download>Download</a> 
                                                        </div>
                                                        <div class="col-lg-1"> 
                                                            <a href="{{ asset(Storage::url('')); }}/<?= $ssAttachments->attachment ?>" class="btn btn-soft-info" target="_blank">Open</a> 
                                                        </div>
                                                        
                                                    </div>


                                                <?php endif; ?>
                                                <?php endif; ?>
                                                <?php endif; ?>
                                                <?php endif; ?>

                                                <?php if($ssAttachments->attachment_type == 8): ?>
                                                <?php if(!empty($ssAttachments->attachment)): ?>

                                                    <div class="row pl-2">
                                                        <div class="col-lg-6"> <a href="#"><img src="{{ asset('assets/images/icons/pdf-icon.png') }}" /> Passport 1st Page of Joint Applicant</a></div>

                                                        <div class="col-lg-1"> 
                                                            <a href="{{ asset(Storage::url('')); }}/<?= $ssAttachments->attachment ?>" class="btn btn-soft-info" target="_blank" download>Download</a> 
                                                        </div>
                                                        <div class="col-lg-1"> 
                                                            <a href="{{ asset(Storage::url('')); }}/<?= $ssAttachments->attachment ?>" class="btn btn-soft-info" target="_blank">Open</a> 
                                                        </div>
                                                        
                                                    </div>

                                                <?php endif; ?>
                                                <?php endif; ?>

                                                <?php if($subscription->is_joint_applicant == 1): ?>
                                                <?php if($ssAttachments->attachment_type == 9): ?>
                                                <?php if(!empty($ssAttachments->attachment)): ?>

                                                    <div class="row pl-2">
                                                        <div class="col-lg-6"> <a href="#"><img src="{{ asset('assets/images/icons/pdf-icon.png') }}" /> IC of Joint Applicant</a></div>

                                                        <div class="col-lg-1"> 
                                                            <a href="{{ asset(Storage::url('')); }}/<?= $ssAttachments->attachment ?>" class="btn btn-soft-info" target="_blank" download>Download</a> 
                                                        </div>
                                                        <div class="col-lg-1"> 
                                                            <a href="{{ asset(Storage::url('')); }}/<?= $ssAttachments->attachment ?>" class="btn btn-soft-info" target="_blank">Open</a> 
                                                        </div>
                                                        
                                                    </div>

                                                <?php endif; ?>
                                                <?php endif; ?>
                                                <?php endif; ?>

                                                <?php if($ssAttachments->attachment_type == 10): ?>
                                                <?php if(!empty($ssAttachments->attachment)): ?>

                                                    <div class="row pl-2">
                                                        <div class="col-lg-6"> <a href="#"><img src="{{ asset('assets/images/icons/pdf-icon.png') }}" /> Joint Applicant Proof Address</a></div>

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
                                        
                if(!empty($active_investment)) {

                    // dividend payouts
                    $commencement_year = [];

                    foreach ($active_investment as $key => $investment) {
                        
                        if(!empty($investment->commence_date)){
                            if(!empty($investment->maturity_date)){
                                $quartersCR = get_quarters2(date('Y-m-d', strtotime($investment->commence_date)), date('Y-m-d', strtotime($investment->maturity_date)));

                                $i = 0;
                                $per_count = 0;
                                $len = count($quartersCR);
                                foreach ($quartersCR as $value) {
                                    $dis_month = $value->start_month;
                                    $dis_year = $value->year;

                                    if ($i == 1) {

                                        $ts1 = date('Y-m-d', strtotime($investment->commence_date));
                                        $ts2 = strtotime($value->period_start);
                                        $dyear1 = date('Y', strtotime($ts1));
                                        $dyear2 = date('Y', $ts2);
                                        $dmonth1 = date('m', strtotime($ts1));
                                        $dmonth2 = date('m', $ts2);
                                        
                                        $month_count = (($dyear2 - $dyear1) * 12) + ($dmonth2 - $dmonth1);

                                        if($month_count == 3){
                                            
                                            $commencement_year[$key][$i]['investment_id'] = $investment->reference_no . $investment->refreance_id;
                                            $commencement_year[$key][$i]['investment_amount'] = $investment->initial_investment;
                                            $commencement_year[$key][$i]['full'] = "Before 15 ".$dis_month." ". $dis_year." (3%)";
                                            $commencement_year[$key][$i]['quarter'] = $dis_month." ". $dis_year;
                                            $commencement_year[$key][$i]['year'] = $dis_year;
                                            $commencement_year[$key][$i]['month'] = $dis_month;
                                            $commencement_year[$key][$i]['percentage'] = 3;
                                            $commencement_year[$key][$i]['amount'] = ($investment->initial_investment*3)/100;
                                            $per_count += 3;

                                        }else if($month_count == 2){

                                            $commencement_year[$key][$i]['investment_id'] = $investment->reference_no . $investment->refreance_id;
                                            $commencement_year[$key][$i]['investment_amount'] = $investment->initial_investment;
                                            $commencement_year[$key][$i]['full'] = "Before 15 ".$dis_month." ". $dis_year." (2%)";
                                            $commencement_year[$key][$i]['quarter'] = $dis_month." ". $dis_year;
                                            $commencement_year[$key][$i]['year'] = $dis_year;
                                            $commencement_year[$key][$i]['month'] = $dis_month;
                                            $commencement_year[$key][$i]['percentage'] = 2;
                                             $commencement_year[$key][$i]['amount'] = ($investment->initial_investment*2)/100;
                                            $per_count += 2;

                                        }else{

                                            $commencement_year[$key][$i]['investment_id'] = $investment->reference_no . $investment->refreance_id;
                                            $commencement_year[$key][$i]['investment_amount'] = $investment->initial_investment;
                                            $commencement_year[$key][$i]['full'] = "Before 15 ".$dis_month." ". $dis_year." (1%)";
                                            $commencement_year[$key][$i]['quarter'] = $dis_month." ". $dis_year;
                                            $commencement_year[$key][$i]['year'] = $dis_year;
                                            $commencement_year[$key][$i]['month'] = $dis_month;
                                            $commencement_year[$key][$i]['percentage'] = 1;
                                             $commencement_year[$key][$i]['amount'] = ($investment->initial_investment*1)/100;
                                            $per_count += 1;
                                        }
                                        
                                    } else if ($i == $len - 1) {

                                        $per_count += 3;
                                        $commencement_year[$key][$i]['investment_id'] = $investment->reference_no . $investment->refreance_id;
                                        $commencement_year[$key][$i]['investment_amount'] = $investment->initial_investment;
                                        $commencement_year[$key][$i]['full'] = "Before 15 ".$dis_month." ". $dis_year." (3%)";
                                        $commencement_year[$key][$i]['quarter'] = $dis_month." ". $dis_year;
                                        $commencement_year[$key][$i]['year'] = $dis_year;
                                        $commencement_year[$key][$i]['month'] = $dis_month;
                                        $commencement_year[$key][$i]['percentage'] = 3;
                                        $commencement_year[$key][$i]['amount'] = ($investment->initial_investment*3)/100;

                                    }else if(($i !=0)){

                                        $per_count += 3;
                                        $commencement_year[$key][$i]['investment_id'] = $investment->reference_no . $investment->refreance_id;
                                        $commencement_year[$key][$i]['investment_amount'] = $investment->initial_investment;
                                        $commencement_year[$key][$i]['full'] = "Before 15 ".$dis_month." ". $dis_year." (3%)";
                                        $commencement_year[$key][$i]['quarter'] = $dis_month." ". $dis_year;
                                        $commencement_year[$key][$i]['year'] = $dis_year;
                                        $commencement_year[$key][$i]['month'] = $dis_month;
                                        $commencement_year[$key][$i]['percentage'] = 3;
                                        $commencement_year[$key][$i]['amount'] = ($investment->initial_investment*3)/100;
                                    }

                                    $i++;
                                }
                                $len = count($quartersCR)-1;
                                $commence_dateee = strtotime($quartersCR[$len]->period_end);
                                $maturity_dateee = strtotime('+28 days', $commence_dateee);

                                if($per_count != 24){

                                    $last_val = 24 - $per_count;

                                    $commencement_year[$key][$i]['investment_id'] = $investment->reference_no . $investment->refreance_id;
                                    $commencement_year[$key][$i]['investment_amount'] = $investment->initial_investment;
                                    $commencement_year[$key][$i]['full'] = "Before 15 ".date('F', $maturity_dateee)." ". date('Y', $maturity_dateee)." (". $last_val."%)";
                                    $commencement_year[$key][$i]['quarter'] = date('F', $maturity_dateee)." ". date('Y', $maturity_dateee);
                                    $commencement_year[$key][$i]['year'] = date('Y', $maturity_dateee);
                                    $commencement_year[$key][$i]['month'] = date('F', $maturity_dateee);
                                    $commencement_year[$key][$i]['percentage'] = $last_val;
                                    $commencement_year[$key][$i]['amount'] = ($investment->initial_investment*$last_val)/100;
                                        
                                }
                                
                            }
                        }
                    }
                    
                }else{
                    echo "<tr><td colspan=5><br/><br/>".__('No Records Available')."</td></tr>";
                }
            ?>

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

                        {{ Form::open(['url' => ['individual/view/subscription','id'=>$subscription->id], 'id'=>'formChangeBank', 'class'=>'form-horizontal','files' => true, 'data-parsley-validate', 'autocomplete'=>"off"]) }}

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

            <!-- change beneficiary1Modal -->
            <div class="modal fade" id="beneficiary1Modal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Edit beneficiary details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        {{ Form::open(['url' => ['individual/view/subscription','id'=>$subscription->id], 'id'=>'formBeneficiary1', 'class'=>'', 'files' => true, 'data-parsley-validate', 'autocomplete'=>"off"]) }}

                            <input type="hidden" name="sub_att_id" id="sub_b1_att_id">
                            <input type="hidden" name="beneficiary_status" id="beneficiary_status" value="1">

                            <div class="modal-body">

                                <div class="row">

                                    <div class="col-md-12 mb-3">
                                        <?php if($subscription->fund_type == 1){ ?>
                                           <a href="{{ asset('/') }}img/docs/MCIL-Change_of_beneficiary_request.docx" download> 1. Download beneficiary change request form</a>
                                        <?php }else if($subscription->fund_type == 2){ ?>
                                            <a href="{{ asset('/') }}img/docs/mcil2/MCIL-Change_of_beneficiary_request.docx" download> 1. Download beneficiary change request form</a>
                                        <?php }else if($subscription->fund_type == 3){ ?>
                                            <a href="{{ asset('/') }}img/docs/mcil3/MCIL-Change_of_beneficiary_request.docx" download> 1. Download beneficiary change request form</a>
                                        <?php } ?>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <span class="text-danger">2. Please fill and upload</span>
                                    </div>

                                    <div class="col-lg-12 company-reupload">
                                        <input type="file" name="attachment" class="dropify" id="attachment" data-max-file-size="2M" data-allowed-file-extensions="pdf xlsx docx" data-parsley-errors-container="#uploadDoc3-errors" required />
                                    </div>
                                    <span id="uploadDoc3-errors"></span>
                                    
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

            <!-- change beneficiary2Modal -->
            <div class="modal fade" id="beneficiary2Modal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Edit beneficiary details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        {{ Form::open(['url' => ['individual/view/subscription','id'=>$subscription->id], 'id'=>'formBeneficiary2', 'class'=>'', 'files' => true, 'data-parsley-validate', 'autocomplete'=>"off"]) }}

                            <input type="hidden" name="sub_att_id" id="sub_b2_att_id">
                            <input type="hidden" name="beneficiary_status" id="beneficiary_status" value="2">

                            <div class="modal-body">

                                <div class="row">

                                    <div class="col-md-12 mb-3">
                                        <?php if($subscription->fund_type == 1){ ?>
                                           <a href="{{ asset('/') }}img/docs/MCIL-Change_of_beneficiary_request.docx" download> 1. Download beneficiary change request form</a>
                                        <?php }else if($subscription->fund_type == 2){ ?>
                                            <a href="{{ asset('/') }}img/docs/mcil2/MCIL-Change_of_beneficiary_request.docx" download> 1. Download beneficiary change request form</a>
                                        <?php }else if($subscription->fund_type == 3){ ?>
                                            <a href="{{ asset('/') }}img/docs/mcil3/MCIL-Change_of_beneficiary_request.docx" download> 1. Download beneficiary change request form</a>
                                        <?php } ?>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <span class="text-danger">2. Please fill and upload</span>
                                    </div>

                                    <div class="col-lg-12 company-reupload">
                                        <input type="file" name="attachment" class="dropify" id="attachment" data-max-file-size="2M" data-allowed-file-extensions="pdf xlsx docx" data-parsley-errors-container="#uploadDoc4-errors" required />
                                    </div>
                                    <span id="uploadDoc4-errors"></span>

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

                        {{ Form::open(['url' => ['individual/view/subscription','id'=>$subscription->id], 'id'=>'formRedemption', 'class'=>'', 'files' => true, 'data-parsley-validate', 'autocomplete'=>"off"]) }}

                            <input type="hidden" name="subs_att_id" id="subs_att_id">

                            <div class="modal-body">

                                <div class="row">

                                    <div class="col-md-12 mb-3">
                                        @if (!empty($subscription))
                                            @if ($subscription->fund_type == 1)
                                                <a href="{{ asset('/') }}img/docs/MCIL-redemption-form.pdf" download> 1. Download redemption form</a>
                                            @elseif($subscription->fund_type == 2)
                                                <a href="{{ asset('/') }}img/docs/mcil2/MCIL-redemption-form.pdf" download> 1. Download redemption form</a>
                                            @elseif($subscription->fund_type == 3)
                                                <a href="{{ asset('/') }}img/docs/mcil3/MCIL-redemption-form.pdf" download> 1. Download redemption form</a>
                                            @else
                                                <a href="{{ asset('/') }}img/docs/MCIL-redemption-form.pdf" download> 1. Download redemption form</a>
                                            @endif
                                        @endif
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <span class="text-danger">2. Please fill and upload redemption form for processing</span>
                                    </div>

                                    <div class="col-lg-12">
                                        <input type="file" name="redemption_file" class="dropify" id="redemption_file" data-height="300" data-max-file-size="5M" data-allowed-file-extensions="pdf" data-parsley-errors-container="#redemptionDoc-errors" data-remove-required="0" required />
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

            @include('individual.elements.footer')

        </div>
    </div>

</div>  

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

@endsection

@section('scripts')
    
    <script src="{{ asset('assets/js/components/date-picker.js') }}"></script>
    <script src="{{ asset('assets/js/components/dropify.js') }}"></script>

    <script>
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
                
                axios.post(SITE_URL+'individual/changeBankDetailsUpload',formData,{
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

        

        $('#beneficiary1Button').click(function(e){
            $('#formBeneficiary1')[0].reset();
            $('#beneficiary1Modal').modal('show');
            
            var source_id = $(this).attr("attr-sub_id");
            $("#sub_b1_att_id").val(source_id);
        });
        
        $('#formBeneficiary1').submit(function(e) {
            e.preventDefault();
            if ( $(this).parsley().isValid() ) {
                
                preloader_init();

                var csrfToken = "{{ csrf_token() }}";

                const form = document.getElementById('formBeneficiary1');
                let formData = new FormData(form);

                $('#beneficiary1Modal').modal('hide');
                
                axios.post(SITE_URL+'individual/changeBeneficiaryDetailsUpload',formData,{
                        headers: {
                            'Content-Type': 'multipart/form-data',
                            'X-CSRF-Token': csrfToken}}
                ).then(function(response){

                    preloader_off();

                    var item =response.data;

                    if(item.error){

                        Swal.fire('Great Job !','You have uploaded beneficiary form successfully, MCIL team will verify the beneficiary form!','success');

                        $('#formBeneficiary1')[0].reset();
                        $('#beneficiary1Modal').modal('hide');

                        setTimeout(location.reload.bind(location), 3500);
                    }else{

                        $('#beneficiary1Modal').modal('hide');
                        Swal.fire('Sorry !','Beneficiary form upload faild!','error');
                    } 
                })
                .catch(function(){

                    $('#beneficiary1Modal').modal('hide');
                    Swal.fire('Sorry !','Beneficiary form upload faild!','error');
                });
            }
        });



        $('#beneficiary2Button').click(function(e){
            $('#formBeneficiary2')[0].reset();
            $('#beneficiary2Modal').modal('show');
            
            var source_id = $(this).attr("attr-sub_id");
            $("#sub_b2_att_id").val(source_id);
        });
        
        $('#formBeneficiary2').submit(function(e) {
            e.preventDefault();
            if ( $(this).parsley().isValid() ) {
                
                preloader_init();

                var csrfToken = "{{ csrf_token() }}";

                const form = document.getElementById('formBeneficiary2');
                let formData = new FormData(form);

                $('#beneficiary2Modal').modal('hide');
                
                axios.post(SITE_URL+'individual/changeBeneficiaryDetailsUpload',formData,{
                        headers: {
                            'Content-Type': 'multipart/form-data',
                            'X-CSRF-Token': csrfToken}}
                ).then(function(response){

                    preloader_off();

                    var item =response.data;

                    if(item.error){

                        Swal.fire('Great Job !','You have uploaded beneficiary form successfully, MCIL team will verify the beneficiary form!','success');

                        $('#formBeneficiary2')[0].reset();
                        $('#beneficiary2Modal').modal('hide');

                        setTimeout(location.reload.bind(location), 3500);
                    }else{

                        $('#beneficiary2Modal').modal('hide');
                        Swal.fire('Sorry !','Beneficiary form upload faild!','error');
                    } 
                })
                .catch(function(){

                    $('#beneficiary2Modal').modal('hide');
                    Swal.fire('Sorry !','Beneficiary form upload faild!','error');
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
                    
                    axios.get(SITE_URL+'individual/uploadAttachImageRemove/'+ss_id).then(function (response) {
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
                    
                    axios.get(SITE_URL+'individual/uploadAttachImageRemove/'+ss_id).then(function (response) {
                        Swal.fire('Great Job !','You beneficiary details delete successfully...','success');
                        setTimeout(location.reload.bind(location), 1500);
                    })
                    .catch(function (error) {
                        Swal.fire('Sorry!','Data retrieve problam, please try after some time !!!','error');
                    }); 
                    
                }
            });

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
                    axios.get(SITE_URL+'individual/reinvestRequest?sub_id='+sub_id).then(function (response) {
                        
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
                            console.log(source_id)
                            $("#subs_att_id").val(source_id);
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
                            console.log(source_id)
                            $("#subs_att_id").val(source_id);
                        }
                    });
                }
                
            }else{
                $('#redemptionModal').modal('show');
                var source_id = $(this).attr("attr-sub_id");
                $("#subs_att_id").val(source_id);
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
                
                axios.post(SITE_URL+'individual/redemptionUpload',formData,{
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
                
                axios.post(SITE_URL+'individual/redemptionUpload',formData,{
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