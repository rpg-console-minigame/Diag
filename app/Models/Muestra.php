<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class muestra extends Model
{
    use HasFactory;

    protected $table = 'muestra';

    protected $id = 'id';

    protected $fillable = [
        'descripcion',
        'formato_muestra_id',
        'sede_id',
        'tipo_naturaleza_id'
    ];

    public function Formato_muestra(){
        return $this->hasOne('App\Models\Formato_muestra');
    }
    public function Sede(){
        return $this->hasOne('App\Models\Sede');
    }

    public function Tipo_naturaleza(){
        return $this->hasOne('App\Models\Tipo_naturaleza');
    }
}
