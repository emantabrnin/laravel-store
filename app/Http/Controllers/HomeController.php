<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $products = Product::active()->limit(8)->get();
        return View('front.home',compact('products'));
    }
}
