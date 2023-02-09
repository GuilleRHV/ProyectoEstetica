<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsesoriaImagen extends Model
{
    protected $fillable = ['nombre','razonsocial','direccion','telefono','email'];
    use HasFactory;
}
