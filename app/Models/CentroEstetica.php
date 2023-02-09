<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CentroEstetica extends Model
{
    protected $fillable = ['unisex','capacidadmax'];
    use HasFactory;
}
