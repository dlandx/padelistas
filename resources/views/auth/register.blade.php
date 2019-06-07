@extends('layouts.app')

@section('head')
    <script src="{{ asset('js/app.js') }}" defer></script>
@endsection

@section('content')
<section class="center">
    <form method="POST" action="{{ route('register') }}" class="was-validated needs-validation w-75 modal-content p-4 register" validate>
        <div class="modal-header">
            <h2 class="m-auto text-uppercase modal-title">{{ __('Registrar usuario') }}</h2>
        </div>
        @csrf

        <div class="modal-body">
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="username">{{ __('Usuario') }}</label>                
                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="Username">
        
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
                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Email">
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
                    <label for="password">{{ __('Password') }}</label>                
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required autocomplete="new-password" placeholder="Password">
        
                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                    <div class="valid-feedback">
                        ¡Se ve bien!
                    </div>
                    <div class="invalid-feedback">
                        Por favor, ingrese una contraseña
                    </div>
                </div>
            </div>
    
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="password-confirm">{{ __('Confirmar password') }}</label>                
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Password">
                    
                    <div class="valid-feedback">
                        ¡Se ve bien!
                    </div>
                    <div class="invalid-feedback">
                        Por favor, vuelva a ingresar la contraseña
                    </div>
                </div>
    
                <div class="col-md-4 mb-3">
                    <label for="name">{{ __('Nombre Apellido') }}</label>                
                    <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nombre completo">
        
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
    
                <div class="col-md-4 mb-3">
                    <label for="identity">{{ __('DNI/NIE') }}</label>                
                    <input id="identity" type="text" class="form-control{{ $errors->has('identity') ? ' is-invalid' : '' }}" name="identity" value="{{ old('identity') }}" autocomplete="identity" autofocus placeholder="Nº identidad">
        
                    @if ($errors->has('identity'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('identity') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
    
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="phone">{{ __('Número movil') }}</label>                
                    <input id="phone" type="tel" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus placeholder="Nº teléfono">
        
                    @if ($errors->has('phone'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('phone') }}</strong>
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
                    <input id="birthdate" type="date" class="form-control{{ $errors->has('birthdate') ? ' is-invalid' : '' }}" name="birthdate" value="{{ old('birthdate') }}" required autocomplete="birthdate" autofocus>
        
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
    
                <div class="col-md-4 mb-3">
                    <label for="gender">{{ __('Género') }}</label>                
                    <input id="gender" type="text" class="form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender" value="{{ old('gender') }}" required autocomplete="gender" autofocus>
        
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
            </div>
    
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="level">{{ __('Nivel') }}</label>                
                    <input id="level" type="text" class="form-control{{ $errors->has('level') ? ' is-invalid' : '' }}" name="level" value="{{ old('level') }}" autocomplete="level" autofocus placeholder="nivel">
        
                    @if ($errors->has('level'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('level') }}</strong>
                        </span>
                    @endif
                </div>
    
                <div class="col-md-4 mb-3">
                    <label for="address">{{ __('Dirección') }}</label>                
                    <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" autocomplete="address" autofocus placeholder="Dirección">
        
                    @if ($errors->has('address'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                    @endif
                </div>                
            </div>
        </div>
        
        <div class="modal-footer">
            <a href="{{ route('login') }}" class="link">
                <button type="button" class="btn btn-outline-light">Login</button>
            </a>
            <button type="submit" class="btn btn-success">{{ __('Registrarse') }}</button>
        </div>
    </form>
</section>
@endsection

@section('script')
    <script>
        // Validar campos vacios
        (function() {
          'use strict';
          window.addEventListener('load', function() {
            // Formulario a validar
            var forms = document.getElementsByClassName('needs-validation');
            
            var validation = Array.prototype.filter.call(forms, function(form) {
              form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                  event.preventDefault();
                  event.stopPropagation();
                }
                form.classList.add('was-validated');
              }, false);
            });
          }, false);
        })();
    </script>
@stop