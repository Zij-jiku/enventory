<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Image;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.customer.index');
    }

    public function customersview()
    {
      return view('admin.customer.show',[
        'customer_info' => Customer::all(),
        'total_customers' => Customer::count(),
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
          'name' => 'required',
          'email' => 'required|unique:employees,email',
          'phone' => 'required',
          'shopname' => 'required',
          // 'bank_name' => 'required',
          // 'bank_branch' => 'required',
          // 'account_holder' => 'required',
          // 'account_number' => 'required',
          'address' => 'required',
          'city' => 'required',
          'customer_photo' => 'required',
        ]);

        $customer_id = Customer::insertGetId($request->except('_token' , 'customer_photo') + [
          'created_at' => Carbon::now(),
        ]);
        if($request->hasFile('customer_photo')){
          $uploded_photo = $request->file('customer_photo');
          $new_photo_name = $customer_id.'.'.$uploded_photo->getClientOriginalExtension();
          $new_photo_location = 'public/uploads/customer_photos/'.$new_photo_name;
          Image::make($uploded_photo)->resize(128,128)->save(base_path($new_photo_location) , 70);
          Customer::find($customer_id)->update([
            'customer_photo' => $new_photo_name
          ]);
        }
        return back()->with('success_status',$request->name.' Customer Insert SuccessFully!!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
