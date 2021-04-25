<!DOCTYPE html>
<html lang="en">
<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Системаи Идоракунии Барномаи мактаби электронии Тоҷикистон</title>
    <!-- Icons-->
    <link rel="icon" type="image/ico" href="./img/favicon.ico" sizes="any" />
    <link href="/libs/@coreui/icons/css/coreui-icons.min.css" rel="stylesheet">
    <link href="/libs/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
    <link href="/libs/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="/libs/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/pace.min.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


@yield('style')

    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        // Shared ID
        gtag('config', 'UA-118965717-3');
        // Bootstrap ID
        gtag('config', 'UA-118965717-5');
    </script>
</head>
<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
@include('admin.layouts.header')
<div class="app-body">
    @include('admin.layouts.leftSidebar')
    <main class="main">
        @yield('content')
    </main>
    @include('admin.layouts.rightSidebar')

</div>
@include('admin.layouts.footer')
@include('sweet::alert')

<!-- CoreUI and necessary plugins-->
<script src="/libs/jquery/dist/jquery.min.js"></script>
<script src="/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/libs/pace-progress/pace.min.js"></script>
<script src="/libs/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
<script src="/libs/@coreui/coreui/dist/js/coreui.min.js"></script>
<!-- Plugins and scripts required by this view-->
<script src="/libs/chart.js/dist/Chart.min.js"></script>
<script src="/libs/@coreui/coreui-plugin-chartjs-custom-tooltips/dist/js/custom-tooltips.min.js"></script>
<script src="/js/main.js"></script>
@yield('script')

</body>
</html>
