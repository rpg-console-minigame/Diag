<?php

namespace App\Http\Controllers;

use App\Models\Muestra;
use Illuminate\Http\Request;
use App\Models\Formato_muestra;
use App\Models\Sede;
use App\Models\Tipo_naturaleza;

class MuestraController extends Controller
{
    public function WelcomeWithData()
    {
        $fMuestras = Formato_muestra::all();
        $sedes = Sede::all();
        $tipo_naturaleza = Tipo_naturaleza::all();
        return view('muestra', ['fMuestras' => $fMuestras, 'sedes' => $sedes, 'tNaturalezas' => $tipo_naturaleza]);
    }

    public function guardar(Request $request)
    {
        $muestra = new Muestra();

        $muestra->descripcion = $request->input('description');
        $muestra->formato_muestra_id = $request->input('muestra_id');
        $muestra->sede_id = $request->input('sede_id');
        $muestra->tipo_naturaleza_id = $request->input('tipo_naturaleza_id');
        $muestra->save();

        return redirect('/formulario');
    }
}
