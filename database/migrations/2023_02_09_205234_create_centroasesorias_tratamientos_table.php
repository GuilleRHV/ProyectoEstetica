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
        Schema::create('centroasesorias_tratamientos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('centroasesoria_id');//Se crea el campo
            $table->foreign('centroasesoria_id')->references('id')->on('centroasesorias');//El enlace de fk

            $table->unsignedBigInteger('tratamiento_id');//Se crea el campo
            $table->foreign('tratamiento_id')->references('id')->on('tratamientos');//El enlace de fk


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
        Schema::dropIfExists('centroasesorias_tratamientos');
    }
};
