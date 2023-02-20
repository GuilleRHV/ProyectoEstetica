<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocioTratamiento extends Model
{
    use HasFactory;
    protected $table = "socio_tratamiento";
    protected $fillable = ["fecha", "socio_id", "tratamiento_id"];
}
