<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peluqueria extends Model
{
    protected $fillable = ['nsalas','fisioterapia'];
    use HasFactory;
}
