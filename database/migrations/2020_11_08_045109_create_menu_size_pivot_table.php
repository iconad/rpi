<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMenuSizePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_size', function (Blueprint $table) {
            $table->unsignedBigInteger('menu_id')->index();
            $table->foreign('menu_id')->references('id')->on('menus')->onDelete('cascade');
            $table->unsignedBigInteger('size_id')->index();
            $table->foreign('size_id')->references('id')->on('sizes')->onDelete('cascade');
            $table->primary(['menu_id', 'size_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menu_size');
    }
}
