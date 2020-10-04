<nav class="flex items-center justify-between flex-wrap shadow-xl bg-blue-900 p-6">
  <div class="flex items-center flex-no-shrink text-white mr-6">
    <a href="{{ url('/') }}"><img src="/storage/theme/logo_web.png" class="fill-current h-12 w-12 mr-2" width="74" height="74" > </a>
    <a href="{{ url('/') }}" class="font-semibold text-xl tracking-tight no-underline text-blue-lighter hover:text-white">inalto.org</a>
   
  </div>
  <div class="block lg:hidden">
    <button class="flex items-center px-3 py-2 border rounded text-teal-lighter border-teal-light hover:text-white hover:border-white">
      <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/></svg>
    </button>
  </div>
  <div class="w-full block flex-grow lg:flex lg:items-center lg:w-auto">
    <div class="text-sm lg:flex-grow">

   
    </div>
    <div>
      @if (Route::has('login'))
        @auth
            <a class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-blue-800 hover:bg-white mt-4 lg:mt-0" href="{{ url('/admin') }}">Admin</a>
        @else
            <a class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-blue-800 hover:bg-white mt-4 lg:mt-0" href="{{ route('login') }}">Login</a>
            <a class="inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white hover:border-transparent hover:text-blue-800 hover:bg-white mt-4 lg:mt-0"href="{{ route('register') }}">Register</a>
        @endauth

      @endif
    </div>
  </div>
</nav>

