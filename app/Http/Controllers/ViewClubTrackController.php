<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use MaddHatter\LaravelFullcalendar\Facades\Calendar;
//use \MaddHatter\LaravelFullcalendar\Event;
use Calendar; // Alias of Fullcalenda of ServiceProvider...
use DateTime;
use App\ClubTrack;
use App\Reservation;
use App\Rate;
use App\Size;

class ViewClubTrackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($club)
    {
/*
        //$tracks = ClubTrack::all()->toArray();
        //$tracks = ClubTrack::select(['id', 'name'])->get()->toArray();
        $tracks = ClubTrack::select(['id', 'title'])->get();
        $reservations = Reservation::all();


        //$invoice_date =  (new DateTime('Europe/Madrid'))->format('Y-m-d\TH:i');
        $invoice_date =  (new DateTime('2019-05-15 15:00:00'))->format('Y-m-d\TH:i');


        $events = [];
        foreach ($reservations as $value) {
            // Add reservations in events of the full calendar...
            $events[] = Calendar::event(
                'dd',// Title
                false,// Full date
                (new DateTime($value->date))->format('Y-m-d\TH:i'), // Start time
                (new DateTime("2019-05-19 15:00:00"))->format('Y-m-d\TH:i'),// End time 
                $value->id, // ID
                ['resourceId' => $value->club_track_id] // Options event - rooms
            );
        }



    //date: 2019-05-13 08:00:00.0 UTC (+00:00)
        $events[] = Calendar::event(
            'Event One', //event title
            false, //full day event?
            '2019-05-13T0800', //start time (you can also use Carbon instead of DateTime)
            '2019-05-13T1200', //end time (you can also use Carbon instead of DateTime)
            0, //optionally, you can specify an event ID
            ['resourceId' => 2]
        );    
        
        
        $events[] = Calendar::event(
            "Valentine's Day", //event title
            false, //full day event?
            new \DateTime('2019-05-13T2200'), //start time (you can also use Carbon instead of DateTime)
            new \DateTime('2019-05-14T0400'), //end time (you can also use Carbon instead of DateTime)
            'stringEventId', //optionally, you can specify an event ID
            ['resourceId' => 1]
        );

     
        // Retornar un array...
        $data = [];
        $map = $tracks->map(function($items){
            $data['id'] = $items->id;
            $data['title'] = $items->name;
            return $data;
        });

        $calendar = \Calendar::addEvents($events) //add an array with addEvents         
            ->setOptions([
                /*'resourceId' => 2,                
                'visibleRange'=> [
                    'start'=> '2019-05-12',
                    'end'=> '2019-05-13'
                ],
                'resourceAreaWidth' => '25%',
                /* /
                'defaultView' => 'agendaDay',
                'resourceLabelText' => 'Rooms',
                'header' => [
                    'left'=> 'agendaDay',
                    'center' => 'title',
                ],
                'resources' => $map->toArray(),

                'weekends' => false, //Fin de seamana deshabilitado
                //'hiddenDays' => [ 2, 4 ], // Ocultar otros dias - como el finde
                
                'businessHours' => [
                    'start' => '9:00',
                    'end' => '22:00',
                    //'dow' => [ 1, 2, 3, 4, 5]
                ]

            ]);
*/

        // Obtenemos todas las pistas que tenga el club elegido...
        $tracks = ClubTrack::where('club_id','=', $club)->select(['id', 'title', 'businessHours', 'size_id'])->get();
        $sizes = json_encode(Size::select(['id', 'name', 'description'])->get()); // Obtenemos todos los tamaños de las pistas...
        $reservations = Reservation::all();
        $events = []; // Añadir eventos al calendario = añadir la reserva...
        $start_time = "08:00";
        $end_time = "22:00";
        $rates = json_encode(Rate::select(['id', 'duration', 'price', 'club_track_id'])->get()); // Precios de la pista...

        // Si hay reservas en la BBDD, las añadimos al evento del calendario...
        foreach ($reservations as $value) {
            // Add reservations in events of the full calendar...
            $events[] = Calendar::event(
                'dd',// Title
                false,// Full date
                (new DateTime($value->start))->format('Y-m-d\TH:i'), // Start time
                (new DateTime($value->end))->format('Y-m-d\TH:i'),// End time 
                $value->id, // ID
                ['resourceId' => $value->club_track_id, 'color' => $value->color] // Options event - rooms (Club tracks)
            );
        }
/*
        $events[] = Calendar::event(
            'Event One', //event title
            false, //full day event?
            '2019-05-28T0800', //start time (you can also use Carbon instead of DateTime)
            '2019-05-28T1200', //end time (you can also use Carbon instead of DateTime)
            0, //optionally, you can specify an event ID
            ['resourceId' => 2]
        );*/


        $map = $tracks->map(function($items){
            $data['id'] = $items->id;
            $data['title'] = $items->title;
            $data['businessHours'] = json_decode($items->businessHours);
            $data['size_id'] = $items->size_id;
            return $data;
        });


        // Con addEvents(array) podemos agregar un array de eventos...
        $calendar = Calendar::addEvents($events)->setOptions([
            // Configuramos las propiedades para añadir el fullcalendar...
            'defaultView' => 'agendaDay',
            'resourceLabelText' => 'Rooms',
            'header' => [
                'left'=> 'agendaDay',
                'center' => 'title',
            ],              
            //'editable' => true, // Add point and change position -> setCallbacks - eventClick
            //'selectable' => true, // select several hours -> setCallbacks - select
            'resources' => $map,
            /*
            'businessHours' => [
                'start' => $start_time,
                'end' => $end_time,
                //'dow' => [ 1, 2, 3, 4, 5]
            ], OR*/
            'minTime'=> $start_time,
            'maxTime'=> $end_time,
            
            'eventColor' => '#f6c31c',


            'slotLabelFormat' => 'HH:mm a', // Formato de las horas...
            'allDaySlot' => false, // Todo el día quitado...
            //'navLinks' => true, https://codepen.io/LeonardoXu/pen/BJayaY


        ])->setCallbacks([
            // Click en el evento...
            'eventClick' => 'function(event) { title= event.title; alert("hi "+title)}',
            
            // Elegir manteniendo en el calendar - add event temp...
            //'editable' => true,
            //'eventDurationEditable' => true,'selectable' => true,
            //'selectHelper' => true,

            // Click en una hora del calendario...
            'dayClick' => "function(date, jsEvent, view, resource) {
                var chosen_time = date.format('HH:mm'); // Hora elegida...
                var chosen_day = date.format('e'); // Día elegido -> 0 = Domingo, 1 = Lunes, 6 = Sábado
                var chosen_date = date.format('YYYY-MM-DD HH:mm:ss');
                var reserves = ".json_encode($reservations)."; // Obtenemos todas las reservas...

                if (chosen_day > 0 && chosen_day < 6) { // Eligió en los días que habre el club...
                    // Si la reserva a realizar esta en las horas que habre la pista del club...
                    if(chosen_time >= resource.businessHours.startTime && chosen_time < resource.businessHours.endTime) {
                        // Calcular el intervalo que hay entre la hora de reserva y el cierre de la pista...
                        // Es decir, si cierra a las 22:00 y hace la recerva a 21:30 pero el minimo es de 1h no dejar...
                        var ultima_hora = chosen_time.split(':'); // Dividir la hora de la reserva en hh y mm...
                        var cierra = resource.businessHours.endTime.split(':'); // Dividir la hora de cierre pista...
                        //Calculamos la diferencia...
                        var dif_hora = cierra[0] - ultima_hora[0];
                        var dif_min = cierra[1] - ultima_hora[1];
                        var minutos = (dif_hora * 60) + dif_min; // Diferencia en minutos...

                        var diferencia = minutos / 60; // Sacar en horas o minutos la diferencia...
                        var resultado = diferencia.toString().split('.');
                        var min = (resultado[1] == 5) ? '30:00' : '00:00'; // Si el resultado es 1.5 = 1:30h...
                        var tiempo = '0'+resultado[0]+':'+min;
                        var array = []; // Añadiremos los valores al array temp - para obtener el tiempo más bajo...

                        // Añadimos el valor correspondiente a cada campo determinado...
                        $('#date').val(chosen_date);
                        // Lo optimo sería filtrarlo solo los precios de un pista elegida pero - no consegui usar var js en php...
                        var price = $rates; // Obtenemos todos los precios de cada pista...
                        price.forEach(function(item, index) {
                            if(resource.id == item.club_track_id) {
                                // Si no hay tiempo para la reserva deshabilitamos los precios (porque cierra la pista)...
                                var disabled = (tiempo < item.duration) ? 'disabled' : '';                                
                                //$('#price').append('<option value='+item.id+' '+disabled+'>'+item.price+' €  - ( '+item.duration+' )</option>');

                                // Controlar que si en el medio esta libre una hora, no deja todas las horas...
                                reserves.forEach(function(value){
                                    var start = value.start.split(/\s/); // Fecha en la que comienza el evento... 
                                    // De la pista elegida mostrar todas las reservas, que tenga el mismo día y que solo muestre las reservas que sean mayor a la hora elegida...
                                    if(resource.id == value.club_track_id && date.format('YYYY-MM-DD') == start[0] && chosen_time < start[1]) {
                                        var diff_reserve = moment(value.start).diff(moment(chosen_date), 'minutes');
                                        var existe = (diff_reserve > 0) ? diff_reserve : ''; // Si hay una reserva posterior
                                        var diff = existe / 60; // Sacar en horas o minutos la diferencia...
                                        var result = diff.toString().split('.');
                                        var min = (result[1] == 5) ? '30:00' : '00:00'; // Si el resultado es 1.5 = 1:30h...
                                        var time = '0'+result[0]+':'+min;
                                        array.push(time); // Añadimos al array...
                                    }
                                });

                                var minimo = array.sort(); // Si hay varias diferencias obtener la menor...
                                var disabled_next = (minimo.length != 0 && minimo < item.duration) ? 'disabled=disabled' : '';

                                $('#price').append('<option value='+item.id+' '+disabled+' '+disabled_next+'>'+item.price+' €  - ( '+item.duration+' )</option>');
                            }
                        });
                        $('#pista').val(resource.title);
                        var size = $sizes; // Todos los tamaños para tiene la pista (dobles, individual...)
                        size.forEach(function(item) {
                            if(resource.size_id == item.id) {
                                $('#size').val(item.name);
                            }
                        });
                        $('#num').val(resource.size_id);
                        $('#club_track_id').val(resource.id);
                        $('#modal').modal(); // Mostramos modal...

                        // Si hemos cerrado el modal eliminamos los precios añadidos con $('').append(...)
                        $('#modal').on($.modal.AFTER_CLOSE, function(event, modal) {
                            $('#price').empty();
                        });
                    } else {
                        // Toast alert...
                        toastr.error('No está abierta, el horario es de '+resource.businessHours.startTime+' a '+resource.businessHours.endTime, 'PISTA: '+resource.title)
                    }                        
                } else {
                    console.log('Dia fuera de rango');
                }
            }",

            // No pueda seleccionar en horas pasadas - CONTROL COLOR...
            'validRange' => "function(nowDate){
                return {start: nowDate, } //to prevent anterior dates
            }",

        ]);

                
        $x = Rate::find(1);
        $y = ClubTrack::find(2);
        //dd($x->club_tracks);
        //dd($y->rates);


        //return view('track_list_cal', compact('calendar'));
        return view('track_list', compact('calendar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
