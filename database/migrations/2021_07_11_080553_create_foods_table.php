<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foods', function (Blueprint $table) {
            $table->id();
            $table->string('food_name',150);
            $table->string('food_slug',150);
            $table->bigInteger('quantity')->nullable()->default(0);
            $table->bigInteger('alert_quantity')->nullable()->default(0);
            $table->decimal('regular_price',18,2)->nullable()->default(0);
            $table->decimal('sale_price',18,2)->nullable()->default(0);
            $table->decimal('cost_price',18,2)->nullable()->default(0);
            $table->string('image',255)->nullable();
            $table->string('tag',100)->nullable();
            $table->tinyInteger('is_featured')->nullable()->default(0);
            $table->tinyInteger('stock_status')->nullable()->default(1);
            $table->string('dimension',100)->nullable();
            $table->text('short_description')->nullable();
            $table->text('long_description')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable()->default(0);
            $table->unsignedBigInteger('owner_id')->nullable()->default(0);
            $table->unsignedBigInteger('restaurant_id')->nullable()->default(0);
            $table->unsignedBigInteger('created_by')->nullable()->default(0);
            $table->tinyInteger('status')->default(1);
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
        Schema::dropIfExists('foods');
    }
}
