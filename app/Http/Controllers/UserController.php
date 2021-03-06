<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
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
        // Listar los usuario registrados en el club (Siguen o siguieron al club)...
        $users = Auth::user()->club->users; 
        $follows = [];
        $unfollow = [];

        foreach ($users as $value) {
            // Si en la tabla pivot, el usuario nos sigue actualmente...
            if ($value->pivot->following == 1) {
                $follows[] = $value; // Obenemos los usuario...
            } else {
                $unfollows[] = $value; // Usuarios que ya no nos siguen...
            }            
        }

        return view('user', compact("follows", "unfollows"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Vista para añadir usuarios...
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Información del usuario...
        $show = User::find($id);
        return view('user_show', compact("show"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Vista para editar un usuario..
        $users = User::find($id);
        return view('user_edit', compact("users"));
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
        // Actualizar la usuario...
        $users = User::find($id);
        $users->update($request->all());
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // lista de clubes que sigue el user...
        $users = User::find($id);
        foreach ($users->clubs as $value) {
            if (Auth::user()->club->id == $value->id) {
                echo $value->pivot;
                // Eliminamos de la pivot su registro = 'ya no nos sigue...'
                $users->clubs()->wherePivot('id','=',$value->pivot->id)->detach();
            }
        }
        return redirect()->route('user.index');
    }
}
