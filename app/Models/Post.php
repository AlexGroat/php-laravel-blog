<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // mitigate mass assignment vulnerabilities

    // exclude this from the fillable property

    protected $guarded = [];

    
    // Eager loading: you do everything when asked. Classic example is when you multiply two matrices. 
    // You do all the calculations. That's eager loading;
    // Lazy loading: you only do a calculation when required. In the previous example, you don't do 
    // any calculations until you access an element of the result matrix; and
    // Over-eager loading: this is where you try and anticipate what the user will ask for and preload it.
    // eager loading by default for every post query

    protected $with = ['category', 'author'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    // explicitly fill only these
    // protected $fillable = ['title', 'excerpt', 'body'];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    
    }
}
