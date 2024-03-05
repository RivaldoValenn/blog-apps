<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login',[
            'title' => 'Login'
        ]);
    }
    public function login_process(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:6'
        ]);


        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->route('home')->with('success', 'Welcome Back! ' . Auth::user()->name);
        }
        return back()->with('failed', 'Invalid Email or Password');
    }
    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/home');
    }
    public function register()
    {
        $title = "Register";
        return view('auth.register', compact('title'));
    }
    public function register_process(Request $request){
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:6',
            'username' => 'required|unique:users|min:6',
            // 'confirm_password' => 'required|same:password'
        ]);

        $data['password'] = Hash::make($data['password']);  

        User::create($data);
        
        return redirect()->route('login')->with('success', "Register Successfully!");
    }
}