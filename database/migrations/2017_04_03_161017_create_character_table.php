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
            $table->smallInteger('birthyear');

            $table->decimal('strength', 3)->unsigned();
            $table->decimal('toughness', 3)->unsigned();
            $table->decimal('constitution', 3)->unsigned();
            $table->decimal('dexterity', 3)->unsigned();
            $table->decimal('intelligence', 3)->unsigned();
            $table->decimal('wisdom', 3)->unsigned();
            $table->decimal('charisma', 3)->unsigned();
            $table->decimal('willpower', 3)->unsigned();
            $table->decimal('perception', 3)->unsigned();
            $table->decimal('luck', 3)->unsigned();

            $table->smallInteger('hp')->unsigned();
            $table->smallInteger('health')->unsigned();
            $table->tinyInteger('mood')->unsigned();
            $table->tinyInteger('hunger')->unsigned();
            $table->tinyInteger('thirst')->unsigned();
            $table->tinyInteger('rads')->unsigned();

            $table->tinyInteger('lawfulness');
            $table->tinyInteger('goodness');

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
