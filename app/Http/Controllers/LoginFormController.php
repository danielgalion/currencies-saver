<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller;

class LoginFormController extends Controller {
    public function needToLogin() {
        if (auth()->user()) {
            return redirect('logged-in');
        } else {
            return view('welcome');
        }
    }
}