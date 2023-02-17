<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Socio extends Model
{
    
    use HasFactory;
    protected $fillable = ["nombre", "apellidos", "edad", "telefono"];

    public function tratamientos(){
        return $this->hasMany(Tratamiento::class); //Relacion 1:N
      
    }
}
