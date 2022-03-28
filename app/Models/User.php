<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // include these fields in the register user
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // accessor
    public function getUsernameAttirbute($username)
    {
       return ucwords($username); // echo on page, will return username with
       // capital letter 
    }

    // mutator
    public function setPasswordAttribute($password)
    {
        // mutator, // refer register controller line 23
        $this->attributes['password'] = bcrypt($password);    
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    
    }
}
