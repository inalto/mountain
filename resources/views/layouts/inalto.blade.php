<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ trans('panel.site_title') }}</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    @yield('styles')
    @livewireStyles
</head>

<body class="header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden login-page">

<header class="header-area">
        <div class="main-header d-none d-lg-block">
@include('inalto.components.header')
@include('inalto.components.header_mobile')
@include('inalto.components.header_offcanvas')
</div>
</header>

    @yield('content')

    @yield('scripts')
    @livewireScripts
</body>

</html>