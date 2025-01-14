<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Formato_muestra extends Model
{
    use HasFactory;

    protected $table = 'formato_muestra';

    protected $id = 'id';

    protected $fillable = [
        'nombre'
    ];
}
