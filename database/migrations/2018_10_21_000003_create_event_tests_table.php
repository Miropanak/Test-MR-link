<?php
/**
 * Created by PhpStorm.
 * User: Bende
 * Date: 21.10.2018
 * Time: 03:22
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_tests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('events_id')->unsigned()->nullable(); // FK
            $table->integer('tests_id')->unsigned()->nullable(); // FK
            $table->timestamps();
        });

        /** Set FK */
        Schema::table('event_tests', function (Blueprint $table) {
            $table->foreign('events_id')->references('id')->on('events');
            $table->foreign('tests_id')->references('id')->on('tests');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_tests');
    }
}