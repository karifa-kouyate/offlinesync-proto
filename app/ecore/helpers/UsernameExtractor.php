<?php 
namespace Ecore\Helpers;

class UsernameExtractor{
	private $type;
	private $value;


	public function __construct($username){
		$this->value=$username;
		$this->type='email';
		if(strpos($username, '+') === 0)
			$this->type='phone';
	}

	public function value(){
		return $this->value;
	}

	public function isEmail(){
		return ($this->type === 'email');
	}


}
