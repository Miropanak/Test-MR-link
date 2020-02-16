<?php
/**
 * Created by PhpStorm.
 * User: Bende
 * Date: 12.10.2018
 * Time: 03:05
 */
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTypesPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_types_permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user_types')->unsigned()->nullable(); // FK
            $table->integer('id_permissions')->unsigned()->nullable(); // FK
            $table->timestamps();
        });

        /** Set FK */
        Schema::table('user_types_permissions', function (Blueprint $table) {
            $table->foreign('id_user_types')->references('id')->on('user_types');
            $table->foreign('id_permissions')->references('id')->on('permissions');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_types_permissions');
    }
}