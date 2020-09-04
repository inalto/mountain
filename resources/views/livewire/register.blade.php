<div>
<form wire:submit.prevent="submit">
    <div class="row">
        <div class="col">
            <img src="/images/logo.png" alt="inalto.org" class="w-25 mb-5 d-block mx-auto">
        </div>
    </div>
    <div class="row">
        <div class="col">
        <div class="form-group">
            <input type="text" name="name" wire:model="name" class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}" required autofocus placeholder="{{ trans('global.user_name') }}" value="{{ old('name', null) }}">
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror

        </div>
        <div class="form-group">
            <input type="email" name="email" wire:model="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_email') }}" value="{{ old('email', null) }}">
            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <input type="password" name="password" wire:model="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.login_password') }}">
            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <input type="password" name="password_confirmation" wire:model="password_confirmation" class="form-control" required placeholder="{{ trans('global.login_password_confirmation') }}">
            @error('password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>
    </div>
    <div class="row">
        <div class="col-12 text-right">
            <button type="submit" class="btn btn-primary btn-block btn-flat">
                {{ trans('global.register') }}
            </button>
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
    </form>
</div>