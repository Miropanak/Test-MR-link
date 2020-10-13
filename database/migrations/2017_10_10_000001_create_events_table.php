<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('message',4000);
            $table->string('header');
            $table->integer('time_to_explain');
            $table->integer('time_to_handle');

            $table->integer('id_event_types')->unsigned()->nullable(); // FK
            $table->integer('id_users')->unsigned()->nullable(); // FK

            $table->timestamps();
        });

        /** Set FK */
        Schema::table('events', function (Blueprint $table) {
            $table->foreign('id_event_types')->references('id')->on('event_types');
            $table->foreign('id_users')->references('id')->on('users');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
