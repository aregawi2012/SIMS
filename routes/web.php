<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\PaymentController;

Route::get('/', function () {
    return view('welcome');
});

// all route for department
Route::resource('pcst_department','pcst_departmentController');
// all route for class year
Route::resource('class_year','ClassYearController');
// all route for semester
Route::resource('pcst_semester','pcst_semesterController');
// all route for section
Route::resource('pcst_section','pcst_sectionController');
// all route for programms
Route::resource('pcst_program','pcst_programController');
// all route for curriculum
Route::resource('pcst_curriculum','pcst_curriculumController');
// all route for acedamic year
Route::resource('academic_year','AcademicYearsController');
// all route for acedamic year
Route::resource('academic_year_semester','AcademicYearSemestersController');
// all route for payment
Route::resource('payment_type','PaymentTypeController');
Route::get('make_payment/print_slip/{id}','PaymentController@printSlip');
Route::resource('make_payment','PaymentController');
Route::resource('payment_history','PaymentHistoryController');