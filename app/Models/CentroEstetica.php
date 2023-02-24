<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CentroEstetica extends Model
{
    protected $table = 'centroesteticas';
    protected $fillable = ['nombre','razonsocial','direccion','telefono','email','unisex','capacidadmax'];
    use HasFactory;
}
