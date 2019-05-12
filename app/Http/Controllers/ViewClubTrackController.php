<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use MaddHatter\LaravelFullcalendar\Facades\Calendar;
//use \MaddHatter\LaravelFullcalendar\Event;

class ViewClubTrackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $events = [];

        $events[] = \Calendar::event(
            'Event One', //event title
            false, //full day event?
            '2019-05-13T0800', //start time (you can also use Carbon instead of DateTime)
            '2019-05-14T0800', //end time (you can also use Carbon instead of DateTime)
            0 //optionally, you can specify an event ID
        );
        
        $events[] = \Calendar::event(
            "Valentine's Day", //event title
            true, //full day event?
            new \DateTime('2019-05-18'), //start time (you can also use Carbon instead of DateTime)
            new \DateTime('2019-05-19'), //end time (you can also use Carbon instead of DateTime)
            'stringEventId' //optionally, you can specify an event ID
        );


            $resources = array(
                array('id' => "2", "name" => "Resource 1"),
                array('id' => "3", "name" => "Resource 2")
            );  

            $resources_JSON_array = json_encode($resources);   
                




        $calendar = \Calendar::addEvents($events) //add an array with addEvents
->setOptions([ //set fullcalendar options
            'firstDay' => 1,
            
            

            /*
            'resourceId' => 1,
            'resourceOrder' => '-type1,type2',
            'resourceGroupField' =>'room',
            'resourceLabelText' =>'Rooms', 
            'views' => [                
                'timelineDay' => [
                    'timeFormat' => 'H:mm',
                    'type' => 'timeline',
                    'duration' => [ 'days' => 1 ]
                ],
            ],      
            'resources' => [
                [   
                    'id' => '1',
                    'title' => 'Table No.: 1'                   
                ],
                [   
                    'id' => '2',
                    'title' => 'Table No.: 2'
                ],
            ],*/

            'resourceGroupField' =>'room',
            'resourceLabelText' =>'Rooms', 
            'resources' => [ $resources_JSON_array ]

        ])->setCallbacks([ //set fullcalendar callback options (will not be JSON encoded)
            'viewRender' => 'function() {alert("Callbacks!");}'
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
