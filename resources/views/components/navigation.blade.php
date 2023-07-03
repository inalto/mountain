@props(['categories'=>null])

<nav class="fixed top-0 left-0 right-0 bg-white border-b border-gray-100 dark:border-gray-700 dark:bg-gray-900 shadow-lg z-10">
    <!-- Primary Navigation Menu -->
    <div class="px-4">
        <div class="flex justify-between h-16">
            <div class="w-full flex">
                <!-- Logo -->
                <div class="flex items-center flex-shrink-0 mr-6">
                    <x-hamburger x-on:click="isOpen = !isOpen; localStorage.sidebar=isOpen; console.log(isOpen);" />
                    <a href="{{ route('home') }}">
                        <x-application-logo class="block w-14 h-14" />
                    </a>
                </div>
                    <livewire:frontend.search></livewire:frontend.search>

            </div>

            <div class="hidden sm:flex sm:items-center">
                <livewire:light-switch></livewire:light-switch>
                @auth
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <x-avatar :user="Auth::user()" />
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link href="{{ route('my') }}">
                            {{ __('inalto.dashboard') }}
                        </x-dropdown-link>
                        <x-dropdown-link href="{{ route('my.have-been-there') }}">
                            {{ __('inalto.have-been-there') }}
                        </x-dropdown-link>
                        <x-dropdown-link href="{{ route('my.reports') }}">
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