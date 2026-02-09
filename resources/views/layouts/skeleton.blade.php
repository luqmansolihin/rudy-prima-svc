<!DOCTYPE html><!--
* CoreUI - Free Bootstrap Admin Template
* @version v5.3.0
* @link https://coreui.io/product/free-bootstrap-admin-template/
* Copyright (c) 2025 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://github.com/coreui/coreui-free-bootstrap-admin-template/blob/main/LICENSE)
-->
<html lang="en">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <title>{{ config('app.name') }}</title>
    <link rel="apple-touch-icon" href="{{ asset('assets/img/RPS NARROW.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/RPS NARROW.png') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('assets/img/RPS NARROW.png') }}">
    <meta name="theme-color" content="#ffffff">

    @stack('styles')
</head>

<body>
    @yield('app')

    @stack('scripts')
</body>

</html>
