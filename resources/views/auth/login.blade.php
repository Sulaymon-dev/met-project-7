@extends('layouts.app')

@section('content')
    <div class="toggle"><i class="fa fa-user-plus"></i>
    </div>
    <div class="form formLogin">
        <h2>Login to your account</h2>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <div class="remember text-left">
                <div class="checkbox checkbox-primary">
                    <input id="checkbox2" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="checkbox2">
                        {{ __('Remember Me') }}
                    </label>
                </div>
            </div>
            <button type="submit">{{ __('Login') }}</button>
            @if (Route::has('password.request'))
                <div class="forgetPassword"><a href="javascript:void(0)">{{ __('Forgot Your Password?') }}</a>
                </div>
            @endif
        </form>
    </div>
    <div class="form formRegister">
        <h2>{{ __('Create an account') }}</h2>
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus  placeholder="Username">
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"  placeholder="Email">
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password"  placeholder="Confirm password">
            <button type="submit">{{ __('Register') }}</button>

        </form>
    </div>
    <div class="form formReset">
        <h2>Reset your password?</h2>
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <button type="submit">{{ __('Send Password Reset Link') }}</button>
        </form>
    </div>
@endsection

