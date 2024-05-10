@extends('layouts.app')

@section('title', 'LANDING')

@section('content')
	
<div class="container-fluid page-body-wrapper full-page-wrapper">
	<div class="main-panel custom-main-panel">
		<div class="content-wrapper">
			<section class="login-box row justify-content-center align-items-center">
				<section class="col-12 col-sm-8 col-md-6 col-lg-4">
					<div class="login-box-container">
						<div class="top-loginbox">
							<div class="top-loginbox-text">
								<h4 class="mb-3">Hi {{ Auth()->user()->first_name . Auth()->user()->last_name }}</h4>
							</div>
							<div> <img src="{{ asset('assets/images/login/login-img.png') }}" alt="login-img" /></div>
						</div>
						<div class="form-container login-form-container">
							<div class="login-img mb-4">
								<img src="{{ asset('assets/images/logo/login-logo.png') }}" alt="logo" />
							</div>
							<div class="text-center">
								<h4>Thanks for subscribing</h4>
								<h6 class="p-3 text-muted">We have sent you an email. We will update the application status soon. Please log out and try again later.</h6>
							</div>
							<a class="btn btn-info btn-block login-btn"  href="{{ route('logout') }}" onclick="event.preventDefault();
	                                 document.getElementById('logout-form').submit();">Logout</a>
	                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				                    @csrf
				            </form>

						</div>
					</div>
				</section>
			</section>
		</div>
	</div>
</div>

@endsection

@section('scripts')

<script type="text/javascript">
    $(document).ready(function() {
        setInterval(function () {
            autoLogout();
            // $('#logout-form').submit();
        }, 60000);

        function autoLogout(){
            
            var csrfToken = "{{ csrf_token() }}";
            let formData = new FormData();
            var url = "{{ route('logout') }}";

            axios.post(url,formData,{
                    headers: {
                        'Content-Type': 'multipart/form-data',
                        'X-CSRF-Token': csrfToken}}
            ).then(function(response){

                Swal.fire('Ohh !','Your session has closed!','success');
                setTimeout(location.reload.bind(location), 1000);
            })
            .catch(function(){
                setTimeout(location.reload.bind(location), 1500);
            });
        }
    });
</script>

@stop
