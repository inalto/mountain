<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <title>inalto.org - @yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <title>{{ trans('panel.site_title') }}</title>

    @include('inalto.components.icons')

    @livewireStyles
    @yield('styles')
</head>

<body class="font-sans antialiased ">
    <div class="bg-gray-100 dark:bg-gray-900 ">
        <x-navigation-dropdown></x-navigation-dropdown>
        <!-- Page Heading -->
        <header class="text-gray-800 bg-white shadow dark:bg-gray-800 dark:text-white">
            <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                {{ $header ?? ''}}
            </div>
        </header>
        <!-- Page Content -->
        <main>
            {{ $slot ?? '' }}
        </main>
    </div>
    <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>

    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    @livewireScripts
</body>

</html>
