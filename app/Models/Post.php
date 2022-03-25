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

    // query scope
    public function scopeFilter($query, array $filters)
    {
        // if request is of name search, refer _post-header.blade.php line 71
        $query->when($filters['search'] ?? false, function ($query, $search) {
            // find a post by the title or a word somewhere in the body
            $query->where('title', 'like', '%' . $search . '%')
                ->orwhere('body', 'like', '%' . $search . '%');
        });

        $query->when($filters['category'] ?? false, function ($query, $category) {
            // give me the posts where they have a category
            $query->whereHas('category', fn($query) => 
            // specifically where the category slug matches the user request
            $query->where('slug', $category));
        });

        $query->when($filters['author'] ?? false, function ($query, $author) {
            // give me the posts where they have a category
            $query->whereHas('author', fn($query) => 
            // specifically where the category slug matches the user request
            $query->where('username', $author));
        });
    }

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
