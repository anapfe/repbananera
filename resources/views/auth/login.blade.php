@extends('layouts.frontLayout')

@section('content')
  <div class="main">
    <div class="caja">
      <div class="section-title">
        {{ __('Login') }}
      </div>

      <div class="form-div">
        <form class="login_form" action="{{ route('login') }}" method="POST">
          @csrf

          <div class="input email {{ $errors->has('email') ? ' has-error' : '' }}">
            <label class="form-label" for="email">{{ __('E-mail') }}</label>
            <input class="input-login" type="email" name="email" id="email" value="{{ old('email') }}" autofocus>
            @if ($errors->has('email'))
              <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
              </span>
            @endif
          </div>
          <div class="input password {{ $errors->has('password') ? ' has-error' : '' }}">
            <label class="form-label" for="password">{{ __('Contraseña') }}</label>
            <input class="input-login" type="password" name="password" id="password" value="{{ old('password') }}" autofocus>
            <i id="eye" class="far fa-eye" ></i>
            @if ($errors->has('password'))
              <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
              </span>
            @endif
          </div>
          <div class="input rememberme">
            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-label">
              recordarme
            </label>
          </div>
          <div class="input login-foot">
            <button class="btn" type="submit" name="button">ingresar</button>

            @if (Route::has('password.request'))
              <a class="input reset" href="{{ route('password.request') }}">
                {{ __('¿Olvidaste tu contraseña?') }}
              </a>
            @endif
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection


{{-- @extends('layouts.app')

@section('content')
<div class="container">
<div class="row justify-content-center">
<div class="col-md-8">
<div class="card">
<div class="card-header">{{ __('Login') }}</div>

<div class="card-body">
<form method="POST" action="{{ route('login') }}">
@csrf

<div class="form-group row">
<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

<div class="col-md-6">
<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

@error('email')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>
</div>

<div class="form-group row">
<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

<div class="col-md-6">
<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

@error('password')
<span class="invalid-feedback" role="alert">
<strong>{{ $message }}</strong>
</span>
@enderror
</div>
</div>

<div class="form-group row">
<div class="col-md-6 offset-md-4">
<div class="form-check">
<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

<label class="form-check-label" for="remember">
{{ __('Remember Me') }}
</label>
</div>
</div>
</div>

<div class="form-group row mb-0">
<div class="col-md-8 offset-md-4">
<button type="submit" class="btn btn-primary">
{{ __('Login') }}
</button>

@if (Route::has('password.request'))
<a class="btn btn-link" href="{{ route('password.request') }}">
{{ __('Forgot Your Password?') }}
</a>
@endif
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>
@endsection --}}
