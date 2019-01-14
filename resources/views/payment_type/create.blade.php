@extends('includes.master_layout');

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            Add New Payment Type
            <a class="pull-right btn btn-success btn-sm" href="{{route('payment_type.index')}}">
                Back to List
            </a>
        </div>

        <div class="panel-body">
            <form method="POST" action="{{route('payment_type.store')}}">
                {{ csrf_field() }}
                <div class="form-group row {{$errors->has('payment_name') ? 'has-error':''}}">
                    <label for="payment_name" class="col-sm-3 col-form-label">Payment Name<span
                                class="required">*</span></label>
                    <div class="col-sm-9">
                        <input
                                placeholder="Enter Payment Name"
                                name="payment_name"
                                id="payment_name"
                                spellcheck="false"
                                class="form-control"
                                value="{{old('payment_name')}}"
                        />
                        <span class="text-danger">{{$errors->first('payment_name')}}</span>
                    </div>

                </div>
                <div class="form-group row {{$errors->has('payment_amount') ? 'has-error':''}}">
                    <label for="payment_amount" class="col-sm-3 col-form-label">Payment Amount<span
                                class="required">*</span></label>
                    <div class="col-sm-9">
                        <input
                                placeholder="Enter Payment Name"
                                name="payment_amount"
                                id="payment_amount"
                                spellcheck="false"
                                class="form-control"
                                value="{{old('payment_amount')}}"
                        />
                        <span class="text-danger">{{$errors->first('payment_amount')}}</span>
                    </div>

                </div>

                <div class="form-group row {{$errors->has('payment_description')?'has-error':''}}">
                    <label for="payment_description" class="
                    col-sm-3 col-form-label">Payment Description</label>
                    <div class="col-sm-9">
                      <textarea  rows="6" cols="5" id="payment_description" class="form-control"
                                 name="payment_description" value="{{ old('payment_description') }}"
                                 placeholder="Enter Payment Description"
                                 autofocus></textarea>

                        <span class="text-danger">{{$errors->first('payment_description')}}</span>
                    </div>

                </div>

                <div class="form-group row">
                    <div class=" col-lg-5 offset-lg-5 col-sm-8 col-sm-offset-4">
                        <input type="submit" class="btn btn-primary" value="Add Payment Type">
                    </div>

                </div>

            </form>

        </div>

    </div>

@endsection
