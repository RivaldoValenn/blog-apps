<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
class SocialController extends Controller
{
    public function redirect(){
        return Socialite::driver('google')->redirect();
    }
    public function google_callback()
{
    // Mendapatkan data pengguna dari Google

    $googleUser = Socialite::driver('google')->user();

    $user = User::where('email', $googleUser->email)->first();

    if ($user) {
        auth()->login($user);
        return redirect()->route('home')->with('success', 'Welcome Back! ' . $user->name);
    } else {
        $newUser = User::create([
            'password' => bcrypt(Str::random(10)),
            'username' => $googleUser->name,
            'name' => $googleUser->name,
            'avatar' => $googleUser->avatar,
            'email' => $googleUser->email
        ]);

        if ($newUser) {
            auth()->login($newUser);    
            return redirect()->route('home')->with('success', 'Welcome ' . $newUser->name);
        } else {
            return redirect('/login');
        }
    }
}

    
}