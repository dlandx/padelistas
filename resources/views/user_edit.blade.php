@extends('layouts.app')

@section('head')
    <script src="{{ asset('js/app.js') }}" defer></script>
@endsection

@section('content')
<section class="center">
    <form method="POST" action="{{ route('user.update', $users->id) }}" class="was-validated needs-validation w-75 modal-content p-4 register" validate>
        <div class="modal-header">
            <h2 class="m-auto text-uppercase modal-title">{{ __('Editar usuario') }}</h2>
        </div>
        @csrf

        <div class="modal-body">
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="username">{{ __('Usuario') }}</label>                
                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ $users->username }}" required autocomplete="username" autofocus placeholder="Username">
        
                    @if ($errors->has('username'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                    <div class="valid-feedback">
                        ¡Se ve bien!
                    </div>
                    <div class="invalid-feedback">
                        Por favor, ingrese un username
                    </div>
                </div>
    
                <div class="col-md-4 mb-3">
                    <label for="email">{{ __('E-mail') }}</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                        </div>
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $users->email }}" required autocomplete="email" placeholder="Email">
                        @if ($errors->has('email'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                        <div class="valid-feedback">
                            ¡Se ve bien!
                        </div>
                        <div class="invalid-feedback">
                            Por favor, ingrese un email valido
                        </div>
                    </div>
                </div>
    
                <div class="col-md-4 mb-3">
                    <label for="name">{{ __('Nombre Apellido') }}</label>                
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $users->name }}" required autocomplete="name" autofocus placeholder="Nombre completo">
        
                    @if ($errors->has('name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
    
                    <div class="valid-feedback">
                        ¡Se ve bien!
                    </div>
                    <div class="invalid-feedback">
                        Por favor, ingrese su nombre
                    </div>
                </div>
            </div>
    
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="identity_card">{{ __('DNI/NIE') }}</label>                
                    <input id="identity_card" type="text" class="form-control{{ $errors->has('identity_card') ? ' is-invalid' : '' }}" name="identity_card" value="{{ $users->identity_card }}" autocomplete="identity_card" autofocus placeholder="Nº identidad">
        
                    @if ($errors->has('identity_card'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('identity_card') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="col-md-4 mb-3">
                    <label for="phone_number">{{ __('Número movil') }}</label>                
                    <input id="phone_number" type="tel" class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number" value="{{ $users->phone_number }}" required autocomplete="phone_number" autofocus placeholder="Nº teléfono">
        
                    @if ($errors->has('phone_number'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('phone_number') }}</strong>
                        </span>
                    @endif
                    
                    <div class="valid-feedback">
                        ¡Se ve bien!
                    </div>
                    <div class="invalid-feedback">
                        Por favor, ingrese un nº de teléfono
                    </div>
                </div>
    
                <div class="col-md-4 mb-3">
                    <label for="birthdate">{{ __('Fecha nacimiento') }}</label>                
                    <input id="birthdate" type="date" class="form-control{{ $errors->has('birthdate') ? ' is-invalid' : '' }}" name="birthdate" value="{{ $users->birthdate }}" required autocomplete="birthdate" autofocus>
        
                    @if ($errors->has('birthdate'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('birthdate') }}</strong>
                        </span>
                    @endif
                    
                    <div class="valid-feedback">
                        ¡Se ve bien!
                    </div>
                    <div class="invalid-feedback">
                        Por favor, ingrese su fecha de nacimiento
                    </div>
                </div>
            </div>
    
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="gender">{{ __('Género') }}</label>                
                    <input id="gender" type="text" class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender" value="{{ $users->gender }}" required autocomplete="gender" autofocus>
        
                    @if ($errors->has('gender'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('gender') }}</strong>
                        </span>
                    @endif                
                    
                    <div class="valid-feedback">
                        ¡Se ve bien!
                    </div>
                    <div class="invalid-feedback">
                        Por favor, ingrese su género
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="level">{{ __('Nivel') }}</label>                
                    <input id="level" type="text" class="form-control{{ $errors->has('level') ? ' is-invalid' : '' }}" name="level" value="{{ $users->level }}" autocomplete="level" autofocus placeholder="nivel">
        
                    @if ($errors->has('level'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('level') }}</strong>
                        </span>
                    @endif
                </div>
    
                <div class="col-md-4 mb-3">
                    <label for="address">{{ __('Dirección') }}</label>                
                    <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ $users->address }}" autocomplete="address" autofocus placeholder="Dirección">
        
                    @if ($errors->has('address'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                    @endif
                </div>                
            </div>
        </div>

        <input type="hidden" name="_method" value="PUT">
        
        <div class="modal-footer">
            <a href="{{ route('user.index') }}" class="link">
                <button type="button" class="btn btn-outline-light btn-block">
                        {{ __('Volver') }}
                </button>
            </a>
            <button type="submit" class="btn btn-success">{{ __('Modificar') }}</button>
        </div>
    </form>
</section>
@endsection
