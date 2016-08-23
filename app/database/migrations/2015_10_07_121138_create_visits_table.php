<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up(){
		Schema::create('visits', function($table){
		    $table->bigIncrements('id');
		   	$table->string('unic',100)->unique();
            $table->dateTime('date');
            $table->longText('symptoms');
            $table->longText('prescribtions');
            $table->tinyInteger("sync")->default(0);
            $table->bigInteger("patient_id");
		    $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down(){
		Schema::drop('contacts');
	}

}
