<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function index(){
        $currency=Currency::get();
        
        return view('admin.currency.index',compact('currency'));
    }

    public function create()
    {
        return view('admin.currency.add');
    }

}
