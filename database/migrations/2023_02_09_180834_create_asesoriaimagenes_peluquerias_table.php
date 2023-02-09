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
        Schema::create('asesoriaimagenes_peluquerias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('asesoriaimagen_id');//Se crea el campo
            $table->foreign('asesoriaimagen_id')->references('id')->on('asesoriaimagenes');//El enlace de fk

            $table->unsignedBigInteger('peluqueria_id');//Se crea el campo
            $table->foreign('peluqueria_id')->references('id')->on('peluquerias');//El enlace de fk


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
        Schema::dropIfExists('asesoriaimagen_peluqueria');
    }
};
