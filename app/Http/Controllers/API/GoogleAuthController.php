<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;



class GoogleAuthController extends Controller
{
    //

    public function redirectToProvider(){
        return Socialite::driver('google')->redirect();
    }

    public function handleCallback(){
        $googleUser = Socialite::driver('google')->user();
    
        $user = User::firstOrCreate(
            [
                'google_id' => $googleUser->getId(),
            ],
            [
                'email' => $googleUser->getEmail(),
                'name' => $googleUser->getName(),
            ],
        );
    
        // Login
        auth()->login($user,true);
    
        // Redirect
        return redirect()->route('tareas.index');
    }
}
