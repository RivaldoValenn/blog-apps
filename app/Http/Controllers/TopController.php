<?php

namespace App\Http\Controllers;

use App\Models\Post;

class TopController extends Controller
{
    public function index()
    {
        // Mendapatkan semua pengguna dengan jumlah postingan, diurutkan dari paling banyak hingga paling sedikit
        // $usersWithPostCount = User::withPostCount()->get();
        // $categoriesWithPostCount = Category::WithPostsCount()->get();

        // Lakukan sesuatu dengan data pengguna yang memiliki postingan paling banyak
        // ...
        $title = "Top Posts";
        $topPosts = Post::orderByLikeCount()->take(4)->get();
        return view('top-posts', compact('title', 'topPosts'));
    }
}