<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivityUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_activities')->unsigned()->nullable(); // FK
            $table->integer('id_users')->unsigned()->nullable(); // FK
            $table->integer('id_user_types')->unsigned()->nullable(); // FK
            $table->timestamps();
        });

        /** Set FK */
        Schema::table('activity_users', function (Blueprint $table) {
            $table->foreign('id_activities')->references('id')->on('activities');
            $table->foreign('id_users')->references('id')->on('users');
            $table->foreign('id_user_types')->references('id')->on('user_types');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activity_users');
    }
}
