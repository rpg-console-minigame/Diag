<?php

namespace App\Http\Controllers;

use App\Models\Sede;
use App\Models\User;
use App\Models\Imagen;
use App\Models\Calidad;
use App\Models\Muestra;
use App\Models\Tipo_estudio;
use Illuminate\Http\Request;
use App\Models\Formato_muestra;
use App\Models\tipo_naturaleza;
use App\Models\Interpretacion_texto;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function Datos()
    {
        if (session()->get('user')->is_admin) {
            $sedes = Sede::all();
            return view('register', ['sedes' => $sedes]);
        } else {
            return redirect()->route('welcome');
        }
    }

    public function Guardar()
    {
        $data = request()->all();

        $validator = Validator::make($data, 
        [
            'nombre' => 'required|min:3|max:255',
            'correo' => 'required|email',
            'contrasena' => 'required|min:4',
            'sede_id' => 'exists:sede,id'
        ],
        [
            'nombre.required' => 'El nombre es requerido',
            'nombre.min' => 'El nombre debe tener al menos 3 caracteres',
            'nombre.max' => 'El nombre debe tener maximo 255 caracteres',
            'correo.required' => 'El correo es requerido',
            'correo.email' => 'El correo debe ser un email',
            'contrasena.required' => 'La contraseña es requerida',
            'contrasena.min' => 'La contraseña debe tener al menos 6 caracteres',
            'sede_id.exists' => 'La sede no existe'
        ]);



        if($validator->fails())
        {
            return redirect()->route('usuarios')
            ->withErrors($validator)
            ->withInput();
        }
        else{  
            
            $user = new User();
            $user->name = $data['nombre'];
            $user->email = $data['correo'];
            $user->password = bcrypt($data['contrasena']);
            $user->sede_id = $data['sede_id'];
            $user->save();
            return redirect()->route('usuarios'); 
        }
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
    
    // Verificar si el usuario está logueado
    if (!session('user')) {
        return redirect()->route('login');
    } else {

        // Obtener los datos adicionales como en la función MuestraWithData
        $fMuestras = Formato_muestra::all();
        $sedes = Sede::all();
        $tipo_naturaleza = Tipo_naturaleza::all();
        $calidad = Calidad::all();
        $tipo_estudio = Tipo_estudio::all();

        if (session()->get('user')->is_admin) {
            $muestras = Muestra::all();
            foreach ($muestras as $muestra) {
                $muestra->formato = Formato_muestra::where('id', $muestra->formato_muestra_id)->first();
                $muestra->sede = Sede::where('id', $muestra->sede_id)->first();
                $muestra->tipo_naturaleza = Tipo_naturaleza::where('id', $muestra->tipo_naturaleza_id)->first();
                $muestra->calidad = Calidad::where('id', $muestra->calidad_id)->first();
                $muestra->img = Imagen::where('muestra_id', $muestra->id)->first();
                $muestra->sigla = $muestra->sede->siglas . " " . $muestra->tipo_naturaleza->sigla . $muestra->id;
            }
            return view('Mfiltrar', [
                'muestras' => $muestras,
                'fMuestras' => $fMuestras,
                'sedes' => $sedes,
                'tNaturalezas' => $tipo_naturaleza,
                'calidades' => $calidad,
                'tEstudios' => $tipo_estudio
            ]);
        } else {
            $muestras = Muestra::where('user_id', session('user')->getKey())->get();
            foreach ($muestras as $muestra) {
                $muestra->formato = Formato_muestra::where('id', $muestra->formato_muestra_id)->first();
                $muestra->sede = Sede::where('id', $muestra->sede_id)->first();
                $muestra->tipo_naturaleza = Tipo_naturaleza::where('id', $muestra->tipo_naturaleza_id)->first();
                $muestra->calidad = Calidad::where('id', $muestra->calidad_id)->first();
                $muestra->img = Imagen::where('muestra_id', $muestra->id)->first();
            }
            return view('Mfiltrar', [
                'muestras' => $muestras,
                'fMuestras' => $fMuestras,
                'sedes' => $sedes,
                'tNaturalezas' => $tipo_naturaleza,
                'calidades' => $calidad,
                'tEstudios' => $tipo_estudio
            ]);
        }
    }
}

    public function logout()
    {
        session()->forget('user');
        return redirect()->route('login');
    }

    public function delete($id){
        if(session('user')->is_admin){
            $user = User::where('id', $id)->first();
            $user->delete();
            return redirect()->route('editarUsuarios');
        }
    }
    public function usersWithData()
    {
        $users = User::all();
        $sedes = Sede::all();
        foreach ($users as $user) {
            $user->sede = Sede::where('id', $user->sede_id)->first();
        }
        return view('Usuarios', ['users' => $users, 'sedes' => $sedes]);
    }
    public function update($id, Request $request)
    {

        $validator = Validator::make($request->all(), 
        [
            'name' => 'required|min:3|max:255',
            'email' => 'required|email',
            'contrasena' => 'required|min:6',
            'sede_id' => 'exists:sede,id'
        ],
        [
            'name.required' => 'El nombre es requerido',
            'name.min' => 'El nombre debe tener al menos 3 caracteres',
            'name.max' => 'El nombre debe tener maximo 255 caracteres',
            'email.required' => 'El email es requerido',
            'email.email' => 'El email debe ser un email',
            'contrasena.required' => 'La contraseña es requerida',
            'contrasena.min' => 'La contraseña debe tener al menos 6 caracteres',
            'sede_id.exists' => 'La sede no existe'
        ]);

        if($validator->fails())
        {
            return redirect()->route('usuarios')
            ->withErrors($validator)
            ->withInput();
        }
        else{
            if (session()->get('user')->is_admin && ($request->contrasena == $request->contrasena1 || $request->contrasena == null && $request->contrasena1 == null)) {
                $user = User::where('id', $id)->first();
                $user->name = $request->name;
                $user->email = $request->email;
                $user->sede_id = $request->sede_id;
                $user->password = bcrypt($request->contrasena);
                $user->save();
                return redirect()->route('usuarios');
            } else {
                return redirect()->route('usuarios')->with('error', 'Las contraseñas no coinciden');
            }
        }

    }
    public function destroy($id)
    {
        if (session()->get('user')->is_admin) {
            if ($id == session()->get('user')->id)
                return redirect()->route('usuarios')->with('error', 'No puedes eliminarte a ti mismo');
            else {
                $user = User::where('id', $id)->first();
                // eliminar todas sus muestras
                if ($user) {
                    $muestras = Muestra::where('user_id', $user->id)->get();
                    foreach ($muestras as $muestra) {
                        $imgs = Imagen::where('muestra_id', $muestra->id)->get();
                        foreach ($imgs as $img) {
                            unlink("uploads/".$img->link);
                            $img->delete();
                        }
                        $interpretaciones = Interpretacion_texto::where('id_muestra', $muestra->id)->get();
                        foreach ($interpretaciones as $interpretacion)$interpretacion->delete();
                        $muestra->delete();
                    }
                    $user->delete();
                    return redirect()->route('usuarios');
                }
                else return redirect()->route('usuarios')->with('error', 'El usuario no existe');
            }
        } else {
            return redirect()->route('usuarios')->with('error', 'No tienes permisos para realizar esta acción');
        }
    }
}
