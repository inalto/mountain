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

		
        <x-inalto.icons></x-inalto.icons>
			
		@vite(['resources/css/app.css', 'resources/js/app.js'])
  @stack('styles')

@livewireStyles

	</head>
	<body class="flex flex-col h-full font-sans leading-tight tracking-normal bg-grey-200">
		<div class="min-h-screen bg-gray-100">
            @livewire('navigation-dropdown') 

      
            <!-- Page Content -->
			<main>
				{{ $slot ?? '' }}
			</main>
        </div>

        @stack('modals')

        @livewireScripts

	</body>
</html>		