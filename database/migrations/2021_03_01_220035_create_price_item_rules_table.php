<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriceItemRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_item_rules', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('price_overwrite', 18, 2)->nullable();
            $table->decimal('markup', 18, 2)->nullable();
            $table->boolean('is_weekday')->default(false);
            $table->boolean('is_weekend')->default(false);
            $table->integer('location_id')->unsigned()->nullable();
            $table->foreign('location_id')
                ->references('id')
                ->on('locations');
            $table->integer('membership_id')->unsigned()->nullable();
            $table->foreign('membership_id')
                ->references('id')
                ->on('memberships');
            $table->boolean('disable')->default(false);
            $table->integer('price_item_id')->unsigned()->nullable();
            $table->foreign('price_item_id')
                ->references('id')
                ->on('price_items');
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
        Schema::dropIfExists('price_item_rules');
    }
}
