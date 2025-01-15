<?php

namespace App\Http\Controllers;

use App\Models\Muestra;
use Illuminate\Http\Request;
use App\Models\Formato_muestra;
use App\Models\Sede;

class MuestraController extends Controller
{
    public function Datos()
    {
        $fMuestras = Formato_muestra::all();
        $sedes = Sede::all();
        return view('muestra', ['fMuestras' => $fMuestras, 'sedes' => $sedes]);
    }

    public function guardar(Request $request)
    {
        $muestra = new Muestra();

        $muestra->descripcion = $request->input('description');
        $muestra->formato_muestra_id = $request->input('muestra_id');
        $muestra->sede_id = $request->input('sede_id');
        $muestra->save();

        return redirect('/formulario');
    }
}
