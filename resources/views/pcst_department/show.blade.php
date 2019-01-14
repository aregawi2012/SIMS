@extends('includes.master_layout')

@section('content')
<div>
	<h1>{{$pcst_department->id}}</h1>
	<h1>{{$pcst_department->department_name}}</h1>
	<h1>{{$pcst_department->department_code}}</h1>
</div>
@endsection
