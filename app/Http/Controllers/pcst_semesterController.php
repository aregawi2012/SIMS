<?php

namespace App\Http\Controllers;

use App\pcst_semester;
use Illuminate\Http\Request;

class pcst_semesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // fetch all semester list from database
        $pcst_semester=pcst_semester::all();
        // calling the index page in view/pcst_semester
        return view('pcst_semester.index',['pcst_semester'=>$pcst_semester]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // calling the create page in view/pcst_semester
        return view('pcst_semester.create');
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
            'semester_name'=>'required|min:1|max:20',
            'semester_number'=>'required|numeric'
        ],[
            'semester_name.required'=>'The semester name is required',
            'semester_name.min'=>'The semester name must be at least 2 characters',
            'semester_number'=>'The semester name may not be greater than 20 characters',
            'semester_number'=>'The semester number is required ',
            'semester_number'=>'The semester number must only contain number'
        ]);

        //store in database
        $semester=pcst_semester::create(
            [
            'semester_name'=>$request->input('semester_name'),
            'semester_number'=>$request->input('semester_number')
        ]
        );

        // return success message
        if($semester){
            return redirect()
            ->route('pcst_semester.index')
            ->with('success','semester Added Successfully');
        }
        // return error message
        return back()
            ->withInput('errors','Error in adding semester');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pcst_semester  $pcst_semester
     * @return \Illuminate\Http\Response
     */
    public function show(pcst_semester $pcst_semester)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pcst_semester  $pcst_semester
     * @return \Illuminate\Http\Response
     */
    public function edit(pcst_semester $pcst_semester)
    {
        //find the specific semester
        $semester=pcst_semester::find($pcst_semester->id);

        // return the edit page from view/pcst_semester/edit.blade.php
        return view('pcst_semester.edit',['pcst_semester'=>$semester]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pcst_semester  $pcst_semester
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pcst_semester $pcst_semester)
    {
        //validate user input
        $this->validate($request,[
            'semester_name'=>'required|min:1|max:20',
            'semester_number'=>'required|numeric'
        ],[
            'semester_name.required'=>'The semester name is required',
            'semester_name.min'=>'The semester name must be at least 2 characters',
            'semester_number'=>'The semester name may not be greater than 20 characters',
            'semester_number'=>'The semester number is required ',
            'semester_number'=>'The semester number must only contain number'
        ]);

        // update the database
        $semester=pcst_semester::where('id',$pcst_semester->id)
        ->update([
            'semester_name'=>$request->input('semester_name'),
            'semester_number'=>$request->input('semester_number')
        ]);
        //return success message
        if($semester){
            return redirect()
            ->route('pcst_semester.index')
            ->with('success','Semester update Successfully');
        }

        //return error message
        return back()
        ->withInput('errors','Error updating Semester');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pcst_semester  $pcst_semester
     * @return \Illuminate\Http\Response
     */
    public function destroy(pcst_semester $pcst_semester)
    {
        //fetch a semester
        $find_semester=pcst_semester::find($pcst_semester->id);

        // execute delete operation and return seccess message
        if($find_semester->delete()){
            return redirect()
            ->route('pcst_semester.index')
            ->with('success','semester deleted Successfully');
        }
        // return error message
        return back()
        ->withInput('errors','Error deleting semester');
    }
}
