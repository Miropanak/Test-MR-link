<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddActivityIdAndActiveToTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tests', function (Blueprint $table) {
            $table->integer('activity_id')->unsigned()->nullable();
            $table->foreign('activity_id')->references('id')->on('activities');
        });
        Schema::table('tests', function(Blueprint $table)
        {
            $table->boolean('active')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tests', function (Blueprint $table) {
            $table->dropForeign('tests_activity_id_foreign');
            $table->dropColumn('activity_id');
        });
        Schema::table('tests', function(Blueprint $table)
        {
            $table->dropColumn('active');
        });
    }
}
