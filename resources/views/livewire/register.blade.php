<div  class="w-full px-8 pt-6 pb-8 mb-4">
    <form  wire:submit.prevent="submit">
        <div class="mb-4">
            <img src="/images/logo.png" alt="inalto.org" class="w-1/3 mb-5 d-block mx-auto">
    </div>
    <div class="mb-4">
        <label class="block text-grey-darker text-sm font-bold mb-2" for="email">@lang('forms.register.name')</label>
        <input
            class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline"
            name="name"
            type="text"
            wire:model="name"
            value="{{ old('name') }}"
            aria-describedby="nameHelpText"
            autofocus
            required>
            @error('name') <div class="callout small alert text-center">{{ $message }}</div> @enderror

    </div>
    <div class="mb-4">
        <label class="block text-grey-darker text-sm font-bold mb-2" for="email">@lang('forms.register.email_address')</label>
        <input
            class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline"
            name="email"
            type="email"
            wire:model="email"
            autofocus
            placeholder="{{ trans('global.login_email') }}"
            aria-describedby="emailHelpText"
            required>
            @error('email') <div class="callout small alert text-center">{{ $message }}</div> @enderror

    </div>
    <div class="mb-4">
        <label class="block text-grey-darker text-sm font-bold mb-2" for="password">@lang('forms.register.password')</label>
        <input
            class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline"
            name="password"
            type="password"
            wire:model="password"
            aria-describedby="passwordHelpText"
            required>
            @error('password') <div class="callout small alert text-center">{{ $message }}</div> @enderror

    </div>

    <div class="mb-4">
        <label class="block text-grey-darker text-sm font-bold mb-2" for="password-confirm">@lang('forms.register.confirm_password')</label>
        <input
            class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline"
            name="password_confirmation"
            type="password"
            wire:model="password_confirmation"
            aria-describedby="passwordHelpText"
            required>
    </div>
    @if(session()->has('errors'))
    <div class="mb-4">
        <div class="callout small alert">

            <p >
                @foreach (session()->get('errors')->all() as $error)
                {{ $error }}
                @endforeach
            </p>

        </div>
    </div>
    @endif

    <div class="flex items-center justify-between">
        <button class="w-full bg-blue-700 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">@lang('forms.register.register')</button>
    </div>
</form></div>
