<!DOCTYPE html>
<html class="h-full">
 	<head>
		<title>inalto.org - @yield('title')</title>
		<meta charset=utf-8 >
		<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
		<meta name="robots" content="index, follow" > 
		<meta name="keywords" content="@yield('keywords')" > 
		<meta name="description" content="@yield('description')" > 
		<meta name="author" content="Martini Multimedia s.a.s.">

		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		
		<!-- FAVICONS -->
		<link rel="shortcut icon" href="icons/favicon-32x32.png">
		<link rel="apple-touch-icon" sizes="57x57" href="icons/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="icons/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="icons/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="icons/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="icons/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="icons/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="icons/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="icons/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="icons/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="icons/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="icons/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="icons/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="icons/favicon-16x16.png">
		<link rel="manifest" href="icons/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="icons/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">

<link rel="stylesheet" href="/css/theme.css" >
    <!-- ANIMATE -->	
{{--		<link rel='stylesheet' href="{{ mix('css/animate.min.css') }}"> --}}

@livewireStyles

	</head>
	<body class="flex flex-col h-full font-sans leading-tight">
    @include('partials.navigation')
		<main class="flex-1">
      @yield('content')
		</main>
    @include('partials.footer')
  <script type="text/javascript" src="js/app.js"></script>
 @livewireScripts
	</body>
</html>		