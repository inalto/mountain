<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
  @stack('styles')
    </head>
    <body class="dark">
        <div class="font-sans antialiased leading-tight text-gray-900">

            <div class="flex flex-wrap h-full">
                <div class="w-full h-64 dark:bg-gray-900 md:w-1/2 md:h-screen" style="background-image: url('/theme/login_back.jpg');background-size:cover;background-position:70%;">
            
                </div>
                <div class="flex items-center w-full bg-gray-100 dark:bg-gray-900 md:w-1/2 justify-content">

            {{ $slot ?? '' }}
                </div>
            </div>
        </div>
    </body>
</html>