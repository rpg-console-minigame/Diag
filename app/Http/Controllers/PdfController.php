<?php

namespace App\Http\Controllers;

use App\Models\Sede;
use App\Models\User;
use App\Models\Imagen;
use App\Models\Tipo_estudio;
use App\Models\Interpretacion;
use App\Models\Interpretacion_texto;
use App\Models\Formato_muestra;
use App\Models\Tipo_naturaleza;
use App\Models\Calidad;
use App\Models\Muestra;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function download($id)
    {
         // Retrieve the muestra record
    $muestra = Muestra::where('id', $id)->first();

        $muestra->imagen = Imagen::where('muestra_id', $id)->get();
        $muestra->formato = Formato_muestra::where('id', $muestra->formato_muestra_id)->first();
        $muestra->sede = Sede::where('id', $muestra->sede_id)->first();
        $muestra->tipo_naturaleza = Tipo_naturaleza::where('id', $muestra->tipo_naturaleza_id)->first();
        $muestra->calidad = Calidad::where('id', $muestra->calidad_id)->first();
        $muestra->user = User::where('id', $muestra->user_id)->first();

        // Fetch interpretations related to the muestra
        $interpretaciones = Interpretacion_texto::where('id_muestra', $id)->get();
        foreach ($interpretaciones as $interpretacion) {
            $interpretacion->interpretacionInfo = Interpretacion::where('id', $interpretacion->id_interpretacion)->first();
        }

        // Fetch interpretations based on the tipo_estudio related to the muestra
        $interpretacion_texto = Interpretacion::where('tipo_estudio_id', 
            Tipo_estudio::where('id', 
                Calidad::where('id', $muestra->calidad_id)->first()
                ->tipo_estudio_id)->first()->id
        )->get();

        // Generate the PDF with the view and the required data
        $pdf = Pdf::loadView('pdf', [
            'muestra' => $muestra,
            'interpretaciones' => $interpretaciones,
            'tEstudios' => Tipo_estudio::all(),
            'calidades' => Calidad::all(),
            'fMuestras' => Formato_muestra::all(),
            'tNaturalezas' => Tipo_naturaleza::all(),
            'sedes' => Sede::all(),
            'formatos' => Formato_muestra::all(),
            'interpretacion_texto' => $interpretacion_texto
        ]);
        
        // Return the PDF as a download
        return $pdf->download('ejemplo.pdf');
    }
    

    
    
}
