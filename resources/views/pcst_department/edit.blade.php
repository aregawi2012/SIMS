@extends('includes.master_layout');

@section('content')
<div class="panel panel-primary">
        <div class="panel-heading">
        Edit Department
        <a class="pull-right btn btn-success btn-sm" href="{{route('pcst_department.index')}}">
          
          Back to List
        </a>
      </div>

          <div class="panel-body">
         	<form method="POST" action="{{route('pcst_department.update',[$pcst_department->id])}}">
         		 {{ csrf_field() }}
          		<input type="hidden" name="_method" value="PUT">
          		
          		   <div class="form-group row {{$errors->has('department_name') ? 'has-error':''}}">
                    <label for="department-name" class="col-sm-3 col-form-label">Department Name<span class="required">*</span></label>
                    <div class="col-sm-9">
                       <input 
                        placeholder="Enter Name" 
                        required 
                        name="department_name"
                        id="department-name"
                        spellcheck="false"
                        class="form-control"
                    	value="{{$pcst_department->department_name}}"
                           value="{{old('department_name')}}" 
                        /> 
                             <span class="text-danger">{{$errors->first('department_name')}}</span>
                    </div>
                    
                </div>


          		 <div class="form-group row {{$errors->has('department_code') ? 'has-error':''}}">
                    <label for="department-code" class="
                    col-sm-3 col-form-label">Department Code<span class="required">*</span></label>
                    <div class="col-sm-9">
                        <input 
                        placeholder="Enter Code" 
                        required 
                        name="department_code"
                        id="department-code"
                        spellcheck="false"
                        class="form-control"
                        value="{{$pcst_department->department_code}}"
                            value="{{old('department_code')}}" 
                        />
                          <span class="text-danger">{{$errors->first('department_code')}}</span>
                    </div>
                    
                </div>

          		<div class="form-group">
          			<div class=" col-lg-5 offset-lg-5 col-sm-8 col-sm-offset-4">
          			<input type="submit" class="btn btn-primary" value="Edit Department">
          		</div>
          		</div>

          	</form>

          </div>
          		
      </div>

      @endsection
