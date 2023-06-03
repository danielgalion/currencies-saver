<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller {
    public function add(Request $request) { 
        Currency::insertExchangeRate($request->code, $request->amount);
// @todo require auth to get or set data
        return response('OK', 200);
        // return view('loggedIn');
    }
}