<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rate;
use App\Reservation;
use Auth;
use DateTime;

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
        // Obtener los datos enviados por formulario...
        $start = $request->input('date');
        $rate = Rate::find($request->input('price'));
        $duration = $rate->duration;
        $price = $rate->price;
        $opponent = ($request->input('opponent') != null) ? 1 : 0;

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
        $reserve->duration = $duration;
        $reserve->players = $request->input('player');
        $reserve->full = $opponent; // Si busca oponente/pareja...
        $reserve->search_players = $request->input('couple');
        $reserve->club_track_id = $request->input('club_track_id');
        $reserve->save(); // Insertamos en la BBDD...

        // Insertar en la tabla pivot...
        $reservation = Reservation::find($reserve->id);
        $reservation->users()->attach(1, ['status' => 3, 'pay' => 0, 'user_id' => Auth::user()->id, 'reservation_id' => $reserve->id]);
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
