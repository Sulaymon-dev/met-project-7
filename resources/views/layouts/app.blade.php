<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{--<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet" type="text/css" />--}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="{{asset('fonts/css/material-icon.css')}}"  rel="stylesheet" type="text/css" />
    <link href="{{asset('fonts/css/font-awesome.min.css')}}"  rel="stylesheet" type="text/css"/>


<!-- Styles -->
    {{--<link href="{{asset('css/app.css') }}" rel="stylesheet">--}}
    <link href="{{asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('css/extra_pages.css')}}"  rel="stylesheet" type="text/css" />

    <link rel="shortcut icon" href="http://radixtouch.in/templates/admin/smart/source/assets/img/favicon.ico" />
</head>
<body>
    <div class="form-title">
        <h1>Login Form</h1>
    </div>
    <div class="login-form text-center">
            @yield('content')

    </div>
    <!-- Scripts -->
    <script src="{{asset('js/jquery.min.js')}}" ></script>
    {{--<script src="{{asset('js/app.js') }}" defer></script>--}}
    <script src="{{asset('js/pages.js')}}" ></script>
</body>
</html>
