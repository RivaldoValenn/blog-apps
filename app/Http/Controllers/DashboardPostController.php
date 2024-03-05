<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dashboard()
    {
        $title = 'Dashboard';
        return view('dashboard', compact('title'));
    }
    public function index()
    {
        return view('dashboard.posts.index', [
            'title' => 'Manages Posts',
            'posts' => Post::where('user_id', auth()->user()->id)->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Post $post)
    {
        $categories = Category::all();
        $title = 'Add Post';
        return view('dashboard.posts.create', compact('title', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'image' => 'image|file|max:1024',
            'category_id' => 'required',
            'body' => 'required'
        ]);


        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('post-images');
        }
        $validatedData['user_id'] = auth()->user()->id;
        Post::create($validatedData);

        return redirect('/dashboard/posts')->with('success', 'New post has been added!');
    }

    /** 
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        // return dd($post);
        return view('dashboard.posts.show', [
            'title' => 'Manages',
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'title' => 'Edit Post',
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $rules = [
            'title' => 'required|max:255',
            'category_id' => 'required',
            'body' => 'required',
            'image' => 'image|file|max:1024'
        ];
        
        if ($request->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }
    
        // Hanya memvalidasi data jika ada file gambar yang diunggah
        if ($request->file('image')) {
            $validatedData = $request->validate($rules);
    
            // Hapus gambar lama jika ada
            if ($post->image) {
                Storage::delete($post->image);
            }
    
            $validatedData['image'] = $request->file('image')->store('post-images');
        } else {
            $validatedData = $request->validate(Arr::except($rules, 'image'));
        }
    
        // Tambahkan user_id ke dalam $validatedData
        $validatedData['user_id'] = auth()->user()->id;
    
        // Perbarui post dengan data yang sudah divalidasi
        $post->update($validatedData);
    
        return redirect('/dashboard/posts')->with('success', 'Post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->image) {
            Storage::delete($post->image);
        }
        Post::destroy($post->id);
        return redirect('/dashboard/posts')->with('success', 'Post has been deleted!');
    }

    public function generateSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
    public function album(){
        return view('album.index');
    }
}