<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
            'username' => ['required', 'string', 'max:20', 'unique:admins'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:admins'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'name' => ['string', 'min:2', 'max:20',],
        ]);
       
        // Registrar BD
        $this->create($request->all());
        return redirect(route('admin.dashboard')); // controlar (acceder y redirect...)
    }

    protected function create(array $data)
    {
        return Admin::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'name' => $data['name'],
            'identity_card' => $data['identity'],
            'phone_number' => $data['phone'],
            'gender' => $data['gender'],
            'club_id' => $data['club'],
        ]);
    }

}
