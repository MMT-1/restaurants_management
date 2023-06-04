<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_carts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('food_id');
            $table->unsignedBigInteger('owner_id');
            $table->unsignedBigInteger('restaurant_id');
            $table->unsignedBigInteger('attribute_type_id');
            $table->unsignedBigInteger('attribute_value_id');
            $table->string('image',255)->nullable();
            $table->bigInteger('quantity');
            $table->decimal('price',18,2);
            $table->decimal('sub_total',18,2);
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
        Schema::dropIfExists('food_carts');
    }
}
