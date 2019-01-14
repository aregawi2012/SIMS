@extends('includes.master_layout');

@section('content')
<div class="panel panel-primary">
        <div class="panel-heading">
        Edit Semester
        <a class="pull-right btn btn-success btn-sm" href="{{route('pcst_semester.index')}}">
          
          Back to List
        </a>
      </div>

          <div class="panel-body">
         	<form method="POST" action="{{route('pcst_semester.update',[$pcst_semester->id])}}">
         		 {{ csrf_field() }}
          		<input type="hidden" name="_method" value="PUT">
          		
          		   <div class="form-group row {{$errors->has('semester_name') ? 'has-error':''}}">
                    <label for="semester_name" class="col-sm-3 col-form-label">Semester Name<span class="required">*</span></label>
                    <div class="col-sm-9">
                       <input 
                        placeholder="Enter Name" 
                        required 
                        name="semester_name"
                        id="semester_name"
                        spellcheck="false"
                        class="form-control"
                    	value="{{$pcst_semester->semester_name}}"
                           value="{{old('semester_name')}}" 
                        /> 
                             <span class="text-danger">{{$errors->first('semester_name')}}</span>
                    </div>
                    
                </div>


          		 <div class="form-group row {{$errors->has('semester_number') ? 'has-error':''}}">
                    <label for="department-code" class="
                    col-sm-3 col-form-label">Semester Number<span class="required">*</span></label>
                    <div class="col-sm-9">
                        <input 
                        placeholder="Enter Code" 
                        required 
                        name="semester_number"
                        id="semester_number"
                        spellcheck="false"
                        class="form-control"
                        value="{{$pcst_semester->semester_number}}"
                            value="{{old('semester_number')}}" 
                        />
                          <span class="text-danger">{{$errors->first('semester_number')}}</span>
                    </div>
                    
                </div>

          		<div class="form-group">
          			<div class=" col-lg-5 offset-lg-5 col-sm-8 col-sm-offset-4">
          			<input type="submit" class="btn btn-primary" value="Edit Semester">
          		</div>
          		</div>

          	</form>

          </div>
          		
      </div>

      @endsection
