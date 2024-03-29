<!DOCTYPE html>
<html>

<head>
  <title>{{ trans('panel.site_title') }}</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="author" content="Martini Multimedia s.a.s.">
  <x-inalto.icons></x-inalto.icons>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @stack('styles')
  <livewire:styles />
  <livewire:scripts />
</head>

<body class="h-full font-sans antialiased leading-tight tracking-normal @if(Session::get('theme')) {{Session::get('theme') }}@endif">
  <div class="flex flex-col min-h-screen bg-gray-100 dark:bg-gray-900">

    <x-navigation></x-navigation>
    {{--
         <nav class="flex flex-col w-1/5 bg-white main-header navbar navbar-expand navbar-light border-bottom">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
            </li>
        </ul>

        <!-- Right navbar links -->
@if(count(config('panel.available_languages', [])) > 1)
            <ul class="ml-auto navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        {{ strtoupper(app()->getLocale()) }}
    </a>
    <div class="dropdown-menu dropdown-menu-right">
      <blade foreach|%20(config(%26%2339%3Bpanel.available_languages%26%2339%3B)%20as%20%24langLocale%20%3D%3E%20%24langName)>
        <a class="dropdown-item" href="{{ url()->current() }}?change_language={{ $langLocale }}">{{ strtoupper($langLocale) }}
          ({{ $langName }})</a>
        @endforeach
    </div>
    </li>
    </ul>
    @endif

    </nav>
    --}}

    <!-- Page Heading -->

    @if($header ?? '')
    <header class="z-10 bg-white dark:bg-gray-800 shadow">
      <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
        {{ $header ?? '' }}
      </div>
    </header>
    @endif

    <main class="flex flex-col flex-grow">
      <div class="flex flex-grow relative">
        <aside class="flex-none min-h-full bg-white shadow dark:bg-gray-800" x-data="{open: false}">
          <x-admin.sidebar></x-admin.sidebar>
        </aside>

        <!-- Main content -->
        <main class="mt-2 flex-grow w-full p-5">
          @if(session('message'))
          <div class="mb-2 row">
            <div class="col-lg-12">
              <div class="alert alert-success" role="alert">{{ session('message') }}</div>
            </div>
          </div>
          @endif
          @if($errors->count() > 0)
          <div class="alert alert-danger">
            <ul class="list-unstyled">
              @foreach($errors->all() as $error)
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



  <script src="https://unpkg.com/material-components-web@12.0.0/dist/material-components-web.min.js" defer></script>
  @stack('scripts')

  <script>
    window.addEventListener('toastr:info', event => {
      window.toastr.info(event.detail.message);
    });
    window.addEventListener('toastr:success', event => {
      window.toastr.success(event.detail.message);
    });
    window.addEventListener('toastr:warning', event => {
      window.toastr.warning(event.detail.message);
    });
    window.addEventListener('toastr:error', event => {
      window.toastr.error(event.detail.message);
    });
  </script>

</body>

</html>