@extends('includes.master_layout');

@section('content')
<div class="panel panel-primary">
        <div class="panel-heading">
        List of Class Years
        <a class="pull-right btn btn-success btn-sm" href="/class_year/create">
          
          Add Class year
        </a>
      </div>

          <div class="panel-body">
            @if(!empty($class_years))
            <div class="table-responsive">
                

            </div>
                <table class="table table-sm ">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Class Year Name</th>
                        <th scope="col">Class Year Number</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                   
                        @foreach($class_years as $class_year)
                            <!-------- start from this part -->
                            <div class="modal fade" id="modal-delete-{{ $class_year->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog modal-danger" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title text-center"  id="myModalLabel">Delete Confirmation</h4>
                                            </div>
                                        <form action="{{route('class_year.destroy',[$class_year->id])}}" method="post">
                                          {{method_field('delete')}}
                                          {{csrf_field()}}
                                            <div class="modal-body">
                                                <p class="text-center">
                                                  Are you sure you want to delete this? <br>
                                                  {{ $class_year->class_year_name }}
                                                </p>
                                                <input type="hidden" name="class_year_id" id="dep_id" value="{{ $class_year->class_year_name }}">
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
                           <td >{{ $class_year->name }} </td>
                           <td >{{ $class_year->number }}</td>

                           <td>
                            <a href="class_year/{{$class_year->id}}/edit">
                              <span class="btn btn-info btn-xs">
                                <i class="fa fa-edit"></i> Edit
                              </span></a></td>
                           <td >
                            <a href="{{'#'}}" class="delete-modal" data-dep_id="{{$class_year->id}}" data-toggle="modal" data-target="#modal-delete-{{ $class_year->id }}"> 
                              <span class="btn btn-danger btn-xs" ><i class="fa fa-trash-o"></i> Delete</span></a>
                          </td>
                        </tr>
                        @endforeach
                        

                   
                </tbody>
            </table>
            @else
            <h1>Class year not found</h1>
            @endif
            
        </div>
</div>
@endsection