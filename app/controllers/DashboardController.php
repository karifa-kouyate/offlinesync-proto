<?php
use Ecore\DataRepository\Data;

class DashboardController extends BaseController {

	public function dashboard(){
		$this->setTitle('Dashboard');
		return View::make('dashboard.dashboard',Data::all());
	}

	public function settings(){
		Data::set('title', 'Settings');
		return View::make('dashboard.settings',Data::all());
	}

}