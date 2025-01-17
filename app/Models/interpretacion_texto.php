<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interpretacion_texto extends Model
{
    use HasFactory;

    protected $table = 'interpretacion_texto';
    protected $id = 'id';

    protected $fillable = ['texto', 'id_muestra', 'id_interpretacion'];

    public function muestra()
    {
        return $this->belongsTo(Muestra::class);
    }

    public function interpretacion()
    {
        return $this->belongsTo(Interpretacion::class);
    }

}
