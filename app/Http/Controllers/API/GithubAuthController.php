<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;



class GithubAuthController extends Controller
{
    //

    public function redirectToProvider(){
        return Socialite::driver('github')->redirect();
    }

    public function handleCallback(){
        $githubUser = Socialite::driver('github')->user();
    
        $user = User::updateOrCreate(
            [
                'github_id' => $githubUser->getId(),
            ],
            [
                'email' => $githubUser->getEmail(),
                'name' => $githubUser->getName(),
                'fecha_alta' => date('Y-m-d H:i:s'),
            ],
        );
    
        // Login
        auth()->login($user,true);
    
        // Redirect
        return redirect()->route('tareas.index');
    }
}
