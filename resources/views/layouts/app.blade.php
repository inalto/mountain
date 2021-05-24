<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <title>inalto.org - @yield('title')</title>
    <meta charset=utf-8>
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    <meta name="robots" content="index, follow">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="description" content="@yield('description')">
    <meta name="author" content="Martini Multimedia s.a.s.">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    @include('inalto.components.icons')

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @livewireStyles
    @yield('styles')

  

</head>

<body class="font-sans antialiased ">
    <div class="bg-gray-100 dark:bg-gray-900 ">
        <x-navigation-dropdown></x-navigation-dropdown>
        <!-- Page Heading -->
        <header class="text-gray-800 bg-white shadow dark:bg-gray-800 dark:text-white">
            <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
  <!-- Scripts -->
    @livewireScripts
    <script type="text/javascript" src="/js/app.js"></script>

</body>

</html>
