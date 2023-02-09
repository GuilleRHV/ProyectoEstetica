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
        Schema::create('socios_tratamientos', function (Blueprint $table) {
            $table->id();


            $table->unsignedBigInteger('socio_id');//Se crea el campo
            $table->foreign('socio_id')->references('id')->on('socios');//El enlace de fk

            $table->unsignedBigInteger('tratamiento_id');//Se crea el campo
            $table->foreign('tratamiento_id')->references('id')->on('tratamientos');//El enlace de fk

            //Mas tarde modificar el tipo 
            $table->string("fecha")->unique();

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
        Schema::dropIfExists('socios_tratamientos');
    }
};
