@extends('includes.master_layout');

@section('content')
<div class="panel panel-default">
        <div class="panel-heading">Deleting Departments</div>

          <div class="panel-body">
          	<div class="row">
          		<div class="alert alert-danger">
          			Are you Sure you want to delete this , This Action can not be undone.
          		</div>
          		<table class="table table-striped">
          			<tr>
          				<th>Department Name</th>
          				<th>{{$department->department_name}}</th>
          			</tr>
          			<tr>
          				<th>Department code</th>
          				<th>{{$department->department_code}}</th>
          			</tr>
          		</table>
          		<span>
          			<a href="{{route('pcst_department.index')}}">
          				<button class="btn btn-success">
          					<i class="fa fa-undo">Stop Deleteing and Back to list</i>
          				</button>
          			</a>
          			<a href="{{ url("/pcst_department/delete_permanet/{$department->id}/")}}">
          				<button class="btn btn-danger">
          					<i class="fa fa-trash">Continue Deleteing</i>
          				</button>
          			</a>
          			
          		</span>
          	</div>
          </div>
      </div>
 @endsection