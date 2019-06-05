@extends('layouts.app')

@section('content')
<section class="center">
    <div class="login w-75">
        <div class="login-img img-login"></div>
        <div class="login-form text-center">
            <form method="POST" action="{{ route('login') }}">
                <h2 class="text-center text-uppercase mb-4">{{ __('Login') }}</h2>
                @csrf
                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right pt-4">{{ __('E-mail') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="input-user type-user form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Username">

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-4 col-form-label text-md-right pt-4">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="input-user form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autocomplete="current-password" placeholder="Password">

                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group offset-md-2">
                    <div class="form-check">
                        <input class="form-check-input mt-2" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>

                <div class="form-group offset-md-2">
                    <button type="submit" class="login-btn">
                        {{ __('Login') }}
                    </button>
                </div>

                <div class="form-group mt-4 offset-md-2">
                    @if (Route::has('password.request'))
                        <a class="red" href="{{ route('password.request') }}">
                            {{ __('¿Olvidó su contraseña?') }}
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</section>
{{--}}
<section>
    <div class="content-info info-home">
        <div class="login">
            <div class="login-img"></div>
            <div class="login-form">
                <form method="POST" action="{{ route('login') }}">
                    <h2 class="text-center text-uppercase mb-4">{{ __('Login') }}</h2>
                    @csrf
                {{ -- }}
                    <div class="form-group">
                        <input id="email" type="email" class="input-user {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Usuario">

                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <input id="password" type="password" class="input-user {{ $errors->has('password') ? 'is-invalid' : '' }}" name="password" required autocomplete="current-password" placeholder="Contraseña">
    
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="login-btn">
                            {{ __('Login') }}
                        </button>
                    </div>

                    <div class="form-group mt-4">
                        @if (Route::has('password.request'))
                            <a class="link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                {{-- }}
                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right pt-4">{{ __('E-mail') }}</label>
    
                        <div class="col-md-6">
                            <input id="email" type="email" class="input-user type-user form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Username">
    
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right pt-4">{{ __('Password') }}</label>
    
                        <div class="col-md-6">
                            <input id="password" type="password" class="input-user form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autocomplete="current-password" placeholder="Password">
    
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
    
                    <div class="form-group offset-md-2">
                        <div class="form-check">
                            <input class="form-check-input mt-2" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>

                    <div class="form-group offset-md-2">
                        <button type="submit" class="login-btn">
                            {{ __('Login') }}
                        </button>
                    </div>

                    <div class="form-group mt-4 offset-md-2">
                        @if (Route::has('password.request'))
                            <a class="link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>{{--}}
@endsection
