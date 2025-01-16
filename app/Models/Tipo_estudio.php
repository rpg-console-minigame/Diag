<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_estudio extends Model
{
    use HasFactory;
    protected $table = 'tipo_estudio';
    protected $id = 'id';

    protected $fillable = ['nombre'];
    
}
