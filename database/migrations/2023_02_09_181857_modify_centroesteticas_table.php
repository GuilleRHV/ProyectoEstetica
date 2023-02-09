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
        Schema::table('centroesteticas', function (Blueprint $table) {
            $table->unsignedBigInteger('asesoriaimagenes_id')->nullable();
            $table->foreign('asesoriaimagenes_id')->references('id')->on('asesoriaimagenes')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('centroesteticas', function (Blueprint $table) {
            $table->dropForeign(['asesoriaimagenes_id']);
            //$table->dropForeign('orders_asesoriaimagenes_id_foreign');
            $table->dropColumn('asesoriaimagenes_id');
        });
    }
};
