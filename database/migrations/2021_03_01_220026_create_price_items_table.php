<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriceItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->string('name');
            $table->integer('price_option_id')->unsigned();
            $table->foreign('price_option_id')
                ->references('id')
                ->on('price_options');
            $table->decimal('price', 18, 2);
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
        Schema::dropIfExists('price_items');
    }
}
