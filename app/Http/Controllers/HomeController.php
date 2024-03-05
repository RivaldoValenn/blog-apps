<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $newest = Post::latest()->with('user')->take(1)->get();
        $post = Post::latest()->with('user')->skip(1)->take(6)->get();
        $title = 'Home';
        return view('home', compact('title', 'post', 'newest'));
    
    }
}