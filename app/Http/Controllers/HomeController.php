<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use App\Club;
use Auth;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //$tracks = Reservation::where('club_id','=', Auth::user()->club_id)->get();  
        return view('home');
    }

    /**
     * Show all clubs for registered users and change the status to the clubs that follows.
     */
    public function follow()
    {
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
        return view('list_clubs', compact('clubs', 'follows'));
    }

    /**
     * Update club information that follows.
     */
    public function update($club, $status)
    {
        $user = Club::find($club)->users; // Obtenemos los usuarios que siguen al club - pivot...
        $dato = ($status == 1) ? 0 : 1; // Cambiamos el valor del campo follow - tabla pivot
/*
        // Si el usuario no nos sigue le damos la posibilidad de seguirnos - creando en la pivot los datos...
        if (count($user) == 0) {
            Auth::user()->clubs()->attach(1, ['following' => $dato, 'club_id' => $club, 'user_id' => Auth::user()->id]);
            //Auth::user()->clubs()->wherePivot('id','=',$id)->detach(); // Para Eliminar
        } 
*/

        foreach ($user as $value) {
            // Comprobamos que el usuario logueado sigue al club...
            if ($value->id == Auth::user()->id) {
                $id = $value->pivot->id; // Obtenemos el ID de la pivot                 
                // Actualizamos en la tabla pivot el campo following...
                Auth::user()->clubs()->wherePivot('id','=',$id)->update(['following' => $dato]);
            } 
        }

        return redirect()->route('home.club'); // Mostramos el listado del club con los cambios
    }

}
