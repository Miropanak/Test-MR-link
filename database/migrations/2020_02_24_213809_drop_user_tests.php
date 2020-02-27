<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropUserTests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('user_tests');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('user_tests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id')->unsigned()->nullable(); // FK
            $table->integer('tests_id')->unsigned()->nullable(); // FK
            $table->integer('correct');
            $table->boolean('test_taken');
            $table->timestamp("startedAt");
            $table->timestamps();
        });

        /** Set FK */
        Schema::table('user_tests', function (Blueprint $table) {
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('tests_id')->references('id')->on('tests');
        });
    }
}
