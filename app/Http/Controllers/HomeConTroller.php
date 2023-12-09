<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeConTroller extends Controller
{
    public function index() {
        $product = DB::table('products')-> get();
        return view('home.index', compact('product'));
    }
}
