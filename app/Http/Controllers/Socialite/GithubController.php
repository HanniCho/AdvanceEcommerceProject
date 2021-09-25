<?php

namespace App\Http\Controllers\Socialite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Socialite;
use Auth;
use Exception;
use App\Models\User;

class GithubController extends Controller
{
    public function redirectToGithub()
    {
        return Socialite::driver('github')->redirect();
    }
       
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleCallback()
    {
        try {
     
            $user = Socialite::driver('github')->user();
      
            $finduser = User::where('social_id', $user->id)->first();
      
            if($finduser){
      
                Auth::login($finduser);
     
                return redirect('/');
      
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'social_id'=> $user->id,
                    'social_type'=> 'github',
                    'password' => encrypt('password')
                ]);
     
                Auth::login($newUser);
      
                return redirect('/');
            }
     
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
