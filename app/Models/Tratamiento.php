<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tratamiento extends Model
{
    use HasFactory;
    protected $fillable = ["nombre","precio","tipo"];

    public function socios(){
     
        return $this->belongsToMany(Socio::class)->withPivot("fecha"); //Relacion n:M
    }
}
