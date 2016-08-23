@extends('layouts.secondary')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Patients</h1>

		<div class="panel panel-default">
		    <div class="panel-heading">
		        <div class="pull-right">
		        	@if(!isCentral())
		        	<a href="{{ route('patients.add') }}" class="btn btn-primary btn-sm">ADD</a>
		        	@endif
		        </div>
		        <div class="clearfix"></div>
		    </div>
		    <div class="panel-body">
		    	@include('partials.alert')
		        <div class="table-responsive">
		            <table class="table table-striped table-bordered table-hover">
		                <thead>
		                    <tr>
		                    	@if(isCentral())
		                    	<th>ORIGIN</th>
		                    	@endif
		                        <th>#CODE</th>
		                        <th>Name</th>
		                        <th>Date Of Birth</th>
		                        <th>Height</th>
		                        <th>Weight</th>
		                        <th>Actions</th>
		                    </tr>
		                </thead>
		                <tbody>
		                	@foreach($patients as $patient)
		                    <tr>
		                    	@if(isCentral())
		                    	 <td>{{ $patient->site }}</td>
		                    	@endif
		                        <td>{{ $patient->code }}</td>
		                        <td>{{ $patient->name }}</td>
		                        <td>{{ $patient->dob }}</td>
		                        <td>{{ $patient->height }}</td>
		                        <td>{{ $patient->weight }}</td>
		                        <td style="text-align:center">
		                        	<a class="btn btn-primary btn-sm" href="{{route('visits',array('id'=>$patient->id))}}">Visits</a>
		                        	@if(! isCentral())
		                        	<a class="btn btn-primary btn-sm" href="{{route('patients.edit',array('id'=>$patient->id))}}">Edit</a>
		                        	<a class="btn btn-danger btn-sm" href="{{route('patients.delete',array('id'=>$patient->id))}}">Delete</a>
		                        	@endif
		                        </td>
		                    </tr>
		                    @endforeach
		                </tbody>
		            </table>
		        </div>
		    </div>
		</div>
    </div>
</div>
@stop



