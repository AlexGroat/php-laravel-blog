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
        $userattributes = request()->validate([
            'name' => ['required', 'max:255'],
            'username' => ['required', 'max:255'],
            'email' => ['required', 'email',  'max:255'],
            'password' => ['required', 'min:7', 'max:255'],
        ]);

        // CREATE VALIDATED USER
        User::create($userattributes);

        return redirect('/');
    }
}
