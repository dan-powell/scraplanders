<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharacterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('group_id')->unsigned()->nullable();

            $table->string('firstname');
            $table->string('lastname');
            $table->string('nickname')->nullable();
            $table->date('dob');

            $table->tinyInteger('strength')->unsigned();
            //$table->tinyInteger('toughness')->unsigned();
            $table->tinyInteger('constitution')->unsigned();
            $table->tinyInteger('dexterity')->unsigned();
            $table->tinyInteger('intelligence')->unsigned();
            //$table->tinyInteger('wisdom')->unsigned();
            //$table->tinyInteger('charisma')->unsigned();
            //$table->tinyInteger('willpower')->unsigned();
            $table->tinyInteger('perception')->unsigned();
            //$table->tinyInteger('luck')->unsigned();

            $table->integer('experience')->unsigned();

            $table->tinyInteger('hp')->unsigned();
            //$table->tinyInteger('hp_max')->unsigned();

            //$table->tinyInteger('healthiness')->unsigned();
            //$table->tinyInteger('hunger')->unsigned();
            //$table->tinyInteger('thirst')->unsigned();
            //$table->tinyInteger('radiation')->unsigned();

            // $table->tinyInteger('lawfulness');
            // $table->tinyInteger('goodness');
            
            // $table->string('template');

            $table->timestamps();
            $table->foreign('group_id')->references('id')->on('groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('characters');
    }
}
