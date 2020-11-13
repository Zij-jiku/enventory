<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class GithubController extends Controller
{
  /**
    * Redirect the user to the GitHub authentication page.
    *
    * @return \Illuminate\Http\Response
    */
   public function redirectToProvider()
   {
       return Socialite::driver('github')->redirect();
   }

   /**
    * Obtain the user information from GitHub.
    *
    * @return \Illuminate\Http\Response
    */
   public function handleProviderCallback()
   {
       $user = Socialite::driver('github')->user();
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
