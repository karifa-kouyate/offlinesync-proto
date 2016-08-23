<?php

class BaseController extends Controller {

	public function __construct(){
		$site=Config::get('hospital.site');
		if(isset($site)){
			Data::set('exportScript', route('sync.script'));
			Data::set('exportInterval', Config::get('hospital.interval'));
		}
	}

	protected function setupLayout(){
		if ( ! is_null($this->layout)){
			$this->layout = View::make($this->layout);
		}
	}

	protected function setTitle($title=null){
		$site=Config::get('hospital.site');
		if(is_null($title)){
		 	Data::set('title', "({$site}) Hospital");
		 	return;
		}
		Data::set('title', "({$site}) Hospital :: $title");
	}

}
