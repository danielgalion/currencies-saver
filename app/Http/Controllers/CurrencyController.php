<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller {
    public function add(Request $request) { 
        Currency::insertExchangeRate($request->code, $request->amount);

        return response('OK', 200);
        // return view('loggedIn');
    }
}