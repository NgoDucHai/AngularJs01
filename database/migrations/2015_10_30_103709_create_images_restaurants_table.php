<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images_restaurants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('restaurants_id')->unsigned();
            $table->foreign('restaurants_id')
                    ->references('id')->on('restaurants')
                    ->onDelete('cascade');
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
        Schema::drop('images_restaurants');
    }
}
