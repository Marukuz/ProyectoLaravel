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
    
        $user = User::firstOrCreate(
            [
                'github_id' => $githubUser->getId(),
            ],
            [
                'email' => $githubUser->getEmail(),
                'name' => $githubUser->getName(),
            ],
        );
    
        // Login
        auth()->login($user,true);
    
        // Redirect
        return redirect()->route('tareas.index');
    }
}
