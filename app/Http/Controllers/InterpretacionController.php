<?php

namespace App\Http\Controllers;

use App\Models\Calidad;
use Illuminate\Http\Request;
use App\Models\Interpretacion_texto;
use App\Models\Interpretacion;
use App\Models\Muestra;
use App\Models\Tipo_estudio;
use Illuminate\Support\Facades\Validator;

class InterpretacionController extends Controller
{

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), 
        [
            'texto' => 'required|min:20|max:255',
            'id_muestra' => 'exists:muestra,id',
            'id_interpretacion' => 'exists:interpretacion,id'
        ],
        [
            'texto.required' => 'El texto es requerido',
            'texto.min' => 'El texto debe tener al menos 20 caracteres',
            'texto.max' => 'El texto debe tener maximo 255 caracteres',
            'id_muestra.exists' => 'La muestra no existe',
            'id_interpretacion.exists' => 'La interpretacion no existe'
        ]);

        if($validator->fails())
        {
            return redirect()->route('muestra', ['id' => $request->id_muestra])
            ->withErrors($validator)
            ->withInput();
        }
        else{
            $interpretacionTexto = new Interpretacion_texto();
            $interpretacionTexto->texto = $request->texto;
            $interpretacionTexto->id_muestra = $request->id_muestra;
            $interpretacionTexto->id_interpretacion = $request->id_interpretacion;
            $interpretacionTexto->save();

            return redirect()->route('muestra', ['id' => $request->id_muestra])
            ->with('success', 'Interpretacion guardada con exito');
        }
    }

    public function delete($id){
        $interpretacion = Interpretacion_texto::where('id', $id)->first();
        $muestra = Muestra::where("id",$interpretacion->id_muestra)->first();
        $interpretacion->delete();
        return redirect()->route('muestra', ['id' => $muestra->id]);

    }
}
