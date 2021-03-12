<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use  App\Product;
class ProductController extends Controller

{

    public function index() 
    {
        
        $products = Product::with('category')->get();
        //dd($products);

        return view('Welcome',compact('products'));
    }

    public function create() 
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        Product::create($input);
        return redirect('/');
    }
}
