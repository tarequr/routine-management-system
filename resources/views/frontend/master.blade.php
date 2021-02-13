<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Routine Management System</title>

    <!-- Favicon -->
    <link rel="icon" href="{{asset('public/frontEnd')}}/img/core-img/favicon.ico">

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="{{asset('public/frontEnd')}}/style.css">

</head>

<body>
    <!-- ##### Preloader ##### -->
    <div id="preloader">
        <i class="circle-preloader"></i>
    </div>

    <!-- ##### Header Area Start ##### -->
    @include('frontend.includes.header')
    <!-- ##### Header Area End ##### -->
    @yield('content')
    <!-- ##### CTA Area End ##### -->

    <!-- ##### Footer Area Start ##### -->
    @include('frontend.includes.footer')
    <!-- ##### Footer Area Start ##### -->

    <!-- ##### All Javascript Script ##### -->
    <!-- jQuery-2.2.4 js -->
    <script src="{{asset('public/frontEnd')}}/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="{{asset('public/frontEnd')}}/js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="{{asset('public/frontEnd')}}/js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins js -->
    <script src="{{asset('public/frontEnd')}}/js/plugins/plugins.js"></script>
    <!-- Active js -->
    <script src="{{asset('public/frontEnd')}}/js/active.js"></script>
</body>

</html>