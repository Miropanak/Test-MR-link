<?php

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('description',4000);
            $table->integer('id_activities')->unsigned()->nullable(); // FK
            $table->timestamps();
            $table->softDeletes();
        });

        /** Set FK */
        Schema::table('units', function (Blueprint $table) {
            $table->foreign('id_activities')->references('id')->on('activities');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('units');
    }
}
