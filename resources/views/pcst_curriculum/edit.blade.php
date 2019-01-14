@extends('includes.master_layout');

@section('content')
<div class="panel panel-primary">
        <div class="panel-heading">
        Edit Curriculum
        <a class="pull-right btn btn-success btn-sm" href="{{route('pcst_curriculum.index')}}">
          
          Back to List
        </a>
      </div>

          <div class="panel-body">
         	<form method="POST" action="{{route('pcst_curriculum.update',[$pcst_curriculum->id])}}">
         		 {{ csrf_field() }}
          		<input type="hidden" name="_method" value="PUT">
          		
          		   <div class="form-group row {{$errors->has('pcst_program_id') ? 'has-error':''}}">
                    <label for="pcst_program_id" class="
                    col-sm-3 col-form-label">Curriculum's Program<span class="required">*</span></label>
                    <div class="col-sm-9">
                          <select name="pcst_program_id" id="pcst_program_id" class="form-control"  value="{{old('pcst_program_id')}}"  >
                              @foreach($pcst_program as $program)
                                    <option value="{{$program->id}} ">
                                      {{$program->name}}
                                    </option>
                              @endforeach
                          </select>
                        
                             <span class="text-danger">{{$errors->first('pcst_program_id')}}</span>
                    </div>
                    
                </div>


          		 <div class="form-group row {{$errors->has('pcst_class_year_id') ? 'has-error':''}}">
                    <label for="pcst_class_year_id" class="
                    col-sm-3 col-form-label">Curriculum's Class Year<span class="required">*</span></label>
                    <div class="col-sm-9">
                          <select name="pcst_class_year_id" id="pcst_class_year_id" class="form-control"  value="{{old('pcst_class_year_id')}}"  >
                              @foreach($pcst_class_year as $class_year)
                                    <option value="{{$class_year->id}} @if($class_year->id==2) selected @endif">
                                      {{$class_year->class_year_name}}
                                    </option>
                              @endforeach
                          </select>
                        
                             <span class="text-danger">{{$errors->first('pcst_class_year_id')}}</span>
                    </div>
                    
                </div>

                <div class="form-group row {{$errors->has('pcst_semester_id') ? 'has-error':''}}">
                    <label for="pcst_semester_id" class="
                    col-sm-3 col-form-label">Curriculum's Semester<span class="required">*</span></label>
                    <div class="col-sm-9">
                          <select name="pcst_semester_id" id="pcst_semester_id" class="form-control"  value="{{old('pcst_semester_id')}}"  >
                              @foreach($pcst_semester as $Semester)
                                    <option value="{{$Semester->id}}">
                                      {{$Semester->semester_name}}
                                    </option>
                              @endforeach
                          </select>
                        
                             <span class="text-danger">{{$errors->first('pcst_semester_id')}}</span>
                    </div>
                    
                </div>

          		<div class="form-group">
          			<div class=" col-lg-5 offset-lg-5 col-sm-8 col-sm-offset-4">
          			<input type="submit" class="btn btn-primary" value="Edit Curriculum">
          		</div>
          		</div>

          	</form>

          </div>
          		
      </div>

      @endsection
