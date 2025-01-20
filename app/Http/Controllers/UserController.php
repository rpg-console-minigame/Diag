<?php

namespace App\Http\Controllers;

use App\Models\Sede;
use App\Models\tipo_naturaleza;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Muestra;
use App\Models\Formato_muestra;
use App\Models\Calidad;

class UserController extends Controller
{
    public function Datos()
    {
        $sedes = Sede::all();
        return view('register', ['sedes' => $sedes]);
    }

    public function Guardar(){
        $data = request()->all();
        $user = new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->sede_id = $data['sede_id'];
        $user->save();
        return redirect()->route('registro');
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
    public function welcomeWittData()
    {
        session_start();
        if(!session('user')){
            return redirect()->route('login');
        }
        else {
            $muestras = Muestra::where('user_id', session('user')->getKey())->get();
            foreach ($muestras as $muestra) {
                $muestra->formato = Formato_muestra::where('id', $muestra->formato_muestra_id)->first();
                $muestra->sede = Sede::where('id', $muestra->sede_id)->first();
                $muestra->tipo_naturaleza = Tipo_naturaleza::where('id', $muestra->tipo_naturaleza_id)->first();
                $muestra->calidad = Calidad::where('id', $muestra->calidad_id)->first();
            }
            return view('welcome', ['muestras' => $muestras]);
        }
    }
    public function logout()
    {
        session()->forget('user');
        return redirect()->route('login');
    }
}
