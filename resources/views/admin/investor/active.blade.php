@extends('layouts.app')

@section('title', 'Investors Active')

@section('styles')

@stop

@section('content')

<div class="container-fluid page-body-wrapper">

    @include("admin.elements.sidebar")

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="d-flex justify-content-between">
                <div class="pageheader">
                    <h4>Investors</h4>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-12 card-margin">
                    <div class="card">
                        <div class="card-body">
                            <form method="get" action="{{ url('/investor/active')}}">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="input-group mb-3">
                                            <input type="text" name="q" placeholder="Search by Users, Email, Mobile no"
                                                class="form-control search-input" value="" />
                                            <div class="input-group-append">
                                                <button type="submit" id="searchSubmitId" class="btn btn-info"> <i
                                                        data-feather="search"></i> </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-8 text-md-right">
                                        <a href="{{ url('/investor/create') }}" class="btn btn-info mr-1"> + Create</a>
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive mt-2">
                                <table id="example" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>SIGNUP DATE</th>
                                            <th>MEMBER NAME</th>
                                            <th>MEMBER EMAIL</th>
                                            <th>MEMBER MOBILE NO</th>
                                            <th>COUNTRY</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    @if ($users->count() > 0)    

                                        @foreach ($users as $key => $user)    
                                            <tr>
                                                <td class="text-muted">{{ $user->created_at->format('d M, Y h:i A') }}</td>
                                                <td class="text-muted"><?= $user->first_name ?><?= $user->last_name ?></td>
                                                <td class="text-muted"><?= $user->email ?></td>
                                                <td class="text-muted">+<?= $user->mobile_prefix ? $user->mobilePrefix->calling_code : '' ?>-<?= $user->mobile_no;?></td>
                                                <td class="text-muted"><?= $user->country ? $user->countryAs->name : '' ?></td>
                                                <td>

                                                    <?php
                                                        if(isset($_GET['page'])) {
                                                            $pageId=$_GET['page'];
                                                        } else {
                                                            $pageId=1;
                                                        }
                                                    ?>

                                                    <div class="d-flex">

                                                        {{-- <a class="table-view-card mr-2" href="{{ url('/investor/view/'.$user->id) }}">
                                                            <img src="{{ asset('assets/images/icons/view-icon.png') }}" title="View" alt="view icon" />
                                                        </a> --}}

                                                        <a class="table-view-card mr-2" href="{{ route('viewInvestor', ['id' => $user->id, 'pageId' => $pageId, 'pageView' => "IA"]) }}"><img src="{{ asset('assets/images/icons/view-icon.png') }}" title="View" alt="view icon" />
                                                        </a>

                                                        <a class="table-view-card mr-2" href="{{ url('/investor/edit/'.$user->id) }}">
                                                            <img src="{{ asset('assets/images/icons/edit-icon.png') }}" title="Edit" alt="Edit icon" />
                                                        </a>

                                                        <?php
                                                            if($user->id) {
                                                                $user = \App\Models\User::findOrFail($user->id);

                                                                $google2fa = app('pragmarx.google2fa');
                                                                $google2fa_secret = $google2fa->generateSecretKey();

                                                                $qr_image = $google2fa->getQRCodeInline(
                                                                    config('app.name'),
                                                                    rand(),
                                                                    $google2fa_secret
                                                                );
                                                            }
                                                        ?>

                                                        @if ($user['2fa_status'] == 0)
                                                            <button class="btn btn-info btn-sm" attr-user-id="{{ $user->id }}" attr-user-roleid="{{ $user->role_id }}" attr-user-google2fa_secret="{{ $google2fa_secret }}" attr-user-qr_image="{{ $qr_image }}" id="enable2FADataButton">Enable 2FA
                                                            </button>
                                                        @else
                                                            <button class="btn btn-warning btn-sm" attr-user-id="{{ $user->id }}" attr-user-roleid="{{ $user->role_id }}" attr-user-google2fa_secret="{{ $google2fa_secret }}" attr-user-qr_image="{{ $qr_image }}" id="disable2FADataButton">Disable 2FA
                                                            </button>
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

                                <br>
                                {!! $users->links('pagination::bootstrap-4') !!}

                            </div>
                        </div>
                    </div><br><br>
                </div>
            </div>

            <!-- New Message Modal -->
            <div class="modal fade" id="enable2FADataModel" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Enable 2FA Step Verification</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        {{ Form::open(['url' => '/gauthEnable', 'id'=>'enable2FADataForm', 'data-parsley-validate'=>'data-parsley-validate', "data-parsley-trigger"=>"keyup", 'autocomplete'=>"off"]) }}
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div class="col-xl-12 col-lg-12 second-box">
                                        <div class="kt-portlet kt-portlet--height-fluid">
                                            <div class="kt-portlet__body">
                                                <div class="kt-widget kt-widget--general-1">
                                                    <div class="kt-media kt-media--lg kt-media--circle">
                                                        <img src="{{ asset('assets/images/icons/googleauthenticator.png') }}" alt="google -icon" style="width: 150px; height: 150px;">
                                                    </div>

                                                    <div class="kt-widget__wrapper">
                                                        <div class="kt-widget__label">
                                                            <a href="#" class="kt-widget__title"> Get the App
                                                            </a>
                                                            <span class="kt-widget__desc"> Download Google
                                                                Authenticator in your mobile.</span>
                                                            <div class="app-img-download">
                                                                <div class="mr-3">
                                                                    <a href="{{ Setting::get('android_authenticator_link') }}" target="_blank"><img src="{{ asset('assets/images/icons/download-google-play.png') }}"alt="google -icon"></a>
                                                                </div>
                                                                <div class="m-mt-2"> 
                                                                    <a href="{{ Setting::get('apple_authenticator_link') }}" target="_blank"><img src="{{ asset('assets/images/icons/download-app-store.png') }}"
                                                                        alt="google -icon"></a>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" id="userId" name="userId">
                                    <div class="col-xl-12 col-lg-12 second-box">
                                        <div class="kt-portlet kt-portlet--height-fluid">
                                            <div class="kt-portlet__body">
                                                <div class="kt-widget kt-widget--general-1">
                                                    <div class="kt-media kt-media--lg" id="userQrImage">

                                                    </div>
                                                    <div class="kt-widget__wrapper">
                                                        <div class="kt-widget__label">
                                                            <a href="#" class="kt-widget__title">
                                                                Scan this QR Code
                                                            </a>
                                                            <span class="kt-widget__desc snd-scan-desc">
                                                                <p>To generate the verification code, open
                                                                    Google Authenticator. </p>
                                                                <p>Tap the "+" icon in the bottom-right of the
                                                                    app. Scan the image to the left, using your
                                                                    phone camera.</p>
                                                                <p> If you cannot scan the code, the following
                                                                    secret key in your app to generate
                                                                    verification code: </p>
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control fund-sub-input" id="userGoogle2faSecret" name="copy" readonly/>
                                                                    <div class="input-group-append">
                                                                        <button
                                                                            class="btn btn-sm btn-outline-info"
                                                                            type="button"
                                                                            data-clipboard-target="#copy"><img
                                                                                src="{{ asset('assets/images/icons/copy-icon.png') }}"
                                                                                alt="copy icon" /></button>
                                                                    </div>
                                                                </div>
                                                            </span>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xl-12 col-lg-12 second-box">
                                        <div class="kt-portlet kt-portlet--height-fluid">
                                            <div class="kt-portlet__body">
                                                <div class="kt-widget kt-widget--general-1">
                                                    <div class="kt-media kt-media--lg kt-media--circle">
                                                        <img src="{{ asset('assets/images/products/otp.png') }}" alt="image"
                                                            style="height: 50px;">
                                                    </div>
                                                    <div class="kt-widget__wrapper">
                                                        <div class="kt-widget__label">
                                                            <a href="#" class="kt-widget__title"> Enter
                                                                Verification Code </a>
                                                            <span class="kt-widget__desc mb-3"> Enter the
                                                                6-digit verification code generated by the
                                                                app.</span>
                                                            <div class="col-lg-12 p-0">
                                                                <div class="form-group">
                                                                    <div class="input text required">

                                                                        <input type="hidden" name="secretcode" id="userGoogle2faSecret2">

                                                                        {!! Form::text('code', null, ['id'=> "users-otp", 'class'=>'form-control fund-sub-input', "required"=>"required", "data-parsley-type"=>"digits", "maxlength"=>"6", "pattern"=>"\d{6}"]) !!}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary modal-cancel"
                                data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-info">Verify Code</button>
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

