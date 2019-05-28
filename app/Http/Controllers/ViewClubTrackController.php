<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use MaddHatter\LaravelFullcalendar\Facades\Calendar;
//use \MaddHatter\LaravelFullcalendar\Event;
use Calendar; // Alias of Fullcalenda of ServiceProvider...
use DateTime;
use App\ClubTrack;
use App\Reservation;


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
        $tracks = ClubTrack::where('club_id','=', $club)->select(['id', 'title'])->get();
        $reservations = Reservation::all();//
        $events = []; // Añadir eventos al calendario = añadir la reserva...
        $start_time = "08:59";
        $end_time = "20:00";


        // Si hay reservas en la BBDD, las añadimos al evento del calendario...
        foreach ($reservations as $value) {
            // Add reservations in events of the full calendar...
            $events[] = Calendar::event(
                'dd',// Title
                false,// Full date
                (new DateTime($value->date))->format('Y-m-d\TH:i'), // Start time
                (new DateTime("2019-05-29 18:00:00"))->format('Y-m-d\TH:i'),// End time 
                $value->id, // ID
                ['resourceId' => $value->club_track_id] // Options event - rooms (Club tracks)
            );
        }

        $events[] = Calendar::event(
            'Event One', //event title
            false, //full day event?
            '2019-05-28T0800', //start time (you can also use Carbon instead of DateTime)
            '2019-05-28T1200', //end time (you can also use Carbon instead of DateTime)
            0, //optionally, you can specify an event ID
            ['resourceId' => 2]
        );

        // Con addEvents(array) podemos agregar un array de eventos...
        $calendar = Calendar::addEvents($events)->setOptions([
            // Configuramos las propiedades para añadir el fullcalendar...
            'defaultView' => 'agendaDay',
            'resourceLabelText' => 'Rooms',
            'header' => [
                'left'=> 'agendaDay',
                'center' => 'title',
            ],
            //'editable' => true, // Add point -> setCallbacks - eventClick
            //'selectable' => true, // select several hours -> setCallbacks - select

            'resources' => $tracks,
            'businessHours' => [
                'start' => $start_time,
                'end' => $end_time,
                //'dow' => [ 1, 2, 3, 4, 5]
            ],
            'eventColor' => '#378006',
        ])->setCallbacks([
            //'viewRender' => 'function() {alert("Callbacks!");}',
            'eventClick' => 'function(event) { title= event.title; alert("hi "+title)}',
            // Click en una hora
            'dayClick' => "function(date, jsEvent, view, resource) {
                //alert(date.format() +' --- '+date +' R: '+resource.id);
                console.log(date.format('HH:mm') + ' -> '+ date.format('e'));

                var chosen_date = date.format('HH:mm'); // Hora elegida...
                var chosen_day = date.format('e'); // Día elegido -> 0 = Domingo, 1 = Lunes, 6 = Sábado

                if (chosen_day > 0 && chosen_day < 6) { // Eligió en los días que habre el club...
                    // Si la reserva esta en las horas que habre la pista o club...
                    if(chosen_date > '$start_time' && chosen_date < '$end_time') {
                        // Calculamos que haya tiempo... cuando es la reserva siguiente...

                        // Realizamos la reserva...
                        console.log('OK' + date.format());
                    } else {
                        console.log('Hora fuera de rango');
                    }
                } else {
                    console.log('Dia fuera de rango');
                }
            }",
            // Seleccionar varias horas manteniendo el raton... 
            'select' => 'function(startDate, endDate, jsEvent, view, resource) {
                alert(startDate.format() +"---"+ endDate.format() +"--"+ resource.id);
            }'
        ]);

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
