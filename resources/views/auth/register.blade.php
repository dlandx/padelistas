@extends('layouts.app')

@section('content')
<section>
    <div class="content-info info-home">
        <div class="login">
            <div class="login-img"></div>
            <div class="login-form">
                <form method="POST" action="{{ route('register') }}">
                    <h2 class="text-center text-uppercase mb-4">{{ __('Register') }}</h2>
                    @csrf
                    <div class="row">
                        <label for="username" class="col-md-4 col-form-label text-md-right pt-4">{{ __('Usuario') }}</label>
    
                        <div class="col-md-6">
                            <input id="username" type="text" class="input-user type-user form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="Username">
    
                            @if ($errors->has('username'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
    
                    <div class="row">
                        <label for="email" class="col-md-4 col-form-label text-md-right pt-4">{{ __('E-mail') }}</label>
    
                        <div class="col-md-6">
                            <input id="email" type="email" class="input-user form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
    
                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
    
                    <div class="row">
                        <label for="password" class="col-md-4 col-form-label text-md-right pt-4">{{ __('Password') }}</label>
    
                        <div class="col-md-6">
                            <input id="password" type="password" class="input-user form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autocomplete="new-password" placeholder="Password">
    
                            @if ($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
    
                    <div class="row">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-right pt-3">{{ __('Confirmar password') }}</label>
    
                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="input-user form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Password">
                        </div>
                    </div>
    
                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-right pt-4">{{ __('Nombre Apellido') }}</label>
    
                        <div class="col-md-6">
                            <input id="name" type="text" class="input-user form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nombre completo">
    
                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
    
                    <div class="row">
                        <label for="identity" class="col-md-4 col-form-label text-md-right pt-4">{{ __('DNI/NIE') }}</label>
    
                        <div class="col-md-6">
                            <input id="identity" type="text" class="input-user form-control{{ $errors->has('identity') ? ' is-invalid' : '' }}" name="identity" value="{{ old('identity') }}" autocomplete="identity" autofocus placeholder="Nº identidad">
    
                            @if ($errors->has('identity'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('identity') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
    
                    <div class="row">
                        <label for="phone" class="col-md-4 col-form-label text-md-right pt-4">{{ __('Número movil') }}</label>
    
                        <div class="col-md-6">
                            <input id="phone" type="tel" class="input-user form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus placeholder="Nº teléfono">
    
                            @if ($errors->has('phone'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
    
                    
                    <div class="row">
                        <label for="birthdate" class="col-md-4 col-form-label text-md-right pt-4">{{ __('Fecha nacimiento') }}</label>
    
                        <div class="col-md-6">
                            <input id="birthdate" type="date" class="input-user form-control{{ $errors->has('birthdate') ? ' is-invalid' : '' }}" name="birthdate" value="{{ old('birthdate') }}" required autocomplete="birthdate" autofocus>
    
                            @if ($errors->has('birthdate'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('birthdate') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
    
                    <div class="row">
                        <label for="gender" class="col-md-4 col-form-label text-md-right pt-4">{{ __('Género') }}</label>
    
                        <div class="col-md-6">
                            <input id="gender" type="text" class="input-user form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender" value="{{ old('gender') }}" required autocomplete="gender" autofocus>
    
                            @if ($errors->has('gender'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('gender') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
    
                    <div class="row">
                        <label for="level" class="col-md-4 col-form-label text-md-right pt-4">{{ __('Nivel') }}</label>
    
                        <div class="col-md-6">
                            <input id="level" type="text" class="input-user form-control{{ $errors->has('level') ? ' is-invalid' : '' }}" name="level" value="{{ old('level') }}" required autocomplete="level" autofocus placeholder="nivel">
    
                            @if ($errors->has('level'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('level') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
    
                    <div class="form-group row">
                        <label for="address" class="col-md-4 col-form-label text-md-right pt-4">{{ __('Dirección') }}</label>
    
                        <div class="col-md-6">
                            <input id="address" type="text" class="input-user form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" autocomplete="address" autofocus placeholder="Dirección">
    
                            @if ($errors->has('address'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
    
                    
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-outline-dark">
                                {{ __('Registrarse') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>
@endsection
