<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUnitsEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units_events', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('id_events')->unsigned()->nullable(); // FK
            $table->integer('id_units')->unsigned()->nullable(); // FK
            $table->timestamps();
            $table->softDeletes();
        });

        /** Set FK */
        Schema::table('units_events', function (Blueprint $table) {
            $table->foreign('id_events')->references('id')->on('events');
            $table->foreign('id_units')->references('id')->on('units');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('units_events');
    }
}
