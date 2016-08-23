<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/


//HomeController
Route::any('/',array('as'=>'home','uses'=>'HomeController@home'));
Route::any('/logout',array('as'=>'logout','uses'=>'HomeController@logout'));
Route::get('/sync',array('as'=>'sync','uses'=>'HomeController@sync'));
Route::any('/import',array('as'=>'import','uses'=>'HomeController@import'));
Route::get('/sync/script',array('as'=>'sync.script','uses'=>'HomeController@script'));


Route::group(array('before' => 'auth'), function(){
	Route::get('/dashboard',array('as'=>'dashboard','uses'=>'DashboardController@dashboard'));
	Route::any('/settings',array('as'=>'settings','uses'=>'DashboardController@settings'));
	
	//PatientController
	Route::get('/patients',array('as'=>'patients','uses'=>'PatientController@patients'));
	Route::any('/patients/add',array('as'=>'patients.add','uses'=>'PatientController@add'));
	Route::any('/patients/edit/{id}',array('as'=>'patients.edit','uses'=>'PatientController@edit'))
	->where('id', '[0-9]+');
	Route::any('/patients/delete/{id}',array('as'=>'patients.delete','uses'=>'PatientController@delete'))
	->where('id', '[0-9]+');

	//VisitController
	Route::get('/visits/{pid}',array('as'=>'visits','uses'=>'VisitController@visits'))
	->where('pid', '[0-9]+');
	Route::any('/visits/{pid}/add',array('as'=>'visits.add','uses'=>'VisitController@add'))
	->where('pid', '[0-9]+');
	Route::get('/visits/{id}/delete',array('as'=>'visits.delete','uses'=>'VisitController@delete'))
	->where('id', '[0-9]+');

});
