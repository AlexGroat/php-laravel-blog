<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        // returns the request in json format
        //    return request()->all();

        // laravel takes the existing attributes in the request and
        // validate them
        // VALIDATE USER
        $attributes = request()->validate([
            'name' => ['required', 'max:255'],
            // unique in the users table inside the username column
            'username' => ['required', 'min:3', 'max:255' ,'unique:users,username'],
            // unique email in the users table inside the email column
            'email' => ['required', 'email',  'max:255', 'unique:users,email'],
            'password' => ['required', 'min:7', 'max:255'],
        ]);

        // one way to encrypt the users password on creation
        // $attributes['password'] = bcrypt($attributes['password']);

        // CREATE VALIDATED USER
        User::create($attributes);

        return redirect('/');
    }
}
