@extends('includes.master_layout');

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            Add New Payment Type
            <a class="pull-right btn btn-success btn-sm" href="{{route('make_payment.index')}}">
                Back to List
            </a>
        </div>

        <div class="panel-body">

            @if(!empty($error))
                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                    <h5>{{$error}}</h5>
                </div>
            @endif
            <form method="POST" action="{{route('make_payment.store')}}">


                {{ csrf_field() }}
                <div class="form-group row {{$errors->has('full_name') ? 'has-error':''}}">
                    <label for="student_name" class="col-sm-3 col-form-label">Full Name<span
                                class="required">*</span></label>
                    <div class="col-sm-9">
                        <input
                                placeholder="Enter Full Name"
                                name="student_name"
                                id="student_name"
                                spellcheck="false"
                                class="form-control"
                                value="{{old('student_name')}}"
                        />
                        <span class="text-danger">{{$errors->first('student_name')}}</span>
                    </div>

                </div>
                <div class="form-group row {{$errors->has('student_id') ? 'has-error':''}}">
                    <label for="student_id" class="col-sm-3 col-form-label">ID<span
                                class="required">*</span></label>
                    <div class="col-sm-9">
                        <input
                                placeholder="Enter Student ID"
                                name="student_id"
                                id="student_id"
                                spellcheck="false"
                                class="form-control"
                                value="{{old('student_id')}}"
                        />
                        <span class="text-danger">{{$errors->first('student_id')}}</span>
                    </div>

                </div>
                <div class="form-group row {{$errors->has('payment_type')?'has-error':''}}">
                    <label for="payment_type" class="
                    col-sm-3 col-form-label">Payment Type</label>
                    <div class="col-sm-9">
                        <select  name="payment_type"
                                 id="payment_type"
                                 class="form-control selection "
                                 value="{{old('payment_type')}}">>
                            @if($payment_types)
                            @foreach($payment_types as $payment_type)
                                <option value="{{$payment_type->id}}">
                                    {{$payment_type->payment_name}}
                                </option>
                            @endforeach
                            @endif
                        </select>
                        <span class="text-danger">{{$errors->first('payment_type')}}</span>
                    </div>

                </div>

                <div class="form-group row {{$errors->has('payment_amount') ? 'has-error':''}}">
                    <label for="payment_amount" class="col-sm-3 col-form-label">Payment Amount<span
                                class="required">*</span></label>
                    <div class="col-sm-9">
                        <input
                                placeholder="Enter Payment Amount"
                                name="payment_amount"
                                id="payment_amount"
                                spellcheck="false"
                                class="form-control"
                                value="{{old('payment_amount')}}"
                        />
                        <span class="text-danger">{{$errors->first('payment_amount')}}</span>
                    </div>

                </div>

                <div class="form-group row {{$errors->has('payment_desc')?'has-error':''}}">
                    <label for="payment_type" class="
                    col-sm-3 col-form-label">Remark</label>
                    <div class="col-sm-9">
                      <textarea  rows="6" cols="5" id="payment_desc" class="form-control"
                                 name="payment_desc" value="{{ old('payment_desc') }}"
                                 placeholder="Enter Payment Description"
                                 autofocus></textarea>

                        <span class="text-danger">{{$errors->first('payment_desc')}}</span>
                    </div>

                </div>

                <div class="form-group row">
                    <div class=" col-lg-5 offset-lg-5 col-sm-8 col-sm-offset-4">
                        <input type="submit" class="btn btn-primary" value="Process Payment">
                    </div>

                </div>

            </form>

        </div>

    </div>

@endsection
