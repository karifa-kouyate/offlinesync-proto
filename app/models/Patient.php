<?php

use Carbon\Carbon;

class Patient extends Eloquent {
	protected $table = 'patients';

	public function visits(){
		return $this->hasMany('Visit');
	}

	public function fdob(){
		return Carbon::parse($this->dob)->format('d/m/Y');
	}


	public static function generateCode(){
		$exist=true;
		do{
			$code=strtoupper(Str::random(10));
			$exist=Patient::where('code',$code)->get()->count() > 0;
		}while($exist);
		return $code;
	}

	public static function getById($id){
		return Patient::where('id',$id)->get()->first();
	}

	public static function getByUnic($unic){
		return Patient::where('unic',$unic)->get()->first();
	}

	public static function erase($id){
		return Patient::find($id)->delete();
	}
	
}