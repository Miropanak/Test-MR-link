<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventProgressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_progress', function (Blueprint $table) {
            $table->id();
			$table->integer('activity_id')->unsigned()->nullable(); //FK
			$table->integer('user_id')->unsigned()->nullable(); //FK
			$table->integer('unit_id')->unsigned()->nullable(); //FK
			$table->json('done');
            $table->timestamps();
        });
	
	/** FK */
		Schema::table('event_progress', function (Blueprint $table) {
			$table->foreign('activity_id')->references('id')->on('activities');
    	    $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('event_progress');
    }
}
