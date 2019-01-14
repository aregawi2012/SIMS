<?php

namespace App\Http\Controllers;

use App\pcst_section;
use Illuminate\Http\Request;

class pcst_sectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //fetch all sections
        $pcst_section=pcst_section::all();

        //return index page found in view/pcst_semester/index
        return view('pcst_section.index',['pcst_section'=>$pcst_section]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return create.blade.php page found in view/pcst_section/create

        return view('pcst_section.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // valide the user input
        $this->validate($request,[
            'section_name'=>'required|min:2|max:20',
            'section_number'=>'required|numeric'
        ],[

            'section_name.required'=>'The Section name is required',
            'section_name.min'=>'The secton name must have at least 2 characters',
            'section_name.max'=>'The section name may not have greater than 20 characters',
            'section_number.required'=>'The section Number is required',
            'section_number.numeric'=>'The section Number must only contain Number'

        ]);

        // insert into database
        $section=pcst_section::create([
            'name'=>$request->input('section_name'),
            'section_number'=>$request->input('section_number')
        ]);
        // return success message
        if($section){
            return redirect()
            ->route('pcst_section.index')
            ->with('success','Section Added Successfully');
        }
        // return error message
        return back()
        ->withInput('errors','Error Adding Section');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pcst_section  $pcst_section
     * @return \Illuminate\Http\Response
     */
    public function show(pcst_section $pcst_section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pcst_section  $pcst_section
     * @return \Illuminate\Http\Response
     */
    public function edit(pcst_section $pcst_section)
    {
        //fetch the section
        $pcst_section =pcst_section::find($pcst_section->id);

        // return edit page found in view/pcst_section/edit.blade.php
        return view('pcst_section.edit',['pcst_section'=>$pcst_section]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pcst_section  $pcst_section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pcst_section $pcst_section)
    {
        // validate user input
            $this->validate($request,[
            'section_name'=>'required|min:2|max:20',
            'section_number'=>'required|numeric'
        ],[

            'section_name.required'=>'The Section name is required',
            'section_name.min'=>'The secton name must have at least 2 characters',
            'section_name.max'=>'The section name may not have greater than 20 characters',
            'section_number.required'=>'The section Number is required',
            'section_number.numeric'=>'The section Number must only contain Number'

        ]);

        // update table
            $update_section=pcst_section::where('id',$pcst_section->id)
            ->update([
                'name'=>$request->input('section_name'),
                'section_number'=>$request->input('section_number')
            ]);

        //return success message
            if($update_section){
                return redirect()
                ->route('pcst_section.index')
                ->with('success','Section Updated Sucessfully');
            }

        //return error message
        return back()
        ->withInput('errors','Error Updating Section');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pcst_section  $pcst_section
     * @return \Illuminate\Http\Response
     */
    public function destroy(pcst_section $pcst_section)
    {
        // find the section tobe deleted 
        $delete_section=pcst_section::find($pcst_section->id);

        //delete it and return success message
        if ($delete_section->delete()) {
            return redirect()
            ->route('pcst_section.index')
            ->with('success','Section deleted Sucessfully');
        }

        //return error message if exist
        return back()
        ->withInput('errors','Error Deleting Section');
    }
}
