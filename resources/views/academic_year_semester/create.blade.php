@extends('includes.master_layout');

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            Add New Academic Year
            <a class="pull-right btn btn-success btn-sm" href="{{route('academic_year_semester.index')}}">
                Back to List
            </a>
        </div>

        <div class="panel-body">
            <form method="POST" action="{{route('academic_year_semester.store')}}">

                {{ csrf_field() }}


                <div class="form-group row {{$errors->has('academic_year') ? 'has-error':''}}">
                    <label for="academic_year" class="col-sm-3 col-form-label">Academic Year:<span class="required">*</span></label>
                    <div class="col-sm-9">
                        <select
                                name="academic_year"
                                id="academic_year"
                                class="form-control "
                                value="{{old('academic_year')}}">

                            <option value="" selected disabled>~~ Select Academic Year ~~</option>
                            @foreach($academic_years as $academic_year)
                                <option value="{{$academic_year->id}}">
                                    {{$academic_year->start}} - {{$academic_year->end}}
                                </option>
                            @endforeach

                        </select>
                        <span class="text-danger">{{$errors->first('academic_year')}}</span>
                    </div>

                </div>
                <div class="form-group row {{$errors->has('semester') ? 'has-error':''}}">
                    <label for="semester" class="col-sm-3 col-form-label">Academic Semester:<span class="required">*</span></label>
                    <div class="col-sm-9">
                        <select
                                name="semester"
                                id="semester"
                                class="form-control "
                                value="{{old('semester')}}">

                            <option value="" selected disabled>~~ Select Academic Semester ~~</option>
                            @foreach($semesters as $semester)
                                <option value="{{$semester->id}}">
                                    {{$semester->semester_number}}({{$semester->semester_name}})
                                </option>
                            @endforeach

                        </select>
                        <span class="text-danger">{{$errors->first('semester')}}</span>
                    </div>

                </div>
                <div class="form-group row {{$errors->has('start') ? 'has-error':''}}">
                    <label for="start" class="col-sm-3 col-form-label">Start Date:<span class="required">*</span></label>
                    <div class="col-sm-9">
                        <input
                                placeholder="Start Date"
                                name="start"
                                id="start"
                                spellcheck="false"
                                class="form-control date"
                                value="{{old('start')}}"
                        />
                        <span class="text-danger">{{$errors->first('start')}}</span>
                    </div>

                </div>

                <div class="form-group row {{$errors->has('end') ? 'has-error':''}}">
                    <label for="end" class="col-sm-3 col-form-label">End Date: <abbr class="required" title="Required">*</abbr></label>
                    <div class="col-sm-9">
                        <input
                                placeholder="End Date"
                                name="end"
                                id="end"
                                spellcheck="false"
                                class="form-control date"
                                value="{{old('end')}}"
                        />
                        <span class="text-danger">{{$errors->first('end')}}</span>
                    </div>

                </div>

                <div class="form-group row">
                    <div class=" col-lg-5 offset-lg-5 col-sm-8 col-sm-offset-4">
                        <input type="submit" class="btn btn-primary" value="Add Academic Year">
                    </div>

                </div>

            </form>

        </div>

    </div>

@endsection
