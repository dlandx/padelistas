@extends('layouts.app')

@section('head')
<!--
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>

    <script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-de7e2ef6bfefd24b79a3f68b414b87b8db5b08439cac3f1012092b2290c719cd.js"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

PROBLEM - user logueado = no logout....
-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    <script src="https://momentjs.com/downloads/moment.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <script src="https://fullcalendar.io/js/fullcalendar-scheduler-1.6.2/scheduler.min.js"></script>

    <style>
        .fc-ltr .fc-time-grid .fc-event-container {
            margin: 0 !important;
        }
        
        .fc-time-grid .fc-bgevent, .fc-time-grid .fc-event {
            z-index: unset !important;
        }

        /* Style modal -> kylefox jquery-modal */
        #modal {
            display: none;
            height: auto;
            overflow: unset;
        }
        .blocker {
            z-index: 10 !important;
        }
        /* Form */
        #parejas {
            display: none;
        }
        #parejas[style*='display: block']{
            display: flex !important;
        }
    </style>
    {{-- Modale --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

    {{-- Toast alert --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
@endsection

@section('content')
<section>
    <div class="content-info">
        <h1>Reserva tu pista</h1>
        <div class="head-club">
            <div class="head-club-img"></div>
            <div class="head-club-info">
                <h3>TEXT</h3>
                <p>Realiza una reserva en las pistas del club</p>
                <div class="head-club-link">
                    <p>GPS</p>
                    <button id="btn">RESERVA</button>
                </div>                            
            </div>
        </div>
        
        {!! $calendar->calendar() !!}
        
        <!-- Modal - kylefox jquery-modal [ https://github.com/kylefox/jquery-modal ] -->
        <div id="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">REALIZAR RESERVA</h2>
                </div>
                    
                <form action="{{ route('reserve.store') }}" method="POST">
                    <div class="modal-body">
                        @csrf                        
                        <div class="form-group row">
                            <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Día') }}</label>

                            <div class="col-md-6">
                                <input id="date" type="text" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" name="date" value="{{ old('date') }}" readonly autocomplete="date">

                                @if ($errors->has('date'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('date') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row mb-2">
                            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Duración') }}</label>
            
                            <div class="col-md-6">
                                <select name="price" class="form-control" id="price" required autofocus></select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="pista" class="col-md-4 col-form-label text-md-right">{{ __('Pista') }}</label>

                            <div class="col-md-6">
                                <input id="pista" type="text" class="form-control" name="pista" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="size" class="col-md-4 col-form-label text-md-right">{{ __('Tamaño') }}</label>

                            <div class="col-md-6">
                                <input id="size" type="text" class="form-control" name="size" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="player" class="col-md-4 col-form-label text-md-right">{{ __('Nº jugadores') }}</label>

                            <div class="col-md-6">
                                <input id="player" type="number" class="form-control{{ $errors->has('player') ? ' is-invalid' : '' }}" name="player" value="{{ old('player') }}" required autocomplete="player" autofocus placeholder="Jugadores actuales...">

                                @if ($errors->has('player'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('player') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-8 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="opponent" id="opponent" {{ old('opponent') ? 'checked' : '' }}>
            
                                    <label class="form-check-label" for="opponent">
                                        {{ __('Buscar Pareja/Oponente') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row" id="parejas">
                            <label for="couple" class="col-md-4 col-form-label text-md-right">{{ __('Nº Oponente') }}</label>

                            <div class="col-md-6">
                                <input id="couple" type="number" class="form-control{{ $errors->has('couple') ? ' is-invalid' : '' }}" name="couple" value="{{ old('couple') }}" autocomplete="couple" autofocus placeholder="Jugadores a buscar....">

                                @if ($errors->has('couple'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('couple') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <input id="club_track_id" type="hidden" class="form-control{{ $errors->has('club_track_id') ? ' is-invalid' : '' }}" name="club_track_id" readonly>                        
                    </div>

                    <div class="modal-footer">
                        @if(Auth::check())
                            <button type="submit" class="btn btn-primary">Reservar</button>
                        @else
                            <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
                        @endif
                    </div>
                </form>
            </div>
        </div>        
    </div>
</section>
@endsection

@section('script')
    {!! $calendar->script() !!}

    {{-- Alert tipo toast -> CodeSeven - Toastr [ https://github.com/CodeSeven/toastr ] --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        // Modal mostrar/ocultar el campo de buscar pareja...
        $(document).ready(function(){
            $('#opponent').on('change',function(){
                if (this.checked) {
                    $("#parejas").show();
                } else {
                    $("#parejas").hide();
                }  
            });
        });
    </script>

@stop
