<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClubTrack;
use Auth;

class ClubTrackController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Listar todas las pistas del club que administre el usuario logueado...
        $tracks = ClubTrack::where('club_id','=', Auth::user()->club_id)->get();     
        return view('track', compact("tracks"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Vista para añadir pistas al club..
        return view('track_register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Añadir las pistas a la BBDD...
        ClubTrack::create($request->all());
        // controlar que mantenga los datos del modal...
        return redirect()->route('track.index');
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
        return view('track_show', compact("show"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Vista para editar una pistas del club..
        $tracks = ClubTrack::find($id);
        return view('track_edit', compact("tracks"));
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
        // actualizar la pista...
        $tracks = ClubTrack::find($id);
        $tracks->update($request->all());
        return redirect()->route('track.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // eliminar pista
        $tracks = ClubTrack::find($id);
        $tracks->delete();
        return redirect()->route('track.index');
    }
}
