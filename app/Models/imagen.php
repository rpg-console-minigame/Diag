<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    use HasFactory;

    protected $table = 'imagen';

    protected $id = 'id';

    protected $fillable = [
        'link',
        'aumento',
        'muestra_id'
    ];

    public function muestra()
    {
        return $this->belongsTo(Muestra::class);
    }
}
