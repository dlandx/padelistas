<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClubTrack;
use App\TrackType;
use App\TypeSurface;
use App\EnclosureType;
use App\Wall;
use App\Size;
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
        // Listar los tipos de pista [Pádel | Tenis | Basketboll...]
        $types = TrackType::all();
        // Listar los tipos de cerramientos...
        $enclosures = EnclosureType::all();
        // Listar los tipos de paredes...
        $walls = Wall::all();
        // Listar los tipos de tamaños...
        $sizes = Size::all();
        // Listar todas las pistas del club que administre el usuario logueado...
        $tracks = ClubTrack::where('club_id','=', Auth::user()->club_id)->get();     
        return view('track', compact("tracks", "types", "enclosures", "walls", "sizes"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Listar los tipos de pista [Pádel | Tenis | Basketboll...]
        $types = TrackType::all();    
        // Listar los tipos de superficies...
        $surfaces = TypeSurface::all();
        // Listar los tipos de cerramientos...
        $enclosures = EnclosureType::all();
        // Listar los tipos de paredes...
        $walls = Wall::all();
        // Listar los tipos de tamaños...
        $sizes = Size::all();
        // Vista para añadir pistas al club..
        return view('track_register',  compact("types", "surfaces", "enclosures", "walls", "sizes"));
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
        //ClubTrack::create($request->all());

        // Obtener los datos enviados del formulario excepto...
        $data = $request->except(['startTime', 'endTime']);
        // Obtener checkbox[] y convertirlos en JSON
        $data['businessHours'] = response()->json(['startTime' => $request->startTime, 'endTime' => $request->endTime])->getContent();
        // Añadir las pistas a la BBDD...
        ClubTrack::create($data);

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
        // Listar los tipos de pista [Pádel | Tenis | Basketboll...]
        $types = TrackType::all();    
        // Listar los tipos de superficies...
        $surfaces = TypeSurface::all();
        // Listar los tipos de cerramientos...
        $enclosures = EnclosureType::all();
        // Listar los tipos de paredes...
        $walls = Wall::all();
        // Listar los tipos de tamaños...
        $sizes = Size::all();
        // Vista para editar una pistas del club..
        $tracks = ClubTrack::find($id);
        return view('track_edit', compact("tracks", "types", "surfaces", "enclosures", "walls", "sizes"));
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
        // Actualizar la pista...
        $tracks = ClubTrack::find($id);
        //$tracks->update($request->all());

        // Obtener los datos enviados del formulario excepto...
        $data = $request->except(['startTime', 'endTime']);
        // Obtener checkbox[] y convertirlos en JSON
        $data['businessHours'] = response()->json(['startTime' => $request->startTime, 'endTime' => $request->endTime])->getContent();
        $tracks->update($data);

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
        // Eliminar pista
        $tracks = ClubTrack::find($id);
        $tracks->delete();
        return redirect()->route('track.index');
    }
}
