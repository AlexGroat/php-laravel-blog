<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // search post by latest
        $posts = Post::latest();
        // if request is of name search, refer _post-header.blade.php line 68
        if (request('search')) {
            // find a post by the title or a word somewhere in the body
            $posts->where('title', 'like', '%' . request('search') . '%')
                ->orwhere('body', 'like', '%' . request('search') . '%');
        }

        return view('posts', [
            // pass it to the view
            // passes throught with the selected categories
            // sort accordingly to latest post published
            'posts' => $posts->get(),
            'categories' => Category::all()
        ]);
    }

    public function show()
    {
    }
}


// model, controller, routes renders view