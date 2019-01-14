@extends('includes.master_layout');

@section('content')
<div class="panel panel-primary">
        <div class="panel-heading">
         Add New Class Year
         <a class="pull-right btn btn-success btn-sm" href="{{route('class_year.index')}}">
             Back to List
         </a>
     </div>

          <div class="panel-body">
            <form method="POST" action="{{route('class_year.store')}}">
                 {{ csrf_field() }}
                <div class="form-group row {{$errors->has('name') ? 'has-error':''}}">
                    <label for="class_year-name" class="col-sm-3 col-form-label">Class Year Name<span class="required">*</span></label>
                    <div class="col-sm-9">
                       <input 
                        placeholder="Enter Class Year Name" 
                        required 
                        name="name"
                        id="name"
                        spellcheck="false"
                        class="form-control"
                        value="{{old('name')}}"
                        />
                           <span class="text-danger">{{$errors->first('name')}}</span>
                    </div>
                 
                </div>
                
                <div class="form-group row {{$errors->has('number')?'has-error':''}}">
                    <label for="number" class="
                    col-sm-3 col-form-label">Class Year Number<span class="required">*</span></label>
                    <div class="col-sm-9">
                        <input 
                        placeholder="Enter Class Year Number" 
                        required 
                        name="number"
                        id="number"
                        spellcheck="false"
                        class="form-control"
                        value="{{old('number')}}"
                        />
                         <span class="text-danger">{{$errors->first('number')}}</span>
                    </div>
                   
                </div>

                <div class="form-group row">
                    <div class=" col-lg-5 offset-lg-5 col-sm-8 col-sm-offset-4">
                        <input type="submit" class="btn btn-primary" value="Add Class Year">
                    </div>
                    
                </div>

            </form>

          </div>
                
      </div>

      @endsection