<script type="text/javascript">

    $(document).on("click","#enable2FADataButton",function(e) {
        e.preventDefault();

        $('#enable2FADataForm')[0].reset();
        $('#enable2FADataModel').modal('show');

        var userId = $(this).attr('attr-user-id');
        var userGoogle2faSecret = $(this).attr('attr-user-google2fa_secret');
        var userQrImage = $(this).attr('attr-user-qr_image');

        $('#userId').val(userId);
        $('#userGoogle2faSecret').val(userGoogle2faSecret);
        $('#userGoogle2faSecret2').val(userGoogle2faSecret);
        $("#userQrImage").empty().append(userQrImage);

        // $('#userQrImage').append(userQrImage);
        // $("#create_payout_date1").val();

    });

    $('#enable2FADataForm').submit(function(e) {
        e.preventDefault();
        if ( $(this).parsley().isValid() ) {
            var csrfToken = "{{ csrf_token() }}";

            var userId = $("#userId").val();
            var userGoogle2faSecret = $("#userGoogle2faSecret").val();
            var userQrImage = $("#userQrImage").val();

            const form = document.getElementById('enable2FADataForm');
            let formData = new FormData(form);
            axios.post(SITE_URL+'gauthEnable',formData,{
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        'X-CSRF-Token': csrfToken}}
            ).then(function(response){
                var item =response.data;
                if(item.status == "0"){
                    Swal.fire('Great Job !','Two-Factor Authentication (2FA) Is Enabled.','success');

                    $('#enable2FADataForm')[0].reset();
                    $('#enable2FADataModel').modal('hide');

                    setTimeout(location.reload.bind(location), 1500);
                }else{
                    Swal.fire('Sorry !','Wrong code entered.Please try again.','error');
                } 
            })
            .catch(function(){
                Swal.fire('Sorry !','Wrong code entered.Please try again.','error');
            });
        }
    });

    $(document).on("click","#disable2FADataButton",function() {
        Swal.fire({
            title: 'Are you sure?',
            text: "Please confirm the disable Two Step Verification",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then((result) => {
            if (result.value) {
                
                var csrfToken = "{{ csrf_token() }}";

                var userId = $(this).attr('attr-user-id');
                var userRoleId = $(this).attr('attr-user-roleid');
                var userGoogle2faSecret = $(this).attr('attr-user-google2fa_secret');
                var userQrImage = $(this).attr('attr-user-qr_image');

                // alert(userId)

                // if (userRoleId == 2) {
                //    var url = 'individual/gauthDisable';
                // } else {
                //     var url = 'company/gauthDisable';
                // }

                let formData = new FormData();
                formData.set('status', '0');
                formData.set('userId', userId);

                axios.post(SITE_URL+'gauthDisable',formData,{
                        headers: {
                            'Content-Type': 'multipart/form-data',
                            'X-CSRF-Token': csrfToken}}
                ).then(function (response) {
                    Swal.fire('Great Job !','Two-Factor Authentication (2FA) Is Disbled.','success');
                    setTimeout(location.reload.bind(location), 1500);
                });
            }
        });
    });
</script>

@stop




