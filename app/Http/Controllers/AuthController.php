<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class AuthController extends Controller {
    public function login() {
        validator(request()->all(), [
            'email' => ['required', 'email'],
            'password' => ['required']
        ])->validate(); 

        if (auth()->attempt(request()->only('email', 'password'))) {
            return redirect('/logged-in');
        } else {
            return redirect()->back()->withErrors(['email' => 'Niepoprawne dane logowania']);
        }

    }
}