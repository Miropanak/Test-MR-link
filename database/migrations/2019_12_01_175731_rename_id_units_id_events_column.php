<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameIdUnitsIdEventsColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('units_events', function (Blueprint $table) {
            $table->renameColumn('id_events', 'event_id');
            $table->renameColumn('id_units', 'unit_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('units_events', function (Blueprint $table) {
            $table->renameColumn('event_id', 'id_events');
            $table->renameColumn('unit_id', 'id_units');
        });
    }
}
