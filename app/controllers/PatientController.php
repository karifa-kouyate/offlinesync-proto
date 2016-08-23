<?php
use Ecore\DataRepository\Data;
use Ecore\Enums\RecordStatus;
use Carbon\Carbon;

class PatientController extends BaseController {

	public function patients(){
		$this->setTitle('Patients');
		if(Session::has('message'))
        	 Data::set('message', Session::get('message'));
        
		$patients=Patient::where('sync', '!=', RecordStatus::DELETE )->get();
		Data::set('patients', $patients);
		return View::make('patient.list',Data::all());
	}

	public function add(){
		$this->setTitle('Add Patient');
		if(Session::has('message'))
        	 Data::set('message', Session::get('message'));

		if (Request::isMethod('get'))
			return View::make('patient.add',Data::all());

		if(!Request::isMethod('post'))
			return App::abort(500);

		try{
			$patient=new Patient();
			$patient->code=Patient::generateCode();
			$patient->name=Input::get('name');
			$patient->dob=Carbon::createFromFormat('d/m/Y', Input::get('dob'));
			$patient->height=Input::get('height');
			$patient->weight=Input::get('weight');
			$patient->sync=RecordStatus::INSERT;
			$patient->site=Config::get('hospital.site');

			$patient->unic=generate_unic();
			$patient->save();

			$msg=ctr_object(
				array(
					'type'=>'success',
					'title'=>'Yaooo!',
					'content'=>'Succesfully saved'
				)
			);
			return Redirect::route('patients')->with('message',$msg);
		}catch(Exception $e){
			$msg=ctr_object(
				array(
					'type'=>'danger',
					'title'=>'Opps!',
					'content'=>'Some errors occured'
				)
			);
			return Redirect::back()->with('message',$msg);
		}
	}

	public function edit($id){
		$this->setTitle('Edit Patient');
		if(Session::has('message'))
        	 Data::set('message', Session::get('message'));

		if (Request::isMethod('get')){
			Data::set('patient',Patient::getById($id));
			return View::make('patient.edit',Data::all());
		}

		if(!Request::isMethod('post'))
			return App::abort(500);

		try{
			$patient=Patient::getById($id);
			$patient->name=Input::get('name');
			$patient->dob=Carbon::createFromFormat('d/m/Y', Input::get('dob'));
			$patient->height=Input::get('height');
			$patient->weight=Input::get('weight');
			$patient->sync=RecordStatus::UPDATE;
			$patient->site=Config::get('hospital.site');
			$patient->save();

			$msg=ctr_object(
				array(
					'type'=>'success',
					'title'=>'Yaooo!',
					'content'=>'Succesfully saved'
				)
			);
			return Redirect::route('patients')->with('message',$msg);
		}catch(Exception $e){
			$msg=ctr_object(
				array(
					'type'=>'danger',
					'title'=>'Opps!',
					'content'=>'Some errors occured'
				)
			);
			return Redirect::back()->with('message',$msg);
		}
	}

	public function delete($id){
		$patient=Patient::getById($id);
		$patient->sync=RecordStatus::DELETE;
		$patient->save();

		$msg=ctr_object(
			array(
				'type'=>'success',
				'title'=>'Yaooo!',
				'content'=>'Succesfully deleted'
			)
		);
		return Redirect::route('patients')->with('message',$msg);
	}

}