<?php
function isCentral(){
	return (Config::get('hospital.site')=="CENTRAL");
}

function generate_unic(){
	$result=Config::get('hospital.site');
	$result.= str_random(10);
	$result =str_replace('.', '', uniqid($result,true));
	return strtoupper($result);
}


function ctr_object($data){
	$object=new stdClass();
	foreach($data as $key => $value)
		$object->$key=$value;

	return $object;
}

function get_unic(){
	/* Generate v4 UUID (version 4 UUIDs are pseudo-random) */
	return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',

    // 32 bits for "time_low"
    mt_rand(0, 0xffff), mt_rand(0, 0xffff),

    // 16 bits for "time_mid"
    mt_rand(0, 0xffff),

    // 16 bits for "time_hi_and_version",
    // four most significant bits holds version number 4
    mt_rand(0, 0x0fff) | 0x4000,

    // 16 bits, 8 bits for "clk_seq_hi_res",
    // 8 bits for "clk_seq_low",
    // two most significant bits holds zero and one for variant DCE1.1
    mt_rand(0, 0x3fff) | 0x8000,

    // 48 bits for "node"
    mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
    
    );
}



function get_data_by_page($model ,$page = 1, $limit = 10){
	$results = new StdClass();
	$results->page = $page;
	$results->limit = $limit;
	$results->totalItems = 0;
	$results->items = array();

	$data = $model->skip($limit * ($page - 1))->take($limit)->get();

	$results->totalItems = $model->count();
	$results->items =  $data->all();

	return $results;
}


function search_data_by_page($model, $conditions=array(), $page = 1, $limit = 10){
	$results = new StdClass();
	$results->page = $page;
	$results->limit = $limit;
	$results->totalItems = 0;
	$results->items = array();

	for($i=0; $i<count($conditions); $i++){
		$condition=$conditions[$i];
		if($i==0)
			$model =call_user_func_array(array($model, "where"), $condition);
		else
			$model =call_user_func_array(array($model, "orWhere"), $condition);
	}

	$data = $model->skip($limit * ($page - 1))->take($limit)->get();
	$results->totalItems = $model->count();

	echo $results->totalItems;
	$results->items =  $data->all();
 
	return $results;
}

function platform($method){
	return Ecore\Helpers\UserAgentDetector::$method();
}

function gravatar($email,$size){
   	$hash = md5(strtolower(trim($email)));
   	return "http://www.gravatar.com/avatar/{$hash}?s={$size}&d=mm&r=g";
}

function is_active_route($name,$class='active'){
	return ( Route::currentRouteName()==$name ) ? $class : '';
}

function notification_checked($field,$value){
	if($field=='sms')
		return ($value == 'sms')? 'checked': '';
	return 'checked';
}


function _sms_file($sms){
	$f=storage_path('/sms.txt');
	$line = date("Y-m-d @ H:i:s")." - ". $sms.PHP_EOL;
	file_put_contents($f, $line, FILE_APPEND);
}

function _respond_ajax($status,$msg,$data=array()){
	return Response::json(array('status'=>$status,'msg'=>$msg,'data'=>$data));
}

function get_test_token(){
	return trim(file_get_contents(storage_path('apikey.txt')));
}

function _d($data){
	echo "<pre>";
	var_dump($data);
	echo "</pre>";
}