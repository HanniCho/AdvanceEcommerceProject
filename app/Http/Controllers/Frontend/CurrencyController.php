<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CurrencyController extends Controller
{
    public function USD()
    {
        session()->get('currency');
        session()->forget('currency');
        Session::put('currency','usd');
        return redirect()->back();
    }
    public function KYAT()
    {
        session()->get('currency');
        session()->forget('currency');
        Session::put('currency','kyat');
        return redirect()->back();
    }
}
