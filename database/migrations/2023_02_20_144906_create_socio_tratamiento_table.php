<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socio_tratamiento', function (Blueprint $table) {
           //No pueden haber 2 primary key
             $table->id();
            $table->date("fecha");

            $table->unsignedBigInteger('socio_id');//Se crea el campo
            $table->foreign('socio_id')->references('id')->on('socios');//El enlace de fk

            $table->unsignedBigInteger('tratamiento_id');//Se crea el campo
            $table->foreign('tratamiento_id')->references('id')->on('tratamientos')->onDelete('cascade');//El enlace de fk


            
            //Mas tarde modificar el tipo 
            
            //$table->primary(['socio_id', 'fecha'])->unique();
            $table->unique(['socio_id', 'fecha']);
            //$table->unique('fecha');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('socio_tratamiento');
    }
};
