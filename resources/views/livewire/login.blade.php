<div class="w-full px-8 pt-6 pb-8 mb-4">
    <form  wire:submit.prevent="submit">
    <div class="mb-4">
            <img src="/images/logo.png" alt="inalto.org" class="w-1/3 mb-5 d-block mx-auto">
    </div>
    <div class="mb-4">
    <input  class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline" type="email" class="form-control placeholder=" Email" wire:model="email" autofocus placeholder="{{ trans('global.login_email') }}" />
    @error('email') <div class="callout small alert text-center">{{ $message }}</div> @enderror
    </div>
    <div class="mb-4">
    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-grey-darker leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" class="form-control" name="password" placeholder="{{ trans('global.login_password') }}" wire:model="password" />
    @error('password') <div class="callout small alert text-center">{{ $message }}</div> @enderror
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
        <div class="mb-4">
            <input wire:model="remember" type="checkbox" name="remember" id="remember">
            <label for="remember">{{ trans('global.remember_me') }}</label>
        </div>
    
        <div class="mb-4">
            
                <button  class="w-full bg-blue-700 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    {{ trans('global.login') }}
                </button>
        </div>
    
        @if(Route::has('password.request'))
        <p class="mb-4">
            <a class="inline-block align-baseline font-bold text-sm text-blue hover:text-blue-darker" href="{{ route('password.request') }}">
                {{ trans('global.forgot_password') }}
            </a>
        </p>
        @endif
    
        <div class="mb-4 flex">
            
                <a href="{{ route('auth.login.social', 'google') }}" class="bg-red-700 hover:bg-red-900 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full mb-4">
                    <i class="fa fa-google"></i> Login with Google
                </a>
                <a href="{{ route('auth.login.social', 'facebook') }}" class="bg-indigo-700 hover:bg-indigo-900 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full mb-4">
                    <i class="fa fa-facebook"></i> Login with Facebook
                </a>
    
        </div>
    </form>
    </div>
    