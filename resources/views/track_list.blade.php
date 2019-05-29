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

        #modal {
            display: none;
        }
    </style>
    
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
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

        
        <!-- Modal -->
        
           
            <div id="modal">
                <h2>REALIZAR RESERVA</h2>

                <form action="">
                    @csrf                    
                    <div class="form-group row">
                        <label for="date" class="col-md-4 col-form-label text-md-right">{{ __('Día') }}</label>

                        <div class="col-md-6">
                            <input id="date" type="text" class="form-control{{ $errors->has('date') ? ' is-invalid' : '' }}" name="date" value="{{ old('date') }}" required autocomplete="date" autofocus>

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
                            <select name="price" class="form-control" id="price"></select>
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label for="club_track_id" class="col-md-4 col-form-label text-md-right">{{ __('Pista') }}</label>
        
                        <div class="col-md-6">
                            <input id="club_track_id" type="text" class="form-control{{ $errors->has('club_track_id') ? ' is-invalid' : '' }}" name="club_track_id" autofocus readonly>
                        </div>
                    </div>                    
                </form>
            </div>

            <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    ...
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
                </div>
            </div>
        
    </div>
</section>
@endsection

@section('script')
    {!! $calendar->script() !!}

    <script>/*
        https://github.com/kylefox/jquery-modal
        $('#btn').click(function() {
            $('#modal').modal();
        });*/
    </script>
@stop
