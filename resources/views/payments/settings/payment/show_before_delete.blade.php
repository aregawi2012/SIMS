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

                            @if(count($payment)>0)

                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-3">

                                            <div class="alert alert-danger">
                                                Are you Sure you want to delete this , This Action can not be undone
                                            </div>
                                            <table class="table table- table-condensed">

                                                <tr>
                                                    <th>Payment Name</th>
                                                    <td>{{$payment->payment_name}}</td>
                                                </tr>
                                                <tr>
                                                    <th>Payment Amount</th>
                                                    <td>{{$payment->payment_amount}} ETB</td>
                                                </tr>
                                                <tr>
                                                    <th>Payment Description</th>
                                                    <td>{{$payment->payment_description}}</td>
                                                </tr>


                                            </table>
                                        </div>
                                    </div>
                                   <a href="{{ url("/settings/payment/payment_delete_permanently/{$payment->id}") }}" class="col-md-offset-4">
                                       <button class="btn btn-danger"> <i class="fa fa-trash"></i>&nbsp;Continue Deleting</button></a>


                            @else

                                <b>No thing Found , Please Try again</b>

                            @endif




                        </div>  <!--  end panel body -->

                    </div> <!--  end panel default-->

                </div>
            </div>
        </section>
    </div>




@endsection

