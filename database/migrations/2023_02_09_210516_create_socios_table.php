<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   
    public function up()
    {
        //Crea la tabla Socios
        Schema::create('socios', function (Blueprint $table) {

            $table->id();
            $table->string("nombre");
            $table->string("apellidos");
            $table->integer("edad");
            $table->string("telefono");

            $table->timestamps();

        });
    }

  
    public function down()
    {

        Schema::dropIfExists('socios');
        
    }
};
