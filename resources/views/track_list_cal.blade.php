<!doctype html>
<html lang="en">
<head>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>


    <script src="https://static.codepen.io/assets/common/stopExecutionOnTimeout-de7e2ef6bfefd24b79a3f68b414b87b8db5b08439cac3f1012092b2290c719cd.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://momentjs.com/downloads/moment.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
  <script src="https://fullcalendar.io/js/fullcalendar-scheduler-1.6.2/scheduler.min.js"></script>

</head>

<body>
    <h1>CALENDAR</h1>

    {!! $calendar->calendar() !!}
    {!! $calendar->script() !!}

   



<div id="calendar-d9WWIDMb"></div>

<div id="calendar"></div>

<script>
/*
    (function($) {

    //https://codepen.io/snak3/pen/PKbmJr
    $('#calendar').fullCalendar({
        defaultView: 'agendaDay',
        visibleRange: {
        start: moment('2019-05-12'),
        end: moment('2019-05-13')
        },
                resourceAreaWidth: '25%',
                resourceLabelText: 'Rooms',
        header: {
            'left': 'agendaDay',
            'center': 'title'
        },
        resources: [
                    { id: 'a', title: 'Auditorium A' },
                    { id: 'b', title: 'Auditorium B', eventColor: 'green' },
                    { id: 'c', title: 'Auditorium C', eventColor: 'orange' },
                    { id: 'd', title: 'Auditorium D', children: [
                        { id: 'd1', title: 'Room D1' },
                        { id: 'd2', title: 'Room D2' }
                    ] },
                    { id: 'e', title: 'Auditorium E' },
                    { id: 'f', title: 'Auditorium F', eventColor: 'red' }
                ],

                events: [
                    { id: '1', resourceId: 'b', start: '2019-05-14T02:00:00', end: '2019-05-14T07:04:00', title: 'event 1' },
                    { id: '2', resourceId: 'c', start: '2019-05-13T05:00:00', end: '2019-05-13T22:02:00', title: 'event 2' },
                    { id: '3', resourceId: 'd', start: '2019-05-15', end: '2017-05-15', title: 'event 3' },
                    { id: '4', resourceId: 'e', start: '2019-05-16T03:00:00', end: '2019-05-17T08:00:00', title: 'event 4' },
                    { id: '5', resourceId: 'f', start: '2019-05-17T00:30:00', end: '2019-05-17T02:30:00', title: 'event 5' }
                ],

                businessHours:
        {

                start: '9:00',
                end:   '12:00',
                dow: [ 1, 2, 3, 4, 5]
        },

    });

    })(jQuery);
    */


    // Other -> horizontal https://codepen.io/acerix/pen/zRYjjP


    /*
        $(document).ready(function(){
            $('#calendar-d9WWIDMb').fullCalendar(
                {
                    "header":{
                        "left":"prev,next today","center":"title","right":"month,agendaWeek,agendaDay, resourceTimelineDay, resourceTimelineWeek"
                    },
                    "eventLimit":true,
                    "firstDay":1,
                    "resourceId":1,
                    "resourceOrder":"-type1,type2",
                    "resourceGroupField":"room",
                    "resourceLabelText":"Rooms",
                    
                    "views":{
                        "timelineDay":{
                            "timeFormat":"H:mm",
                            "type":"timeline",
                            "duration":{"days":1}
                        }
                    },

    aspectRatio: 1.6,
    'defaultView': 'resourceTimelineDay',
    'resourceGroupField': 'building',


    plugins: [ 'resourceTimeline' ],

    
    


                    "resources":[
                        
            { id: 'a', building: '460 Bryant', title: 'Auditorium A' },
            { id: 'b', building: '460 Bryant', title: 'Auditorium B' },
            { id: 'c', building: '460 Bryant', title: 'Auditorium C' },
                    ],
            
                    
                    "viewRender":function() {alert("Callbacks!");},
                    "events":[{"id":0,"title":"Event One","allDay":false,"start":"2019-05-13T08:00:00+00:00","end":"2019-05-14T08:00:00+00:00"},{"id":"stringEventId","title":"Valentine's Day","allDay":true,"start":"2019-05-18T00:00:00+00:00","end":"2019-05-19T00:00:00+00:00"}]
            });
        });


    */

    /*
    $(document).ready(function(){
        $('#calendar-75AOQd74').fullCalendar({
            "header":{"left":"agendaDay","center":"title"},
            "eventLimit":true,
            "resourceId":2,
            "defaultView":"agendaDay",
            "visibleRange":{"start":"2019-05-12","end":"2019-05-13"},
            "resourceAreaWidth":"25%",
            "resourceLabelText":"Rooms",
            "resources":[
                {"id":1,"title":"pista 1"},
                {"id":2,"title":"pista 2"},
                {"id":3,"title":"pista 1"},
                {"id":4,"title":"pista 2"},
                {"id":5,"title":"new track 4"},
                {"id":6,"title":"pista 2"}
            ],
            "events":[
                {
                    "id":0,
                    "title":"Event One",
                    "allDay":false,
                    "start":"2019-05-13T08:00:00+00:00",
                    "end":"2019-05-13T12:00:00+00:00",
                    "resourceId":2
                },
                {
                    "id":"stringEventId",
                    "title":"Valentine's Day",
                    "allDay":false,
                    "start":"2019-05-13T22:00:00+00:00",
                    "end":"2019-05-14T04:00:00+00:00",
                    "resourceId":1
                }
            ]
        });
    });
*/
</script>

</body>
</html>