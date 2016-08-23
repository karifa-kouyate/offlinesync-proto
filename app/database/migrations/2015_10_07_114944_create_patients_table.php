<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up(){
		Schema::create('patients', function($table){
		    $table->bigIncrements('id');
		    $table->string('unic',100)->unique();
            $table->string('code', 20)->unique();
            $table->string('name',100);
            $table->dateTime('dob');
            $table->string('height',10);
            $table->string('weight',10);
            $table->tinyInteger("sync")->default(0);
            $table->string('site',20);
		    $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down(){
		Schema::drop('patients');
	}

}
