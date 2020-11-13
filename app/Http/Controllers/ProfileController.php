<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ChangePasswordMail;
use Carbon\Carbon;
use App\User;
use Auth;
use Hash;
use Image;
use Mail;


class ProfileController extends Controller
{
    function profilename()
    {
      return view('admin.profile.index');
    }
    function profileinsert(Request $request)
    {
      $request->validate([
        'name' => 'required|alpha'
      ]);

      if(Auth::user()->updated_at->addDays(30) < Carbon::now()){
        User::find(Auth::id())->update([
          'name' => $request->name,
      ]);
      return back()->with('name_change' , 'You Name Change');
      }
      else {
        $days = Carbon::now()->diffInDays(Auth::user()->updated_at->addDays(30)) + 1;
        return back()->with('days_status' , 'You Can not Change Before '.$days.' days');
      }
    }
    function profileeditpassword(Request $request)
    {
      $request->validate([
        'password' => 'confirmed|min:8|alpha_num'
      ]);
      if (Hash::check($request->old_password, Auth::user()->password)) {
        if($request->old_password == $request->password){
          return back()->with('old_pass_status' , 'It is Your Old Password');
        }
        else {
          User::find(Auth::id())->update([
            'password' => Hash::make( $request->password)
          ]);
           Mail::to(Auth::User()->email)->send(new ChangePasswordMail(Auth::User()->name));
           return back()->with('password_status' , 'Your Password Change');
        }
      }
      else {
        return back()->with('pass_milenai_status' , 'Your Password dose not match');
      }
    }
    function profileimageupload(Request $request)
    {

      $request->validate([
        'profile_image' => 'required|image'
      ]);

      if($request->hasFile('profile_image')){
        if(Auth::user()->profile_image != 'default.jpg'){
          // delete photo
          $old_location = 'public/uploads/profile_photos/'.Auth::user()->profile_image;
          unlink(base_path($old_location));
        }
        $uploded_photo = $request->file('profile_image');
        $new_photo_name = Auth::id().'.'.$uploded_photo->getClientOriginalExtension();
        $new_photo_location = 'public/uploads/profile_photos/'.$new_photo_name;
        Image::make($uploded_photo)->resize(128,128)->save(base_path($new_photo_location) , 40);
        User::find(Auth::id())->update([
          'profile_image' => $new_photo_name
        ]);
        return back()->with('photo_success' , 'Profile Image Upload Successfully!');
      }
      else {
        return back()->with('photo_status' , 'Please Into your Photo');
      }


    }
}
