<?php

namespace App\Http\Controllers;

use App\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.setting.index');
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
            'company_name' => 'required',
            'company_email' => 'required|unique:employees,email',
            'company_phone' => 'required',
            'company_mobile' => 'required',
            'company_city' => 'required',
            'company_country' => 'required',
            'company_zipcode' => 'required',
            'company_logo' => 'required',
            'company_address' => 'required',
          ]);
  
          $company_id = Setting::insertGetId($request->except('_token' , 'company_logo') + [
            'created_at' => Carbon::now(),
          ]);

          if($request->hasFile('company_logo')){
            $uploded_photo = $request->file('company_logo');
            $new_photo_name = $company_id.'.'.$uploded_photo->getClientOriginalExtension();
            $new_photo_location = 'public/uploads/company_photos/'.$new_photo_name;
            Image::make($uploded_photo)->resize(128,128)->save(base_path($new_photo_location) , 70);
            Setting::find($company_id)->update([
              'company_logo' => $new_photo_name
            ]);
          }
          return back()->with('success_status','Company Insert SuccessFully!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
