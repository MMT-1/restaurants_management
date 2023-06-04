<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('restaurant_name',150);
            $table->string('logo',255)->nullable();
            $table->string('restaurant_banner',255)->nullable();
            $table->string('restaurant_slug',150);
            $table->text('restaurant_address')->nullable();
            $table->string('latitude',250);
            $table->string('longitude',250);            
            $table->unsignedBigInteger('owner_id');
            $table->unsignedBigInteger('created_by');
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('restaurants');
    }
}
