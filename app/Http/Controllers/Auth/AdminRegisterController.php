<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Admin;
use App\Club;

class AdminRegisterController extends Controller
{
    //https://ysk-override.com/Multi-Auth-in-laravel-54-Registration-20170202/

    public function __construct()
    {
        $this->middleware('guest:admin');
    }
    
    public function showRegistrationForm()
    {
        $clubes = Club::all();      
        return view('auth.admin_register', compact("clubes"));
        //return view('auth.admin_register');
    }
    
    public function register(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
       
        // Registrar BD
        $admin = $this->create($request->all());
        return redirect(route('admin.dashboard'));
// dd($request); 

        //Admin::create($request->all());
        //return redirect(route('admin.dashboard'));
        
    }

    protected function create(array $data)
    {
        return Admin::create([
            'username' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'club_id' => $data['club'],
        ]);
    }

}
