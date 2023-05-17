<?php

namespace App\Http\Controllers;



use App\Models\Product;
use Illuminate\Http\Request;

class StripePaymentController extends Controller
{
    public function checkout()
    {
        $line_items=[];

        $cart = auth()->user()->cart;

        foreach ($cart as $item){
           $product = Product::where('id' , $item->product_id)->first();
           $line_items[] = [
                'price_data' => [
                'currency' => 'usd',
                'product_data' => [
                    'name' => $product->name,
                ],
                'unit_amount' => $product->price * 100,
                ],
                'quantity' => $item->quantity,
 
            ];
        }

       
        
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $session = \Stripe\Checkout\Session::create([
            'line_items' => $line_items,
                'mode' => 'payment',
                'success_url' => route('checkout.success'),
                'cancel_url' => route('checkout.cancel'),

                ]);
        

        return redirect($session->url);
      
    }

    public function success()
    {
        return "Checkout Success";
    }

    public function cancel()
    {
        return "<h1>Checkout cancel</h1>";
    }

    
}
