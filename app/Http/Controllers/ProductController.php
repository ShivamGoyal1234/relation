<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use  App\Product;
use Illuminate\Support\Facades\Input;

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

    public function edit($product)
    {
        $categories = Category::all();
        $product = Product::find($product);
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request,$product)
    {
        $input = $request->all();

        $product = Product::find($product);
        $product->title = $input['title'];
        $product->price = $input['price'];
        $product->category_id = $input['category_id'];

        $product->save();
        return redirect('/');
    }

    public function delete($product)
    {
        Product::find($product)->delete();
        return redirect('/');
    }
}
