@extends('layouts.app')
@section('content')

    <div id="main-content">

        <section class="wrapper ">

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-danger">
                        <div class="panel-heading text-center text-danger">Deleting Payment Type</div>
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

                                @if(count($exam)>0)


                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-3">

                                            <div class="alert alert-danger">
                                                Are you Sure you want to delete this , This Action can not be undone
                                            </div>

                                    <table class="table table-striped ">

                                        <tr>
                                            <th>Examination Name</th>
                                            <td>{{$exam->exam_name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Payment Type</th>
                                            <td>{{$exam->exam_type}}</td>
                                        </tr>
                                        <tr>
                                            <th>Maximum Value</th>
                                            <td>{{$exam->maximum_value}}</td>
                                        </tr>
                                        <tr>
                                            <th>Remark</th>
                                            <td>{{$exam->remark}}</td>
                                        </tr>


                                    </table>
                                            <span><a href="{{ url("/settings/assessments/mid_and_final_exam_setting") }}" >
                                             <button class="btn btn-success"><i class="fa fa-undo"></i>Stop Deleting and Back to list</button>|</a>
                                            <a href="{{ url("/settings/assessments/mid_and_final_delete_permanently/{$exam->id}") }}" >
                                                <button class="btn btn-danger"> <i class="fa fa-trash"></i>&nbsp;Continue Deleting</button></a>
                                            </span>
                                        @else
                                                <hr>
                                    <b>No thing Found ,<a href='{{url("/settings/assessments/mid_and_final_exam_setting")}}'> Please Try again</a></b>

                                @endif

                                    </div> <!-- end of col-md -->
                                    </div> <!-- end row -->
                        </div>  <!--  end panel body -->

                    </div> <!--  end panel default-->

                </div>
            </div>
        </section>

    </div>




@endsection
