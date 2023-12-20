<?php

namespace App\Http\Controllers\Admin\Settings;

use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Lang;

class PaymentMethodController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:View Payment Method', ['only' => ['index']]);
        $this->middleware('permission:Add Payment Method', ['only' => ['create','store']]);
        $this->middleware('permission:Edit Payment Method', ['only' => ['edit','update']]);
        $this->middleware('permission:Delete Payment Method', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
        $payment_methods  = PaymentMethod::orderBy('id','DESC')->paginate(5);
        return view('admin.settings.paymentMethods.index',compact('payment_methods'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('admin.settings.paymentMethods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $this->validate($request, [
            'payment_title' => 'required|string|max:255|unique:payment_methods,payment_title',
            'payment_description' => 'required',
            'payment_status' => 'required|numeric|in:0,1',
        ]);
        $paymentMethod = new PaymentMethod();
        $paymentMethod->payment_title = $request->payment_title;
        $paymentMethod->payment_description = $request->payment_description;
        $paymentMethod->payment_status = $request->payment_status;
        $paymentMethod->save();
        return redirect()->route('admin.settings.payment-methods.index')->with('success',Lang::get('admin.Payment method created successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
        $paymentMethod = PaymentMethod::find($id);
        return view('admin.settings.paymentMethods.show',compact('paymentMethod'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
        $paymentMethod = PaymentMethod::find($id);
        return view('admin.settings.paymentMethods.edit',compact('paymentMethod'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'payment_title' => 'required|string|max:255|unique:payment_methods,payment_title,'.$id,
            'payment_description' => 'required',
            'payment_status' => 'required|numeric|in:0,1',
        ]);
        $paymentMethod = PaymentMethod::find($id);
        $paymentMethod->payment_title = $request->payment_title;
        $paymentMethod->payment_description = $request->payment_description;
        $paymentMethod->payment_status = $request->payment_status;
        $paymentMethod->save();
        return redirect()->route('admin.settings.payment-methods.index')->with('success', Lang::get('admin.Payment method updated successfully'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        $paymentMethod = PaymentMethod::find($id)->delete();
        return redirect()->route('admin.settings.payment-methods.index')->with('success', Lang::get('admin.Payment method deleted successfully'));

    }
}
