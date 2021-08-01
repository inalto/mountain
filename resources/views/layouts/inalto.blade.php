<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
 	<head>
		<title>inalto.org - @yield('title')</title>
		<meta charset=utf-8 >
		<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
		<meta name="robots" content="index, follow" > 
		<meta name="keywords" content="@yield('keywords')" > 
		<meta name="description" content="@yield('description')" > 
		<meta name="author" content="Martini Multimedia s.a.s.">

		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        @include('inalto.components.icons')
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" />

    <!-- ANIMATE -->	
{{--		<link rel='stylesheet' href="{{ mix('css/animate.min.css') }}"> --}}

@livewireStyles

	</head>
	<body class="flex flex-col h-full font-sans leading-tight tracking-normal bg-grey-200">
		<div class="min-h-screen bg-gray-100">
            @livewire('navigation-dropdown') 

      
            <!-- Page Content -->
            <main>
               
            </main>
        </div>

        @stack('modals')

        @livewireScripts
		<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.0/dist/alpine.js" defer></script>

	</body>
</html>		