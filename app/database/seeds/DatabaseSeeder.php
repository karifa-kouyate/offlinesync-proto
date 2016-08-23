<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run(){
		Eloquent::unguard();

		User::truncate();
        User::create( [
        	'name' => 'Jhone Doe',
            'email' => 'doctor@ehealth.org' ,
            'password' => Hash::make( '12345' )
        ] );
	}

}
