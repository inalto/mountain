<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <title>{{$title ?? ''}} - inalto.org</title>
  <meta charset="UTF-8">
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
  <div x-data="{ isOpen: false }" class="flex min-h-screen bg-gray-100 dark:bg-gray-900 relative">
    <aside class="fixed flex-none min-h-full bg-white shadow dark:bg-gray-800" x-data="{open: false}">
      <x-admin.sidebar></x-admin.sidebar>
    </aside>


    <!-- Main content -->
    <div class="pt-16 w-full min-h-screen bg-gray-100 dark:bg-gray-900">
      <x-navigation ></x-navigation>
      <main class="mt-2 flex-grow w-full p-5 pl-72">
        

        @if($header ?? '')
        <header class="z-10 bg-white dark:bg-gray-800 shadow">
          <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
            {{ $header ?? '' }}
          </div>
        </header>
        @endif

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
      <x-footer></x-footer>
  </div>
  </div>
  <livewire:scripts />



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