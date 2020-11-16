<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagePriceSizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_price_sizes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('package_price_id')->index();
            $table->unsignedBigInteger('size_id')->index();
            $table->integer('price')->index();

            $table->foreign('package_price_id')->references('id')->on('package_prices')->onDelete('cascade');
            $table->foreign('size_id')->references('id')->on('sizes')->onDelete('cascade');

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
        Schema::dropIfExists('package_price_sizes');
    }
}
