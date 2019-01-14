@extends('layouts.app')


@section('content')

    <div id="main-content">

        <section class="wrapper ">


            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading"> Edit Payment Type</div>
                        <div class="panel-body">

                            @if(count($errors)>0)

                                @component('includes.alert_danger')

                                    @foreach($errors->all() as $error)

                                        {{ $error }} <br>
                                    @endforeach
                                @endcomponent();
                            @endif

                            @if(session('response'))

                                @component('includes.alert_success')
                                    {{session('response')}}
                                @endcomponent
                            @endif

                            @if(session('error'))

                                @component('includes.alert_danger')
                                    {{session('error')}}
                                @endcomponent
                            @endif

                            @if(count($mid_final)>0)


                                <form class="form-horizontal" method="POST" action="{{ url('/settings/assessments/edit_mid_and_final_submission') }}">
                                    {{ csrf_field() }}
                                    <br>

                                    <input type="hidden" name="hidden_id" value="{{ $mid_final->id }}">
                                    <input type="hidden" name="exam_type" value="{{$mid_final->exma_type}}">
                                    <div class="form-group{{ $errors->has('exam_name') ? ' has-error' : '' }}">
                                        <label for="exam_name" class="col-md-4 control-label">Examination Name:</label>

                                        <div class="col-md-4">
                                            <label><strong>{{$mid_final->exam_name}}</strong></label>
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('exam_type') ? ' has-error' : '' }}">
                                        <label for="exam_type" class="col-md-4 control-label">Examination Type:</label>

                                        <div class="col-md-4">
                                           <label><strong>{{$mid_final->exam_type}}</strong></label>
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('maximum_value') ? ' has-error' : '' }}">
                                        <label for="maximum_value" class="col-md-4 control-label">Maximum Value:</label>
                                        <div class="col-md-4">
                                            <input id="maximum_value" type="text" class="form-control"
                                                   name="maximum_value" value="{{$mid_final->maximum_value}}"
                                                   autofocus>

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
                                            <textarea  rows="6" cols="5" id="remark" class="form-control" name="remark"   autofocus>{{$mid_final->remark}}</textarea>

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
                                                <i class="fa fa-plus-circle"></i>Save Changes
                                            </button> |
                                            <a href={{ url('/settings/assessments/mid_and_final_exam_setting') }}>
                                                <button type="button" class="btn btn-default">
                                                    <i class="fa fa-backward"></i> Back To List
                                                </button>
                                            </a>
                                        </div>
                                    </div>

                                </form>


                            @endif




                        </div>  <!--  end panel body -->

                    </div> <!--  end panel default-->

                </div>
            </div>
        </section>
    </div>




@endsection

