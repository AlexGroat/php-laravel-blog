<?php

// illuminate is the namespace laravel choose to put their code in

use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\User;
use App\Models\Post;
use Illuminate\Support\Facades\Route;


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
// path to a controller and the name of the controller action
Route::get('/', [PostController::class, 'index']);

// // capture the id as a wildcard, id is passed to callback function $id, then sent to find method inside App\Method\Post model
// Route::get('posts/{post}', function ($id) {
//     $post = Post::find($id);

//     // find a post by its slug and pass it to a view called post
//     return view('post', [
//         'post' => $post
//     ]);
// });

// ROUTE MODEL BINDING
// binding route key to an underlying eloquent model
// wildcard name and slug must match with variable name and slug
Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::get('categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'posts' => $category->posts,
        // key value pair with category
        'currentCategory' => $category,
        'categories' => Category::all()
    ]);
});

Route::get('authors/{author:username}', function (User $author) {
    return view('posts', [
        'posts' => $author->posts,
        'categories' => Category::all()
    ]);
});
