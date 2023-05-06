<?php

namespace App\Http\Controllers\Seller\Product;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    // Get all products from the seller
    public function index()
    {
        $seller = auth('seller')->user();
        
        $allProducts = $seller->products;
        return view('seller/product/show_all' ,compact('allProducts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('seller.product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // validation 
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'quantity' => 'required|numeric',
            'status' => 'required',
            'price' => 'required|numeric',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:3072',
        ]);

        //handle image 
        $newImageName = time() . '.' . $request->file('product_image')->getClientOriginalExtension();
        $request->file('product_image')->move(public_path('seller/image/product/') ,$newImageName);

        // store data in table 

        $product = Product::create([
            'seller_id' => auth('seller')->id(),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'quantity' => $request->input('quantity'),
            'status' => $request->input('status'),
            'price' => $request->input('price'),
            'image_path' => 'seller/image/product/' . $newImageName ,

        ]);
        return back()->with('success' ,'Product added successfully');

       
    }

    // show one product
    public function show(Product $product)
    {
        return view('seller/product/show' ,compact('product'));
    }

    // get edit form 
    public function edit(Product $product)
    {
        return view('seller/product/edit',compact('product'));
    }

    // update product
    public function update(Request $request ,Product $product)
    {
        // check seller 
        if(auth('seller')->id() == $product->seller_id)
        {
            
            // validation 
            $request->validate([
                'name' => 'nullable',
                'description' => 'nullable',
                'quantity' => 'nullable|numeric',
                'status' => 'nullable',
                'price' => 'nullable|numeric',
                'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:3072',
            ]);

            $product->update([
                'name' => $request->input('name') ? $request->input('name') : $product->name,
                'description' => $request->input('description') ? $request->input('description') : $product->description,
                'quantity' => $request->input('quantity') ? $request->input('quantity') : $product->quantity,
                'status' => $request->input('status') ? $request->input('status') : $product->status,
                'price' => $request->input('price') ? $request->input('price') : $product->price,
            ]);

            if($request->file('product_image'))
            {
                // remove old image 
                if(File::exists($product->image_path)) {
                    File::delete($product->image_path);
                }

                // handle new image 
                $newImageName = time() . '.' . $request->file('product_image')->getClientOriginalExtension();
                $request->file('product_image')->move(public_path('seller/image/product/') ,$newImageName);
                
                $product->update([
                    'image_path' => 'seller/image/product/' . $newImageName ,
                ]);
            }

            return redirect(route('product.index'))->with('success' , 'product updated successfully');

        }else{
            return redirect(route('seller_dashboard'));
        }
    }

    /**
     * Remove the specified resource from storage.
    */
   
    public function destroy(Product $product)
    {
        // remove old image 
        if(File::exists($product->image_path)) {
            File::delete($product->image_path);
        }

        $product->delete();
        return back()->with('deleted' , 'product deleted successfully');
    }
}
