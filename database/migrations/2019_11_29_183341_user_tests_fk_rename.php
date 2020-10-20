<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserTestsFkRename extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_tests', function (Blueprint $table) {
            $table->renameColumn('users_id', 'student_id');
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
        Schema::table('user_tests', function (Blueprint $table) {
            //
        });
    }
}
