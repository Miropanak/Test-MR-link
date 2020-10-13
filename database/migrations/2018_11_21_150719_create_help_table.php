<?php

/**
 * Created by PhpStorm.
 * User: Boris
 * Date: 21.11.2018
 * Time: 04:09
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHelpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('helps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->string('url',2000);
            $table->integer('id_events')->unsigned()->nullable(); // FK
            $table->timestamps();
        });

        /** Set FK */
        Schema::table('helps', function (Blueprint $table) {
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
        Schema::dropIfExists('helps');
    }
}
