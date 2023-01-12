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
        Schema::create('alumnos_cursos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alumno_id'); //Crea el campo fk
            $table->foreign('alumno_id')->references('id')->on('alumnos')->onDelete('cascade');//Crea la referencia
            $table->unsignedBigInteger('curso_id'); //Crea el campo fk
            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('cascade');//Crea la referencia
            
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
        Schema::dropIfExists('alumnos_cursos');
    }
};
