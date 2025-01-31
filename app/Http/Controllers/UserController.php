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
        if (session('user')->is_admin) {
            $sedes = Sede::all();
            return view('register', ['sedes' => $sedes]);
        } else {
            return redirect()->route('welcome');
        }
    }

    public function mostrarUsuarios()
    {
        if(session('user')->is_admin){
            $users = User::where('id', session('user')->id)->get();

            $allUsers = User::where('id', '!=', session('user')->id)->get();
            $users = $users->merge($allUsers);
            foreach ($users as $user) {
                $user->sede = Sede::where('id', $user->sede_id)->first();
            }

            return view('editarUsuarios', ['users' => $users]);
        }else{
            return redirect()->route('welcome');
        }
    }

    public function Guardar()
    {
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
        if ($user && password_verify($data['password'], $user->password)) {
            session(['user' => $user]);
            return redirect()->route('welcome');
        }
        return redirect()->route('login');
    }
    public function welcomeWittData()
    {
        session_start();
        if (!session('user')) {
            return redirect()->route('login');
        } else {

            if (session('user')->is_admin) {
                $muestras = Muestra::all();
                foreach ($muestras as $muestra) {
                    $muestra->formato = Formato_muestra::where('id', $muestra->formato_muestra_id)->first();
                    $muestra->sede = Sede::where('id', $muestra->sede_id)->first();
                    $muestra->tipo_naturaleza = Tipo_naturaleza::where('id', $muestra->tipo_naturaleza_id)->first();
                    $muestra->calidad = Calidad::where('id', $muestra->calidad_id)->first();
                }
                return view('welcomeAdmin', ['muestras' => $muestras]);
            } else {
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
    }
    public function logout()
    {
        session()->forget('user');
        return redirect()->route('login');
    }
}
