@extends('layouts.app')

@section('head')
    {{-- PROBLEM - user logued = not logout in this view.... --}}
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
            z-index: 100 !important;
        }
        /* Form */
        #parejas {
            display: none;
        }
        #parejas[style*='display: block']{
            display: flex !important;
        }
    </style>
    {{-- Modal --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />

    {{-- Toast alert --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
@endsection

@section('content')
<section class="text-justify">
    <div class="title">
        <h2 class="blue text-uppercase">Reservar pista</h2>
    </div>

    <div class="col-12 px-5">
        <div class="reserved p-3 rounded green">
            <div>Realiza una reserva en las pistas disponibles que te ofrece el siguiente club deportivo y a jugar!!!</div>
            <div class="dos-grid">
                <h2 class="display-4">{{ ($club != null) ? $club->name : 'Club deconocido' }}</h2>
                <button id="reserve" class="btn btn-outline-dark w-50 h-50 m-auto">RESERVA</button>
            </div>            
            <div class="d-flex">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="25" height="25" viewBox="0 0 192 192" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,192v-192h192v192z" fill="none"></path><g fill="#074a1f"><g id="surface1"><path d="M96,0.24c-29.505,0 -53.52,24.015 -53.52,53.52c0,24.45 12.825,52.485 25.44,74.76c12.615,22.275 25.2,38.76 25.2,38.76c0.675,0.915 1.74,1.47 2.88,1.47c1.14,0 2.205,-0.555 2.88,-1.47c0,0 12.6,-16.71 25.2,-39.12c12.6,-22.41 25.44,-50.46 25.44,-74.4c0,-29.505 -24.015,-53.52 -53.52,-53.52zM96,7.44c25.65,0 46.32,20.67 46.32,46.32c0,21.33 -12.12,48.96 -24.48,70.92c-10.095,17.955 -18.495,29.73 -21.84,34.32c-3.36,-4.53 -11.76,-16.155 -21.84,-33.96c-12.345,-21.81 -24.48,-49.38 -24.48,-71.28c0,-25.65 20.67,-46.32 46.32,-46.32zM96,30.84c-14.73,0 -26.76,12.03 -26.76,26.76c0,14.73 12.03,26.76 26.76,26.76c14.73,0 26.76,-12.03 26.76,-26.76c0,-14.73 -12.03,-26.76 -26.76,-26.76zM96,38.28c10.725,0 19.32,8.595 19.32,19.32c0,10.725 -8.595,19.32 -19.32,19.32c-10.725,0 -19.32,-8.595 -19.32,-19.32c0,-10.725 8.595,-19.32 19.32,-19.32zM58.2,131.16c-15.36,2.25 -28.35,5.805 -37.92,10.44c-4.785,2.31 -8.745,4.89 -11.64,7.92c-2.895,3.03 -4.8,6.795 -4.8,10.8c0,5.49 3.51,10.185 8.52,13.92c5.01,3.735 11.775,6.75 20.04,9.36c16.515,5.22 38.88,8.4 63.6,8.4c24.72,0 47.085,-3.18 63.6,-8.4c8.265,-2.61 15.03,-5.625 20.04,-9.36c5.01,-3.735 8.52,-8.43 8.52,-13.92c0,-3.99 -1.905,-7.77 -4.8,-10.8c-2.895,-3.03 -6.855,-5.61 -11.64,-7.92c-9.57,-4.635 -22.56,-8.19 -37.92,-10.44c-2.115,-0.33 -4.11,1.125 -4.44,3.24c-0.33,2.115 1.125,4.11 3.24,4.44c14.82,2.175 27.3,5.625 35.76,9.72c4.23,2.055 7.5,4.29 9.48,6.36c1.98,2.07 2.64,3.795 2.64,5.4c0,2.205 -1.47,4.74 -5.4,7.68c-3.93,2.94 -10.035,5.835 -17.76,8.28c-15.45,4.875 -37.26,8.04 -61.32,8.04c-24.06,0 -45.87,-3.165 -61.32,-8.04c-7.725,-2.445 -13.83,-5.34 -17.76,-8.28c-3.93,-2.94 -5.4,-5.475 -5.4,-7.68c0,-1.605 0.66,-3.33 2.64,-5.4c1.98,-2.07 5.25,-4.305 9.48,-6.36c8.46,-4.095 20.94,-7.545 35.76,-9.72c2.115,-0.33 3.57,-2.325 3.24,-4.44c-0.33,-2.115 -2.325,-3.57 -4.44,-3.24z"></path></g></g></g></svg> 
                <p class="pl-2">{{ ($club != null) ? $club->address : 'Sin ubicación' }}</p>
            </div>
        </div>
        
        <div class="py-5">
            <div class="jumbotron p-4">
                <h3>Información</h3>
                <p>Por el momento tenemos deshabilitado las acciones de las horas pasadas a hora la actual, si ve que la aplicación no hace nada es debido a lo comentado anteriormente, por favor compruebe que la reserva sea en las siguientes horas a la actual...</p>
                <p>Disculpe las molestias, no obstante la aplicación le informará con los datos correspondientes en las horas vigentes.</p>

                <div class="w-50 m-auto">
                    <div class="alert alert-success" role="alert">Las <b>reservas confirmadas</b> se verá de este color</div>
                    <div class="alert alert-warning" role="alert">Las <b>reservas pendientes</b> (en busca de pareja/oponente)</div>
                </div>
                
            </div>

            {!! $calendar->calendar() !!}
        </div>

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
        $(document).ready(function(){
            // Modal mostrar/ocultar el campo de buscar pareja...
            $('#opponent').on('change',function(){
                if (this.checked) {
                    $("#parejas").show();
                } else {
                    $("#parejas").hide();
                }  
            });

            // Si pulsa en reservar - scroll al calendario...
            $("#reserve").click(function() {
                var cal = "#calendar-{{ $calendar->getId() }}";
                $('html, body').animate({
                    scrollTop: $(cal).offset().top
                }, 2000);
            });
        });
    </script>

@stop
