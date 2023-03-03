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
        Schema::create('detail_carts', function (Blueprint $table) {
            // $table->id();
            $table->unsignedBigInteger('cart_id');
            $table->unsignedBigInteger('product_id'); 
            $table->integer('price');
            $table->integer('price_sale');
            $table->integer('pty');
            $table->foreign('cart_id')
                ->references('id')
                ->on('carts')
                ->onDelete('cascade');
            $table->foreign('product_id')
                ->references('id')
                ->on('products')
                ->onDelete('cascade');
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
        Schema::dropIfExists('detail_carts');
    }
};
