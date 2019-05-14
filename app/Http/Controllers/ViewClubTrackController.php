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
    public function index()
    {

        //$tracks = ClubTrack::all()->toArray();
        //$tracks = ClubTrack::select(['id', 'name'])->get()->toArray();
        $tracks = ClubTrack::select(['id', 'name'])->get();
        $reservations = Reservation::all();


//dd($reservations->toArray());
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


dd($events);
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
                */
                'defaultView' => 'agendaDay',
                'resourceLabelText' => 'Rooms',
                'header' => [
                    'left'=> 'agendaDay',
                    'center' => 'title',
                ],
                'resources' => $map->toArray(),
            ]);

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
