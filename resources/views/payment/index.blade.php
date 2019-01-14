@extends('includes.master_layout');

@section('content')

    <div class="panel panel-primary">
        <div class="panel-heading">
            List of Payment Types
            <a class="pull-right btn btn-success btn-sm" href="make_payment/create">
                Issue New Payment
            </a>
        </div>

        <div class="panel-body">
            @if(!empty($payments))

                <table class="table table-striped table-hover">
                    <thead>
                    @if(count($payments))
                        <tr>
                            <th>No</th>
                            <th>Student Name</th>
                            <th>Student ID</th>
                            <th>Payment type</th>
                            <th>Payment Account</th>
                            <th>Date</th>
                            <th>Remark</th>
                            <th>Options</th>
                        </tr>

                    </thead>
                    <tbody>
                    @foreach($payments->all() as $payment)

                        <!-------- start from this part -->
                        <div class="modal fade" id="modal-delete-{{ $payment->id }}" tabindex="-1" role="dialog"
                             aria-labelledby="myModalLabel">
                            <div class="modal-dialog modal-danger" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title text-center"  id="myModalLabel">Delete Confirmation</h4>
                                    </div>
                                    <form action="{{route('make_payment.destroy',[$payment->id])}}" method="post">
                                        {{method_field('delete')}}
                                        {{csrf_field()}}
                                        <div class="modal-body">
                                            <p class="text-center">
                                                Are you sure you want to delete this? {{ $payment->payment_name  }}
                                            </p>
                                            <input type="hidden" name="payment_type_id" id="payment_type_id" value="{{
                                            $payment->id }}">
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-success" data-dismiss="modal">No, Cancel </button>
                                            <button type="submit" class="btn btn-warning">yes, Delete</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-------- to this part -->

                        <tr>
                            <td>{{$loop->iteration}} </td>
                            <td>{{$payment->student_name}} </td>
                            <td>{{$payment->student_id}} </td>
                            <td>{{$payment->payment_name }}</td>
                            <td>{{$payment->payment_amount }}&nbsp;ETB</td>
                            <td>{{$payment->created_at}}</td>
                            <td>{{$payment->remark}}</td>
                            <td>
                                <a href="/make_payment/print_slip/{{$payment->id}}">
                              <span class="btn btn-success btn">
                                <i class="fa fa-print"></i>
                              </span></a>
                                |<a href="payment_type/{{$payment->id}}/edit">
                              <span class="btn btn-warning">
                                <i class="fa fa-edit"></i>
                              </span></a> |
                                <a href="{{'#'}}" class="delete-modal" data-dep_id="{{$payment->id}}" data-toggle="modal"
                                   data-target="#modal-delete-{{ $payment->id }}">
                                    <span class="btn btn-danger" ><i class="fa fa-trash-o"></i></span></a>
                            </td>

                        </tr>
                    @endforeach
                    @else
                        <div class="alert alert-danger">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

                            <h5>No External Payment Added yet , You can add New Payment Type By clicking the Add
                                Payment Button
                                Above</h5>
                        </div>
                    @endif

                    </tbody>
                </table>
            @else
                <h1>No Payment Made yet</h1>
            @endif

        </div>
    </div>
@endsection