@extends('layouts.app')


@section('content')

    <div id="main-content">

        <section class="wrapper ">


            <div class="panel panel-primary">
                <div class="panel-heading">

                    Add New Examination Setting
                </div>
                <div class="panel-body">

                  <div class="col-md-6 col-md-offset-3">
                      <hr>

                      @if(count($errors)>0)

                          @component('includes.alert_danger')

                              @foreach($errors->all() as $error)

                                  {{ $error }} <br>
                              @endforeach
                          @endcomponent()
                      @endif

                      @if(session('response'))

                          @component('includes.alert_success')
                              {{session('response')}}
                          @endcomponent
                      @endif

                      <hr>
                  </div>

                    <form class="form-horizontal" method="POST" action="{{ url('/settings/assessments/add_mid_and_final_submission') }}">
                        {{ csrf_field() }}
                        <br>



                        <div class="form-group{{ $errors->has('exam_name') ? ' has-error' : '' }}">
                            <label for="exam_name" class="col-md-4 control-label">Examination Name:</label>

                            <div class="col-md-4">
                                <input id="exam_name" type="text" class="form-control"
                                       name="exam_name" value="{{ old('exam_name') }}"   autofocus>

                                @if ($errors->has('exam_name'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('exam_name') }}</strong>
                                          </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('exam_type') ? ' has-error' : '' }}">
                            <label for="exam_type" class="col-md-4 control-label">Examination type:</label>

                            <div class="col-md-4">
                                <select id="exam_type" type="text" class="form-control"
                                        name="exam_type" autofocus>

                                    <option value="" selected disabled="disabled">~~ Select Exam Type ~~</option>
                                    <option value="Mid Exam"> Mid Term Examination</option>
                                    <option value="Final Exam">Final Examination</option>
                                </select>


                                @if ($errors->has('exam_type'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('exam_type') }}</strong>
                                          </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('maximum_value') ? ' has-error' : '' }}">
                            <label for="maximum_value" class="col-md-4 control-label">Maximum Value:</label>

                            <div class="col-md-4">
                                <input id="maximum_value" type="text" class="form-control"
                                       name="maximum_value" value="{{ old('maximum_value') }}"
                                       placeholder="Eg : 40"  autofocus>

                                @if ($errors->has('maximum_value'))

                                    <span class="help-block">
                                         <strong>{{ $errors->first('maximum_value') }}</strong>
                                        </span>

                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('remark') ? ' has-error' : '' }}">
                            <label for="remark" class="col-md-4 control-label">Remark:</label>

                            <div class="col-md-4">
                                <textarea  rows="6" cols="5" id="remark" class="form-control"  name="remark" value="{{ old('remark') }}"   autofocus></textarea>

                                @if ($errors->has('remark'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('remark') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-4 col-md-offset-4">
                               <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-plus-circle"></i>
                                    Add Exam Setting</button>|
                                <a href={{ url('/settings/assessments/mid_and_final_exam_setting') }}>
                                    <button type="button" class="btn btn-default">
                                        <i class="fa fa-backward"></i> Back To List
                                    </button>
                                </a>
                            </div>
                        </div>
                    </form>


                </div>

            </div>


        </section>

    </div>


@endsection






