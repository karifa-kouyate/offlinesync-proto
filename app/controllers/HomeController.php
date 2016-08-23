<?php
use Ecore\Enums\UserStatus;
use Ecore\Enums\RecordStatus;
use GuzzleHttp\Client;

class HomeController extends BaseController {
	
	public function home(){
		$this->setTitle('Login');
		if(Session::has('message')){
        	 Data::set('message', Session::get('message'));
        }

		if (Request::isMethod('get'))
			return View::make('home.login',Data::all());

		if(!Request::isMethod('post'))
			return App::abort(500);

		$auth=array(
			'email'=>Input::get('email'), 
			'password'=>Input::get('password')
		);
	
		if (Auth::attempt($auth)) {
		    return Redirect::route('patients');
		} else {
			$msg=ctr_object(
				array(
					'type'=>'danger',
					'title'=>'Erreur!',
					'content'=>'Credentials error.'
				)
			);
		    return Redirect::route('home')->with('message',$msg);
		}
	}

	public function logout(){
		Auth::logout();
    	return Redirect::route('home');
	}

	public function sync(){
		$data=array(
			'patients'=>Patient::where('sync','!=',RecordStatus::NONE)->get(),
			'visits'=>Visit::where('sync','!=',RecordStatus::NONE)->get()
		);

		foreach ($data['visits'] as $item)
			$item->patient->unic;//load realation

		try {
		 	$httpClient=new Client();
			$settings=array(
				'timeout' => 120,
				'connect_timeout' => 30,
				'headers' =>array('Content-Type'=> 'application/json'),
				'body'=>json_encode($data)
			);

			$url=Config::get('hospital.central');
			$url="{$url}/import";
			$response=$httpClient->post($url, $settings);
			$status=$response->getStatusCode();
			
			if($status==200){
				$data=json_decode($response->getBody(true));
				$items=$data->patients;
				foreach ($items as $unic) {
					$record=Patient::getByUnic($unic);
					if(is_null($record))
						continue;

					if($record->sync==RecordStatus::INSERT || $record->sync==RecordStatus::UPDATE){
						$record->sync=RecordStatus::NONE;
						$record->save();
					}

					if($record->sync==RecordStatus::DELETE)
						$record->delete();
				}

				$items=$data->visits;
				foreach ($items as $unic) {
					$record=Visit::getByUnic($unic);
					if(is_null($record))
						continue;

					if($record->sync==RecordStatus::INSERT || $record->sync==RecordStatus::UPDATE){
						$record->sync=RecordStatus::NONE;
						$record->save();
					}

					if($record->sync==RecordStatus::DELETE)
						$record->delete();
				}
				echo 'ok';
			}else{
				echo 'error';
			}
		} catch (Exception $e) {
		 	echo 'error';
		}
		
	}

	public function import(){
		//receive data and save in central
		$response=array('patients'=>array(),'visits'=>array());
		$data=Request::getContent();
		$data=json_decode($data);

		$items=$data->patients;
		foreach ($items as $record) {
			if($record->sync==RecordStatus::INSERT)
				$item=new Patient();
			else
				$item=Patient::getByUnic($record->unic);

			if(is_null($item))
				continue;

			if($record->sync==RecordStatus::INSERT || $record->sync==RecordStatus::UPDATE){
				$item->unic=$record->unic;
				$item->code=$record->code;
				$item->name=$record->name;
				$item->dob=$record->dob;
				$item->height=$record->height;
				$item->weight=$record->weight;
				$item->site=$record->site;
				$item->sync=RecordStatus::NONE;
				$item->save();
			}

			if($record->sync==RecordStatus::DELETE)
				$item->delete();
			
			$response['patients'][]=$record->unic;
		}

		$items=$data->visits;
		foreach ($items as $record) {
			if($record->sync==RecordStatus::INSERT)
				$item=new Visit();
			else
				$item=Visit::getByUnic($record->unic);

			if(is_null($item))
				continue;

			if($record->sync==RecordStatus::INSERT || $record->sync==RecordStatus::UPDATE){
				$patient=Patient::getByUnic($record->patient->unic);
				$item->unic=$record->unic;
				$item->date=$record->date;
				$item->symptoms=$record->symptoms;
				$item->prescribtions=$record->prescribtions;
				$item->patient_id=$patient->id;
				$item->sync=RecordStatus::NONE;
				$item->save();
			}

			if($record->sync==RecordStatus::DELETE)
				$item->delete();
			
			$response['visits'][]=$record->unic;
		}

		return Response::json($response);
	}

	public function script(){
		return Response::view('home.script', Data::all())->header('Content-Type', 'text/javascript');
	}

}
