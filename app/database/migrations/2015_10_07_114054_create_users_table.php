<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up(){
		Schema::create('users', function($table){
		    $table->bigIncrements('id');
            $table->string('name',100);
    		$table->string('email', 100)->unique();
    		$table->string('password', 64);
    		$table->rememberToken();
            $table->bigInteger('site');
		    $table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down(){
		Schema::drop('users');
	}

}
