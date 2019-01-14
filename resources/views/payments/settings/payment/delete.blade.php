@extends('layouts.app')


@section('content')

    <div id="main-content">

        <section class="wrapper ">


            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">Deleting Payment Type</div>
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

                                <table class="table table-strip">

                                    <tr>
                                        <th>Payment Name</th>
                                        <th>{{$payment->payment_name}}</th>
                                    </tr>
                                    <tr>
                                        <th>Payment Amount</th>
                                        <th>{{$payment->payment_amount}}</th>
                                    </tr>
                                    <tr>
                                        <th>Payment Description</th>
                                        <th>{{$payment->payment_description}}</th>
                                    </tr>


                                </table>


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

