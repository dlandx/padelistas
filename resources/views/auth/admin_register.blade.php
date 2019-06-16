@extends('layouts.app')

@section('head')
    <script src="{{ asset('js/app.js') }}" defer></script>  
    {{-- Toast alert --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
@endsection

@section('content')
<section class="center">
    <form method="POST" action="{{ route('admin.register.submit') }}" class="was-validated needs-validation" validate>
        @csrf

        <div class="login w-75 overflow-hidden">
            <div class="login-img login-admin text-center py-4 h-100">
                <h2 class="text-center text-uppercase mb-4">{{ __('Admin Register') }}</h2>
                <div class="row">
                    <label for="username" class="col-md-4 col-form-label text-md-right pt-4">{{ __('Username') }}</label>
    
                    <div class="col-md-6">
                        <input id="username" type="text" class="input-user form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="Username">
    
                        @if ($errors->has('username'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                        @endif

                        <div class="valid-feedback text-light">
                            ¡Se ve bien!
                        </div>
                        <div class="invalid-feedback yellow">
                            Por favor, ingrese un username
                        </div>
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

                        <div class="valid-feedback text-light">
                            ¡Se ve bien!
                        </div>
                        <div class="invalid-feedback yellow">
                            Por favor, ingrese un email valido
                        </div>
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

                        <div class="valid-feedback text-light text-light">
                            ¡Se ve bien!
                        </div>
                        <div class="invalid-feedback yellow">
                            Por favor, ingrese una contraseña
                        </div>
                    </div>
                </div>

                <div class="row">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right pt-4">{{ __('Confirmar Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="input-user form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Password">
                        <div class="valid-feedback text-light">
                            ¡Se ve bien!
                        </div>
                        <div class="invalid-feedback yellow">
                            Por favor, vuelva a ingresar la contraseña
                        </div>
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

                        <div class="valid-feedback text-light">
                            ¡Se ve bien!
                        </div>
                        <div class="invalid-feedback yellow">
                            Por favor, ingrese su nombre
                        </div>
                    </div>
                </div>  
            </div>
                
            <div class="login-form py-5">         
                <div class="row">
                    <label for="identity" class="col-md-4 col-form-label text-md-right pt-4">{{ __('DNI/NIE') }}</label>
    
                    <div class="col-md-6">
                        <input id="identity" type="text" class="input-user form-control{{ $errors->has('identity') ? ' is-invalid' : '' }}" name="identity" value="{{ old('identity') }}" required autocomplete="identity" autofocus placeholder="Nº identidad">
    
                        @if ($errors->has('identity'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('identity') }}</strong>
                            </span>
                        @endif
    
                        <div class="valid-feedback text-light">
                            ¡Se ve bien!
                        </div>
                        <div class="invalid-feedback yellow">
                            Por favor, ingrese su nº de identidad
                        </div>
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
    
                        <div class="valid-feedback text-light">
                            ¡Se ve bien!
                        </div>
                        <div class="invalid-feedback yellow">
                            Por favor, ingrese un nº de teléfono
                        </div>
                    </div>
                </div>

                <div class="row">
                    <label for="gender" class="col-md-4 col-form-label text-md-right pt-4">{{ __('Género') }}</label>
    
                    <div class="col-md-6">
                        <input id="gender" type="text" class="input-user form-control{{ $errors->has('gender') ? ' is-invalid' : '' }}" name="gender" value="{{ old('gender') }}" autocomplete="gender" autofocus>
    
                        @if ($errors->has('gender'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('gender') }}</strong>
                            </span>
                        @endif                        
                    </div>
                </div>
                
                <div class="row mb-2">
                    <label for="club" class="col-md-4 col-form-label text-md-right pt-4">{{ __('Club') }}</label>   
                
                    <div class="col-md-6">
                        <select name="club" class="form-control input-user" required>
                            @foreach ($clubes as $item)
                                <option value="{{ $item->id }}" autofocus>{{ $item->name }}</option>
                            @endforeach                                    
                        </select>        
                        
                        <div class="invalid-feedback yellow">
                            Por favor, elija su club deportivo
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-7 offset-md-4">
                        <a class="red font-weight-bold" href="#" data-toggle="modal" data-target="#clubModal">¿No encuentra su club?</a>
                    </div>
                </div>  

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <a href="{{ route('admin.login') }}">
                            <button type="button" class="btn btn-outline-light">Login</button>
                        </a>

                        <button type="submit" class="btn btn-success">
                            {{ __('Registrar') }}
                        </button>
                    </div>
                </div>
            </div>        
        </div>
    </form>

    {{-- Ventana modal para el club --}}
    <div class="modal fade" id="clubModal" tabindex="-1" role="dialog" aria-labelledby="clubModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="clubModalLabel">{{ __('Registrar club') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form method="POST" action="{{ route('club') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre club') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone_number" class="col-md-4 col-form-label text-md-right">{{ __('Número movil') }}</label>

                            <div class="col-md-6">
                                <input id="phone_number" type="tel" class="form-control{{ $errors->has('phone_number') ? ' is-invalid' : '' }}" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" autofocus>

                                @if ($errors->has('phone_number'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="days" class="col-md-4 col-form-label text-md-right">{{ __('Cerrado los días') }}</label>

                            <div class="col-md-6 pl-4">
                                <div class="modal-days">
                                    <div>
                                        <input type="checkbox" name="days[L]" value="1">
                                        <label>{{ __('LUN.') }}</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" name="days[M]" value="2">
                                        <label>{{ __('MAR.') }}</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" name="days[X]" value="3">
                                        <label>{{ __('MIÉ.') }}</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" name="days[J]" value="4">
                                        <label>{{ __('JUE.') }}</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" name="days[V]" value="5">
                                        <label>{{ __('VIE.') }}</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" name="days[S]" value="6">
                                        <label>{{ __('SÁB.') }}</label>
                                    </div>
                                </div>
                                
                                <div class="modal-days-all">
                                    <div>
                                        <input type="checkbox" name="days[D]" value="0">
                                        <label>{{ __('DOM.') }}</label>
                                    </div>
                                    <div>
                                        <input type="checkbox" name="days[A]" value="7">
                                        <label>{{ __('Abierto de L-D') }}</label>
                                    </div>
                                </div>
                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="start_time" class="col-md-4 col-form-label text-md-right">{{ __('Horario inicio') }}</label>

                            <div class="col-md-6">
                                <input id="start_time" type="time" class="form-control{{ $errors->has('start_time') ? ' is-invalid' : '' }}" name="start_time" value="{{ old('start_time') }}" required autofocus>

                                @if ($errors->has('start_time'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('start_time') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="end_time" class="col-md-4 col-form-label text-md-right">{{ __('Horario fin') }}</label>

                            <div class="col-md-6">
                                <input id="end_time" type="time" class="form-control{{ $errors->has('end_time') ? ' is-invalid' : '' }}" name="end_time" value="{{ old('end_time') }}" required autofocus>

                                @if ($errors->has('end_time'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('end_time') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Dirección') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" autocomplete="address" autofocus>

                                @if ($errors->has('address'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Descripción') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}" autocomplete="description" autofocus>

                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="images" class="col-md-4 col-form-label text-md-right">{{ __('Imágenes') }}</label>

                            <div class="col-md-6">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" id="signUp" class="btn btn-outline-dark">
                                    {{ __('Registrar club') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
    {{-- FIN VENTANA MODAL --}}
</section>
@endsection

@section('script')
    {{-- Alert tipo toast -> CodeSeven - Toastr [ https://github.com/CodeSeven/toastr ] --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        $(document).ready(function(){
            toastr.warning('Recomendamos antes de rellenar el formulario, compruebe que su club esta dado de  alta en la aplicación :)')
        });
    </script>
@stop

