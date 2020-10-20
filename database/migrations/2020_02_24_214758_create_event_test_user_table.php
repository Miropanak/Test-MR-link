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
            $table->integer('test_id')->unsigned()->nullable(); // FK
            $table->integer('user_id')->unsigned()->nullable(); // FK
            $table->integer('event_id')->unsigned()->nullable(); // FK
        });

        Schema::table('event_test_user', function (Blueprint $table) {
            $table->foreign('test_id')->references('id')->on('tests');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('event_id')->references('id')->on('events');
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
