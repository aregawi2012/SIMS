<?php

namespace App\Http\Controllers;

use App\ClassYear;
use Illuminate\Http\Request;

class ClassYearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Returns List of ClassYears

        $classYears = ClassYear::all();

      return view('class_year.index',['class_years'=>$classYears]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // calling the create.blade.php found in view/class_year
        return view('class_year.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validating user input
        $this->validate($request,[
            'name'=>'required|min:2|max:20|',
            'number'=>'required|numeric'
        ],[
            'name.required'=>'The class year name is required',
            'name.min'=>'The class year name must be at least 2 characters',
            'name.max'=>'The class year name may not be greater than 20 characters',


            'number.required'=>'The class year number is required',
            'number.numeric'=>'the class year number can be only number'
        ]);
        // inserting to database
        $class_year=ClassYear::create(
            [
                'name'=>$request->input('name'),
                'number'=>$request->input('number')
            ]
        );

        // returning success message from the action
        if($class_year){
            return redirect()
                ->route('class_year.index')
                ->with('success','Class Year Added Successfully');
        }

        // returning error massage
        return back()->withInput('errors','Error Adding Class Year ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pcst_class_year  $pcst_class_year
     * @return \Illuminate\Http\Response
     */
    public function show(pcst_class_year $pcst_class_year)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pcst_class_year  $pcst_class_year
     * @return \Illuminate\Http\Response
     */
    public function edit(pcst_class_year $pcst_class_year)
    {
        //fetching a single pcst_class_year
        $class_year= ClassYear::find($pcst_class_year->id);

        // calling edit.blade.php found in view/pcst_class_year
        return view('pcst_class_year.edit',['class_year'=>$class_year]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pcst_class_year  $pcst_class_year
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pcst_class_year $pcst_class_year)
    {
        // validating user input
        $this->validate($request,[
            'name'=>'required|min:2|max:20|regex:[A-Za-z1-9 _]',
            'number'=>'required|numeric'
        ],[
            'name.required'=>'The class year name is required',
            'name.min'=>'The class year name must be at least 2 characters',
            'name.max'=>'The class year name may not be greater than 20 characters',
            'name.regex'=>'The class year name can not include these characters',

            'number.required'=>'The class year number is required',
            'number.numeric'=>'the class year number can be only number'
        ]);
        //updating in database
        $class_year=ClassYear::where('id',$pcst_class_year->id)->update([
            'name'=>$request->input('name'),
            'number'=>$request->input('number')
        ]);

        // returning success message
        if($class_year){
            return redirect()
                ->route('class_year.index')
                ->with('success','Class year Updated Successfully');
        }

        // returnning error message
        return back()->withInput('errors','Class year could not be updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClassYear  $class_year
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassYear $class_year)
    {
        // fetching a single class_year for deleting
        $findclassyear=ClassYear::find($class_year->id);

        // returing success message
        if($findclassyear->delete()){
            return redirect()
                ->route('class_year.index')
                ->with('success','class year deleted Successfully');
        }

        // returing error message
        return back()->withInput('errors','Class year could not be Deleted');
    }
}
