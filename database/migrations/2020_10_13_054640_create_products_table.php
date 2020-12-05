<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->string('title');
            $table->string('title_two');
            $table->string('slug')->unique();
            $table->text('excerpt')->nullable();
            $table->longtext('body')->nullable();
            $table->string('body_title')->nullable();
            $table->string('body_subtitle')->nullable();
            $table->integer('delivery_time')->default(0);
            $table->string('printing_text')->nullable();
            $table->integer('printing')->nullable();
            $table->integer('stock')->nullable();
            $table->string('quantity')->nullable();
            $table->integer('user_id');
            $table->integer('category_id')->unsigned();
            $table->integer('label_id')->nullable();
            $table->integer('status')->default(0);
            $table->integer('featured')->default(0);
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }
// body_title
// body_subtitle
// delivery_time
// cover
// quantity
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
