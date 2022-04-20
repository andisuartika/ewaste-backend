@extends('../layout/base')

@section('body')
    <body class="bg-theme-3">
        @yield('content')

        <!-- BEGIN: JS Assets-->
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=['your-google-map-api']&libraries=places"></script>
        <script src="{{ asset ('dist/js/app.js') }}"></script>
        <script src="https://kit.fontawesome.com/c1cbb08a6f.js" crossorigin="anonymous"></script>
        <!-- END: JS Assets-->
    </body>
@endsection