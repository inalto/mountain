<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>{{$title ?? ''}} - inalto.org</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="Martini Multimedia s.a.s.">
    <x-inalto.icons></x-inalto.icons>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
    <livewire:styles />
</head>

<body class="font-sans antialiased @if(Session::get('theme')) {{Session::get('theme') }}@endif">
    <div x-data="{ isOpen: JSON.parse(localStorage.getItem('sidebar')) }" class="flex min-h-screen bg-gray-100 dark:bg-gray-900 relative">
        <x-frontend.sidebar x-cloak x-show="isOpen" :categories="$categories" :category="$category" />
        <div class="pt-16 w-full min-h-screen bg-gray-100 dark:bg-gray-900">
            <x-navigation :categories="$categories" ></x-navigation>
            <main>

                @if (isset($header) && $header->isNotEmpty())
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
                @endif

                {{ $slot ?? ''}}
                @yield('content')
            </main>
            <x-footer></x-footer>
        </div>
    </div>
    @stack('modals')

    @livewireScripts
    <!-- Scripts
                <script src="{{ mix('js/app.js') }}" defer></script>
                 -->
    @stack('scripts')
</body>

</html>