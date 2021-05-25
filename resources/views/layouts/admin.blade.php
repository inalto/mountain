<!DOCTYPE html>
<html>

<head>
<<<<<<< HEAD
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#000000" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <title>{{ trans('panel.site_title') }}</title>
    @livewireStyles
</head>

<body class="text-blueGray-800 antialiased">

    <noscript>You need to enable JavaScript to run this app.</noscript>

    <div id="app">
        <x-sidebar />

        <div class="relative md:ml-64 bg-gray-100 pb-12 min-h-screen">
            <div class="relative bg-pink-600 md:pt-32 pb-32 pt-12"></div>

            <div class="relative px-4 md:px-10 mx-auto w-full min-h-full -m-48">
                @yield('content')

                <x-footer />
            </div>
        </div>

    </div>

    <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    @livewireScripts
        @yield('scripts')
        @stack('scripts')
</body>

</html>
=======
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="Martini Multimedia s.a.s.">

    <title>{{ trans('panel.site_title') }}</title>
    {{-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
    <link href="{{ asset('css/adminltev3.css') }}" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" /> --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
    @include('inalto.components.icons')

    @stack('styles')
    
    @livewireStyles


</head>

<body class="h-full font-sans antialiased leading-tight tracking-normal dark">
    <div class="flex flex-col min-h-screen bg-gray-100 dark:bg-gray-900">
        {{-- @include('inalto.components.navigation') --}}
        <x-navigation-dropdown></x-navigation-dropdown>

        {{-- <nav class="flex flex-col w-1/5 bg-white main-header navbar navbar-expand navbar-light border-bottom">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
            </li>
        </ul>

        <!-- Right navbar links -->
        @if (count(config('panel.available_languages', [])) > 1)
            <ul class="ml-auto navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        {{ strtoupper(app()->getLocale()) }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        @foreach (config('panel.available_languages') as $langLocale => $langName)
                            <a class="dropdown-item" href="{{ url()->current() }}?change_language={{ $langLocale }}">{{ strtoupper($langLocale) }} ({{ $langName }})</a>
                        @endforeach
                    </div>
                </li>
            </ul>
        @endif

    </nav> --}}

        <!-- Page Heading -->
        {{-- <header class="z-10 bg-white shadow">
                <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    {{ $header ?? '' }}
                </div>
            </header> --}}
        <main class="flex flex-col flex-grow">
            <div class="flex flex-grow">

                <aside class="flex-none min-h-full bg-white shadow dark:bg-gray-800">
                    <x-admin.sidebar></x-admin.sidebar>
                </aside>
                <div class="flex-grow w-full p-5">
                    <!-- Main content -->
                    <main class="mt-2">
                        {{-- @if (session('message'))
                    <div class="mb-2 row">
                        <div class="col-lg-12">
                            <div class="alert alert-success" role="alert">{{ session('message') }}</div>
                        </div>
                    </div>
                @endif
                @if ($errors->count() > 0)
                    <div class="alert alert-danger">
                        <ul class="list-unstyled">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}
                        {{ $slot ?? '' }}
                    </main>
                    <!-- /.content -->
                </div>


            </div>
        </main>
        <footer class="w-full p-2 bg-gray-200 main-footer">

            &copy; 2000 - <?= date('Y') ?> inalto.org
    </footer>

</div>
    
    @livewireScripts
    <script type="text/javascript" src="/js/app.js"></script>
    @stack('scripts')

</body>

</html>
>>>>>>> master
