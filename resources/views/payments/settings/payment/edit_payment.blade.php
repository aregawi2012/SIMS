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

                            @if(count($payment)>0)


                                <form class="form-horizontal" method="POST" action="{{ url('/settings/payment/edit_payment_submission') }}">
                                    {{ csrf_field() }}
                                    <br>

                                    <div class="form-group{{ $errors->has('payment_name') ? ' has-error' : '' }}">
                                        <label for="category" class="col-md-4 control-label">Payment Name:</label>
                                        <input type="hidden" value="{{$payment->id}}" name="hidden_id"/>
                                        <div class="col-md-4">
                                            <input id="payment_name" type="text" class="form-control"
                                                   name="payment_name" value="{{$payment->payment_name}}"   autofocus>

                                            @if ($errors->has('payment_name'))
                                                <span class="help-block">
                                                        <strong>{{ $errors->first('payment_name') }}</strong>
                                                      </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('payment_amount') ? ' has-error' : '' }}">
                                        <label for="payment_amount" class="col-md-4 control-label">Payment Amount(Per /):</label>

                                        <div class="col-md-4">
                                            <input id="payment_amount" type="text" class="form-control"
                                                   name="payment_amount" value="{{$payment->payment_amount}}"
                                                   placeholder="in Ethiopian Birr"  autofocus>

                                            @if ($errors->has('payment_amount'))

                                                <span class="help-block">
                                                     <strong>{{ $errors->first('payment_amount') }}</strong>
                                                    </span>

                                            @endif
                                        </div>
                                    </div>
                                    <div class="form-group{{ $errors->has('payment_description') ? ' has-error' : '' }}">
                                        <label for="payment_description" class="col-md-4 control-label">Payment Description:</label>

                                        <div class="col-md-4">
                                            <textarea  rows="6" cols="5" id="payment_description" class="form-control" name="payment_description"   autofocus>{{$payment->payment_description}}</textarea>

                                            @if ($errors->has('payment_description'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('payment_description') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="col-md-4 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fa fa-plus-circle"></i>Save Changes
                                            </button> |
                                            <a href={{ url('/settings/payment/manage_payment') }}>
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

