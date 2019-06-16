<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rate;
use App\Reservation;
use App\ClubTrack;
use Auth;
use DateTime, DateTimeZone;

class ReservationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        // Si queremos que el admin vea - controlar middleware o quitar -> modificar el la vista show -> Auth = null
        // https://pusher.com/tutorials/multiple-authentication-guards-laravel
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Lista de reservas...
        //return view('list_clubs');        
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
        $club = ClubTrack::find($request->input('club_track_id'));
        // Obtener los datos enviados por formulario...
        $start = $request->input('date');
        $rate = Rate::find($request->input('price'));
        $duration = $rate->duration;
        $price = $rate->price;
        $opponent = ($request->input('opponent') != null) ? 1 : 0; // 1 = Busca oponente...
        $color = ($request->input('opponent') != null) ? "#f8d254" : "#65a7ec";

        // Obtenemos de la duración elegida - la hora/minuto...
        $end_hour = date('H', strtotime($duration));
        $end_min = date('i', strtotime($duration));
        // Sumamos a la hora que empieza la reserva la duración elegida... 
        $end = strtotime ('+'.$end_hour.' hour', strtotime($start)); 
        $end = strtotime ('+'.$end_min.' minute', $end); 
        $end = date('Y-m-j H:i:s' , $end); // Damos el formato a la hora que termina la reserva...

        // Insertar en reserva...
        $reserve = new Reservation;
        $reserve->start = $start;
        $reserve->end = $end;
        $reserve->price = $price;
        $reserve->color = $color;
        $reserve->duration = $duration;
        $reserve->players = $request->input('player');
        $reserve->full = $opponent; // Si busca oponente/pareja...
        $reserve->search_players = $request->input('couple');
        $reserve->club_track_id = $request->input('club_track_id');
        $reserve->save(); // Insertamos en la BBDD...

        // Insertar en la tabla pivot...
        $status = ($opponent == 0) ? 1 : 2;
        $reservation = Reservation::find($reserve->id);
        $reservation->users()->attach(1, ['status' => $status, 'pay' => 0, 'user_id' => Auth::user()->id, 'reservation_id' => $reserve->id]);
        return redirect()->route('club.track', [$club->club_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Mostrar informacion de la reserva seleccionada...
        $show = Reservation::find($id);
        $club_tracks = ClubTrack::find($show->club_track_id); // Info del club

        $fecha_actual = (new DateTime('now', new DateTimeZone('Europe/Madrid') ))->format('Y-m-d H:i:s'); // Fecha actual...
        $disabled = ($show->start < $fecha_actual)  ? 'disabled' : ''; // Si la fecha ya ha pasado no dejamos cancelar...
        return view('reserve_show', compact("show", "club_tracks", "disabled"));
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
        // Actualizar la reserva...
        $status = Reservation::find($id);
        foreach ($status->users as $value) {
            // Si en los usuarios de la reserva esta el usuario logueado...
            if ($value->id == Auth::user()->id) {
                $estado = $value->pivot->status;
                $cancelled = $value->pivot->cancelled;
                $lista = ($value->pivot->waiting_list != null) ? $value->pivot->waiting_list : 0; //
                $espera = ($lista == 1) ? 0 : 1; //
                
                // Estado anterior si se cancelo...
                $last = ($cancelled != null) ? $cancelled : null;
                // Si es 2 | 1 = Pendiente | Confirmado -> pasa a cancelado...
                // Si es 0 -> Obtenemos el estado anterior...
                $valor = ($estado == 2 || $estado == 1) ? 0 : $last;

                // Actualizamos en la tabla pivot el campo status...
                Auth::user()->reservations()->wherePivot('id','=',$value->pivot->id)->update(['status' => $valor, 'cancelled' => $estado, 'waiting_list' => $espera]);
            }
        }

                    // Actualizar la reserva...
                    //var_dump($value->pivot->cancelled);
        $users = count($status->users); // Nº de usuarios...
        $cont = 0; // nº de cancelaciones...
        // Recorremos los usuarios 
        foreach ($status->users as $value) {
            if ($value->pivot->cancelled != null) {
                $cont++;
            }
        }

        // Si los jugadores a buscar es menor a los cancelados...
        if($status->search_players >= $cont) {
            // Actualizamos...
            $status->color = '#f8d254';
            $status->update($status->toArray());
        } else {
            // No ejecuta - controlar que nº jugadores a buscar..., si vuelve a confirmara la reserva cancelada = cambiar color...
            $status->color = '#65a7ec';
            $status->update($status->toArray());
        }

       
        return redirect()->route('home');
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
