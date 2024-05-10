<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ Setting::get('site_name_short', 'MCIL')}} - @yield('title')</title>

 {{--    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

   {{--  <link rel="shortcut icon" href="{{ asset('assets/images/logo/side-nav-logo.png') }}" /> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/vendor.styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/legacy-template.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/responsive.css') }}"> --}}

    <script src="{{ asset('assets/js/vendor.base.js') }}"></script>
    <script src="{{ asset('assets/js/vendor.bundle.js') }}"></script>
    <script src="{{ asset('common/js/axios.js') }}"></script>
    <script src="{{ asset('common/js/toastr.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('common/css/toastr.css') }}">

    <script src="{{ asset('common/js/parsley.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('common/css/parsley.css') }}">

    @yield('styles')

    <script type="text/javascript">
        var SITE_URL = "{{ url('/') }}/";
        var base_url = "{{asset('/')}}";
    </script>

</head>
<body>

    <div class="main-container">
        @yield('content')
    </div>

    <script src="{{ asset('assets/js/vendor-override/tooltip.js') }}"></script>
    <script src="{{ asset('assets/js/components/legacy-sidebar/dashboard-msb.js') }}"></script>
    <script src="{{ asset('assets/js/components/legacy-sidebar/common.js') }}"></script>
    <script src="{{ asset('assets/js/components/modal.js') }}"></script>

    <link rel="stylesheet" type="text/css" href="{{ asset('common/css/general.css') }}">

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
    
</body>
</html>