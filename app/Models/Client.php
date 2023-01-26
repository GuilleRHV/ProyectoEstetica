<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ["DNI","nombre","apellidos","telefono","email"];
    public function orders(){
        //return $this->hasMany(Order::class); //Relacion 1:N

        return $this->belongsToMany(Order::class); //Relacion n:M
    }
}
