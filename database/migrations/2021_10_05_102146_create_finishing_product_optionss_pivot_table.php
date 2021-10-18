<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFinishingProductOptionssPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finishing_product_optionss', function (Blueprint $table) {
            $table->unsignedBigInteger('finishing_product_id')->index();
            $table->foreign('finishing_product_id')->references('id')->on('finishing_product')->onDelete('cascade');
            $table->unsignedBigInteger('optionss_id')->index();
            $table->foreign('optionss_id')->references('id')->on('optionss')->onDelete('cascade');
            $table->primary(['finishing_product_id', 'optionss_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('finishing_product_optionss');
    }
}
