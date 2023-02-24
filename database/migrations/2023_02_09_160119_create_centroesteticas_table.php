<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up()
    {
        //Crea la tabla de los centros de estetica con sus campos
        Schema::create('centroesteticas', function (Blueprint $table) {
            $table->id();
            $table->string("nombre");
            $table->string("razonsocial");
            $table->string("direccion");
            $table->string("telefono");
            $table->string("email");
            $table->boolean("unisex");
            $table->string("capacidadmax");
            
            $table->timestamps();
        });
    }
    
    
    public function down()
    {
        Schema::dropIfExists('centroesteticas');
    }
};
