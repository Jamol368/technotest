<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, minimum-scale=1.0">
    <meta name="keywords" content="technotest, attestatsiya, texnologiya, test">
    <meta name="description" content="Texnologiya fanidan testlar">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ env('APP_NAME') }}</title>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('test/css/styles.css') }}" media="all" onload="this.media='all'">
    <link rel="stylesheet" type="text/css" href="{{ asset('test/css/test.css') }}" media="all">

</head>
<body class="light theme-default">

<div class="app-root">

    <div class="app-testing">

        <div class="content-wrapper">

            <div class="layout">

                <div class="empty-layout">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('test/js/tabs.js') }}"></script>

<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>

</body>

</html>
