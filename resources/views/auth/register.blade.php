<x-login-layout>
<x-auth-card>
    <x-slot name="logo">
      <a href="/">
        <x-application-logo class="w-32 h-32 fill-current" />
      </a>
    </x-slot>
        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label class="dark:text-gray-200" for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label class="dark:text-gray-200" for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label class="dark:text-gray-200" for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label class="dark:text-gray-200" for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-200 hover:text-[#6570c3]" href="{{ route('login') }}">
                    {{ __('global.already') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('global.register') }}
                </x-jet-button>
            </div>
        </form>
    </x-auth-card>
</x-login-layout>
