<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAuthorIdToTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tests', function(Blueprint $table)
        {
            $table->integer('author_id')->unsigned()->nullable();
            $table->foreign('author_id')->references('id')->on('users');
        });

        Schema::table('tests', function(Blueprint $table)
        {
            $table->integer('unit_id')->unsigned()->nullable();
            $table->foreign('unit_id')->references('id')->on('units');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tests', function(Blueprint $table)
        {

            $table->dropForeign('tests_author_id_foreign');
            $table->dropColumn('author_id');

        });

        Schema::table('tests', function(Blueprint $table)
        {

            $table->dropForeign('tests_unit_id_foreign');
            $table->dropColumn('unit_id');

        });
    }
}

