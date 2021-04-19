<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Мактаби электронии Тоҷикистон</title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{asset('/front/images/favicon.svg')}}" type="image/png">

    <!--====== Slick css ======-->
    <link rel="stylesheet" href="{{asset('/front/css/slick.css')}}">

    <!--====== Animate css ======-->
    <link rel="stylesheet" href="{{asset('/front/css/animate.css')}}">

    <!--====== Nice Select css ======-->
    <link rel="stylesheet" href="{{asset('/front/css/nice-select.css')}}">

    <!--====== Nice Number css ======-->
    <link rel="stylesheet" href="{{asset('/front/css/jquery.nice-number.min.css')}}">

    <!--====== Magnific Popup css ======-->
    <link rel="stylesheet" href="{{asset('/front/css/magnific-popup.css')}}">

    <!--====== Bootstrap css ======-->
    <link rel="stylesheet" href="{{asset('/front/css/bootstrap.min.css')}}">

    <!--====== Fontawesome css ======-->
    <link rel="stylesheet" href="{{asset('/front/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!--====== Default css ======-->
    <link rel="stylesheet" href="{{asset('/front/css/default.css')}}">

    <!--====== Style css ======-->
    <link rel="stylesheet" href="{{asset('/front/css/style.css')}}">

    <!--====== Responsive css ======-->
    <link rel="stylesheet" href="{{asset('/front/css/responsive.css')}}">


    <link rel="stylesheet" href="{{asset('/front/css/my.css')}}">

    @yield('style')
</head>

<body>
<!--====== HEADER PART START ======-->
@include('front.layouts.header')
<!--====== HEADER PART ENDS ======-->

@yield('content')


<!--====== FOOTER PART START ======-->
@include('front/layouts/footer')
<!--====== FOOTER PART ENDS ======-->

<!--====== BACK TO TP PART START ======-->
<a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>
<!--====== BACK TO TP PART ENDS ======-->

<!--====== jquery js ======-->
<script src="{{asset('/front/js/modernizr-3.6.0.min.js')}}"></script>
<script src="{{asset('/front/js/jquery-1.12.4.min.js')}}"></script>

<!--====== Bootstrap js ======-->
<script src="{{asset('/front/js/bootstrap.min.js')}}"></script>

<!--====== Slick js ======-->
<script src="{{asset('/front/js/slick.min.js')}}"></script>

<!--====== Magnific Popup js ======-->
<script src="{{asset('/front/js/jquery.magnific-popup.min.js')}}"></script>

<!--====== Counter Up js ======-->
<script src="{{asset('/front/js/waypoints.min.js')}}"></script>
<script src="{{asset('/front/js/jquery.counterup.min.js')}}"></script>

<!--====== Nice Select js ======-->
<script src="{{asset('/front/js/jquery.nice-select.min.js')}}"></script>

<!--====== Nice Number js ======-->
<script src="{{asset('/front/js/jquery.nice-number.min.js')}}"></script>

<!--====== Count Down js ======-->
<script src="{{asset('/front/js/jquery.countdown.min.js')}}"></script>

<!--====== Validator js ======-->
<script src="{{asset('/front/js/validator.min.js')}}"></script>

<!--====== Ajax Contact js ======-->
<script src="{{asset('/front/js/ajax-contact.js')}}"></script>

<!--====== Main js ======-->
<script src="{{asset('/front/js/main.js')}}"></script>

<!--====== Map js ======-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC3Ip9iVC0nIxC6V14CKLQ1HZNF_65qEQ"></script>
<script src="{{asset('/front/js/map-script.js')}}"></script>
@yield('scripts')

</body>
</html>
