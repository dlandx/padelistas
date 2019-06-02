@extends('layouts.app')

@section('head')
    <script src="{{ asset('js/app.js') }}" defer></script>
@endsection

@section('content')
<section>
    <div class="content-info info-home">
        <div class="login">
            <div class="login-img"></div>
            <div class="login-form">
                <form method="POST" action="{{ route('user.update', $users->id) }}">
                    <h2 class="text-center text-uppercase mb-4">{{ __('Registrar usuario') }}</h2>
                    @csrf
                    <div class="row">
                        <label for="username" class="col-md-4 col-form-label text-md-right pt-4">{{ __('Usuario') }}</label>

                        <div class="col-md-6">
                            <input id="username" type="text" class="input-user form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ $users->username }}" required autocomplete="username" autofocus>

                            @if ($errors->has('username'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <label for="email" class="col-md-4 col-form-label text-md-right pt-4">{{ __('E-Mail Address') }}</label>

                        <div class="col-md-6">
                            <input id="email" type="email" class="input-user form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $users->email }}" required autocomplete="email">

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-right pt-4">{{ __('Nombre Apellido') }}</label>

                        <div class="col-md-6">
                            <input id="name" type="text" class="input-user form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $users->name }}" required autocomplete="name" autofocus>

                            @if ($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <label for="identity_card" class="col-md-4 col-form-label text-md-right pt-4">{{ __('DNI/NIE') }}</label>

                        <div class="col-md-6">
                            <input id="identity_card" type="text" class="input-user form-control{{ $errors->has('identity_card') ? ' is-invalid' : '' }}" name="identity_card" value="{{ $users->identity_card }}" autocomplete="identity_card" autofocus>

                            @if ($errors->has('identity_card'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('identity_card') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <label for="phone_number" class="col-md-4 col-form-label text-md-right pt-4">{{ __('Número movil') }}</label>

                        <div class="col-md-6">
                            <input id="phone_number" type="text" class="input-user form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number" value="{{ $users->phone_number }}" required autocomplete="phone_number" autofocus>

                            @if ($errors->has('phone_number'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('phone_number') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="row">
                        <label for="birthdate" class="col-md-4 col-form-label text-md-right pt-4">{{ __('Fecha nacimiento') }}</label>

                        <div class="col-md-6">
                            <input id="birthdate" type="text" class="input-user form-control{{ $errors->has('birthdate') ? ' is-invalid' : '' }}" name="birthdate" value="{{ $users->birthdate }}" required autocomplete="birthdate" autofocus>

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
                            <input id="gender" type="text" class="input-user form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender" value="{{ $users->gender }}" required autocomplete="gender" autofocus>

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
                            <input id="level" type="text" class="input-user form-control{{ $errors->has('level') ? ' is-invalid' : '' }}" name="level" value="{{ $users->level }}" required autocomplete="level" autofocus>

                            @if ($errors->has('level'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('level') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <label for="address" class="col-md-4 col-form-label text-md-right pt-4">{{ __('Dirección') }}</label>

                        <div class="col-md-6">
                            <input id="address" type="text" class="input-user form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ $users->address }}" autocomplete="address" autofocus>

                            @if ($errors->has('address'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    
                    <input type="hidden" name="_method" value="PUT">

                    <div class="row mt-2 px-5">
                        <div class="col-md-6">
                            <a href="{{ route('user.index') }}" class="link">
                                <button type="button" class="btn btn-outline-danger btn-block">
                                        {{ __('Volver') }}
                                </button>
                            </a>
                        </div>

                        <div class="col-md-6">
                            <button type="submit" class="btn btn-outline-success btn-block">
                                {{ __('Modificar') }}
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>
{{--}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Modificar usuario') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user.update', $users->id) }}">
                        @csrf
                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Usuario') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ $users->username }}" required autocomplete="username" autofocus>

                                @if ($errors->has('username'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $users->email }}" required autocomplete="email">

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" value="{{ $users->password }}" required autocomplete="new-password">

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="{{ $users->password }}" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre Apellido') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $users->name }}" required autocomplete="name" autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="identity_card" class="col-md-4 col-form-label text-md-right">{{ __('DNI/NIE') }}</label>

                            <div class="col-md-6">
                                <input id="identity_card" type="text" class="form-control{{ $errors->has('identity_card') ? ' is-invalid' : '' }}" name="identity_card" value="{{ $users->identity_card }}" autocomplete="identity_card" autofocus>

                                @if ($errors->has('identity_card'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('identity_card') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Número movil') }}</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="text" class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number" value="{{ $users->phone_number }}" required autocomplete="phone_number" autofocus>

                                @if ($errors->has('phone_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        
                        <div class="form-group row">
                            <label for="birthdate" class="col-md-4 col-form-label text-md-right">{{ __('Fecha nacimiento') }}</label>

                            <div class="col-md-6">
                                <input id="birthdate" type="text" class="form-control{{ $errors->has('birthdate') ? ' is-invalid' : '' }}" name="birthdate" value="{{ $users->birthdate }}" required autocomplete="birthdate" autofocus>

                                @if ($errors->has('birthdate'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('birthdate') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Género') }}</label>

                            <div class="col-md-6">
                                <input id="gender" type="text" class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender" value="{{ $users->gender }}" required autocomplete="gender" autofocus>

                                @if ($errors->has('gender'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="level" class="col-md-4 col-form-label text-md-right">{{ __('Nivel') }}</label>

                            <div class="col-md-6">
                                <input id="level" type="text" class="form-control{{ $errors->has('level') ? ' is-invalid' : '' }}" name="level" value="{{ $users->level }}" required autocomplete="level" autofocus>

                                @if ($errors->has('level'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('level') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Dirección') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ $users->address }}" autocomplete="address" autofocus>

                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <input type="hidden" name="_method" value="PUT">

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>{{--}}
@endsection
