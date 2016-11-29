<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DishOrderRelationsFix extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::drop('order_products');
        Schema::create('dish_order', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id');
            $table->integer('dish_id');
            $table->decimal('price', 8, 2);
            $table->integer('quantity');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('order_products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id');
            $table->integer('product_id');
            $table->decimal('price', 8, 2);
            $table->integer('quantity');
            $table->timestamps();
        });
        Schema::drop('dish_order');
    }
}
