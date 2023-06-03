<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class AuthController extends Controller {
    public function login() {
         return $this->validateLogin();
    }

    private function validateLogin() {
        validator(request()->all(), [
            'email' => ['required', 'email'],
            'password' => ['required']
        ])->validate(); 

        if (auth()->attempt(request()->only('email', 'password'), request()->filled('remember'))) {
            return redirect('/logged-in');
        } else {
            return redirect()->back()->withErrors(['email' => 'Niepoprawne dane logowania']);
        }
    }

    public function logout() {
        auth()->logout();

        return redirect('/');
    }
}