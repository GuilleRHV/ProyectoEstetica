<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up()
    {//Crea la tabla socio_tratamiento
        Schema::create('socio_tratamiento', function (Blueprint $table) {
           //No pueden haber 2 primary key
             $table->id();
            $table->date("fecha");

            $table->unsignedBigInteger('socio_id');//Se crea el campo
            $table->foreign('socio_id')->references('id')->on('socios')->onDelete('cascade');;//El enlace de fk

            $table->unsignedBigInteger('tratamiento_id');//Se crea el campo
            $table->foreign('tratamiento_id')->references('id')->on('tratamientos')->onDelete('cascade');//El enlace de fk


            //hacemos que la combinacion de los campos socio_id y fecha sean unique
            $table->unique(['socio_id', 'fecha']);
            
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('socio_tratamiento');
    }
};
