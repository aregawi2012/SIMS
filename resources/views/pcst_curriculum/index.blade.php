@extends('includes.master_layout');

@section('content')
<div class="panel panel-primary">
        <div class="panel-heading">
        List of Curriculum
        <a class="pull-right btn btn-success btn-sm" href="{{route('pcst_curriculum.create')}}">
          
          Add Curriculum
        </a>
      </div>

          <div class="panel-body">
            @if(!empty($pcst_curriculum))
            <div class="table-responsive">
                

            </div>
                <table class="table table-sm">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Program Name</th>
                        <th scope="col">Class Year</th>
                        <th scope="col">Semester</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                   
                        @foreach($pcst_curriculum as $curriculum)
<!-------- start from this part -->
<div class="modal fade" id="modal-delete-{{ $curriculum->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-danger" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center"  id="myModalLabel">Delete Confirmation</h4>
                </div>
            <form action="{{route('pcst_curriculum.destroy',[$curriculum->id])}}" method="post">
              {{method_field('delete')}}
              {{csrf_field()}}
                <div class="modal-body">
                    <p class="text-center">
                      Are you sure you want to delete this? 
                    </p>
                    <input type="hidden" name="curriculum_id" id="cur_id" value="{{ $curriculum->id }}">
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
                           <th >{{ $curriculum->pcst_program->name  }}
                           </th> 

                           <th >{{ $curriculum->pcst_class_year->class_year_name }}</th> 

                             <th >{{ $curriculum->pcst_semester->semester_name }}</th> 

                           <th >
                            <a href="{{route('pcst_curriculum.edit',[$curriculum->id])}}">
                              <span class="btn btn-info btn-xs">
                                <i class="fa fa-edit"></i> Edit
                              </span></a></th> 
                           <th >
                            <a href="{{'#'}}" class="delete-modal" data-dep_id="{{$curriculum->id}}" data-toggle="modal" data-target="#modal-delete-{{ $curriculum->id }}"> 
                              <span class="btn btn-danger btn-xs" ><i class="fa fa-trash-o"></i> Delete</span></a>
                          </th> 
                        </tr>
                        @endforeach
                        

                   
                </tbody>
            </table>
            @else
            <h1>Curriculum not found</h1>
            @endif
            
        </div>
</div>
@endsection