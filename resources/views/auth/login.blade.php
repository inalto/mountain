<x-login-layout>
  <x-auth-card>
    <x-slot name="logo">
      <a href="/">
        <x-application-logo class="w-32 h-32 fill-current" />
      </a>
    </x-slot>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('login') }}">
      @csrf

      <!-- Email Address -->
      <div>
        <x-label class="dark:text-gray-200" for="email" :value="__('auth.email')" />

        <x-input id="email" class="w-full h-10" type="email" name="email" :value="old('email')" required autofocus />
      </div>

      <!-- Password -->
      <div class="mt-4">
        <x-label class="dark:text-gray-200" for="password" :value="__('auth.password')" />

        <x-input id="password" class="w-full h-10" type="password" name="password" required autocomplete="current-password" />
      </div>

 

      <button class="block w-full px-4 py-2 my-6 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out bg-inalto-800 border border-transparent rounded-md hover:bg-inalto-700 active:bg-inalto-900 focus:outline-none focus:border-inalto-900 focus:shadow-outline-gray disabled:opacity-25">
        {{ __('global.login') }}
      </button>

      <!-- Remember Me -->
      <div class="flex items-center justify-between my-4">
        <x-jet-label for="remember_me" class="inline-flex items-center">
          <input id="remember_me" type="checkbox" class="text-indigo-600 border-gray-600 rounded shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:hover:bg-gray-800 dark:bg-gray-800 dark:text-white" name="remember">
          <span class="ml-2 text-sm text-gray-600 dark:text-gray-200">{{ __('auth.remember_me') }}</span>
        </x-jet-label>
      
      @if (Route::has('password.request'))
        <a class="text-sm text-gray-600 underline dark:text-gray-200 hover:text-gray-900" href="{{ route('password.request') }}">
          {{ __('global.forgot') }}
        </a>
      @endif

      </div>


      <hr class="block w-full mb-4 border-0 border-t border-gray-600" />
      <p class="mb-4 text-center dark:text-white">{{ __('global.or') }}</p>
      <hr class="block w-full mb-4 border-0 border-t border-gray-600" />

      <a class="block flex px-4 py-2 my-2 rounded text-xs text-white font-semibold tracking-widest text-center uppercase transition duration-150 ease-in-out hover:no-underline bg-[#6570c3] hover:opacity-75" href="{{ route('register') }}" >
      <svg fill="currentColor" class="w-5 h-5 -ml-1" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;"><rect id="Tavola-da-disegno1" serif:id="Tavola da disegno1" x="0" y="0" width="1024" height="1024" style="fill:none;"/><path d="M432.257,407.823c127.891,-291.318 540.37,-154.79 32.982,336.993c174.783,-321.208 93.545,-437.904 -32.982,-336.993Z" style="fill:#fbfcfb;fill-opacity:0.8;"/><path d="M163.925,829.699c153.836,96.285 156.422,26.866 399.525,-157.663c-141.542,249.252 -332.756,510.626 -399.525,157.663Z" style="fill:#fff;fill-opacity:0.5;"/><path d="M608.47,897.098c-206.102,232.516 -513.264,46.942 -106.682,-230.798c-155.883,210.534 -67.464,274.013 106.682,230.798Z" style="fill:#fbfcfb;"/><circle cx="744.873" cy="95.207" r="83.173" style="fill:#fff;fill-opacity:0.8;"/></svg>
          <span class="grow">{{ __('global.register')}}</span>
        </a>
      <div>
        @php
        $providers = [
        'google' => [
        'bgColor' => '#ec462f',
        'icon' => 'fab fa-google',
        ],
        'facebook' => [
        'bgColor' => '#1877f2',
        'icon' => 'fab fa-facebook-f',
        ],
        'linkedin' => [
        'bgColor' => '#2969b1',
        'icon' => 'fab fa-linkedin-in',
        ],
        'twitter' => [
        'bgColor' => '#41aaf1',
        'icon' => 'fab fa-twitter',
        ],
        ];
        @endphp

        @foreach($providers as $provider => $params)
        <a class="block px-4 py-2 my-2 rounded text-xs text-white font-semibold tracking-widest text-center uppercase transition duration-150 ease-in-out hover:no-underline hover:opacity-75" href="{{ route('social.login', ['provider' => $provider]) }}" style="background-color: {{ $params['bgColor'] }};">
          <i class="float-left inline-block h-5 {{ $params['icon'] }}"></i>
          {{ __('global.loginwith') }} {{$provider}}
        </a>
        @endforeach
      </div>

    </form>
  </x-auth-card>
</x-login-layout>