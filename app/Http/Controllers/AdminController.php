<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use App\User;
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
    {/*
        $clubs = Club::all();
        $club_tracks = ClubTrack::all();
        $reserves = Auth::user()->reservations; // Obtenemos todas las reservas del usuario logueado... 
        $fecha_actual = (new DateTime('now', new DateTimeZone('Europe/Madrid') ))->format('Y-m-d H:i:s'); // Fecha actual...
        $current = []; // Reservas actuales - vigentes a día de hoy...
        $past = []; // Reservas pasadas...

        foreach ($reserves as $value) {
            // Si la reserva es mayor a la fecha/hora actual...
            if ($value->start > $fecha_actual) {
                $current[] = $value;
            } else {
                $past[] = $value;
            }
        }
        */

        // Listar todas las pistas del club que administre el usuario logueado...
        //$tracks = ClubTrack::where('club_id','=', Auth::user()->club_id)->get();  

        $users_all = Auth::user()->club->users; // Usuarios que estan registrado en el club...        
        $fecha_actual = (new DateTime('now', new DateTimeZone('Europe/Madrid')))->format('Y-m-d H:i:s'); // Fecha actual...
        $current = []; // Reservas actuales - vigentes a día de hoy...
        $past = []; // Reservas pasadas...
        $users = [];
        $reserve_users = [];

        // Recorremos los usuarios que siguen o seguian al club...
        foreach ($users_all as $value) {
            // Si los usuarios nos siguen, obtenemos sus datos...
            if ($value->pivot->following == 1) {
                $users[] = $value;
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
}
