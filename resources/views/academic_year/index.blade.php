@extends('includes.master_layout');

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            List of acedamic years
            <a class="pull-right btn btn-success btn-sm" href="{{route('academic_year.create')}}">
               Add New Acedamic Year
            </a>
        </div>

        <div class="panel-body">
            @if(!empty($academic_year))
                <div class="table-responsive">


                </div>
                <table class="table table-sm">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Start Date</th>
                        <th scope="col">End Date</th>

                    </tr>
                    </thead>
                    <tbody>

                    @foreach($academic_year as $academic_years)
                        <!-------- start from this part -->
                        <div class="modal fade" id="modal-delete-{{ $academic_years->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog modal-danger" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title text-center"  id="myModalLabel">Delete Confirmation</h4>
                                    </div>
                                    <form action="{{route('academic_year.destroy',[$academic_years->id])}}" method="post">
                                        {{method_field('delete')}}
                                        {{csrf_field()}}
                                        <div class="modal-body">
                                            <p class="text-center">
                                                Are you sure you want to delete this? {{ $academic_years->start  }} - to -{{$academic_years->end}}
                                            </p>
                                            <input type="hidden" name="academic_year_id" id="academic_year_id" value="{{ $academic_years->id }}">
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
                            <td>{{ $loop->iteration }}</td>
                            <td >{{ $academic_years->start }}
                            </td>
                            <td >{{ $academic_years->end }}</td>

                            <td >
                                <a href="academic_year/{{$academic_years->id}}/edit">
                              <span class="btn btn-info btn-xs">
                                <i class="fa fa-edit"></i> Edit
                              </span></a></td>
                            <td >
                                <a href="{{'#'}}" class="delete-modal" data-acedamic_year_id="{{$academic_years->id}}" data-toggle="modal" data-target="#modal-delete-{{ $academic_years->id }}">
                                    <span class="btn btn-danger btn-xs" ><i class="fa fa-trash-o"></i> Delete</span></a>
                            </td>
                        </tr>
                    @endforeach



                    </tbody>
                </table>
            @else
                <h3>Academic year not found</h3>
            @endif

        </div>
    </div>
@endsection