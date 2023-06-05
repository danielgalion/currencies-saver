<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthApiController extends Controller {
    public function login() {
        validator(request()->all(), ['email' => ['required', 'email'], 'password' => ['required']])->validate();

        $user = User::where('email', request('email'))->first();

        if (Hash::check(request('password'), $user->getAuthPassword())) {
            return [
                'token' => $user->createToken(time())->plainTextToken
            ];
        }
    }

    public function logout() {
        auth('sanctum')->user()->currentAccessToken()->delete();
    }
}