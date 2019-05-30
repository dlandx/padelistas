<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rate;
use App\Reservation;
use Auth;

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
        $date = $request->input('date');
        $rate = Rate::find($request->input('price'));
        $duration = $rate->duration;
        $price = $rate->price;
        $players = $request->input('player');
        $opponent = ($request->input('opponent') != null) ? 1 : 0;
        
        // Insertar en reserva...
        $reserve = new Reservation;
        $reserve->date = $date;
        $reserve->price = $price;
        $reserve->duration = $duration;
        $reserve->players = $players;
        $reserve->full = $opponent; // Si busca oponente/pareja...
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
