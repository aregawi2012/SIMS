<?php

namespace App\Http\Controllers;

use App\AcademicYears;
use Illuminate\Http\Request;

class AcademicYearsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $academic_years = AcademicYears::all();
        return view('academic_year.index',['academic_year'=>$academic_years]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Return the form page for creating academic year
        return view('academic_year.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // accept values and add to database
        $start = $request->input('start');
        $end = $request->input('end');
        // validate user input
        $this->validate($request,[
            'start'=>'required|date',
            'end'=>'required|date|after:start',
        ], [
            'start.required'=>'The start date field is required',
            'start.date'=>'The start date field is not correct in valid date format',
            'end.required'=>'The end date field is required',
            'end.date'=>'The end date field is not correct in valid date format',
            'end.after'=>'The end date must be after start date('.$start.')',

        ]);

       //check if the data exists

        $academic_year_exists = AcademicYears::where('start',$start)
                                                ->where('end',$end)
                                                ->count();
        if($academic_year_exists){
         $error = "The Same Academic Year Exists with the same start and end date";
        }else{

            $academic_year_inserted = AcademicYears::create([
                'start'=>$start,
                'end'=>$end
            ]);
            if($academic_year_inserted){

                return redirect()
                    ->route('academic_year.index')
                    ->with('success','Academic Year Added Successfully');
            }
            else{
                $error = "Failed To add Academic Year";
            }


        }
        return back()->withInput('errors','Error Adding Class Year ');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AcademicYears  $acedamicYears
     * @return \Illuminate\Http\Response
     */
    public function show(AcademicYears $acedamicYears)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AcademicYears  $acedamicYears
     * @return \Illuminate\Http\Response
     */
    public function edit(AcademicYears $acedamicYears)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AcademicYears  $acedamicYears
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AcademicYears $acedamicYears)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AcademicYears  $acedamicYears
     * @return \Illuminate\Http\Response
     */
    public function destroy(AcademicYears $acedamicYears)
    {
        //
    }
}
