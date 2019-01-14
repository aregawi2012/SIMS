<?php

namespace App\Http\Controllers;

use App\pcst_department;
use Illuminate\Http\Request;

class pcst_departmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       $pcst_department=pcst_department::all();

       return view('pcst_department.index',['pcst_department'=>$pcst_department]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pcst_department.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'department_name'=>'required|min:2|max:255',
            'department_code'=>'required|min:2|max:255'
        ],[
            'department_name.required'=>'The department name field is required.',
            'department_name.min'=>'The department name must be at least 2 charcters',
            'department_name.max'=>'The department name may not be greater than 255 charcters',
            

            'department_code.required'=>'The department code field is required.',
            'department_code.min'=>'The department code must be at least 2 charcters',
           
            'department_code.max'=>'The department code may not be greater than 255 charcters'

        ]);

        $department=pcst_department::create([
            'department_name'=>$request->input('department_name'),
            'department_code'=>$request->input('department_code')
        ]);

        if($department){
            return redirect()
            ->route('pcst_department.index')
            ->with('success','Department Added successfully');
        }

        return back()->withInput()->with('errors','Error Adding Department');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pcst_department  $pcst_department
     * @return \Illuminate\Http\Response
     */
    public function show(pcst_department $pcst_department)
    {
        //
        $pcst_department= pcst_department::find($pcst_department->id);

        return view('pcst_department.show',['pcst_department'=>$pcst_department]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pcst_department  $pcst_department
     * @return \Illuminate\Http\Response
     */
    public function edit(pcst_department $pcst_department)
    {
        //

        $pcst_department= pcst_department::find($pcst_department->id);
        return view('pcst_department.edit',['pcst_department'=>$pcst_department]);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pcst_department  $pcst_department
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pcst_department $pcst_department)
    {
        //save data
        $this->validate($request,[
            'department_name'=>'required|min:2|max:20',
            'department_code'=>'required|min:2|max:10'
        ],[
            'department_name.required'=>'The department name field is required.',
            'department_name.min'=>'The department name must be at least 2 charcters',
            'department_name.max'=>'The department name may not be greater than 20 charcters',

            'department_code.required'=>'The department code field is required.',
            'department_code.min'=>'The department code must be at least 2 charcters',
            'department_code.max'=>'The department code may not be greater than 10 charcters'

        ]);

        $pcst_department_update=pcst_department::where('id',$pcst_department->id)
            ->update([
                'department_name'=>$request->input('department_name'),
                'department_code'=>$request->input('department_code')
             ]);

        if($pcst_department_update){
            return redirect()
                ->route('pcst_department.index')
                ->with('success','Department updated successfully');
        }
        // redirect
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pcst_department  $pcst_department
     * @return \Illuminate\Http\Response
     */
    public function destroy(pcst_department $pcst_department)
    {
        //
        $finddepartment=pcst_department::find($pcst_department->id);
        if($finddepartment->delete()){
           return redirect()
            ->route('pcst_department.index')
            ->with('success','Department Deleted successfully');
        }

        return back()->withInput()->with('error','Department Could not be Deleted.'); 

        
    }

    
}
