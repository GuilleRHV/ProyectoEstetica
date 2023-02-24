<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    //Crea la tabla Tratamientos
    public function up()
    {
        Schema::create('tratamientos', function (Blueprint $table) {
            $table->id();
            
            
            $table->string("nombre");
            $table->float("precio");
            $table->string("tipo");
            $table->unsignedBigInteger('centroestetica_id')->nullable();//Se crea el campo
            $table->foreign('centroestetica_id')->references('id')->on('centroesteticas')->onDelete('cascade');//El enlace de fk
            
            $table->unsignedBigInteger('peluqueria_id')->nullable();//Se crea el campo
            $table->foreign('peluqueria_id')->references('id')->on('peluquerias')->onDelete('cascade');//El enlace de fk
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('tratamientos');
    }
};
