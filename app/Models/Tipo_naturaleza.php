<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipo_naturaleza extends Model
{
    use HasFactory;

    protected $table = 'tipo_naturaleza';

    protected $id = 'id';

    protected $fillable = [
        'nombre',
        'sigla'
    ];
}
