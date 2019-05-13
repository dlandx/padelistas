<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use MaddHatter\LaravelFullcalendar\Facades\Calendar;
//use \MaddHatter\LaravelFullcalendar\Event;
use App\ClubTrack;


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

        $events[] = \Calendar::event(
            'Event One', //event title
            false, //full day event?
            '2019-05-13T0800', //start time (you can also use Carbon instead of DateTime)
            '2019-05-13T1200', //end time (you can also use Carbon instead of DateTime)
            0, //optionally, you can specify an event ID
            ['resourceId' => 2]
        );        
        $events[] = \Calendar::event(
            "Valentine's Day", //event title
            false, //full day event?
            new \DateTime('2019-05-13T2200'), //start time (you can also use Carbon instead of DateTime)
            new \DateTime('2019-05-14T0400'), //end time (you can also use Carbon instead of DateTime)
            'stringEventId', //optionally, you can specify an event ID
            ['resourceId' => 1]
        );

$r = [
    [   'id' => '1',
'title' => 'Table No.: 1'                   
],
[   'id' => '2',
'title' => 'Table No.: 2',
'eventColor' => 'green'
],
[   'id' => '3',
'title' => 'Table No.: 3'
]];
/*
select(['id', 'title'])
    ->orderBy('created_at', 'desc')
    ->get()
    ->toArray();
*/

// The array we're going to return
$data = [];
// Let's Map the results from [$query]
$map = $tracks->map(function($items){
   $data['id'] = $items->id;
   $data['title'] = $items->name;
   return $data;
});



        $calendar = \Calendar::addEvents($events) //add an array with addEvents         
            ->setOptions([
                'resourceId' => 2,

                'defaultView' => 'agendaDay',
                'visibleRange'=> [
                    'start'=> '2019-05-12',
                    'end'=> '2019-05-13'
                ],
                'resourceAreaWidth' => '25%',
                'resourceLabelText' => 'Rooms',
                'header' => [
                    'left'=> 'agendaDay',
                    'center' => 'title',
                ],
/*
                'resources' => [

                    [   'id' => '1',
                        'title' => 'Table No.: 1'                   
                    ],
                    [   'id' => '2',
                        'title' => 'Table No.: 2',
                        'eventColor' => 'green'
                    ],
                    [   'id' => '3',
                        'title' => 'Table No.: 3'
                    ],
                ],*/
                
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
