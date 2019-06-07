@extends('layouts.app')

@section('head')
    <script src="{{ asset('js/app.js') }}" defer></script>
@endsection

@section('content')
<section class="center">
    <form method="POST" action="{{ route('track.update', $tracks->id) }}" class="was-validated needs-validation w-75 modal-content p-4 register" validate>
        <div class="modal-header">
            <h2 class="m-auto text-uppercase modal-title">{{ __('Modificar Pista') }}</h2>
        </div>
        @csrf

        <div class="modal-body">
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="title">{{ __('Nombre de la pista') }}</label>                
                    <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ $tracks->title }}" required autocomplete="title" autofocus placeholder="Nombre de la pista">
        
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
                
                {{-- Falta controlar solo 30min y que este en el horario del club... --}}
                @foreach (json_decode($tracks->businessHours) as $key => $item)
                    @if ($key == 'startTime')
                        <div class="col-md-4 mb-3">
                            <label for="startTime">{{ __('Horario inicio') }}</label>
                            <div class="input-group">
                                <input id="startTime" type="time" class="form-control{{ $errors->has('startTime') ? ' is-invalid' : '' }}" name="startTime" value="{{ $item }}" required autocomplete="startTime">
                                
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
                    @else
                        <div class="col-md-4 mb-3">
                            <label for="endTime">{{ __('Horario fin') }}</label>                
                            <input id="endTime" type="time" class="form-control{{ $errors->has('endTime') ? ' is-invalid' : '' }}" name="endTime" value="{{ $item }}" required autocomplete="endTime" autofocus>
                
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
                    @endif
                @endforeach
            </div>
    
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="track_type_id">{{ __('Tipo de pista') }}</label>                
                    <select name="track_type_id" class="form-control">
                        @foreach ($types as $item)
                            <option value="{{ $item->id }}" {{ ($item->id == $tracks->track_type_id) ? 'selected' : '' }}>{{ $item->name }}</option>
                        @endforeach                                
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="type_surface_id">{{ __('Tipo de superficie') }}</label>                
                    <select name="type_surface_id" class="form-control">
                        @foreach ($surfaces as $item)
                            <option value="{{ $item->id }}" {{ ($item->id == $tracks->type_surface_id) ? 'selected' : '' }}>{{ $item->name }}</option>
                        @endforeach                                
                    </select>
                </div>
    
                <div class="col-md-4 mb-3">
                    <label for="enclosure_type_id">{{ __('Tipo de cerramiento') }}</label>                
                    <select name="enclosure_type_id" class="form-control">
                        @foreach ($enclosures as $item)
                            <option value="{{ $item->id }}" {{ ($item->id == $tracks->enclosure_type_id) ? 'selected' : '' }}>{{ $item->name }}</option>
                        @endforeach                                
                    </select>
                </div>
            </div>
    
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="wall_id">{{ __('Tipo de pared') }}</label>                
                    <select name="wall_id" class="form-control">
                        @foreach ($walls as $item)
                            <option value="{{ $item->id }}" {{ ($item->id == $tracks->wall_id) ? 'selected' : '' }}>{{ $item->name }}</option>
                        @endforeach                                
                    </select>
                </div>

                <div class="col-md-4 mb-3">
                    <label for="size_id">{{ __('Tamaño de la pista') }}</label>                
                    <select name="size_id" class="form-control">
                        @foreach ($sizes as $item)
                            <option value="{{ $item->id }}" {{ ($item->id == $tracks->size_id) ? 'selected' : '' }}>{{ $item->name }}</option>
                        @endforeach                                
                    </select>
                </div>
    
                <div class="col-md-4 mb-3">
                    <label for="description">{{ __('Descripción') }}</label>                
                    <textarea id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" placeholder="Descripción">{{ $tracks->description }}</textarea>
        
                    @if ($errors->has('description'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                    @endif
                </div>                
            </div>
        </div>

        <input type="hidden" name="club_id" value="{{ Auth::user()->club_id }}">
        <input type="hidden" name="_method" value="PUT">
        
        <div class="modal-footer">
            <a href="{{ route('track.index') }}" class="link">
                <button type="button" class="btn btn-outline-light btn-block">
                        {{ __('Volver') }}
                </button>
            </a>
            <button type="submit" class="btn btn-success">{{ __('Actualizar pista') }}</button>
        </div>
    </form>
</section>

<section>
    <div class="content-info info-home">
        <div class="login">
            <div class="login-img"></div>
            <div class="login-form">
                <form method="POST" action="{{ route('track.update', $tracks->id) }}">
                    <h2 class="text-center text-uppercase mb-4">{{ __('Modificar Pista') }}</h2>
                    @csrf
                    <div class="row">
                        <label for="title" class="col-md-4 col-form-label text-md-right pt-4">{{ __('Nombre de la pista') }}</label>

                        <div class="col-md-6">
                            <input id="title" type="text" class="input-user form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" value="{{ $tracks->title }}" required autocomplete="title" autofocus>

                            @if ($errors->has('title'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    @foreach (json_decode($tracks->businessHours) as $key => $item)
                        @if ($key == 'startTime')
                            <div class="row">
                                <label for="startTime" class="col-md-4 col-form-label text-md-right pt-4">{{ __('Horario inicio') }}</label>
        
                                <div class="col-md-6">
                                    <input id="startTime" type="time" class="input-user form-control{{ $errors->has('startTime') ? ' is-invalid' : '' }}" name="startTime" value="{{ $item }}" required autofocus>
        
                                    @if ($errors->has('startTime'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('startTime') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <label for="endTime" class="col-md-4 col-form-label text-md-right pt-4">{{ __('Horario fin') }}</label>
        
                                <div class="col-md-6">
                                    <input id="endTime" type="time" class="input-user form-control{{ $errors->has('endTime') ? ' is-invalid' : '' }}" name="endTime" value="{{ $item }}" required autofocus>
        
                                    @if ($errors->has('endTime'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('endTime') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        @endif
                    @endforeach
                   
                    <div class="row">
                        <label for="track_type_id" class="col-md-4 col-form-label text-md-right pt-4">{{ __('Tipo de pista') }}</label>

                        <div class="col-md-6">
                            <select name="track_type_id" class="input-user form-control">
                                @foreach ($types as $item)
                                    <option value="{{ $item->id }}" {{ ($item->id == $tracks->track_type_id) ? 'selected' : '' }}>{{ $item->name }}</option>
                                @endforeach                                
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <label for="type_surface_id" class="col-md-4 col-form-label text-md-right pt-4">{{ __('Tipo de superficie') }}</label>

                        <div class="col-md-6">
                            <select name="type_surface_id" class="input-user form-control">
                                @foreach ($surfaces as $item)
                                    <option value="{{ $item->id }}" {{ ($item->id == $tracks->type_surface_id) ? 'selected' : '' }}>{{ $item->name }}</option>
                                @endforeach                                
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <label for="enclosure_type_id" class="col-md-4 col-form-label text-md-right pt-4">{{ __('Tipo de cerramiento') }}</label>

                        <div class="col-md-6">
                            <select name="enclosure_type_id" class="input-user form-control">
                                @foreach ($enclosures as $item)
                                    <option value="{{ $item->id }}" {{ ($item->id == $tracks->enclosure_type_id) ? 'selected' : '' }}>{{ $item->name }}</option>
                                @endforeach                                
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <label for="wall_id" class="col-md-4 col-form-label text-md-right pt-4">{{ __('Tipo de pared') }}</label>

                        <div class="col-md-6">
                            <select name="wall_id" class="input-user form-control">
                                @foreach ($walls as $item)
                                    <option value="{{ $item->id }}" {{ ($item->id == $tracks->wall_id) ? 'selected' : '' }}>{{ $item->name }}</option>
                                @endforeach                                
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <label for="size_id" class="col-md-4 col-form-label text-md-right pt-4">{{ __('Tamaño') }}</label>

                        <div class="col-md-6">
                            <select name="size_id" class="input-user form-control">
                                @foreach ($sizes as $item)
                                    <option value="{{ $item->id }}" {{ ($item->id == $tracks->size_id) ? 'selected' : '' }}>{{ $item->name }}</option>
                                @endforeach                                
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <label for="description" class="col-md-4 col-form-label text-md-right pt-4">{{ __('Descripción') }}</label>

                        <div class="col-md-6">
                            <textarea id="description" type="text" class="input-user form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" placeholder="Descripción">{{ $tracks->description }}</textarea>

                            @if ($errors->has('description'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <input type="hidden" name="club_id" value="{{ Auth::user()->club_id }}">
                    <input type="hidden" name="_method" value="PUT">
                      
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
                                {{ __('Actualizar pista') }}
                            </button>
                        </div>
                    </div>                 
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
