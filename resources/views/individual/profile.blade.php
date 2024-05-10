@extends('layouts.app')

@section('title', 'Profile')

@section('content')

<div class="container-fluid page-body-wrapper">

	@include("individual.elements.sidebar")

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="d-flex justify-content-between">
                <div class="pageheader">
                    <h4>PROFILE</h4>
                </div>
                <div>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb no-bg custom-breadcrumb">
                            <li class="breadcrumb-item"><a
                                    href="#">Profile</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Personal Information</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-2 col-md-3 custom-profile-navlink">
                    <div class="nav nav-tabs nav-tabs-icon nav-tabs-icon-info flex-column" id="nav-project-tab5"
                        role="tablist">
                        <a class="nav-item nav-link active" id="nav-pro-web-tab5" data-toggle="tab"
                            href="#nav-website5" role="tab" aria-controls="nav-website5" aria-selected="true">
                            <i data-feather="user"></i>
                            <span class="nav-title-text">Profile</span>
                        </a>
                        <a class="nav-item nav-link mt-3" id="nav-pro-design-tab5" data-toggle="tab"
                            href="#nav-design5" role="tab" aria-controls="nav-design5" aria-selected="false">
                            <i data-feather="file-text"></i>
                            <span class="nav-title-text">Other Details</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-10 col-md-9 m-mt-2">
                    <div class="card">
                        <div class="card-body custom-nav-details-tab-content">
                            <div class="tab-content" id="nav-tabContent5">
                                <div class="tab-pane fade show active" id="nav-website5" role="tabpanel" aria-labelledby="nav-pro-web-tab5">
                                    <div class="custom-profile-info">
                                        <div class="custom-widget-message">
                                            <div class="custom-widget-message-header">
                                                <div class="d-flex justify-content-between">
                                                    <div class="d-flex widget-20-post-info">
                                                        <img src="{{ asset('assets/images/avatars/default.png') }}" alt="Profile Picture" />
                                                        <span class="d-flex flex-column mt-3">
                                                            <h4 class="author-name">{{ $user->first_name }}</h4>
                                                            <span class="time">Investor</span>
                                                            <span class="badge badge-pill badge-vilet mt-2 mr-2">Individual/Self-employed</span>
                                                        </span>
    
                                                    </div>

                                                    {{-- <div class="widget-20-post-action">
                                                       <button class="btn btn-info custom-edit-btn"  data-toggle="modal" data-target="#editProfile">Edit Profile</button>
                                                    </div> --}}

                                                </div>
                                               
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-5">
                                        <h5 class="font-weight-bold mb-3">Personal Information</h5>
                                        <div class="row my-3">
                                            <div class="col-lg-6">
                                                <div class="row mt-4">
                                                    <div class="col-lg-4 col-6">
                                                        <h6>Full Name </h6>
                                                    </div>
                                                    <div class="col-lg-8 col-6"><span class="text-muted">{{ $user->first_name }}</span>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-lg-4 col-6">
                                                        <h6>Gender</h6>
                                                    </div>
                                                    <div class="col-lg-8 col-6"><span
                                                            class="text-muted">{{ $user->gender }}</span></div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-lg-4 col-6">
                                                        <h6>Email</h6>
                                                    </div>
                                                    <div class="col-lg-8 col-6"><span
                                                            class="text-muted">{{ $user->email }}</span></div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-lg-4 col-6">
                                                        <h6>Mobile No.</h6>
                                                    </div>
                                                    <div class="col-lg-8 col-6"><span
                                                            class="text-muted">+{{ $user->has('mobilePrefix') ? $user->mobilePrefix->calling_code : '' }}{{ $user->mobile_no }}</span></div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="row mt-4">
                                                    <div class="col-lg-4 col-6">
                                                        <h6>Date of Birth </h6>
                                                    </div>
                                                    <div class="col-lg-8 col-6"><span class="text-muted">

                                                        <?php
                                                        if(!empty($user->individual->dob)){
                                                            echo $user->has('individual') ? date('d-m-Y', strtotime($user->individual->dob )) : '';
                                                        
                                                        } ?>

                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-lg-4 col-6">
                                                        <h6>Nationality</h6>
                                                    </div>
                                                    <div class="col-lg-8 col-6"><span class="text-muted">
                                                        <?= $user->has('individual') ? $user->individual->IndiNationality->name : '' ?>
                                                    </span></div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-lg-4 col-6">
                                                        <h6>Country</h6>
                                                    </div>
                                                    <div class="col-lg-8 col-6"><span class="text-muted">
                                                        <?= $user->country ? $user->countryAs->name : '' ?>
                                                    </span></div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-lg-4 col-6">
                                                        <h6>Address</h6>
                                                    </div>
                                                    <div class="col-lg-8 col-6"><span class="text-muted">
                                                        <?= $user->address_line1 ?>, 
                                                        <?= $user->address_line2 ?>, 
                                                        <?= $user->city ?>,
                                                        <?= $user->post_code ?>, 
                                                        <?= $user->has('stateAs') ? $user->stateAs->name : '' ?>,
                                                        <?= $user->has('countryAs') ? $user->countryAs->name : '' ?>

                                                    </span></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-design5" role="tabpanel" aria-labelledby="nav-pro-design-tab5">
                                    <h5 class="font-weight-bold mb-3">Other Details</h5>
                                    <div class="row my-3">
                                        <div class="col-lg-6">
                                            <div class="row mt-4">
                                                <div class="col-lg-4 col-6"> <h6>Passport </h6> </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted">
                                                    <?= $user->has('individual') ? $user->individual->passport : '' ?>
                                                </span>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-lg-4 col-6"><h6>Occupation</h6>  </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted">
                                                    <?= $user->has('individual') ? $user->individual->occupation : '' ?>
                                                </span></div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-lg-4 col-6"><h6>Employer Name</h6>  </div>
                                                <div class="col-lg-8 col-6"><span class="text-muted">
                                                    <?= $user->has('individual') ? $user->individual->employer_name : '' ?>
                                                </span></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="row mt-4">
                                                <div class="col-lg-5 col-6"> <h6>Annual Income </h6> </div>
                                                <div class="col-lg-7 col-6"><span class="text-muted">
                                                    <?= $user->has('individual') ? $user->individual->annual_income : '' ?>
                                                </span>
                                                </div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-lg-5 col-6"><h6>Source of Wealth</h6>  </div>
                                                <div class="col-lg-7 col-6"><span class="text-muted">
                                                    <?= $user->has('individual') ? $user->individual->source_wealth  : '' ?>
                                                    <?= $user->has('individual') ? $user->individual->source_wealth_other : '' ?>
                                                </span></div>
                                            </div>
                                            <div class="row mt-3">
                                                <div class="col-lg-5 col-6"><h6>Agent ID</h6>  </div>
                                                <div class="col-lg-7 col-6"><span class="text-muted">
                                                    <?= $user->agent_email;?>
                                                </span></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- edit profile Modal -->
            <div class="modal fade" id="editProfile" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                 <div class="modal-dialog modal-lg" role="document">
                     <div class="modal-content">
                         <div class="modal-header">
                             <h5 class="modal-title" id="exampleModalLongTitle">Edit Profile</h5>
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                             </button>
                         </div>
                         <div class="modal-body">
                             <div class="row">
                                 <div class="col-lg-12">
                                     <label>Full Name <span class="mandatory">*</span></label>
                                     <input type="text" class="form-control search-input ">
                                 </div>
                                 <div class="col-lg-12 mt-2">
                                    <label>Email <span class="mandatory">*</span></label>
                                    <input type="text" class="form-control search-input ">
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <label>Date of Birth <span class="mandatory">*</span></label>
                                    <div class="input-group">
                                       <input type="text" class="form-control search-input " name="date1" id="date1">
                                       <div class="input-group-append">
                                          <span class="input-group-text"> <svg data-feather="calendar" width="16px" height="16px"></svg> </span>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-lg-6 mt-3">
                                    <label>Mobile No. <span class="mandatory">*</span></label>
                                    <div class="w-100">
                                       <input id="phone" name="phone" type="tel"  class="form-control search-input w-100">
                                    </div>
                                 </div>
                                <div class="col-lg-6 mt-3">
                                    <label>Gender <span class="mandatory">*</span></label>
                                    <select class="form-control search-input">
                                       <option>Male</option>
                                       <option>Female</option>
                                       <option>Others</option>
                                    </select>
                                 </div>
                                 <div class="col-lg-6 mt-3">
                                    <label>Nationality <span class="mandatory">*</span></label>
                                    <select class="form-control search-input">
                                       <option>Malaysian</option>
                                       <option>Indian</option>
                                    </select>
                                 </div>
                                 <div class="col-lg-12 mt-4">
                                     <label>Upload Profile <span class="mandatory">*</span></label>
                                     <div class="custom-file">
                                         <input type="file" class="custom-file-input" id="investion-evidence"
                                             required>
                                         <label class="custom-file-label" for="investion-evidence">Choose
                                             file...</label>
                                     </div>
                                 </div>
                                 <div class="col-lg-12 mt-3">
                                    <label>Address Line 1 <span class="mandatory">*</span></label>
                                    <input type="text" class="form-control search-input" value="7th Floor Grand Seasons Avenue Hotel Jalan Pahang">
                                 </div>
                                 <div class="col-lg-12 mt-3">
                                    <label>Address Line 2</label>
                                    <input type="text" class="form-control search-input">
                                 </div>
                                 <div class="col-lg-6 mt-3">
                                    <label>Country / Region <span class="mandatory">*</span></label>
                                    <select class="form-control search-input">
                                       <option>Malasiya</option>
                                       <option>Albania</option>
                                       <option>Spain</option>
                                       <option>Sri Lanka</option>
                                       <option>India</option>
                                    </select>
                                 </div>
                                 <div class="col-lg-6 mt-3">
                                    <label>State <span class="mandatory">*</span></label>
                                    <select class="form-control search-input">
                                       <option>Kuala Lumpur</option>
                                       <option>Penang</option>
                                       <option>Miri</option>
                                       <option>Selangor</option>
                                    </select>
                                 </div>
                                 <div class="col-lg-6 mt-3">
                                    <label>City <span class="mandatory">*</span></label>
                                    <input type="text" class="form-control search-input" value="Kuala Lumpur">
                                 </div>
                                 <div class="col-lg-6 mt-3">
                                    <label>Postcode <span class="mandatory">*</span></label>
                                    <input type="number" class="form-control search-input" value="53000">
                                 </div>
                             </div>
                         </div>
                         <div class="modal-footer">
                             <button type="button" class="btn btn-secondary modal-cancel"
                                 data-dismiss="modal">Cancel</button>
                             <button type="submit" class="btn btn-info">Submit</button>
                         </div>
                     </div>
                 </div>
            </div>

            @include('individual.elements.footer')

        </div>
    </div>

</div>

@endsection

@section('scripts')

@stop