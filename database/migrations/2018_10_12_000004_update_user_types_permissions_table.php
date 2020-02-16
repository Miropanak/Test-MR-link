<?php
/**
 * Created by PhpStorm.
 * User: Bende
 * Date: 12.10.2018
 * Time: 03:37
 */
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUserTypesPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_types_permissions', function (Blueprint $table) {
            $table->softDeletes();
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
            $table->dropSoftDeletes();
        });
    }
}