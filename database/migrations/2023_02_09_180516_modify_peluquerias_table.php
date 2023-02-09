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
        Schema::table('peluquerias', function (Blueprint $table) {
            $table->unsignedBigInteger('centroasesoria_id')->nullable();
            $table->foreign('centroasesoria_id')->references('id')->on('centroasesorias')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('peluquerias', function (Blueprint $table) {
            $table->dropForeign(['centroasesoria_id']);
            //$table->dropForeign('orders_asesoriaimagenes_id_foreign');
            $table->dropColumn('centroasesoria_id');
        });
    }
};
