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
        $show_list = Reservation::find($id);
        $club_tracks = ClubTrack::find($show_list->club_track_id); // Info del club

        return view('waiting_list', compact('show_list', 'club_tracks'));
    }
}
