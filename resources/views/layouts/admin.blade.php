<!DOCTYPE html>
<html>

<head>
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
    <script type="text/javascript" src="/js/app.js"></script>
    @stack('styles')
    
    @livewireStyles


</head>

<body class="h-full font-sans antialiased leading-tight tracking-normal dark">
    <div class="flex flex-col min-h-screen bg-gray-100 dark:bg-gray-900">
      
        <x-navigation-dropdown></x-navigation-dropdown>

        {{--
         <nav class="flex flex-col w-1/5 bg-white main-header navbar navbar-expand navbar-light border-bottom">
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

    </nav> 
    --}}

            <!-- Page Heading -->

            @if ($header ?? '')
            <header class="z-10 bg-white shadow">
                <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                    {{ $header ?? '' }}
                </div>
            </header>
            @endif

            <main class="flex flex-col flex-grow">
                <div class="flex flex-grow relative">
                    <aside class="flex-none min-h-full bg-white shadow dark:bg-gray-800"  x-data="{open: false}">
                        <x-admin.sidebar></x-admin.sidebar>
                    </aside>
                
                    <!-- Main content -->
                    <main class="mt-2 flex-grow w-full p-5">
                        @if (session('message'))
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
                @endif 
                        {{ $slot ?? '' }}

                        @yield('content')
                    </main>
                    <!-- /.content -->
                </div>
        </main>
        <footer class="w-full p-2 bg-gray-200 main-footer">

            &copy; 2000 - <?= date('Y') ?> inalto.org
    </footer>

</div>
    
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    @stack('scripts')
    
</body>

</html>
