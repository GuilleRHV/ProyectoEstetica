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
        Schema::create('peluqueria', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('asesoriaimagen_id')->nullable();
            $table->foreign('asesoriaimagen_id')->references('id')->on('asesoriaimagen')->onUpdate('cascade')->onDelete('cascade');
            $table->integer("nsalas");
            $table->boolean("fisioterapia");
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
        Schema::dropIfExists('peluqueria');
    }
};
