<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Product;
class ProductController extends Controller

{

    public function index() 
    {
        
        $products = Product::with('category')->get();
        // dd($products);

        return view('Welcome',compact('products'));
    }
}