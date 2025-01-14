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
        'formato_muestra_id'
    ];
}
