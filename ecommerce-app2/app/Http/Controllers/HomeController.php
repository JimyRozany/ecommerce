<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    // Show all products to anyone
    public function index()
    {
        $products = Product::latest()->paginate(2); 
        return view('home')->with('products' ,$products);
    }
    // Show one product to anyone
    public function showProduct(Product $product)
    {
        // return $product;
        return view('show' ,compact('product'));
    }

    // hadle search
    public function handleSearch(Request $request)
    {
        $search_key = $request->input('search_key');

        $results = Product::where('name' ,'like','%'. $search_key .'%')->
                    orWhere('description' ,'like','%'. $search_key .'%')->get();

        return view('search_result' ,compact('results' ,'search_key'));
    }
}
