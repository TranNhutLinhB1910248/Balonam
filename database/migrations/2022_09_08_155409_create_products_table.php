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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string(column: 'name');
            $table->text(column: 'description');
            $table->longText(column: 'content');
            $table->unsignedBigInteger(column: 'menu_id');
            $table->integer(column: 'price')->nullable();
            $table->integer(column: 'price_sale')->nullable();
            $table->integer(column: 'active');
            $table->timestamps();
            $table->string(column: 'thumb');
            $table->foreign('menu_id')
            ->references('id')
            ->on('menus')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
