<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            // pass it to the view
            // passes throught with the selected categories
            // sort accordingly to latest post published and the input of the search bar 
            'posts' => Post::latest()->filter(request(['search', 'category']))->get()

        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post

        ]);
    }
}


// eloquent model, controller, routes renders view