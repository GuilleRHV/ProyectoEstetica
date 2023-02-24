<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    //crea la tabla de las Peluquerias
    public function up()
    {
        Schema::create('peluquerias', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->string("razonsocial");
            $table->string("direccion");
            $table->string("telefono");
            $table->string("email");
            $table->integer("nsalas");
            $table->tinyInteger("fisioterapia");
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('peluquerias');
    }
};
