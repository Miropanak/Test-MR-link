<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameActivityUsersColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('activity_users', function (Blueprint $table) {
            $table->renameColumn('id_user_types', 'user_type_id');
            $table->renameColumn('id_users', 'author_id');
            $table->renameColumn('id_activities', 'activity_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('activity_users', function (Blueprint $table) {
            $table->renameColumn('user_type_id', 'id_user_types');
            $table->renameColumn('author_id', 'id_users');
            $table->renameColumn('activity_id', 'id_activities');

        });
    }
}
