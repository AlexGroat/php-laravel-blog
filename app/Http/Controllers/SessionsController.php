<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function store()
    {

        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt($attributes)) {

            // return back()
            //     ->withInput()
            //     ->withErrors([
            //         'email' => 'Your provided credentials could not be verified.'
            //     ]);


            // short version of lines 24-28
            throw ValidationException::withMessages([
                'email' => 'Your provided credentials could not be verified.'
            ]);
        }

        // regenerate users session to protect against session fixation
        session()->regenerate();

        return redirect('/')->with('success', 'Welcome Back!');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye');
    }
}
