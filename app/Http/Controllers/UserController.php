<?php

namespace App\Http\Controllers;

use App\Models\Sede;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function Datos()
    {
        $sedes = Sede::all();
        return view('reguister', ['sedes' => $sedes]);
    }

    public function Guardar(){
        $data = request()->all();
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->sede_id = $data['sede_id'];
        $user->save();
        return redirect()->route('reguistro');
    }

    public function index()
    {
        return view('login');
    }

    public function login()
    {
        session_start();
        $data = request()->all();
        $user = User::where('email', $data['email'])->first();
        if($user && password_verify($data['password'], $user->password)){
            session(['user' => $user]);
            return redirect()->route('welcome');
        }
        return redirect()->route('login');  
    }
}
