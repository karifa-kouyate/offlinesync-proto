@extends('layouts.secondary')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">New Patient</h1>

        <div class="panel panel-default">
            <div class="panel-heading">
                Add Visit
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                    	@include('partials.alert')
                        {{ Form::open(array('route'=>array('visits.add', 'pid'=>$pid),'method' => 'post', 'id'=>'loginform', 'role' => 'form')) }}
                            <div class="form-group">
                                <label>Symptomes</label>
                                <textarea  class="form-control" name="symptoms"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Prescribtions</label>
                                <textarea  class="form-control" name="prescribtions"></textarea>
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
