<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Club;
use Auth;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Listar todos los clubes disponibles...
        $clubs = Club::all()->toArray();
        return view('list_clubs_invited', compact('clubs'));

        /*
        // Listar todos los clubes disponibles...
        $clubs = Club::all()->toArray();
        $follows = [];

        foreach ($clubs as $value) {
            $follows[$value['id']] = 0; // añadir a los demas clubs 0 = Sígueme
            foreach (Auth::user()->clubs as $key => $value) {
                if ($value['id'] == $value->pivot->club_id) {
                    $follows [$value['id']] = $value->pivot->following; // Cambiar el valor por 1 = Me gusta
                }
            }
        }
        return view('list_clubs', compact('clubs', 'follows'));*/
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
        // Obtener los datos enviados del formulario...
        $data = $request->except('days');
        // Obtener checkbox[] y convertirlos en JSON
        $data['days'] = response()->json($request->days)->getContent();

        // Insertar el Club ingresado...
        Club::create($data);
        // Redirirgir para continuar con el registro del administrados
        return redirect()->route('admin.register');

        //$json = '{"X":"MIERCOLES","S":"SABADO","D":"DOMINGO"}';
        //json_decode($json); JSON -> ARRY
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
