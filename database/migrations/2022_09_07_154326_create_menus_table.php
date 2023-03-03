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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string(column: 'name', length: 255);
            $table->integer(column: 'parent_id');
            $table->text(column: 'description');
            $table->longText(column: 'content');
            $table->integer(column: 'active');
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
        Schema::dropIfExists('menus');
    }
};
