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
@include('inalto.components.icons')

<link rel="stylesheet" href="/css/app.css" >
    <!-- ANIMATE -->	
{{--		<link rel='stylesheet' href="{{ mix('css/animate.min.css') }}"> --}}

@livewireStyles

	</head>
	<body class="flex flex-col h-full font-sans leading-tight tracking-normal bg-grey-200">
	@include('inalto.components.navigation')
	@include('inalto.components.header')
	@include('inalto.components.header2')
		<main class="flex-1">
@yield('content')
      
		</main>
  {{--  @include('partials.footer')--}}
  <script type="text/javascript" src="js/app.js"></script>
 @livewireScripts
	</body>
</html>		