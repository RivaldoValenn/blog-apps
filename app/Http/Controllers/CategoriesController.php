<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(){
        $title = "Categories";
        $categories = Category::latest()->paginate(6);
        return view('category.categories', compact('title', 'categories'));
    }
}