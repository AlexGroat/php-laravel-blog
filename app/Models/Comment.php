<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Comment extends Model
{
    use HasFactory;

    public function post() // name of method important
    // laravel thinks foreign key is probably post_id
    {
        return $this->belongsTo(Post::class);
    
    }

    public function author() // whereas here laravel will think the 
    // foreign key is author_id
    {
        return $this->belongsTo(User::class, 'user_id');
    
    }
}
