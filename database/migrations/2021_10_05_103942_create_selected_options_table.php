<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSelectedOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('selected_options', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->integer('price');
            $table->integer('days');
            $table->integer('option_id');
            $table->integer('finishing_id');
            $table->unsignedBigInteger('selected_finishing_id');
            $table->integer('status')->default(0);
            $table->timestamps();

            $table->foreign('selected_finishing_id')->references('id')->on('selected_finishings')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('selected_options');
    }
}
