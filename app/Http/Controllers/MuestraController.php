<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formato_muestra;

class MuestraController extends Controller
{
    public function Datos()
    {
        $muestra = Formato_muestra::all();
        return view('muestra', ['muestra' => $muestra]);
    }
}
