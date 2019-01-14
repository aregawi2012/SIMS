@extends('includes.master_layout');

@section('content')
<div class="panel panel-primary">
        <div class="panel-heading">
        List of Department
        <a class="pull-right btn btn-success btn-sm" href="{{route('pcst_department.create')}}">
          
          Add Department
        </a>
      </div>

          <div class="panel-body">
            @if(!empty($pcst_department))
            <div class="table-responsive">
                

            </div>
                <table class="table table-sm">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Department Name</th>
                        <th scope="col">Department Code</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                   
                        @foreach($pcst_department as $department)
<!-------- start from this part -->
<div class="modal fade" id="modal-delete-{{ $department->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-danger" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center"  id="myModalLabel">Delete Confirmation</h4>
                </div>
            <form action="{{route('pcst_department.destroy',[$department->id])}}" method="post">
              {{method_field('delete')}}
              {{csrf_field()}}
                <div class="modal-body">
                    <p class="text-center">
                      Are you sure you want to delete this? {{ $department->department_name }}
                    </p>
                    <input type="hidden" name="department_id" id="dep_id" value="{{ $department->department_name }}">
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
                           <td >{{ $department->department_name }}
                           </td>
                           <td >{{ $department->department_code }}</td>

                           <td >
                            <a href="pcst_department/{{$department->id}}/edit">
                              <span class="btn btn-info btn-xs">
                                <i class="fa fa-edit"></i> Edit
                              </span></a></td>
                           <td >
                            <a href="{{'#'}}" class="delete-modal" data-dep_id="{{$department->id}}" data-toggle="modal" data-target="#modal-delete-{{ $department->id }}"> 
                              <span class="btn btn-danger btn-xs" ><i class="fa fa-trash-o"></i> Delete</span></a>
                          </td>
                        </tr>
                        @endforeach
                        

                   
                </tbody>
            </table>
            @else
            <h1>Departments not found</h1>
            @endif
            
        </div>
</div>
@endsection