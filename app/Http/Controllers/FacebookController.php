<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
     /**
    * Redirect the user to the Facebook authentication page.
    *
    * @return \Illuminate\Http\Response
    */
   public function redirectToProvider()
   {
       return Socialite::driver('facebook')->redirect();
   }

   /**
    * Obtain the user information from Facebook.
    *
    * @return \Illuminate\Http\Response
    */
   public function handleProviderCallback()
   {
       $user = Socialite::driver('facebook')->user();
       // $user->token;
       
       if(!User::where('email' , $user->getEmail())->exists()){
         User::insert([
           'name' => $user->getNickname(),
           'email' => $user->getEmail(),
           'password' => Hash::make('abcd@1234'),
           'created_at' => Carbon::now(),
         ]);
       }
       if (Auth::attempt(['email' => $user->getEmail(), 'password' => 'abcd@1234'])) {
         return redirect('/home');
       }
     }
}
