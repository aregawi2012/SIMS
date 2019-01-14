<?php

namespace App\Http\Controllers;

use App\pcst_curriculum;
use App\pcst_program;
use App\pcst_class_year;
use App\pcst_semester;
use Illuminate\Http\Request;

class pcst_curriculumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //fetch all data from database
        $pcst_curriculum=pcst_curriculum::all();

        //return index page found in view/pcst_curriculum
        return view('pcst_curriculum.index',['pcst_curriculum'=>$pcst_curriculum]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // passing all program list
        $pcst_program=pcst_program::all();

        //passing all class year list
        $pcst_class_year=pcst_class_year::all();

        //passing all semester list
        $pcst_semester=pcst_semester::all();

        //return create page found in view/pcst_curriculum/create.blade.php
        return view('pcst_curriculum.create',['pcst_program'=>$pcst_program,'pcst_class_year'=>$pcst_class_year,'pcst_semester'=>$pcst_semester]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate user input
        $this->validate($request,[
            'pcst_program_id'=>'required',
            'pcst_class_year_id'=>'required',
            'pcst_semester_id'=>'required'
        ],[
           'pcst_program_id.required'=>'The program field is required', 
           'pcst_class_year_id.required'=>'The program field is required',
           'pcst_semester_id.required'=>'The program field is required'
        ]);

        // insert into database
        $new_curriculum=pcst_curriculum::create([
            'pcst_program_id'=>$request->input('pcst_program_id'),
            'pcst_class_year_id'=>$request->input('pcst_class_year_id'),
            'pcst_semester_id'=>$request->input('pcst_semester_id')
        ]);

        //return success message
        if($new_curriculum){
        return redirect()
        ->route('pcst_curriculum.index')
        ->with('success','New Curriculum Added Successfully');
        }
        

        // return error message
        return back()
        ->withInput('errors','Error Adding New Curriculum');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pcst_curriculum  $pcst_curriculum
     * @return \Illuminate\Http\Response
     */
    public function show(pcst_curriculum $pcst_curriculum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pcst_curriculum  $pcst_curriculum
     * @return \Illuminate\Http\Response
     */
    public function edit(pcst_curriculum $pcst_curriculum)
    {
        //select the curriculum
        $pcst_curriculum=pcst_curriculum::find($pcst_curriculum->id);

        // passing all program list
        $pcst_program=pcst_program::all();

        //passing all class year list
        $pcst_class_year=pcst_class_year::all();

        //passing all semester list
        $pcst_semester=pcst_semester::all();

        //return create page found in view/pcst_curriculum/create.blade.php
        return view('pcst_curriculum.edit',['pcst_program'=>$pcst_program,'pcst_class_year'=>$pcst_class_year,'pcst_semester'=>$pcst_semester,'pcst_curriculum'=>$pcst_curriculum]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pcst_curriculum  $pcst_curriculum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pcst_curriculum $pcst_curriculum)
    {
        // validate user input
        $this->validate($request,[
            'pcst_program_id'=>'required',
            'pcst_class_year_id'=>'required',
            'pcst_semester_id'=>'required'
        ],[
           'pcst_program_id.required'=>'The program field is required', 
           'pcst_class_year_id.required'=>'The program field is required',
           'pcst_semester_id.required'=>'The program field is required'
        ]);

        //update database
        $update_curriculum=pcst_curriculum::where('id',$pcst_curriculum->id)
        ->update([
            'pcst_program_id'=>$request->input('pcst_program_id'),
            'pcst_class_year_id'=>$request->input('pcst_class_year_id'),
            'pcst_semester_id'=>$request->input('pcst_semester_id')
        ]);

        // return success message
        if($update_curriculum){
            return redirect()
            ->route('pcst_curriculum.index')
            ->with('success','Curriculum Updatd Successfully');
        }

        // return error message
        return back()
        ->withInput('errors','Error Updating Curriculum');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pcst_curriculum  $pcst_curriculum
     * @return \Illuminate\Http\Response
     */
    public function destroy(pcst_curriculum $pcst_curriculum)
    {
        //find the curriculum to be deleted
        $delete_curriculum=pcst_curriculum::find($pcst_curriculum->id);

        //delete and return success message
        if($delete_curriculum->delete()){
            return redirect()
            ->route('pcst_curriculum.index')
            ->with('success','Curriculum Deleted Successfully');
        }
        return back()
        ->withInput('errors','Error Deleting Curriculum');
    }
}
