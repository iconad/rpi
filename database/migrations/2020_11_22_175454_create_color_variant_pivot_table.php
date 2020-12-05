<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateColorVariantPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('color_variant', function (Blueprint $table) {
            $table->unsignedBigInteger('color_id')->index();
            $table->foreign('color_id')->references('id')->on('colors')->onDelete('cascade');
            $table->unsignedBigInteger('variant_id')->index();
            $table->foreign('variant_id')->references('id')->on('variants')->onDelete('cascade');
            $table->primary(['color_id', 'variant_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('color_variant');
    }
}
