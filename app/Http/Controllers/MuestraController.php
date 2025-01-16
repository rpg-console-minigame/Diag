<?php

namespace App\Http\Controllers;

use App\Models\Muestra;
use Illuminate\Http\Request;
use App\Models\Formato_muestra;
use App\Models\Sede;
use App\Models\Tipo_naturaleza;
use App\Models\Calidad;
use App\Models\Tipo_estudio;

class MuestraController extends Controller
{
    public function WelcomeWithData()
    {
        $fMuestras = Formato_muestra::all();
        $sedes = Sede::all();
        $tipo_naturaleza = Tipo_naturaleza::all();
        $calidad = Calidad::all();
        $tipo_estudio = Tipo_estudio::all();
        return view(
            'muestra',
            [
                'fMuestras' => $fMuestras,
                'sedes' => $sedes,
                'tNaturalezas' => $tipo_naturaleza,
                'calidades' => $calidad,
                'tEstudios' => $tipo_estudio
            ]
        );
    }

    public function guardar(Request $request)
    {
        $muestra = new Muestra();

        $muestra->descripcion = $request->input('description');
        $muestra->formato_muestra_id = $request->input('muestra_id');
        $muestra->sede_id = $request->input('sede_id');
        $muestra->tipo_naturaleza_id = $request->input('tipo_naturaleza_id');
        $muestra->calidad_id = $request->input('calidad_id');
        $muestra->tipo_estudio_id = $request->input('tipo_estudio_id');
        $muestra->save();

        return redirect('/formulario');
    }
}
