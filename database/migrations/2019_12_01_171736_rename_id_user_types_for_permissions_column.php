<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameIdUserTypesForPermissionsColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_types_permissions', function (Blueprint $table) {
            $table->renameColumn('id_user_types', 'user_type_id');
            $table->renameColumn('id_permissions', 'permission_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_types_permissions', function (Blueprint $table) {
            $table->renameColumn('user_type_id', 'id_user_types');
            $table->renameColumn('permission_id', 'id_permissions');
        });
    }
}
