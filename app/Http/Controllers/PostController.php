<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            // pass it to the view
            // passes throught with the selected categories
            // sort accordingly to latest post published and the input of the search bar 
            // with query string, adds all current query string values to the paginator
            'posts' => Post::latest()->filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString()

        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post

        ]);
    }

    public function create()
    {


        return view('posts.create');
    }

    public function store()
    {
 
        $attributes = request()->validate([
            'title' => 'required',
            'thumbnail' => 'required|image',
            // this slug should be unique
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'excerpt' => 'required',
            'body' => 'required',
            // this ID should exist on the categories table, specifically the id column
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        // append the user id to the attributes afterward
        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        Post::create($attributes);

        return redirect('/');
    }
}


// eloquent model, controller, routes renders view

// 7 restful actions: index, show, create, store, edit, update, destroy