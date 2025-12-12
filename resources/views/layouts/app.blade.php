<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ env('APP_NAME') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link href="https://fonts.googleapis.com/css?family=Mansalva|Roboto&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('app/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('app/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app/css/jquery.fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app/fonts/flaticon-1/font/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('app/css/aos.css') }}">

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('app/css/style.css') }}">

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300" class="d-flex flex-column min-vh-100">

@include('app.partials.navbar')

@yield('content')

@include('app.partials.footer')

<script src="{{ asset('app/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('app/js/popper.min.js') }}"></script>
<script src="{{ asset('app/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('app/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('app/js/jquery.sticky.js') }}"></script>
<script src="{{ asset('app/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('app/js/jquery.animateNumber.min.js') }}"></script>
<script src="{{ asset('app/js/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('app/js/jquery.easing.1.3.js') }}"></script>
<script src="{{ asset('app/js/aos.js') }}"></script>

<script src="{{ asset('app/js/main.js') }}"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
