<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\AlbumsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\TopController;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard', ['title' => 'Dashboard']);
    })->name('dashboard');
    Route::resource('/dashboard/posts', DashboardPostController::class);
    Route::get('/dashboard/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/dashboard/profile/edit', [ProfileController::class, 'edit']);
});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login-process', [AuthController::class, 'login_process'])->name('login-process');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register-process', [AuthController::class, 'register_process'])->name('register-process');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index']);

Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/posts/{post:slug}', [PostController::class, 'show']);

Route::group(['prefix' => 'categories'], function () {
    Route::get('/', [CategoriesController::class, 'index']);

    Route::get('{category:slug}', function (Category $category) {
        $posts = $category->posts()->latest()->with('category')->paginate(9);
        return view('posts.category', [
            'posts' => $posts,
            'title' => $category->name,
            'category' => $category->name,
        ]);
    });
});





Route::fallback(function () {
    return view('error', ['title' => '404 Not Found']);
});
Route::get('/auth/redirect', [SocialController::class, 'redirect'])->name('google.redirect');
Route::get('/google/redirect', [SocialController::class, 'google_callback'])->name('google.callback');