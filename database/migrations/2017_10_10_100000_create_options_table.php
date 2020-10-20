<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('options', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('correct_answer');
            $table->string('answer_data',4000);
            $table->integer('id_events')->unsigned()->nullable(); // FK
            $table->timestamps();
        });

        /** Set FK */
        Schema::table('options', function (Blueprint $table) {
            $table->foreign('id_events')->references('id')->on('events');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('options');
    }
}
