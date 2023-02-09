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
        Schema::create('asesoriaimagenes_centroesteticas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('asesoriaimagen_id');//Se crea el campo
            $table->foreign('asesoriaimagen_id')->references('id')->on('asesoriaimagenes');//El enlace de fk

            $table->unsignedBigInteger('centroestetica_id');//Se crea el campo
            $table->foreign('centroestetica_id')->references('id')->on('centroesteticas');//El enlace de fk


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
        Schema::dropIfExists('asesoriaimagen_centroestetica');
    }
};
