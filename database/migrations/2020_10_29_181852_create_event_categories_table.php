<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_categories', function (Blueprint $table) {
	    $table->id();
	    $table->integer('event_id')->unsigned()->nullable(); //FK
	    $table->integer('category_id')->unsigned()->nullable(); //FK
            $table->timestamps();
	});
	
	/** FK */
	Schema::table('event_categories', function (Blueprint $table) {
	    $table->foreign('event_id')->references('id')->on('events');
    	    $table->foreign('category_id')->references('id')->on('categories');
	});	    
     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_categories');
    }
}
