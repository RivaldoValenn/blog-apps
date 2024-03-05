<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $searchTerm = [
            'search' => request('search'),
            'category' => request('category'),
            'author' => request('author'),
        ];
    
        $posts = Post::with(['category', 'user'])
            ->search($searchTerm)
            ->latest()
            ->paginate(9)
            ->withQueryString();
    
        $title = 'All Posts';

        if (request('search')) {
            $title = 'Search results for : ' . request('search');
        }

        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $title = 'Category : ' . $category->name;
        }

        if (request('author')) {
            $author = User::firstWhere('username', request('author'));
            $title = 'Posted by ' . $author->name;
        }
        return view('posts', [
            "title" => $title,
            "posts" => $posts
        ]);
    }
    public function show(Post $post){
        // if ($post->canIncrementView()) {
        //     $post->increment('views');
        // }
        $post = Post::where('slug', $post->slug)->first();
        $post->increment('views');
        return view('posts.post', [
            'post' => $post,
            'title' => $post->title
        ]);
    }    
}