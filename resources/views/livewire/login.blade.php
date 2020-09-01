
<form wire:submit.prevent="submit">
<div class="row">
    <div class="col">
        <img src="/images/logo.png" alt="inalto.org" class="w-25 mb-5 d-block mx-auto">
    </div>
</div>
    <div class="row">
        <div class="col">

            <div class="form-group">
                <input type="email" class="form-control placeholder=" Email" wire:model="email" autofocus
                    placeholder="{{ trans('global.login_email') }}" />
                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <input id="password" type="password" class="form-control" name="password"
                    placeholder="{{ trans('global.login_password') }}" wire:model="password" />
                @error('password') <span class="text-danger">{{ $message }}</span> @enderror
            </div>

        </div>
    </div>

    @if(session()->has('errors'))
    <div class="row">
        <div class="col">

            <p class="alert alert-danger">
                @foreach (session()->get('errors')->all() as $error)
                {{ $error }}
                @endforeach
            </p>

        </div>
    </div>
    @endif
    <div class="row mb-2">
        <div class="col">
            <div class="icheck-primary">
                <input wire:model="remember" type="checkbox" name="remember" id="remember">
                <label for="remember">{{ trans('global.remember_me') }}</label>
            </div>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col">
            <button type="submit" class="btn btn-primary btn-block btn-flat">
                {{ trans('global.login') }}
            </button>
        </div>
        <!-- /.col -->
    </div>
    @if(Route::has('password.request'))
    <p class="mb-2">
        <a href="{{ route('password.request') }}">
            {{ trans('global.forgot_password') }}
        </a>
    </p>
    @endif

    <div class="row">
        <div class="col">
            <a href="{{ route('auth.login.social', 'google') }}" class="btn btn-secondary">
                <i class="fa fa-google"></i> Login with Google
            </a>
            <a href="{{ route('auth.login.social', 'facebook') }}" class="btn btn-secondary">
                <i class="fa fa-facebook"></i> Login with Facebook
            </a>
        </div>
    </div>
</form>

