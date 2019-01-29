<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{csrf_token()}}">

        <title>{{ config('APP_NAME', 'Student book club') }}</title>

        <!-- Fonts -->
        
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        
    </head>
    <body>
        @include('includes.navbar')
        <div id="wrapper">       
            <div id="content-wrapper">
                <div class="container-fluid">
                    @include('includes.messages')
                    <!-- Page Content -->
                    @yield('content')
                </div>
                <!-- /.container-fluid -->
        
                <!-- Sticky Footer -->
                @include('includes.footer')
            </div>
            <!-- /.content-wrapper -->
        </div>
        <!-- /#wrapper -->
    </body>
</html>