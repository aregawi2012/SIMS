@extends('includes.master_layout');

@section('content')
<div class="panel panel-primary">
        <div class="panel-heading">
        Edit Section
        <a class="pull-right btn btn-success btn-sm" href="{{route('pcst_section.index')}}">
          
          Back to List
        </a>
      </div>

          <div class="panel-body">
         	<form method="POST" action="{{route('pcst_section.update',[$pcst_section->id])}}">
         		 {{ csrf_field() }}
          		<input type="hidden" name="_method" value="PUT">
          		
          		   <div class="form-group row {{$errors->has('section_name') ? 'has-error':''}}">
                    <label for="section_name" class="col-sm-3 col-form-label">Section Name<span class="required">*</span></label>
                    <div class="col-sm-9">
                       <input 
                        placeholder="Enter Section Name" 
                        required 
                        name="section_name"
                        id="section_name"
                        spellcheck="false"
                        class="form-control"
                    	value="{{$pcst_section->name}}"
                           value="{{old('section_name')}}" 
                        /> 
                             <span class="text-danger">{{$errors->first('section_name')}}</span>
                    </div>
                    
                </div>


          		 <div class="form-group row {{$errors->has('section_number') ? 'has-error':''}}">
                    <label for="section_number" class="
                    col-sm-3 col-form-label">Section Number<span class="required">*</span></label>
                    <div class="col-sm-9">
                        <input 
                        placeholder="Enter semester number" 
                        required 
                        name="section_number"
                        id="section_number"
                        spellcheck="false"
                        class="form-control"
                        value="{{$pcst_section->section_number}}"
                            value="{{old('section_number')}}" 
                        />
                          <span class="text-danger">{{$errors->first('section_number')}}</span>
                    </div>
                    
                </div>

          		<div class="form-group">
          			<div class=" col-lg-5 offset-lg-5 col-sm-8 col-sm-offset-4">
          			<input type="submit" class="btn btn-primary" value="Edit Section">
          		</div>
          		</div>

          	</form>

          </div>
          		
      </div>

      @endsection
