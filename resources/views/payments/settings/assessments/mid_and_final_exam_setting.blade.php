@extends('layouts.app')


@section('content')

    <div id="main-content">

        <section class="wrapper ">

            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Mid And Final Examination Setting</div>
                        <div class="panel-body">


                            <div class="div-action pul pull-right">
                                <a href="{{url('/settings/assessments/add_exam_settings')}}">
                                    <button class="btn btn-success {{ count($exams)>2 ? ' disabled' : '' }}">
                                        <span class="fa fa-plus-circle"></span>Add New Examination Setting
                                    </button>
                                    &nbsp;</a>
                            </div>

                            <!-- end of div-action -->


                            <br>
                            <br>


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

                            @if(session('error'))

                                @component('includes.alert_danger')
                                    {{session('error')}}
                                @endcomponent
                            @endif
                            <br>
                            <table class="table table-striped table-hover">
                                <thead>



                                @if(count($exams))
                                          <tr>
                                        <th>No</th>
                                        <th>Examination Name</th>
                                        <th>Examination Type</th>
                                        <th>Maximum Value</th>
                                        <th>Remark</th>
                                        <th>Options</th>
                                    </tr>

                                </thead>
                                <tbody>

                                @foreach($exams->all() as $exam)

                                    <tr>
                                        <td>{{$loop->iteration}} </td>
                                        <td>{{$exam->exam_name }}</td>
                                        <td>{{$exam->exam_type }}&nbsp;</td>
                                        <td>{{$exam->maximum_value }}</td>
                                        <th>{{$exam->remark}}</th>
                                        <td>
                                            <a href='{{ url("/settings/assessments/edit_mid_final/{$exam->id}") }}'><button type="button" class="btn btn-warning">Edit</button></a>
                                            <a href='{{ url("/settings/assessments/delete_mid_and_final_confirm/{$exam->id}") }}'><button type="button" class="btn btn-danger">Delete</button></a>

                                        </td>

                                    </tr>



                                @endforeach
                                @else

                                    <div class="alert alert-danger">
                                        <h5>No Payment Type Added yet , You can add New Payment Type By clicking the Add Payment Button Above</h5>
                                    </div>

                                @endif

                                </tbody>
                            </table>

                            </div>  <!--  end panel body -->

                    </div> <!--  end panel default-->

                </div>
            </div>

        </section>

    </div>




@endsection

