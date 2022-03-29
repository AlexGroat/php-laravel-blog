<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use \Illuminate\Validation\ValidationException;
use App\Services\Newsletter;

class NewsLetterController extends Controller
{
    public function __invoke(Newsletter $newsletter)
    {
        request()->validate(['email' => 'required|email']);

        try {
            // new newsletter references the newsletter service located in the service folder
            $newsletter->subscribe(request('email'));
        } catch (Exception $e) {
            throw ValidationException::withMessages([
                'email' => 'This email could not be added to our newsletter list'
            ]);
        }

        return redirect('/')->with('success', 'You are signed up for our newsletter.');
    }
}
