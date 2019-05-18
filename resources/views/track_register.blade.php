@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrar Pista') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('track.index') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de la pista') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
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
</div>
@endsection
