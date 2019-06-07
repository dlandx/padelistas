@extends('layouts.app')

@section('head')
    <script src="{{ asset('js/app.js') }}" defer></script>
@endsection

@section('content')
<section class="center">
    <form method="POST" action="{{ route('track.index') }}" class="was-validated needs-validation w-75 modal-content p-4 register" validate>
        <div class="modal-header">
            <h2 class="m-auto text-uppercase modal-title">{{ __('Registrar Pista') }}</h2>
        </div>
        @csrf

        <div class="modal-body">
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="title">{{ __('Nombre de la pista') }}</label>                
                    <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ old('title') }}" required autocomplete="title" autofocus placeholder="Nombre de la pista">
        
                    @if ($errors->has('title'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                    @endif
                    <div class="valid-feedback">
                        ¡Se ve bien!
                    </div>
                    <div class="invalid-feedback">
                        Por favor, ingrese el nombre de la pista
                    </div>
                </div>
    
                <div class="col-md-4 mb-3">
                    <label for="startTime">{{ __('Horario inicio') }}</label>
                    <div class="input-group">
                        <input id="startTime" type="time" class="form-control{{ $errors->has('startTime') ? ' is-invalid' : '' }}" name="startTime" value="{{ old('startTime') }}" required autocomplete="startTime">
                        
                        @if ($errors->has('startTime'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('startTime') }}</strong>
                            </span>
                        @endif
                        <div class="valid-feedback">
                            ¡Se ve bien!
                        </div>
                        <div class="invalid-feedback">
                            Por favor, ingrese horas o 30min. 
                        </div>
                    </div>
                </div>
    
                <div class="col-md-4 mb-3">
                    <label for="endTime">{{ __('Horario fin') }}</label>                
                    <input id="endTime" type="time" class="form-control{{ $errors->has('endTime') ? ' is-invalid' : '' }}" name="endTime" value="{{ old('endTime') }}" required autocomplete="endTime" autofocus>
        
                    @if ($errors->has('endTime'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('endTime') }}</strong>
                        </span>
                    @endif
    
                    <div class="valid-feedback">
                        ¡Se ve bien!
                    </div>
                    <div class="invalid-feedback">
                        Por favor, ingrese horas o 30min. 
                    </div>
                </div>
            </div>
    
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="track_type_id">{{ __('Tipo de pista') }}</label>                
                    <select name="track_type_id" class="form-control">
                        @foreach ($types as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach                                
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="type_surface_id">{{ __('Tipo de superficie') }}</label>                
                    <select name="type_surface_id" class="form-control">
                        @foreach ($surfaces as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach                                
                    </select>
                </div>
    
                <div class="col-md-4 mb-3">
                    <label for="enclosure_type_id">{{ __('Tipo de cerramiento') }}</label>                
                    <select name="enclosure_type_id" class="form-control">
                        @foreach ($enclosures as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach                                
                    </select>
                </div>
            </div>
    
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="wall_id">{{ __('Tipo de pared') }}</label>                
                    <select name="wall_id" class="form-control">
                        @foreach ($walls as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach                                
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="size_id">{{ __('Tamaño de la pista') }}</label>                
                    <select name="size_id" class="form-control">
                        @foreach ($sizes as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach                                
                    </select>
                </div>
    
                <div class="col-md-4 mb-3">
                    <label for="description">{{ __('Descripción') }}</label>                
                    <textarea id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" placeholder="Descripción">{{ old('description') }}</textarea>
        
                    @if ($errors->has('description'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>                
            </div>
        </div>

        <input type="hidden" name="club_id" value="{{ Auth::user()->club_id }}">
        
        <div class="modal-footer">
            <a href="{{ route('track.index') }}" class="link">
                <button type="button" class="btn btn-outline-light btn-block">
                        {{ __('Volver') }}
                </button>
            </a>
            <button type="submit" class="btn btn-success">{{ __('Registrar pista') }}</button>
        </div>
    </form>
</section>
@endsection
