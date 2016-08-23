<?php
use Ecore\DataRepository\Data;
use Ecore\Enums\RecordStatus;
use Carbon\Carbon;

class VisitController extends BaseController {

	public function visits($pid){
		$this->setTitle('Visits');
		if(Session::has('message'))
        	 Data::set('message', Session::get('message'));

		Data::set('pid', $pid);
		$visits=Patient::find($pid)->visits()
			->where('sync', '!=', RecordStatus::DELETE )
			->get();

		Data::set('visits', $visits);
		return View::make('visit.list',Data::all());
	}

	public function add($pid){
		$this->setTitle('Add Visit');
		if(Session::has('message'))
        	 Data::set('message', Session::get('message'));

		if (Request::isMethod('get')){
			Data::set('pid', $pid);
			return View::make('visit.add',Data::all());
		}

		if(!Request::isMethod('post'))
			return App::abort(500);

		try{
			$visit=new Visit();
			$visit->date=Carbon::now();
			$visit->symptoms=Input::get('symptoms');
			$visit->prescribtions=Input::get('prescribtions');
			$visit->sync=RecordStatus::INSERT;
			$visit->patient_id=$pid;
			$visit->unic=generate_unic();
			$visit->save();

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
		$visit=Visit::getById($id);
		$visit->sync=RecordStatus::DELETE;
		$visit->save();
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