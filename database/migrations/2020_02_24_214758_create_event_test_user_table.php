<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTestUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_test_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->json('answers');
            $table->timestamp('start_time');
            $table->timestamp('end_time');
            $table->integer('time_spent');
            $table->integer('obtained_points');
            $table->timestamps();
            $table->integer('id_tests')->unsigned()->nullable(); // FK
            $table->integer('id_users')->unsigned()->nullable(); // FK
            $table->integer('id_events')->unsigned()->nullable(); // FK
        });

        Schema::table('event_test_user', function (Blueprint $table) {
            $table->foreign('id_tests')->references('id')->on('tests');
            $table->foreign('id_users')->references('id')->on('users');
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
        Schema::dropIfExists('event_test_user');
    }
}
