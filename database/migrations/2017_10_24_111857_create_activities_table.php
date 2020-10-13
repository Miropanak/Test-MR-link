<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('content',4000);
            $table->boolean('public');
            $table->boolean('validated');
            $table->integer('id_study_field')->unsigned(); //FK
            $table->timestamps();
        });

        /** Set FK */
        Schema::table('activities', function (Blueprint $table) {
            $table->foreign('id_study_field')->references('id')->on('study_fields');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');
    }
}
