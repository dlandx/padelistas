@extends('layouts.app')

@section('head')
<!--
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>

    <script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-de7e2ef6bfefd24b79a3f68b414b87b8db5b08439cac3f1012092b2290c719cd.js"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    <script src="https://momentjs.com/downloads/moment.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <script src="https://fullcalendar.io/js/fullcalendar-scheduler-1.6.2/scheduler.min.js"></script>

    <style>
        .fc-ltr .fc-time-grid .fc-event-container {
            margin: 0 !important;
        }
    </style>
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
                    <button>RESERVA</button>
                </div>                            
            </div>
        </div>
        
        {!! $calendar->calendar() !!}

    </div>
</section>
@endsection

@section('script')
    {!! $calendar->script() !!}
@stop

{{-- }}
    <!doctype html>
    <html lang="en">
    <head>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    </head>

    <body>
        <h1>CALENDAR</h1>

        {!! $calendar->calendar() !!}
        {!! $calendar->script() !!}


        <script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-de7e2ef6bfefd24b79a3f68b414b87b8db5b08439cac3f1012092b2290c719cd.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://momentjs.com/downloads/moment.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
        <script src="https://fullcalendar.io/js/fullcalendar-scheduler-1.6.2/scheduler.min.js"></script>



    <div id="calendar-d9WWIDMb"></div>

    <div id="calendar"></div>

    </body>
    </html>
{{ --}}