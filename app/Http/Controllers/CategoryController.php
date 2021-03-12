<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller

{

    public function index() 
    {
        
        $categories = Category::all();
        //dd($products);

        return view('categories.index',compact('categories'));
    }

    public function create() 
    {
    
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        Category::create($input);
        return redirect('/category');
    }
}
