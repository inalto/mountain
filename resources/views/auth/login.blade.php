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

                <x-input id="email" class="block w-full mt-1 px-2 py-1 focus:outline-none focus:ring ring-blue-200 dark:border-gray-600 dark:bg-gray-800 dark:text-white" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label class="dark:text-gray-200" for="password" :value="__('auth.password')" />

                <x-input id="password" class="block w-full mt-1 px-2 py-1 focus:outline-none focus:ring ring-blue-200 dark:border-gray-600 dark:bg-gray-800 dark:text-white"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="text-indigo-600 border-gray-300 rounded shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:hover:bg-gray-800 dark:bg-gray-800 dark:text-white" name="remember">
                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-200">{{ __('auth.remember_me') }}</span>
                </label>
            </div>

            @if (Route::has('password.request'))

            <div class="flex items-center justify-end mt-4">
                    <a class="text-sm text-gray-600 underline dark:text-gray-200 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
            </div>
            @endif

            <button class="block w-full px-4 py-2 my-2 text-xs font-semibold tracking-widest text-center text-white uppercase transition duration-150 ease-in-out bg-blue-800 border border-transparent rounded-md hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:shadow-outline-gray disabled:opacity-25">
                {{ __('Log in') }}
            </button>

        <p class="mb-4 text-center dark:text-white">OR</p>
        <hr class="block w-full mb-4 border-0 border-t border-gray-300" />
  
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
      <a 
        class="block px-4 py-2 my-2 rounded text-xs text-white font-semibold tracking-widest text-center uppercase transition duration-150 ease-in-out hover:no-underline hover:opacity-75" 
        href="{{ route('social.login', ['provider' => $provider]) }}"
        style="background-color: {{ $params['bgColor'] }};"
      >
        <i class="float-left inline-block h-5 {{ $params['icon'] }}"></i>
        Login with {{ ucwords($provider) }}
      </a>
    @endforeach
</div>

        </form>
    </x-auth-card>
</x-login-layout>
