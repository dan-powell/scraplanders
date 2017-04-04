<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehicleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('group_id')->unsigned();
            $table->string('name');
            $table->string('chassis');
            $table->string('plant');
            $table->timestamps();
            $table->foreign('group_id')->references('id')->on('groups');
        });

        Schema::create('vehicle_characters', function (Blueprint $table) {
            $table->integer('vehicle_id')->unsigned();
            $table->integer('character_id')->unsigned();
            $table->timestamps();
            $table->foreign('vehicle_id')->references('id')->on('vehicles');
            $table->foreign('character_id')->references('id')->on('characters');
        });

        Schema::create('vehicle_components', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vehicle_id')->unsigned();
            $table->integer('type');
            $table->integer('hp');
            $table->integer('hp_max');
            $table->timestamps();
            $table->foreign('vehicle_id')->references('id')->on('vehicles');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicle_characters');
        Schema::dropIfExists('vehicle_components');
        Schema::dropIfExists('vehicles');
    }
}
