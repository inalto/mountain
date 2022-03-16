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

                    <x-jet-nav-link class="dark:text-gray-200 dark:hover:text-white" href="{{ route('admin.home') }}"
                        :active="request()->routeIs('admin')">
                        {{ __('Admin') }}
                    </x-jet-nav-link>

                </div>
            </div>
            @auth


                <!-- Settings Dropdown -->
                <div  class="hidden sm:flex sm:items-center sm:ml-6">
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <x-avatar :user="Auth::user()" />
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>
                            <x-light-switch />
                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-jet-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-jet-dropdown-link>
                            @endif

                            <div class="border-t border-gray-100"></div>
                           
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                                                    this.closest('form').submit();">
                                    {{ __('Logout') }}
                                </x-jet-dropdown-link>
                            </form>
                        </x-slot>
                    </x-jet-dropdown>
                </div>


            @else

                <x-nav-link href="{{ route('login') }}">{{ __('Login') }}</x-nav-link>
                <x-nav-link href="{{ route('register') }}">{{ __('Register') }}</x-nav-link>

            @endauth
           
        </div>
    </div>

</nav>
