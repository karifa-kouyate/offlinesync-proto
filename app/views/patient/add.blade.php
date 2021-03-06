@extends('layouts.secondary')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">New Patient</h1>

        <div class="panel panel-default">
            <div class="panel-heading">
                Create a patient
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                    	@include('partials.alert')
                        {{ Form::open(array('route' => 'patients.add','method' => 'post', 'id'=>'loginform', 'role' => 'form')) }}
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" name="name">
                            </div>
                            <div class="form-group">
                                <label>Date Of Birth</label>
                                <input class="form-control" name="dob">
                            </div>
                            <div class="form-group">
                                <label>Height</label>
                                <input class="form-control" name="height">
                            </div>
                            <div class="form-group">
                                <label>Weight</label>
                                <input class="form-control" name="weight">
                            </div>
                            <button type="submit" class="btn btn-success">Save</button>
                            <button type="reset" class="btn btn-default">Clear</button>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
