<?php

namespace App\Http\Controllers\User;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function index()
    {
        $totalPrice = 0 ;

        $user = auth()->user();
        $cart = $user->cart;

        $productsCart =[];

        foreach ($cart as $item)
        {
            // Calculate the total price & set all products in array 
        
            $product = Product::find($item->product_id);
            $totalPrice += $product->price * $item->quantity;

            array_push($productsCart ,$product);
        }
        // $totalPrice = 
        // dd($totalPrice);
        
        return view('user/cart' , compact('cart','productsCart' ,'totalPrice'));
    }

    public function addToCart(Product $product)
    {
        // add item to cart 
        $cart = Cart::where('product_id', $product->id)->where('user_id' , auth('user')->id())->first();
        // dd($cart);
        if ($cart) {
            $cart->quantity += 1;
            $cart->save();
        } else {
            Cart::create([
                'user_id' => auth()->user()->id,
                'product_id' => $product->id,
                'quantity' => 1,
            ]);
        }
        return redirect()->back();
        
    }
    public function changeQuantity(Request $request)
    {
        // dd($request->input());
        $user = auth()->user();
        $cart = $user->cart;
        $cartItem = $cart->where("product_id",$request->product_id)->first();
        $cartItem->quantity = $request->quantity;
        $cartItem->save();
        return redirect()->back();
        
    }
    public function removeItem($cart_id)
    {
        // dd($cart_id);
        $cart = Cart::where('id', $cart_id)->first();
        if(auth()->user()->id == $cart->user_id)
        {
            $cart->delete();
        }
        return redirect()->back();
    }
   
}
