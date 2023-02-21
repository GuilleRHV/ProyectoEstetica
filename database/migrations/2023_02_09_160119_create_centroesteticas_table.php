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
        //Crea la tabla de los centros de estetica con sus campos
        Schema::create('centroesteticas', function (Blueprint $table) {
            $table->id();
            $table->integer("nsalas");
            $table->boolean("fisioterapia");
            
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('centroesteticas');
    }
};
