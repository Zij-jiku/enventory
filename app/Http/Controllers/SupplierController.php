<?php

namespace App\Http\Controllers;

use App\Supplier;
use Carbon\Carbon;
use Image;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.supplier.index');
    }

    public function suppliersview()
    {
        return view('admin.supplier.show',[
            'supplier_info' => Supplier::all(),
            'total_suppliers' => Supplier::count(),
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
            'email' => 'required|unique:suppliers,email',
            'phone' => 'required',
            'shopname' => 'required',
            'type' => 'required',
            // 'bank_name' => 'required',
            // 'bank_branch' => 'required',
            // 'account_holder' => 'required',
            // 'account_number' => 'required',
            'address' => 'required',
            'city' => 'required',
            'supplier_photo' => 'required',
          ]);
  
          $customer_id = Supplier::insertGetId($request->except('_token' , 'supplier_photo') + [
            'created_at' => Carbon::now(),
          ]);
          if($request->hasFile('supplier_photo')){
            $uploded_photo = $request->file('supplier_photo');
            $new_photo_name = $customer_id.'.'.$uploded_photo->getClientOriginalExtension();
            $new_photo_location = 'public/uploads/supplier_photos/'.$new_photo_name;
            Image::make($uploded_photo)->resize(128,128)->save(base_path($new_photo_location) , 70);
            Supplier::find($customer_id)->update([
              'supplier_photo' => $new_photo_name
            ]);
          }
          return back()->with('success_status',$request->name.' Supplier Insert SuccessFully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        //
    }
}
