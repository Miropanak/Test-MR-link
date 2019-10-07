<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateActivitiesTableAuthorId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('activities', function (Blueprint $table) {
            $table->integer('id_author')->unsigned()->nullable();
        });

        // Set FK
        Schema::table('activities', function (Blueprint $table) {
            $table->foreign('id_author')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
	 
	/*public function down()
    {
        Schema::table('activities', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }*/
    /*public function down()
    {
        Schema::dropIfExists('activity_users');
    }*/
}
