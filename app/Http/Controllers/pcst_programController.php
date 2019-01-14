<?php

namespace App\Http\Controllers;

use App\pcst_program;
use App\pcst_department;
use Illuminate\Http\Request;

class pcst_programController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // fetch all programs from database
        $pcst_program=pcst_program::all();

        // return index page from view/pcst_program/index.blade.php
        return view('pcst_program.index',['pcst_program'=>$pcst_program]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // to pass department list first we have to fetch them
        $pcst_department=pcst_department::all();

        //return create view found in view/pcst_proram/create.blade.php
        return view('pcst_program.create',['pcst_department'=>$pcst_department]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate user input 
        $this->validate($request,[
            'name'=>'required|min:2|max:30',
            'years'=>'required|numeric',
            'credit_hours'=>'required|numeric',
            'pcst_department_id'=>'required|numeric'
        ],[
            'name.required'=>'The program name is required',
            'name.min'=>'The program name must be at least 2 characters',
            'name.max'=>'The program name may not be greater than 30 characters',
            'years.required'=>'The program duration is required',
            'years.numeric'=>'The program duration can only contain number',
            'credit_hours.required'=>'The program\'s credit hour is required',
            'credit_hours.numeric'=>'The program\'s credit hour can only contain number',
            'pcst_department_id'=>'The program\'s department is required'
        ]);

        // insert into database
        $pcst_program=pcst_program::create([
            'name'=>$request->input('name'),
            'years'=>$request->input('years'),
            'credit_hours'=>$request->input('credit_hours'),
            'pcst_department_id'=>$request->input('pcst_department_id')
        ]);

        // return success message
        if($pcst_program){
            return redirect()
            ->route('pcst_program.index')
            ->with('success','Program Added Successfully');
        }

        //return error message
        return back()->withInput('errors','Error Adding Program');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pcst_program  $pcst_program
     * @return \Illuminate\Http\Response
     */
    public function show(pcst_program $pcst_program)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pcst_program  $pcst_program
     * @return \Illuminate\Http\Response
     */
    public function edit(pcst_program $pcst_program)
    {
        //fetch department for selecting
        $pcst_department=pcst_department::all();
        $pcst_program=pcst_program::find($pcst_program->id);

        // return edit page found in view/pcst_programs/edit.blade.php
        return view('pcst_program.edit',['pcst_department_list'=>$pcst_department,'pcst_program'=>$pcst_program]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pcst_program  $pcst_program
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pcst_program $pcst_program)
    {
        //validate user input
        $this->validate($request,[
            'name'=>'required|min:2|max:30',
            'years'=>'required|numeric',
            'credit_hours'=>'required|numeric',
            'pcst_department_id'=>'required|numeric'
        ],[
            'name.required'=>'The program name is required',
            'name.min'=>'The program name must be at least 2 characters',
            'name.max'=>'The program name may not be greater than 30 characters',
            'years.required'=>'The program duration is required',
            'years.numeric'=>'The program duration can only contain number',
            'credit_hours.required'=>'The program\'s credit hour is required',
            'credit_hours.numeric'=>'The program\'s credit hour can only contain number',
            'pcst_department_id'=>'The program\'s department is required'
        ]);

        // update the database
        $update_program=pcst_program::where('id',$pcst_program->id)->update([
            'name'=>$request->input('name'),
            'years'=>$request->input('years'),
            'credit_hours'=>$request->input('credit_hours'),
            'pcst_department_id'=>$request->input('pcst_department_id')
        ]);

        // return success message
        return redirect()
        ->route('pcst_program.index')
        ->with('success','Program Updated Successfully');

        // return error message
        return back()
        ->withInput('errors','Error updating Program');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pcst_program  $pcst_program
     * @return \Illuminate\Http\Response
     */
    public function destroy(pcst_program $pcst_program)
    {
        //find the program to be deleted
        $delete_program=pcst_program::find($pcst_program->id);

        // delete and return success message
        if($delete_program->delete()){
            return redirect()
            ->route('pcst_program.index')
            ->with('success','Program Deleted Successfully');
        }

        //return error message
        return back()
        ->withInput('errors','Error Deleting Program');
    }
}
