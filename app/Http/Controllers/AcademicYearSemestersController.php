<?php

namespace App\Http\Controllers;

use App\AcademicYearSemesters;
use App\AcademicYears;
use App\pcst_semester;
use Illuminate\Http\Request;

class AcademicYearSemestersController extends Controller
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
        return view('academic_year_semester.index',['academic_year'=>$academic_years]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // form goes here
        $academic_years = AcademicYears::all();
        $semester = pcst_semester::all();
        return view('academic_year_semester.create',['academic_years'=> $academic_years,
                                                          'semesters'=>$semester]);
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AcademicYearSemesters  $academicYearSemesters
     * @return \Illuminate\Http\Response
     */
    public function show(AcademicYearSemesters $academicYearSemesters)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AcademicYearSemesters  $academicYearSemesters
     * @return \Illuminate\Http\Response
     */
    public function edit(AcademicYearSemesters $academicYearSemesters)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AcademicYearSemesters  $academicYearSemesters
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AcademicYearSemesters $academicYearSemesters)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AcademicYearSemesters  $academicYearSemesters
     * @return \Illuminate\Http\Response
     */
    public function destroy(AcademicYearSemesters $academicYearSemesters)
    {
        //
    }

}
