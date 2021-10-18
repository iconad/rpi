<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagePriceSizesPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('package_price_sizes_prices', function (Blueprint $table) {
            $table->id();
            $table->string('finishing');
            $table->string('option_title');
            $table->integer('price')->default(0);
            $table->integer('days')->default(0);
            $table->integer('finishing_id')->unsigned();
            $table->integer('option_id')->unsigned();
            $table->unsignedBigInteger('package_price_size_id')->index();

            $table->foreign('package_price_size_id')->references('id')->on('package_price_sizes')->onDelete('cascade');

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
        Schema::dropIfExists('package_price_sizes_prices');
    }
}
