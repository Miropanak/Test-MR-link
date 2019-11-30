<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EventTestsFkRename extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('event_tests', function (Blueprint $table) {
            $table->renameColumn('events_id', 'event_id');
            $table->renameColumn('tests_id', 'test_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('event_tests', function (Blueprint $table) {
            //
        });
    }
}
