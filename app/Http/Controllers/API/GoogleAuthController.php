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
    
        $user = User::updateOrCreate(
            [
                'google_id' => $googleUser->getId(),
            ],
            [
                'email' => $googleUser->getEmail(),
                'name' => $googleUser->getName(),
                'fecha_alta' => date('Y-m-d H:i:s'),
            ],
        );
    
        // Login
        auth()->login($user,true);
    
        // Redirect
        return redirect()->route('tareas.index');
    }
}
