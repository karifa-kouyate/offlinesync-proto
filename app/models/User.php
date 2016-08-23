<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');


	public function validations(){
		return $this->hasMany('Validation');
	}

	public function contacts(){
		return $this->hasMany('Contact');
	}

	public function groups(){
		return $this->hasMany('Group');
	}

	public function messages(){
		return $this->hasMany('Message');
	}

	public function operations(){
		return $this->hasManyThrough('Operation','Message');
	}

	public function transactions(){
		return $this->hasMany('Transaction');
	}


	public function getPreferencesAttribute(){
		return json_decode($this->extra);
	}



	public static function getByEmail($email){
		return User::where('email',$email)->first();
	}

	public static function getByPhone($phone){
		return User::where('phone',$phone)->first();
	}

}
