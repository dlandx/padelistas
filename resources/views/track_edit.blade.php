@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Editar Pista') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('track.update', $tracks->id) }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre de la pista') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ $tracks->name }}" required autocomplete="name" autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Descripción') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ $tracks->description }}">

                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price_1" class="col-md-4 col-form-label text-md-right">{{ __('Precio 60 min') }}</label>

                            <div class="col-md-6">
                                <input id="price_1" type="text" class="form-control{{ $errors->has('price_1') ? ' is-invalid' : '' }}" name="price_1" value="{{ $tracks->price_1 }}" autofocus required>

                                @if ($errors->has('price_1'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('price_1') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="price_2" class="col-md-4 col-form-label text-md-right">{{ __('Precio 90 min') }}</label>

                            <div class="col-md-6">
                                <input id="price_2" type="text" class="form-control{{ $errors->has('price_2') ? ' is-invalid' : '' }}" name="price_2" value="{{ $tracks->price_2 }}" autofocus>

                                @if ($errors->has('price_2'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('price_2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="price_3" class="col-md-4 col-form-label text-md-right">{{ __('Precio 120 min') }}</label>

                            <div class="col-md-6">
                                <input id="price_3" type="text" class="form-control{{ $errors->has('price_3') ? ' is-invalid' : '' }}" name="price_3" value="{{ $tracks->price_3 }}" autofocus>

                                @if ($errors->has('price_3'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('price_3') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <input type="hidden" name="club_id" value="{{ Auth::user()->club_id }}">
                        <input type="hidden" name="_method" value="PUT">
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit') }}
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
