@extends('layouts.app')

@section('title', 'Show')

@section('styles')

@stop

@section('content')

<div class="container-fluid page-body-wrapper">

    @include("admin.elements.sidebar")

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="d-flex justify-content-between">
                <div class="pageheader">
                    <h4>INVESTOR DETAILS</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb no-bg custom-breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Investors</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Investment Details</li>
                        </ol>
                    </nav>
                </div>
                <div class="d-flex">

                @if ($user->role_id == 2)
                    @if (!empty($check_subscription))
                        <div class="save-investemnt mr-2">
                            <a href="{{ route('individualAdditionalCreate', ['userId' => $user->id]) }}" title="Create Additional subscription">
                                <img src="{{ asset('assets/images/icons/add-icon-white.png') }}" alt="back icon" />
                            </a>
                        </div>
                    @else
                        <div class="save-investemnt mr-2">
                            <a href="{{ route('individualInitialCreate', ['userId' => $user->id]) }}" title="Create subscription">
                                <img src="{{ asset('assets/images/icons/add-icon-white.png') }}" alt="back icon" />
                            </a>
                        </div>
                    @endif
                @elseif($user->role_id == 3)
                    @if (!empty($check_subscription))
                        <div class="save-investemnt mr-2">
                            <a href="{{ route('companyAdditionalCreate', ['userId' => $user->id]) }}" title="Create Company Additional subscription">
                                <img src="{{ asset('assets/images/icons/add-icon-white.png') }}" alt="back icon" />
                            </a>
                        </div>
                    @else
                        <div class="save-investemnt mr-2">
                            <a href="{{ route('companyInitialCreate', ['userId' => $user->id]) }}" title="Create Company subscription">
                                <img src="{{ asset('assets/images/icons/add-icon-white.png') }}" alt="back icon" />
                            </a>
                        </div>
                    @endif
                @endif

                <?php 
                    if(isset($_GET['pageId'])) {
                        $page=$_GET['pageId'];
                    } else {
                        $page=1;
                    }

                    if(isset($_GET['pageView'])) {
                        $page_view=$_GET['pageView'];

                        if ($page_view == "IA") {
                            $url = "/investor/active?page=$page";
                        } elseif($page_view == "II") {
                            $url = "/investor/inActive?page=$page";
                        } elseif($page_view == "AA") {
                            $url = "/agents/active?page=$page";
                        }  elseif($page_view == "AI") {
                            $url = "/agents/inActive?page=$page";
                        }    

                    } else {
                        $url = "/investor/active?page=$page";
                    }
                ?>

                    <div class="go-back">
                        <a href="{{ url($url)}}" title="Back">
                            <img src="{{ asset('assets/images/icons/back-icon.png') }}" alt="back icon" /></a>
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
                                        aria-selected="false">Subscriptions</a>
                                </div>
                            </nav>
                        </div>

                        <div class="card-body custom-nav-details-tab-content">
                            <div class="tab-content" id="nav-tabContent1">
                                <div class="tab-pane fade show active" id="nav-home1" role="tabpanel"
                                    aria-labelledby="nav-home-tab1">

                                <?php if($user->role_id == 2): ?>
                                    <div>
                                        <h5 class="font-weight-bold mb-3">Investment Info :</h5>

                                        <div class="row mt-4">
                                            <div class="col-lg-3 col-6">
                                                <h6>Name</h6>
                                            </div>
                                            <div class="col-lg-8 col-6"><span class="font-weight-bold"><?= $user->first_name ;?></span>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-3 col-6">
                                                <h6>Account Type</h6>
                                            </div>
                                            <div class="col-lg-8 col-6"><span class="text-muted">
                                                <?= $user->is_tester == 0 ? "Business Account" : 'Testing Account' ?>
                                            </span>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-lg-3 col-6">
                                                <h6>Type of Member</h6>
                                            </div>
                                            <div class="col-lg-8 col-6"><span class="text-muted">Individual/Self Employment</span>
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
                                            <div class="col-lg-8 col-6"><span class="text-muted">
                                                +<?= $user->mobile_prefix ? $user->mobilePrefix->calling_code : '' ?> <?= $user->mobile_no;?>
                                            </span>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-3 col-6">
                                                <h6>Passport</h6>
                                            </div>
                                            <div class="col-lg-8 col-6"><span class="text-muted"><?= $user->has('individual') ? $user->individual->passport : '' ?></span>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-3 col-6">
                                                <h6>Date of Birth</h6>
                                            </div>
                                            <div class="col-lg-8 col-6"><span class="text-muted">
                                                <?= $user->has('individual') ? date('d M, Y', strtotime($user->individual->dob)) : '' ?>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-3 col-6">
                                                <h6>Gender</h6>
                                            </div>
                                            <div class="col-lg-8 col-6"><span class="text-muted">
                                                <?= $user->has('individual') ? $user->individual->gender : '' ?>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-3 col-6">
                                                <h6>Employer Name</h6>
                                            </div>
                                            <div class="col-lg-8 col-6"><span class="text-muted">
                                                <?= $user->has('individual') ? $user->individual->employer_name : '' ?>
                                            </span>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-3 col-6">
                                                <h6>Country of Residence</h6>
                                            </div>
                                            <div class="col-lg-8 col-6"><span class="text-muted">
                                                <?= $user->has('individual') ? $user->individual->IndiResidence->name : '' ?>
                                            </span>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-3 col-6">
                                                <h6>Nationality</h6>
                                            </div>
                                            <div class="col-lg-8 col-6"><span class="text-muted">
                                                <?= $user->has('individual') ? $user->individual->IndiNationality->name : '' ?>
                                            </span>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-3 col-6">
                                                <h6>Address</h6>
                                            </div>
                                            <div class="col-lg-8 col-6"><span class="text-muted">
                                                <?= $user->address_line1 ?>, 
                                                <?= $user->address_line2 ?>, 
                                                <?= $user->city ?>, 
                                                <?= $user->state ? $user->stateAs->name : '' ?>,
                                                <?= $user->country ? $user->countryAs->name : '' ?>
                                                <?= $user->postcode ?>.
                                            </span>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-3 col-6">
                                                <h6>Occupation</h6>
                                            </div>
                                            <div class="col-lg-8 col-6"><span class="text-muted">
                                                <?= $user->has('individual') ? $user->individual->occupation : '' ?>
                                            </span>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-3 col-6">
                                                <h6>Annual Income</h6>
                                            </div>
                                            <div class="col-lg-8 col-6"><span class="text-muted">
                                                    < <?= $user->has('individual') ? $user->individual->annual_income : '' ?>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-3 col-6">
                                                <h6>Source of Wealth</h6>
                                            </div>
                                            <div class="col-lg-8 col-6"><span class="text-muted">
                                                <?= $user->has('individual') ? $user->individual->source_wealth  : '' ?>
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
                                    </div>

                                <?php endif ?>

                                <?php if($user->role_id == 3): ?>
                    
                                    <br>
                                    <div>
                                        <h5 class="font-weight-bold mb-3">Investment Info :</h5>
                                        <div class="row mt-4">
                                            <div class="col-lg-3 col-6">
                                                <h6>Name of Company</h6>
                                            </div>
                                            <div class="col-lg-8 col-6"><span class="font-weight-bold">
                                                <?= $user->last_name ;?>
                                            </span>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-3 col-6">
                                                <h6>Type Of Company</h6>
                                            </div>
                                            <div class="col-lg-8 col-6"><span class="text-muted">
                                                <?php 
                                                    if(!empty($user->has('company'))){

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
                                                <h6>Type of Member</h6>
                                            </div>
                                            <div class="col-lg-8 col-6">
                                                <span class="text-muted">Company/Club/Society/Partnership</span>
                                            </div>
                                        </div>

                                        <div class="row mt-4">
                                            <div class="col-lg-3 col-6">
                                                <h6>Company Reg.No</h6>
                                            </div>
                                            <div class="col-lg-8 col-6">
                                                <span class="text-muted">
                                                    <?= $user->has('company') ? $user->company->company_reg_no : '' ?>
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
                                            <div class="col-lg-8 col-6"><span class="text-muted">
                                                +<?= $user->mobile_prefix ? $user->mobilePrefix->calling_code : '' ?> <?= $user->mobile_no;?>
                                            </span>
                                            </div>
                                        </div>
                                        
                                        <div class="row mt-3">
                                            <div class="col-lg-3 col-6">
                                                <h6>Country / Region of Incorporation.</h6>
                                            </div>
                                            <div class="col-lg-8 col-6"><span class="text-muted">
                                                <?= $user->has('company') ? $user->company->CompanyCountryCorporate->name : '' ?>
                                            </span>
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-lg-3 col-6">
                                                <h6>Date of Incorporation</h6>
                                            </div>
                                            <div class="col-lg-8 col-6"><span class="text-muted">
                                                <?= $user->has('company') ? date('d M, Y', strtotime($user->company->date_corporation)) : '' ?>
                                            </span>
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-lg-3 col-6">
                                                <h6>Principal Business Activity</h6>
                                            </div>
                                            <div class="col-lg-8 col-6"><span class="text-muted">
                                                <?= $user->has('company') ? $user->company->business_activity : '' ?>
                                            </span>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-lg-3 col-6">
                                                <h6>Address</h6>
                                            </div>
                                            <div class="col-lg-8 col-6"><span class="text-muted">
                                                <?= $user->address_line1 ?>, 
                                                <?= $user->address_line2 ?>, 
                                                <?= $user->city ?>, 
                                                <?= $user->state ? $user->stateAs->name : '' ?>,
                                                <?= $user->country ? $user->countryAs->name : '' ?>
                                                <?= $user->postcode ?>.
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
                                    </div>

                                <?php endif ?>

                                </div>


                                <div class="tab-pane fade" id="nav-profile1" role="tabpanel"
                                    aria-labelledby="nav-profile-tab1">
                                    <div>
                                        <h5 class="font-weight-bold mb-3"> Subscriptions :</h5>
                                            <div class="table-responsive mt-2">
                                                <table id="example" class="table table-striped table-bordered">
                                                    <thead>
                                                        <tr>
                                                            <th>INVESTMENT ID</th>
                                                            <th>AMOUNT</th>
                                                            <th>COMMENCEMENT DATE</th>
                                                            <th>MATURITY DATE</th>
                                                            <th>STATUS</th>
                                                            <th>ACTIONS</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>

                                                    @if ($subscriptions->count() > 0)    

                                                        @foreach ($subscriptions as $key => $ss)      
                                                            <tr>
                                                                <td class="font-weight-bold">
                                                                <?php 
                                                                    if (!empty($ss->draft_refrence_id)) {
                                                                        
                                                                        if (($ss->status == 3) || ($ss->status == 6)) {
                                                                            $investment_no = $ss->reference_no.$ss->refreance_id;
                                                                        } else {
                                                                            $investment_no = $ss->draft_refrence_id."-".$ss->reference_no.$ss->refreance_id;
                                                                        }
                                                                    } else {
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
                                                                        if($ss->status  ==0){
                                                                            
                                                                            if($ss->draft  ==1){
                                                                            echo '<span class="badge badge-soft-secondary-3 mt-2 mr-2">Draft</span>';
                                                                            }else{
                                                                               echo '<span class="badge badge-soft-warning mt-2 mr-2">Pending</span>'; 
                                                                            }
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
                                                                        }else{
                                                                            echo '<span class="badge badge-soft-danger mt-2 mr-2">In-active</span>';
                                                                        }
                                                                    ?>
                                                                <td>
                                                                    <div class="d-flex">
                                                                        <a class="table-view-card mr-2" href="{{ url('/subscription/view/'.$ss->id) }}"><img src="{{ asset('assets/images/icons/view-icon.png') }}" alt="view icon" /></a>

                                                                    @if ($user->role_id == 2)
                                                                        <a class="table-view-card" href="{{ route('individualSubscriptionEdit', ['userId' => $user->id, 'subId' => $ss->id]) }}"><img src="{{ asset('assets/images/icons/edit-icon.png') }}" alt="view icon" /></a>
                                                                    @elseif($user->role_id == 3)
                                                                        <a class="table-view-card" href="{{ route('companySubscriptionEdit', ['userId' => $user->id, 'subId' => $ss->id]) }}"><img src="{{ asset('assets/images/icons/edit-icon.png') }}" alt="view icon" /></a>
                                                                    @endif

                                                                    </div>
                                                                </td>
                                                            </tr>
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
            </div>

            @include('admin.elements.footer')

        </div>
    </div>
</div>

@endsection

@section('scripts')

@stop
