<?php

namespace App\Http\Controllers;

use App\Models\Sede;
use App\Models\User;
use App\Models\Imagen;
use App\Models\Calidad;
use App\Models\Muestra;
use App\Models\Tipo_estudio;
use Illuminate\Http\Request;
use App\Models\Interpretacion;
use App\Models\Formato_muestra;
use App\Models\Tipo_naturaleza;
use App\Models\Interpretacion_texto;
use Illuminate\Support\Facades\Validator;

class MuestraController extends Controller
{

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
        // Obtener las interpretaciones basadas en el tipo_estudio relacionado con la muestra
        $interpretacion_texto = Interpretacion::where('tipo_estudio_id', 
            Tipo_estudio::where('id', 
                Calidad::where('id', $muestra->calidad_id)->first()
                ->tipo_estudio_id)->first()->id
            )->get();

       
            return view('muestra', ['muestra' => $muestra, 'interpretaciones' => $interpretaciones,'tEstudios' => Tipo_estudio::all(),
            'calidades' => Calidad::all(),'fMuestras' => Formato_muestra::all(),'tNaturalezas' => Tipo_naturaleza::all(),
            'sedes' => Sede::all(),'formatos' => Formato_muestra::all(),
            'interpretacion_texto' => $interpretacion_texto]);
        } else
            dd();
    }

    public function guardar(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'description' => 'required|min:10|max:255',
            'tipo_estudio_id' => 'exists:tipo_estudio,id',
            'sede_id' => 'exists:sede,id',
            'textoCalidad' => 'required|min:10|max:255',
            'tipo_naturaleza_id' => 'exists:tipo_naturaleza,id',
            'calidad_id' => 'exists:calidad,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:8000',
            'aumento' => 'required|numeric',
        ], [
            'description.required' => 'La descripción es requerida',
            'description.min' => 'La descripción debe tener al menos 10 caracteres',
            'description.max' => 'La descripción debe tener máximo 255 caracteres',
            'tipo_estudio_id.exists' => 'El tipo de estudio no existe',
            'sede_id.exists' => 'La sede no existe',
            'textoCalidad.required' => 'El texto de calidad es requerido',
            'textoCalidad.min' => 'El texto de calidad debe tener al menos 10 caracteres',
            'textoCalidad.max' => 'El texto de calidad debe tener máximo 255 caracteres',
            'tipo_naturaleza_id.exists' => 'El tipo de naturaleza no existe',
            'calidad_id.exists' => 'La calidad no existe',
            'image.required' => 'La imagen es requerida',
            'image.image' => 'El archivo debe ser una imagen',
            'image.mimes' => 'La imagen debe ser de tipo: jpeg, png, jpg, gif, svg',
            'image.max' => 'La imagen debe pesar máximo 8MB',
            'aumento.required' => 'El aumento es requerido',
            'aumento.numeric' => 'El aumento debe ser un número',
        ]);

        if($validator->fails())
        {
            return redirect()->route('welcome', ['id' => $request->id_muestra])
            ->withErrors($validator)
            ->withInput();
        }
        else{
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