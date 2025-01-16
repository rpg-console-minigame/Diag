<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Interpretacion extends Model
{
    use HasFactory;

    protected $table = 'interpretacion';

    protected $id = 'id';

    protected $fillable = [
        'texto',
        'tipo_estudio_id'
    ];

    public function Tipo_estudio(){
        return $this->hasOne('App\Models\Tipo_estudio');
    }
}
