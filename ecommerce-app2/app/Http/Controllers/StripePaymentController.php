<?php

namespace App\Http\Controllers;



use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;



class StripePaymentController extends Controller
{
    
    public function checkout(Request $request)
    {
        // validation 
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'line_1' => 'required',
            'line_2' => 'nullable',
            'province' => 'required',
            'city' => 'required',
            'phone_1' => 'required|numeric',
            'phone_2' => 'nullable|numeric',
        ]);
       
         
        $line_items=[];
        $total_price = 0;

        $cart = auth()->user()->cart;

        foreach ($cart as $item){

           $product = Product::where('id' , $item->product_id)->first();
           $total_price += $product->price * $item->quantity;
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
        
        $this->createOrder($total_price , $request);

        return redirect($session->url);
      
    }

    public function success()
    { 
         // delete cart 
         $cart = auth()->user()->cart;
         foreach ($cart as $item){
             $item->delete();
         }

         $orders = auth()->user()->orders;
        //  $latest_order = $orders->latest()->first();
        foreach ($orders as $order){
            $latest_order = $order->orderBy('created_at','desc')->first();
        }
         $latest_order->status = 'paid';
         $latest_order->save();

         Alert::success('success' ,"payment successfully");
        return redirect(route('cart'));
    }

    public function cancel()
    {
        // delete order because checkout is canceled
        $oreder = auth()->user()->orders;
        foreach ($oreder as $order){
            if($order->status == 'unpaid'){
                $order->delete();
            }
        }
        Alert::error('failed' ,"Payment canceled");
        return redirect(route('cart'));
    }

    public function createOrder($total_price ,$request )
    {
        // dd($request->input());
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'total_price' => $total_price,
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'line_1' => $request->input('line_1'),
            'line_2' => $request->input('line_2'),
            'province' => $request->input('province'),
            'city' => $request->input('city'),
            'phone_1' => $request->input('phone_1'),
            'phone_2' => $request->input('phone_2'),
            'status' => 'unpaid',

        ]);
    }

   

    
}
