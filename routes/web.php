<?php

// illuminate is the namespace laravel choose to put their code in

use App\Http\Controllers\NewsLetterController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\PostCommentsController;
use Illuminate\Support\Facades\Route;

// path to a controller and the name of the controller action
Route::get('/', [PostController::class, 'index']);

// ROUTE MODEL BINDING
// binding route key to an underlying eloquent model
// wildcard name and slug must match with variable name and slug
Route::get('posts/{post:slug}', [PostController::class, 'show']);

// guest middleware allows non logged in users access to these specific routes
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
// create user with create blade using the store function in the register
// controller
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');

// inject Newsletter instance
// automatic resolution
Route::post('newsletter', NewsLetterController::class);

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');

Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

// must be authenticated to reach this endpoint
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

// SECOND ARG IN ROUTE ARRAY IS REFERENCE TO METHOD INSIDE CONTROLLER!!!!!
// can admin, route middleware located in the kernel.php file
// group admin routes
Route::middleware('can:admit')->group(function () {
    Route::resource('admin/posts', AdminPostController::class);
    Route::get('admin/posts/create', [AdminPostController::class, 'create']);
    Route::get('admin/posts', [AdminPostController::class, 'index']);
    Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit']);
    Route::patch('admin/posts/{post}', [AdminPostController::class, 'update']);
    Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy']);
    Route::post('admin/posts/', [AdminPostController::class, 'store']);
});

// 7 resourceful controllers: index, create, edit, destroy, show, store, update