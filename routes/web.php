<?php

// use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Categories\Categories;
use App\Http\Livewire\Categories\Categoryposts;
use App\Http\Livewire\Posts\Posts;
use App\Http\Livewire\Posts\Post as p;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/users', function () {
//     return view('users');
// });

Route::get('test',function(){
    // $category = App\Models\Category::find(1);

    // return $category->Posts;
    // $comment = App\Models\Comment::find(1);
    // return $comment->author;
    // return $comment->post;
    $post = App\Models\Post::find(2);
    // return $post->category;
    // return $post->author;
    // return $post->images;
    // return $post->comments;
    // return $post->tag;
    $tag = App\Models\Tag::find(1);
    return $tag->Posts;
    // $author = App\Models\User::find(10);
    // return $author->posts;
    // return $author->comments;
});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
