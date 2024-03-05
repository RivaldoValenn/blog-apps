<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class LikesController extends Controller
{
    public function like(Post $post){
      $liker = auth()->user();
      $liker->likes()->attach($post->slug);
      return back();
    }
    public function dislike(){
        
    }
}