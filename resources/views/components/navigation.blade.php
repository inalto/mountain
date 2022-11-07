@props(['categories'=>null])

<nav class="bg-white border-b border-gray-100 dark:border-gray-700 dark:bg-gray-900">
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center flex-shrink-0">

                    <a href="{{ route('home') }}">
                        <x-application-logo class="block w-14 h-14" />
                    </a>

                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                @auth
                    <x-jet-nav-link class="dark:text-gray-200 dark:hover:text-white" href="{{ route('admin.home') }}" :active="request()->routeIs('admin')">
                        {{ __('Admin') }}
                    </x-jet-nav-link>
                @endauth



                @if ($categories)
                <x-dropdown align="left" width="48">
                    <x-slot name="trigger">
                        <x-jet-nav-link class="dark:text-gray-200 dark:hover:text-white h-full" >
                            {{ __('global.reports') }}
                        </x-jet-nav-link>
                    </x-slot>
                    <x-slot name="content">
                        @foreach($categories as $category)
                            <x-dropdown-link class="dark:text-gray-200 dark:hover:text-white" href="{{ route('reports', $category->slug) }}">
                                {{ $category->name }}
                            </x-dropdown-link>
                        @endforeach
                        <div class="border-t border-gray-100 border-gray-800"></div>
                       
                    </x-slot>
                </x-dropdown>
                @endif

                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <livewire:light-switch></livewire:light-switch>
                @auth
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <x-avatar :user="Auth::user()" />
                    </x-slot>
                    <x-slot name="content">
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Account') }}
                        </div>
                        <x-dropdown-link href="{{ route('reports.my') }}">
                            {{ __('inalto.my') }}
                        </x-dropdown-link>
                        <x-dropdown-link href="{{ route('profile.show') }}">
                            {{ __('inalto.settings') }}
                        </x-dropdown-link>
                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-dropdown-link href="{{ route('api-tokens.index') }}">
                            {{ __('API Tokens') }}
                        </x-dropdown-link>
                        @endif
                        <div class="border-t border-gray-100 dark:border-gray-800"></div>
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Logout') }}
                            </x-jet-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
                @else
                <a href="{{ route('login') }}" class="block flex text-sm font-semibold  hover:bg-gray-100/50 border-gray-100 hover:text-inalto-500 text-gray-600 dark:hover:bg-gray-700 dark:hover:text-inalto-500 dark:bg-gray-800 dark:text-white rounded-lg h-10  p-2  border dark:border-gray-700">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-2">
                        <path d="M6.28548 15.0861C7.34369 13.1814 9.35142 12 11.5304 12H12.4696C14.6486 12 16.6563 13.1814 17.7145 15.0861L19.3493 18.0287C20.0899 19.3618 19.1259 21 17.601 21H6.39903C4.87406 21 3.91012 19.3618 4.65071 18.0287L6.28548 15.0861Z" fill="currentColor"></path>
                        <rect opacity="0.3" x="8" y="3" width="8" height="8" rx="4" fill="currentColor"></rect>
                    </svg>{{ __('global.login') }}
                </a>
                {{-- 
                    <x-nav-link href="{{ route('login') }}">{{ __('Login') }}</x-nav-link>
                <x-nav-link href="{{ route('register') }}">{{ __('Register') }}</x-nav-link>
                --}}
                @endauth
            </div>
        </div>
    </div>

</nav>