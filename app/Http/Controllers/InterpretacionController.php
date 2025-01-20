<?php

namespace App\Http\Controllers;

use App\Models\Calidad;
use Illuminate\Http\Request;
use App\Models\Interpretacion_texto;
use App\Models\Interpretacion;
use App\Models\Muestra;
use App\Models\Tipo_estudio;

class InterpretacionController extends Controller
{
    public function index($id)
    {
        $muestra = Muestra::where('id', $id)->first();
        $interpretaciones = Interpretacion::where('tipo_estudio_id', 
        Tipo_estudio::where('id', 
        Calidad::where('id', $muestra->calidad_id)->first()
        ->tipo_estudio_id)->first()->id)->get();
        return view('interpretacion',['interpretaciones' => $interpretaciones, 'muestra' => $muestra]);
    }
    public function create(Request $request)
    {
        $interpretacionTexto = new Interpretacion_texto();
        $interpretacionTexto->texto = $request->texto;
        $interpretacionTexto->id_muestra = $request->id_muestra;
        $interpretacionTexto->id_interpretacion = $request->id_interpretacion;
        $interpretacionTexto->save();
        return redirect()->route('muestra', ['id' => $request->id_muestra]);
    }
}
