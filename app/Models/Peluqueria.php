<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peluqueria extends Model
{
    protected $table = 'peluquerias';
    protected $fillable = ['nombre','razonsocial','direccion','telefono','email','nsalas','fisioterapia'];
    use HasFactory;
    
}
