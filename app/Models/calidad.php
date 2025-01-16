<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class calidad extends Model
{
    use HasFactory;
    protected $id = 'id';

    protected $table = 'calidad';
    protected $fillable = ['nombre', 'tipo_estudio_id'];
    public function tipo_estudio()
    {
        return $this->belongsTo('App\Models\tipo_estudio');
    }
}
