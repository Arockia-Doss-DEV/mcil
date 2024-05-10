<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ Setting::get('site_name_short', 'MCIL')}} - @yield('title')</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('assets/images/logo/side-nav-logo.png') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/vendor.styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/legacy-template.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}">

    <!-- Common  -->

    <script src="{{ asset('assets/js/vendor.base.js') }}"></script>
    <script src="{{ asset('assets/js/vendor.bundle.js') }}"></script>

    <script src="{{ asset('common/js/axios.js') }}"></script>
    <script src="{{ asset('common/js/toastr.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('common/css/toastr.css') }}">
    
    <script src="{{ asset('common/js/sweet-alert.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('common/css/sweet-alert.css') }}">

    <!--  jquery script  -->
   {{--  <script src="http://code.jquery.com/jquery-3.2.1.min.js"></script> --}}

    <script src="{{ asset('common/js/parsley.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('common/css/parsley.css') }}">

    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>

    <link rel="stylesheet" href="{{ url('assets/css/select2.css') }}">

    @yield('styles')

    <style type="text/css">
        .page-item.active .page-link {
            z-index: 1;
            color: #fff !important;
            background-color: #35C371 !important;
            border-color: #35C371 !important;
        }
    </style>
    
    <script type="text/javascript">
        var SITE_URL = "{{ url('/') }}/";
        var base_url = "{{asset('/')}}";
    </script>

</head>
<body>

    <div id="overlay" style="display:none;"><div class="spinner"></div><br/>Please Wait...</div>

    <div class="main-container">
        @yield('content')
    </div>

    
    <script src="{{ asset('assets/js/vendor-override/tooltip.js') }}"></script>
    <script src="{{ asset('assets/js/components/legacy-sidebar/dashboard-msb.js') }}"></script>
    <script src="{{ asset('assets/js/components/legacy-sidebar/common.js') }}"></script>
    <script src="{{ asset('assets/js/components/modal.js') }}"></script>

    <link rel="stylesheet" type="text/css" href="{{ asset('common/css/general.css') }}">
    <script src="{{ asset('common/js/general.js') }}"></script>

    <script src="{{ url('assets/js/select2.js') }}"></script>
    <script src="{{ url('assets/js/custom.js?v=1.0') }}"></script>

    @yield('scripts')

    <script>
        @if ($message = Session::get('success'))
            toastr.success("{{ $message }}");
        @endif

        @if ($message = Session::get('error'))
             toastr.error("{{ $message }}");
        @endif

        @if ($message = Session::get('warning'))
             toastr.warning("{{ $message }}");
        @endif

        @if ($message = Session::get('info'))
             toastr.info("{{ $message }}");
        @endif
    </script>

    <script type="text/javascript">
        $(document).on("change", "#adminLogout", function (e) {
            e.preventDefault();
            var currentElement = $(this);

            if($(this).val() == 1){

                Swal.fire({
                    title: 'Are you sure?',
                    text: "Are You sure you want to logout?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                }).then((result) => {
                    if (result.value) {

                        $('#admin-logout-form').submit();
                    } else {
                        $("#adminLogout").val("0").trigger( "change" );
                    }
                });
            }

        });

        $(document).on("change", "#investorLogout", function (e) {
            e.preventDefault();
            var currentElement = $(this);

            if($(this).val() == 1){

                Swal.fire({
                    title: 'Are you sure?',
                    text: "Are You sure you want to logout?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                }).then((result) => {
                    if (result.value) {

                        $('#investor-form').submit();
                    } else{
                        // $('#investorLogout').val("");
                        $("#investorLogout").val("0").trigger( "change" );
                    }
                });
            }

        });

        $(document).on("change", "#companyLogout", function (e) {
            e.preventDefault();
            var currentElement = $(this);

            if($(this).val() == 1){

                Swal.fire({
                    title: 'Are you sure?',
                    text: "Are You sure you want to logout?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes'
                }).then((result) => {
                    if (result.value) {

                        $('#company-form').submit();
                    } else {
                        // $('#companyLogout').val("");
                        $("#companyLogout").val("0").trigger( "change" );
                    }
                });
            }

        });

    </script>
    
</body>
</html>
