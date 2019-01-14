@extends('includes.master_layout');

@section('content')
<div class="panel panel-primary">
        <div class="panel-heading">
        List of Semester
        <a class="pull-right btn btn-success btn-sm" href="{{route('pcst_semester.create')}}">
          
          Add Semester
        </a>
      </div>

          <div class="panel-body">
            @if(!empty($pcst_semester))
            <div class="table-responsive">
                

            </div>
                <table class="table table-sm">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Semester Name</th>
                        <th scope="col">Semester Code</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                   
                        @foreach($pcst_semester as $semester)
<!-------- start from this part -->
<div class="modal fade" id="modal-delete-{{ $semester->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-danger" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center"  id="myModalLabel">Delete Confirmation</h4>
                </div>
            <form action="{{route('pcst_semester.destroy',[$semester->id])}}" method="post">
              {{method_field('delete')}}
              {{csrf_field()}}
                <div class="modal-body">
                    <p class="text-center">
                      Are you sure you want to delete this? {{ $semester->semester_name }}
                    </p>
                    <input type="hidden" name="semester_id" id="sem_id" value="{{ $semester->semester_name }}">
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
                           <th>{{ $loop->iteration }}</th> 
                           <th >{{ $semester->semester_name }}
                           </th> 
                           <th >{{ $semester->semester_number }}</th> 

                           <th >
                            <a href="{{route('pcst_semester.edit',[$semester->id])}}">
                              <span class="btn btn-info btn-xs">
                                <i class="fa fa-edit"></i> Edit
                              </span></a></th> 
                           <th >
                            <a href="{{'#'}}" class="delete-modal" data-dep_id="{{$semester->id}}" data-toggle="modal" data-target="#modal-delete-{{ $semester->id }}"> 
                              <span class="btn btn-danger btn-xs" ><i class="fa fa-trash-o"></i> Delete</span></a>
                          </th> 
                        </tr>
                        @endforeach
                        

                   
                </tbody>
            </table>
            @else
            <h1>Semester not found</h1>
            @endif
            
        </div>
</div>
@endsection