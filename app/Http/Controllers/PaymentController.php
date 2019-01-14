<?php

namespace App\Http\Controllers;

use App\external_payment;
use App\payment;
use App\paymentType;
use App\student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $payment = DB::table('external_payments')
                    ->join('payment_types', 'external_payments.payment_type', '=', 'payment_types.id')
                    ->join('students', 'external_payments.student_id', '=', 'students.id')
                    ->select('external_payments.*', 'payment_types.payment_name','students.student_id','students.student_name')
                    ->where('external_payments.status',1)
                    ->get();

        //return $payment;
        return view('payment.index',['payments'=>$payment]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // fetch payment types
        $payment_type=paymentType::all();
        return view('payment.create',['payment_types'=>$payment_type]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // receive and validate
        // accept values and add to database
        $payment_type_id = $request->input('payment_type');
        $payment_amount = $request->input('payment_amount');
        $payment_desc = $request->input('payment_desc');
        $student_id = $request->input('student_id');
        $student_name = $request->input('student_name');

        // validate user input
        $this->validate($request, [
            'payment_amount' => 'required|Numeric',
            'student_id' => 'required',
            'student_name' => 'required',
        ],
            [
                'payment_amount.required' => 'The Payment Amount field is required',
                'payment_amount.Numeric' => 'The Payment Amount Field Must be Number',
                'student_id' => 'The Payment Amount field Must be numeric value',
                'student_name' => 'The Student Name field is required',
            ]);

        // get student id
        $student = student::where('student_id', $student_id)->first();
        if ($student != null) {
            $student_id = $student->id;
            $payment_inserted = external_payment::create([
                'payment_type' => $payment_type_id,
                'payment_amount' => $payment_amount,
                'student_id' => $student_id,
                'remark' => $payment_desc
            ]);
            if ($payment_inserted) {
                return redirect()
                    ->route('make_payment.index')
                    ->with('success', 'Payment Type Added Successfully');
            }
        }
        $payment_type=paymentType::all();
        return view('payment.create',['error'=>'No Student found with that ID','payment_types'=>$payment_type]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy($payment)
    {
        //

        $payment_disable=external_payment::find($payment);
        if($payment_disable->delete()){
            return redirect()
                ->route('make_payment.index')
                ->with('success','Payment Deleted successfully');
        }

        return back()->withInput()->with('error','Payment Could not be Deleted.');

    }
    public  function printSlip($id){
        //
        $payment = DB::table('external_payments')
            ->join('payment_types', 'external_payments.payment_type', '=', 'payment_types.id')
            ->join('students', 'external_payments.student_id', '=', 'students.id')
            ->select('external_payments.*', 'payment_types.payment_name','students.student_id','students.student_name')
            ->where('external_payments.status',1)
            ->where('external_payments.id',$id)
            ->get();
        return view('payment.print_slip',['slip_info'=>$payment]);
    }
}
