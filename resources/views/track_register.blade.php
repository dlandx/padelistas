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
                <form method="POST" action="{{ route('track.index') }}">
                    <h2 class="text-center text-uppercase mb-4">{{ __('Registrar Pista') }}</h2>
                    @csrf    
                    <div class="row">
                        <label for="title" class="col-md-4 col-form-label text-md-right pt-4">{{ __('Nombre de la pista') }}</label>

                        <div class="col-md-6">
                            <input id="title" type="text" class="input-user form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus placeholder="Nombre de la pista">

                            @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <label for="startTime" class="col-md-4 col-form-label text-md-right pt-4">{{ __('Horario inicio') }}</label>

                        <div class="col-md-6">
                            <input id="startTime" type="time" class="input-user form-control{{ $errors->has('startTime') ? ' is-invalid' : '' }}" name="startTime" value="{{ old('startTime') }}" required autofocus>

                            @if ($errors->has('startTime'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('startTime') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <label for="endTime" class="col-md-4 col-form-label text-md-right pt-4">{{ __('Horario fin') }}</label>

                        <div class="col-md-6">
                            <input id="endTime" type="time" class="input-user form-control{{ $errors->has('endTime') ? ' is-invalid' : '' }}" name="endTime" value="{{ old('endTime') }}" required autofocus>

                            @if ($errors->has('endTime'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('endTime') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <label for="track_type_id" class="col-md-4 col-form-label text-md-right pt-4">{{ __('Tipo de pista') }}</label>

                        <div class="col-md-6">
                            <select name="track_type_id" class="input-user form-control">
                                @foreach ($types as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach                                
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <label for="type_surface_id" class="col-md-4 col-form-label text-md-right pt-4">{{ __('Tipo de superficie') }}</label>

                        <div class="col-md-6">
                            <select name="type_surface_id" class="input-user form-control">
                                @foreach ($surfaces as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach                                
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <label for="enclosure_type_id" class="col-md-4 col-form-label text-md-right pt-4">{{ __('Tipo de cerramiento') }}</label>

                        <div class="col-md-6">
                            <select name="enclosure_type_id" class="input-user form-control">
                                @foreach ($enclosures as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach                                
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <label for="wall_id" class="col-md-4 col-form-label text-md-right pt-4">{{ __('Tipo de pared') }}</label>

                        <div class="col-md-6">
                            <select name="wall_id" class="input-user form-control">
                                @foreach ($walls as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach                                
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <label for="size_id" class="col-md-4 col-form-label text-md-right pt-4">{{ __('Tamaño') }}</label>

                        <div class="col-md-6">
                            <select name="size_id" class="input-user form-control">
                                @foreach ($sizes as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach                                
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <label for="description" class="col-md-4 col-form-label text-md-right pt-4">{{ __('Descripción') }}</label>

                        <div class="col-md-6">
                            <textarea id="description" type="text" class="input-user form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" placeholder="Descripción">{{ old('description') }}</textarea>

                            @if ($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <input type="hidden" name="club_id" value="{{ Auth::user()->club_id }}">
                    
                    <div class="row mt-2 px-5">
                        <div class="col-md-6">
                            <a href="{{ route('track.index') }}" class="link">
                                <button type="button" class="btn btn-outline-danger btn-block">
                                        {{ __('Volver') }}
                                </button>
                            </a>
                        </div>

                        <div class="col-md-6">
                            <button type="submit" class="btn btn-outline-success btn-block">
                                {{ __('Registrar pista') }}
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
                <div class="card-header">{{ __('Registrar Pista') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('track.index') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de la pista') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label for="track_type_id" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de pista') }}</label>

                            <div class="col-md-6">
                                <select name="track_type_id" class="form-control">
                                    @foreach ($types as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach                                
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label for="type_surface_id" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de superficie') }}</label>

                            <div class="col-md-6">
                                <select name="type_surface_id" class="form-control">
                                    @foreach ($surfaces as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach                                
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label for="enclosure_type_id" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de cerramiento') }}</label>

                            <div class="col-md-6">
                                <select name="enclosure_type_id" class="form-control">
                                    @foreach ($enclosures as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach                                
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label for="wall_id" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de pared') }}</label>

                            <div class="col-md-6">
                                <select name="wall_id" class="form-control">
                                    @foreach ($walls as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach                                
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label for="size_id" class="col-md-4 col-form-label text-md-right">{{ __('Tamaño') }}</label>

                            <div class="col-md-6">
                                <select name="size_id" class="form-control">
                                    @foreach ($sizes as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach                                
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Descripción') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}">

                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <input type="hidden" name="club_id" value="{{ Auth::user()->club_id }}">
                        
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
</div> {{--}}
@endsection
