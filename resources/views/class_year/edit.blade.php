@extends('includes.master_layout');

@section('content')
<div class="panel panel-primary">
        <div class="panel-heading">Edit Clas year
           <a class="pull-right btn btn-success btn-sm" href="{{route('pcst_class_year.index')}}">
          
          Back To List
        </a>
        </div>
       
          <div class="panel-body">
         	<form method="POST" action="{{route('pcst_class_year.update',[$class_year->id])}}">
         		 {{ csrf_field() }}
          		<input type="hidden" name="_method" value="PUT">
          		
          		   <div class="form-group row {{$errors->has('class_year_name') ? 'has-error':''}}"">
                    <label for="department-name" class="col-sm-3 col-form-label">Class Year Name<span class="required">*</span></label>
                    <div class="col-sm-9">
                       <input 
                        placeholder="Enter class year Name" 
                        required 
                        name="class_year_name"
                        id="class_year_name"
                        spellcheck="false"
                        class="form-control"
                    	value="{{$class_year->class_year_name}}"
                      value="{{old('class_year_name')}}" 
                        /> 
                        <span class="text-danger">{{$errors->first('class_year_name')}}</span>
                    </div>
                  
                </div>


          		 <div class="form-group row {{$errors->has('class_year_number')?'has-error':''}}">">
                    <label for="department-code" class="
                    col-sm-3 col-form-label">Class Year Number<span class="required">*</span></label>
                    <div class="col-sm-9">
                        <input 
                        placeholder="Enter class year number" 
                        required 
                        name="class_year_number"
                        id="class_year_number"
                        spellcheck="false"
                        class="form-control"
                        value="{{$class_year->class_year_number}}"
                          value="{{old('class_year_number')}}"
                        />
                         <span class="text-danger">{{$errors->first('class_year_number')}}</span>
                    </div>

                    
                </div>

          		<div class="form-group">
          			<div class=" col-lg-5 offset-lg-5 col-sm-8 col-sm-offset-4">
          			<input type="submit" class="btn btn-primary" value="Edit Class Year">
          		</div>
          		</div>

          	</form>

          </div>
          		
      </div>

      @endsection
