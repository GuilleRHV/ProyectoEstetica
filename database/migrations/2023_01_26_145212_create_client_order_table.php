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
        Schema::create('client_order', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');//Se crea el campo
            $table->foreign('client_id')->references('id')->on('clients');//El enlace de fk

            $table->unsignedBigInteger('order_id');//Se crea el campo
            $table->foreign('order_id')->references('id')->on('orders');//El enlace de fk


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
        Schema::dropIfExists('client_order');
    }
};
