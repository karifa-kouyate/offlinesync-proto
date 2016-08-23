<?php

use Ecore\Enums\TransactionStatus;
use Ecore\Helpers\OrangeClient;

class Visit extends Eloquent {
	protected $table = 'visits';

	public function patient(){
		return $this->belongsTo('Patient');
	}

	public static function getById($id){
		return Visit::where('id',$id)->get()->first();
	}

	public static function erase($id){
		return Visit::find($id)->delete();
	}

	public static function getByUnic($unic){
		return Visit::where('unic',$unic)->get()->first();
	}

}