<!doctype html>
<html lang="en">
<head>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>



    <style>
        /* ... */
    </style>
</head>

<body>
    <h1>CALENDAR</h1>

    {!! $calendar->calendar() !!}
    {!! $calendar->script() !!}


<div id="calendar-d9WWIDMb"></div>

<div id="calendar"></div>

<script>


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
</script>

</body>
</html>