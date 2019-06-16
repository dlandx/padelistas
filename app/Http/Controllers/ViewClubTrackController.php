<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use MaddHatter\LaravelFullcalendar\Facades\Calendar;
//use \MaddHatter\LaravelFullcalendar\Event;
use Calendar; // Alias of Fullcalenda of ServiceProvider...
use DateTime, DateTimeZone;
use App\Club;
use App\ClubTrack;
use App\Reservation;
use App\Rate;
use App\Size;
use Auth;

class ViewClubTrackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // Obtenemos todas las pistas que tenga el club elegido...
        $tracks = ClubTrack::where('club_id','=', $id)->get();
        $club = Club::find($id);
        $sizes = json_encode(Size::select(['id', 'name', 'description'])->get()); // Obtenemos todos los tamaños de las pistas...
        $rates = json_encode(Rate::select(['id', 'duration', 'price', 'club_track_id'])->get()); // Precios de la pista...
        $reservations = Reservation::all();
        $events = []; // Añadir eventos al calendario = añadir la reserva...
        $horario_club = []; // Horario del club...
        $start_time = $club->start_time;
        $end_time = $club->end_time;
        $fecha_actual = (new DateTime('now', new DateTimeZone('Europe/Madrid') ))->format('Y-m-d H:i:s'); // Fecha actual...
        $users = [];
        $reservas_actual = [];
 
        // Si hay reservas en la BBDD, las añadimos al evento del calendario...
        foreach ($reservations as $value) {
            // Si la reserva es mayor a la fecha/hora actual...
            if ($value->start > $fecha_actual) {
                // Usuario a la que pertenece la reserva...
                foreach ($value->users as $item) {
                    $users[] =  $item;
                }
                $reservas_actual[] = $value;
            }
// ADD
            $cancelled = 0; 
            foreach ($value->users as $item) {
                // Si el usuario cancelo la reserva no contar....
                $cancelled = ($item->pivot->cancelled != null) ? 0: count($value->users)-1;
            }
// 
            //count($value->users) -> nº usuarios que se han unido...
            //$estado = ($value->full == 0) ? "Completa" : "Parcial -  ".(count($value->users)-1)."/$value->search_players jugadores";
            $estado = ($value->full == 0) ? "Completa" : "Parcial -  ".$cancelled."/$value->search_players jugadores"; //
            // Add reservations in events of the full calendar...
            $events[] = Calendar::event(
                $estado,// Title
                false,// Full date
                (new DateTime($value->start))->format('Y-m-d\TH:i'), // Start time
                (new DateTime($value->end))->format('Y-m-d\TH:i'),// End time 
                $value->id, // ID
                ['resourceId' => $value->club_track_id, 'color' => $value->color] // Options event - rooms (Club tracks)
            );
        }

        // Preparamos al formato de fullcalendar - la seccion para las pistas...
        $map = $tracks->map(function($items){
            $data['id'] = $items->id;
            $data['title'] = $items->title;
            $data['businessHours'] = json_decode($items->businessHours);
            $data['size_id'] = $items->size_id;            
            return $data;
        });
        // Preparamos los días a ocultar en el calendario (Solo los días que NO habre el club)
        foreach (json_decode($club->days) as $value) {
            $horario_club[] = (int) $value;
        }

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
            'hiddenDays' => $horario_club,
            'minTime'=> $start_time,
            'maxTime'=> $end_time,
            
            'eventColor' => '#f6c31c',


            'slotLabelFormat' => 'HH:mm a', // Formato de las horas...
            'allDaySlot' => false, // Todo el día quitado...
            //'navLinks' => true, https://codepen.io/LeonardoXu/pen/BJayaY

        ])->setCallbacks([
            // Primera vez antes de cargar el fullcalendar...
            'viewRender' => 'function() {
                //alert("Callbacks! ");
            }',

            'resourceRender' => "function(renderInfo) {
                if (renderInfo == undefined) {
                    console.log('Con pistas...');
                } else {
                    //alert('Callbacks! ');
                }
            }",

            // Click en el evento...
            'eventClick' => "function(event) {
                var color = (event.color == '#65a7ec') ? 'Reserva completa' : 'Reserva pendiente';
                $('#show-status').val(color);                
                $('#show-start').val(event.start.format('YYYY-MM-DD HH:mm'));
                $('#show-end').val(event.end.format('YYYY-MM-DD HH:mm'));
                
                var users =  ".json_encode($users)."; // Obtenemos los users
                var reserves = ".json_encode($reservas_actual)."; // Reservas actuales
                var total = 0; // jugadores a buscar

                // Información de la reserva elegida...
                reserves.forEach(function(value){
                    if(event.id == value.id){
                        $('#show-duration').val(value.duration);
                        $('#show-price').val(value.price);
                        $('#show-player').val(value.players);                        
                        $('#show-search').val(value.search_players);
                        total = value.search_players;
                    }
                });

                // Informacion de los jugadores...
                var estas = false;
                var user = ".(Auth::user()->id ?? 0).";
                var cont = 0;
                
                // Para controlar que si sale del modal - elimine las row... 
                $('#show').on($.modal.BEFORE_CLOSE, function(event, modal) {
                    $('.filastabla').remove();
                });

                users.forEach(function(value){
                    if(event.id == value.pivot.reservation_id){
                        // si el usuario esta en la pivot, lo mostramos...
                        if(value.pivot.user_id == value.id && value.pivot.cancelled != 1) {
                            $('#users-table>tbody').append('<tr class=filastabla><td>'+value.username+'</td><td>'+value.level+'</td><td>'+value.pivot.status+'</td></tr>');                            

                            if(value.pivot.user_id == user){
                                estas = true;
                            }
                        } else {
                            if(value.pivot.cancelled == 1 && value.pivot.user_id == user){
                                estas = true;
                            }
                        } 
                        cont++;
                    }
                });
                console.log(cont);
                // Si la reserva ya consiguio los jugadores buscados...
                if(cont > total) {
                    estas = true;
                }

                if(estas) {
                    // Si estas en la listas deshabilitamos el BTN
                    $('#btn-user').attr('disabled','disabled');
                }                
                $('#show-id').val(event.id);
                $('#show').modal(); // Mostramos modal..
            }",
            
            // Elegir manteniendo en el calendar - add event temp...
            //'editable' => true,
            //'eventDurationEditable' => true,'selectable' => true,
            //'selectHelper' => true,

            // Click en una hora del calendario...
            'dayClick' => "function(date, jsEvent, view, resource) {
                if (resource === undefined) {
                    toastr.error('Lo sentimos :( el club no tiene pistas disponibles...', 'SIN PISTAS')
                }

                var chosen_time = date.format('HH:mm'); // Hora elegida...
                var chosen_day = date.format('e'); // Día elegido -> 0 = Domingo, 1 = Lunes, 6 = Sábado
                var chosen_date = date.format('YYYY-MM-DD HH:mm:ss');
                var reserves = ".json_encode($reservations)."; // Obtenemos todas las reservas...

                if (chosen_day >= 0 && chosen_day <= 6) { // Eligió en los días que habre el club... //
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
                // Controlar disables -> club 1 - p3...
                // Validar que la pista no sea mayor al club hora...
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
                } else { // Ya no - hiddenDays...
                    toastr.warning('Lo sentimos, el club no habre los días')
                    console.log('Dia fuera de rango');
                }
            }",

            // No pueda seleccionar en horas pasadas - CONTROL COLOR...
            'validRange' => "function(nowDate){
                return {start: nowDate, } //to prevent anterior dates
            }",

        ]);

        return view('track_list', compact('calendar', 'club'));
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

        $reserva = $request->input('show-id');
        $apuntado = false;

        // Obtenemos todas las reservas del user...
        foreach (Auth::user()->reservations as $value) {
            if($value->pivot->id == $reserva) {
                $apuntado = true; // Ya esta apuntado...
            }
        }


        // Si no esta aputado, lo apuntamos...
        if($apuntado == false) {
            // Status 2=pendiente, 1=confirmado, 0=cancelado...
            Auth::user()->reservations()->attach(1, ['status' => 1, 'pay' => 0, 'user_id' => Auth::user()->id, 'reservation_id' => $reserva]);
        }
       
        $reservation = Reservation::find($reserva); // Obtenemos la reserva...
        $busca = $reservation->search_players; // El nº de jugadores que busca...
        $players = count($reservation->users)-1;
        // Si su ha completado actualizamos la reserva...
        if ($busca <= $players){
            // Actualizamos...
            $reservation->color = '#65a7ec';
            $reservation->update($reservation->toArray());
        }
/*
        foreach ($reservation->users as $value) {
            if ($value->id == Auth::user()->id){
                if($value->pivot->cancelled != null) {
                    // Actualizamos...
                    $reservation->color = '#f8d254';
                    $reservation->update($reservation->toArray());
                }
            }
        }
*/
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Mostrar informacion de la pista seleccionada...
        $show = ClubTrack::find($id);
        return view('track_show_user', compact("show"));
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
