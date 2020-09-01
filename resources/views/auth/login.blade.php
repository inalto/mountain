@extends('layouts.login')
@section('content')
<div class="d-flex flex-column flex-sm-wrap flex-md-row flex-lg-row vh-100">
<div class="col-12 col-md-6 col-lg-6 d-none d-md-flex" style="background:url('/storage/theme/login_back.jpg'); background-size:cover; background-position:center;">&nbsp;</div>

<div class="col-12 col-md-6 col-lg-6  d-flex flex-column justify-content-center p-1 p-md-2 p-lg-3">

<livewire:login />

<?php
/*
    <div class="login-logo">
        <div class="login-logo">
            <a href="{{ route('admin.home') }}">
                {{ trans('panel.site_title') }}
            </a>
        </div>
    </div>

            <p class="login-box-msg">
                {{ trans('global.login') }}
            </p>

            @if(session()->has('message'))
                <p class="alert alert-info">
                    {{ session()->get('message') }}
                </p>
            @endif

            <form action="{{ route('login') }}" method="POST">
                @csrf

                <div class="form-group">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autocomplete="email" autofocus placeholder="{{ trans('global.login_email') }}" name="email" value="{{ old('email', null) }}">

                    @if($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="{{ trans('global.login_password') }}">

                    @if($errors->has('password'))
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                </div>


                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" name="remember" id="remember">
                            <label for="remember">{{ trans('global.remember_me') }}</label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">
                            {{ trans('global.login') }}
                        </button>
                    </div>
                    <!-- /.col -->
                </div>
                <div class="row">
                <div class="col-xs-12">
                    <a href="{{ route('auth.login.social', 'google') }}" class="btn btn-default">
                        <i class="fa fa-google"></i> Login with Google
                    </a>
                    <a href="{{ route('auth.login.social', 'facebook') }}" class="btn btn-default">
                        <i class="fa fa-facebook"></i> Login with Facebook
                    </a>
                </div>
            </div>
            </form>


            @if(Route::has('password.request'))
                <p class="mb-1">
                    <a href="{{ route('password.request') }}">
                        {{ trans('global.forgot_password') }}
                    </a>
                </p>
            @endif
            <p class="mb-1">
                <a class="text-center" href="{{ route('register') }}">
                    {{ trans('global.register') }}
                </a>
            </p>
*/
?>
</div>
</div>
@endsection
