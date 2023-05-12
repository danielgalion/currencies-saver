<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::namespace('App\Http\Controllers')->group(function () {
    Route::post('/login', 'AuthController@login');
});

Route::get('logged-in', function () {
    return view('loggedIn');
});

Route::get('/', function () {
    return view('welcome');
})->name('main');
