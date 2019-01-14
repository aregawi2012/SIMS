@extends('layouts.app')


@section('content')

    <div id="main-content">

        <section class="wrapper ">


            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Payment Management</div>
                        <div class="panel-body">

                            <div class="div-action pul pull-right">
                                <a href="{{url('/settings/payment/add')}}">
                                <button class="btn btn-success">
                                    <span class="fa fa-plus-circle"></span>Add New Payment
                                </button>
                                &nbsp;</a>
                            </div> <!-- end of div-action -->


                            <br>
                            <br>


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

                            <br>

                            <table class="table table-striped table-hover">
                                <thead>



                                @if(count($payments))



                                    <tr>
                                        <th>No</th>
                                        <th>Payment type</th>
                                        <th>Payment Account</th>
                                        <th>Payment Description</th>
                                        <th>Options</th>
                                    </tr>

                                    </thead>
                                    <tbody>
                                    @foreach($payments->all() as $payment)



                                        <tr>
                                            <td>{{$loop->iteration}} </td>
                                            <td>{{$payment->payment_name }}</td>
                                            <td>{{$payment->payment_amount }}&nbsp;ETB</td>
                                            <td>{{$payment->payment_description }}</td>
                                            <td>
                                                <a href='{{ url("/settings/payment/edit/{$payment->id}") }}'><button type="button" class="btn btn-warning">Edit</button></a>
                                                <a href='{{ url("/settings/payment/delete_confirm/{$payment->id}") }}'><button type="button" class="btn btn-danger">Delete</button></a>

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

