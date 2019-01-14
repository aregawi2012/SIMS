<?php

namespace App\Http\Controllers;

use App\paymentType;
use Illuminate\Http\Request;

class PaymentTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $payment_types = paymentType::all();
        return view('payment_type.index',['payments'=>$payment_types]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Return the form page for creating academic year

        return view('payment_type.create');    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // accept values and add to database
        $payment_name = $request->input('payment_name');
        $payment_amount = $request->input('payment_amount');
        $payment_desc = $request->input('payment_description');
        // validate user input
        $this->validate($request,[
            'payment_name'=>'required',
            'payment_amount'=>'required|Numeric',
        ], [
            'payment_name.required'=>'The Payment Name field is required',
            'payment_amount.required'=>'The Payment Amount field is required',
            'payment_amount'=>'The Payment Amount field Must be numeric value',
        ]);

        //check if the data exists

        $payment_type_exists = paymentType::where('payment_name',$payment_name)
            ->where('payment_amount',$payment_amount)
            ->count();
        if($payment_type_exists){
            $error = "The Same Academic Year Exists with the same start and end date";
        }else{

            $payment_type_inserted = paymentType::create([
                'payment_name'=>$payment_name,
                'payment_amount'=>$payment_amount,
                'payment_description'=>$payment_desc
            ]);
            if($payment_type_inserted){

                return redirect()
                    ->route('payment_type.index')
                    ->with('success','Payment Type Added Successfully');
            }
            else{
                $error = "Failed To add New Payment Type";
            }
        }
        return back()->withInput('errors','Error Adding Payment Type ');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\paymentType  $acedamicYears
     * @return \Illuminate\Http\Response
     */
    public function show(paymentType $acedamicYears)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param paymentType $paymentType
     * @return void
     */
    public function edit(paymentType $paymentType)
    {
        //fetching a single payment_type
        $paymentType= paymentType::find($paymentType->id);
        // calling edit.blade.php found in view/payment_type
        return view('payment_type.edit',["payment"=>$paymentType]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param paymentType $paymentType
     * @return void
     */
    public function update(Request $request, paymentType $paymentType)
    {
        //
        $this->validate($request, [
            'payment_name' => 'bail|required|max:255|min:2',
            'payment_amount' => 'required|Numeric',
            'payment_description' => 'nullable'
        ],[
            'payment_name.required'=>'The Payment Name field is required',
            'payment_amount.required'=>'The Payment Amount field is required',
            'payment_amount'=>'The Payment Amount field Must be numeric value',
        ]);
        $paymentType=paymentType::where('id',$paymentType->id)->update([
            'payment_name'=>$request->input('payment_name'),
            'payment_amount'=>$request->input('payment_amount'),
            'payment_description'=>$request->input('payment_description'),
        ]);
        // returning success message
        if($paymentType){
            return redirect()
                ->route('payment_type.index')
                ->with('success','Payment Type Updated Successfully');
        }

        // returnning error message
        return back()->withInput('errors','Payment type could not be updated');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param paymentType $paymentType
     * @return \Illuminate\Http\Response
     */
    public function destroy(paymentType $paymentType)
    {
        // fetching a single payment for deleting
        $findPaymentType=paymentType::find($paymentType->id);

        // returing success message
        if($findPaymentType->delete()){
            return redirect()
                ->route('payment_type.index')
                ->with('success','Payment deleted Successfully');
        }
        // returing error message
        return back()->withInput('errors','Payment Type could not be Deleted');
    }
}
