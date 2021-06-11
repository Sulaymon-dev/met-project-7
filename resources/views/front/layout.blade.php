<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Мактаби электронии Тоҷикистон</title>

    <link rel="shortcut icon" href="{{asset('/front/images/favicon.svg')}}" type="image/png">
    <link rel="stylesheet" href="{{asset('/front/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('/front/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('/front/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('/front/css/jquery.nice-number.min.css')}}">
    <link rel="stylesheet" href="{{asset('/front/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('/front/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('/front/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('/front/css/font-awesome.all.min.css')}}">
    <link rel="stylesheet" href="{{asset('/front/css/default.css')}}">
    <link rel="stylesheet" href="{{asset('/front/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('/front/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('/front/css/my.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    @yield('style')
</head>

<body>
@include('front.layouts.header')

@yield('content')

@include('front/layouts/footer')
<a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>
<script src="{{asset('/front/js/modernizr-3.6.0.min.js')}}"></script>
<script src="{{asset('/front/js/jquery-1.12.4.min.js')}}"></script>
<script src="{{asset('/front/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/front/js/slick.min.js')}}"></script>
<script src="{{asset('/front/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('/front/js/waypoints.min.js')}}"></script>
{{--<script src="{{asset('/front/js/jquery.min.js')}}"></script>--}}
<script src="{{asset('/front/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('/front/js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('/front/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('/front/js/jquery.nice-number.min.js')}}"></script>
<script src="{{asset('/front/js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('/front/js/validator.min.js')}}"></script>
<script src="{{asset('/front/js/ajax-contact.js')}}"></script>
<script src="{{asset('/front/js/main.js')}}"></script>
<script src="{{asset('/front/js/map-script.js')}}"></script>
{{--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC3Ip9iVC0nIxC6V14CKLQ1HZNF_65qEQ"></script>--}}
@yield('scripts')

</body>
</html>
