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
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('tratamientos');
    }
};
