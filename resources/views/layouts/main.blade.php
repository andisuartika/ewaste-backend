@extends('../layouts/base')

@section('body')
    <body class="bg-theme-3">
        @yield('content')

        <!-- BEGIN: JS Assets-->
        <script src="{{ asset ('dist/js/app.js') }}"></script>
        <script src="https://kit.fontawesome.com/c1cbb08a6f.js" crossorigin="anonymous"></script>
        <!-- END: JS Assets-->
        <script src="https://unpkg.com/filepond@^4/dist/filepond.js"></script>
        @yield('scripts-filepond')
    </body>
@endsection