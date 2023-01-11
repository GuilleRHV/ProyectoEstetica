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
        Schema::create('orders_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id'); //Crea el campo fk
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');//Crea la referencia
            $table->unsignedBigInteger('product_id'); //Crea el campo fk
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');//Crea la referencia
            
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
        Schema::dropIfExists('orders_products');
    }
};
