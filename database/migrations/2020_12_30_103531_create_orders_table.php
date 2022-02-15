<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('paper_size')->nullable();
            $table->string('paper_color')->nullable();
            $table->string('paper')->nullable();
            $table->string('paper_quantity')->nullable();
            $table->string('gift_quantity')->nullable();
            $table->text('paper_finishings')->nullable();
            $table->string('shirt_color')->nullable();
            $table->text('shirt_sizes')->nullable();
            $table->text('shirt_printings')->nullable();
            $table->longtext('message')->nullable();
            $table->integer('turnaround')->nullable();
            $table->integer('price_product')->nullable();
            $table->integer('price_extra')->nullable();
            $table->integer('price_printing')->nullable();
            $table->integer('price_vat');
            $table->integer('installation_price');
            $table->string('transaction_id')->nullable();
            $table->string('payment_method_id')->nullable();
            $table->string('installation');
            $table->string('installation_state');
            $table->string('is_design');
            $table->string('price_total');
            $table->string('width');
            $table->string('height');
            $table->string('product_type');
            $table->integer('product_id');
            $table->integer('user_id');
            $table->string('status')->default('cart');
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
        Schema::dropIfExists('orders');
    }
}
