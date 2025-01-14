<?php

namespace App\Http\Controllers;

use App\Models\Muestra;
use Illuminate\Http\Request;
use App\Models\Formato_muestra;

class MuestraController extends Controller
{
    public function Datos()
    {
        $muestra = Formato_muestra::all();
        return view('muestra', ['muestra' => $muestra]);
    }

    public function guardar(Request $request)
    {
        $muestra = new Muestra();

        $muestra->descripcion = $request->input('description');
        $muestra->formato_muestra_id = $request->input('muestra_id');

        $muestra->save();

        return redirect('/formulario');
    }
}
