<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sede extends Model
{
    use HasFactory;
    
    protected $table = 'sede';
    protected $id = 'id';
    protected $fillable = ['nombre', 'siglas'];
}
