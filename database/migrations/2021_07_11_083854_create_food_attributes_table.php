<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_attributes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('food_id');
            $table->unsignedBigInteger('type_id');
            $table->unsignedBigInteger('value_id');
            $table->bigInteger('quantity')->default(0);
            $table->bigInteger('alert_quantity')->default(0);
            $table->decimal('regular_price',18,2);
            $table->decimal('sale_price',18,2);
            $table->decimal('cost_price',18,2);
            $table->string('image',255);
            $table->unsignedBigInteger('created_id');
            $table->tinyInteger('status');
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
        Schema::dropIfExists('food_attributes');
    }
}
