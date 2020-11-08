<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFinishingProductPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finishing_product', function (Blueprint $table) {
            $table->unsignedBigInteger('finishing_id')->index();
            $table->foreign('finishing_id')->references('id')->on('finishings')->onDelete('cascade');
            $table->unsignedBigInteger('product_id')->index();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->primary(['finishing_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('finishing_product');
    }
}
