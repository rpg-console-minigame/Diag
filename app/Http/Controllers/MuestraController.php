<?php

namespace App\Http\Controllers;

use App\Models\Muestra;
use Illuminate\Http\Request;
use App\Models\Formato_muestra;
use App\Models\Sede;
use App\Models\Tipo_naturaleza;
use App\Models\Calidad;
use App\Models\Tipo_estudio;
use App\Models\Imagen;
use App\Models\User;
use App\Models\Interpretacion;
use App\Models\Interpretacion_texto;

class MuestraController extends Controller
{
    public function MuestraWithData()
    {
        $fMuestras = Formato_muestra::all();
        $sedes = Sede::all();
        $tipo_naturaleza = Tipo_naturaleza::all();
        $calidad = Calidad::all();
        $tipo_estudio = Tipo_estudio::all();
        return view(
            'muestracrear',
            [
                'fMuestras' => $fMuestras,
                'sedes' => $sedes,
                'tNaturalezas' => $tipo_naturaleza,
                'calidades' => $calidad,
                'tEstudios' => $tipo_estudio
            ]
        );
    }

    public function muestraInfo($id)
    {
        // Route::get('/muestra/{id}', [MuestraController::class, 'muestraInfo'])->name('muestra');
        $muestra = Muestra::where('id', $id)->first();
        // si $muestra id_user es el mismo que el id del usuario logueado
        if (
            $muestra->user_id == session('user')->getAuthIdentifier()
            || session("user")->is_admin == true
        ) {
            $muestra->imagen = Imagen::where('muestra_id', $id)->get();
            $muestra->formato = Formato_muestra::where('id', $muestra->formato_muestra_id)->first();
            $muestra->sede = Sede::where('id', $muestra->sede_id)->first();
            $muestra->tipo_naturaleza = Tipo_naturaleza::where('id', $muestra->tipo_naturaleza_id)->first();
            $muestra->calidad = Calidad::where('id', $muestra->calidad_id)->first();
            $muestra->user = User::where('id', $muestra->user_id)->first();
            $interpretaciones = Interpretacion_texto::where('id_muestra', $id)->get();
            foreach ($interpretaciones as $interpretacion) {
                $interpretacion->interpretacionInfo = Interpretacion::where('id', $interpretacion->id_interpretacion)->first();
            }
            return view('muestra', ['muestra' => $muestra, 'interpretaciones' => $interpretaciones,'tEstudios' => Tipo_estudio::all(),
            'calidades' => Calidad::all(),'fMuestras' => Formato_muestra::all(),'tNaturalezas' => Tipo_naturaleza::all(),
            'sedes' => Sede::all(),'formatos' => Formato_muestra::all()]);
        } else
            dd();
    }

    public function guardar(Request $request)

    {
        session_start();
        if (!session()->has('user')) {
            return redirect('/login')->withErrors(['msg' => 'User not logged in']);
        }
        $muestra = new Muestra();
        $muestra->descripcion = $request->input('description');
        $muestra->formato_muestra_id = $request->input('muestra_id');
        $muestra->textoCalidad = $request->input('textoCalidad');
        $muestra->sede_id = session('user')->sede_id;
        $muestra->tipo_naturaleza_id = $request->input('tipo_naturaleza_id');
        $muestra->calidad_id = $request->input('calidad_id');
        $muestra->user_id = session('user')->getAuthIdentifier();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('uploads'), $imageName);
            $img = new Imagen();
            $img->aumento = $request->aumento;
            $img->link = $imageName;
            $muestra->save();
            $img->muestra_id = $muestra->id;
            $img->save();
        }
        return redirect(route('welcome'));
    }
    public function delete($id)
    {
        if (session("user")->is_admin == true
        || Muestra::where('id', $id)->first()->user_id == session('user')->getAuthIdentifier()
        ) {
            $muestra = Muestra::where('id', $id)->first();
            $imgs = Imagen::where('muestra_id', $muestra->id)->get();
            foreach ($imgs as $img) {
                unlink("uploads/" . $img->link);
                $img->delete();
            }
            $interpretaciones = Interpretacion_texto::where('id_muestra', $muestra->id)->get();
            foreach ($interpretaciones as $interpretacion)
                $interpretacion->delete();
            $muestra->delete();
        }
        return redirect(route('welcome'));
    }

    public function actualizarMuestra(Request $request, $id){
        $muestra = Muestra::where('id', $id)->first();
        $muestra->descripcion = $request->input('description');
        $muestra->formato_muestra_id = $request->muestra_id;
        $muestra->textoCalidad = $request->input('textoCalidad');
        $muestra->tipo_naturaleza_id = $request->input('tipo_naturaleza_id');
        $muestra->calidad_id = $request->input('calidad_id');
        $muestra->user_id = session('user')->getAuthIdentifier();
        $muestra->save();
        return redirect(route('muestra', ['id' => $id]));
    }

}