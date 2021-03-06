<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use App\ClubTrack;
use Auth;
use DateTime, DateTimeZone;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Listar todas las pistas del club que administre el usuario logueado...
        $users_all = Auth::user()->club->users; // Usuarios que estan registrado en el club...        
        $fecha_actual = (new DateTime('now', new DateTimeZone('Europe/Madrid')))->format('Y-m-d H:i:s'); // Fecha actual...
        $current = []; // Reservas actuales - vigentes a día de hoy...
        $past = []; // Reservas pasadas...
        $reserve_users = [];

        // Recorremos los usuarios que siguen o seguian al club...
        foreach ($users_all as $value) {
            // Si los usuarios nos siguen, obtenemos sus datos...
            if ($value->pivot->following == 1) {
                $reserve_users[] = $value->reservations; // Reservas del usuario - pivot
            }
        }

        // Obtenemos solo las reservas actuales o vigentes (que no hayan caducado)...
        foreach ($reserve_users as $value) {
            foreach ($value as $key => $value) {
                // Si la reserva es mayor a la fecha/hora actual...
                if ($value->start > $fecha_actual) {
                    $current[] = $value;
                } else {
                    $past[] = $value;
                }
            }
        }

        return view('admin', compact('current', 'past'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Obtener los datos de la lista de espera...
        $show = Reservation::find($id);
        $club_tracks = ClubTrack::find($show->club_track_id); // Info del club

        return view('waiting_list', compact('show', 'club_tracks'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reservation($id)
    {
        // Mostrar informacion de la reserva seleccionada...
        $show = Reservation::find($id);
        $club_tracks = ClubTrack::find($show->club_track_id); // Info del club

        $fecha_actual = (new DateTime('now', new DateTimeZone('Europe/Madrid') ))->format('Y-m-d H:i:s'); // Fecha actual...
        $disabled = ($show->start < $fecha_actual)  ? 'disabled' : ''; // Si la fecha ya ha pasado no dejamos cancelar...
        return view('reservation_show', compact("show", "club_tracks", "disabled"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reservation_cancelled($id, $user)
    {
        // Actualizar la reserva...
        $status = Reservation::find($id);

        foreach ($status->users as $value) {
            // Reservas del user...
            //echo $value->pivot->user_id;
            if ($value->pivot->user_id == $user) {
                // concegir el id del user pasando (user_show) - el id del usario a las reservas.
                // Al ver una reserva (reservation_show) obtener el id y pasar por btn cancelar... 
            }
        }
        
        return redirect()->route('home');
    }
}
