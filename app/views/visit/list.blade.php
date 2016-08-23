@extends('layouts.secondary')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Visits</h1>

		<div class="panel panel-default">
		    <div class="panel-heading">
		        <div class="pull-right">
		        	@if(!isCentral())
		        	<a href="{{ route('visits.add',array('pid'=>$pid)) }}" 
		        	class="btn btn-primary btn-sm">ADD</a>
		        	@endif
		        </div>
		        <div class="clearfix"></div>
		    </div>
		    <div class="panel-body">
		        <div class="table-responsive">
		            <table class="table table-striped table-bordered table-hover">
		                <thead>
		                    <tr>
		                        <th>Date</th>
		                        <th>Symptoms</th>
		                        <th>Prescribtions</th>
		                        @if(!isCentral())
		                        <th>Actions</th>
		                        @endif
		                    </tr>
		                </thead>
		                <tbody>

		                	@foreach($visits as $visit)
		                    <tr>
		                        <td>{{ $visit->date }}</td>
		                        <td><p>{{ $visit->symptoms }}</p></td>
		                        <td><p>{{ $visit->prescribtions }}</p></td>
		                        @if(!isCentral())
		                        <td style="text-align:center">
		                        	<a class="btn btn-primary btn-sm" href="#">Edit</a>
		                        	<a class="btn btn-danger btn-sm" href="{{route('visits.delete',array('id'=>$visit->id))}}">Delete</a>
		                        </td>
		                        @endif
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
