@extends('layouts.app2')

@section('content')

<div class="container py-5">
    <a href="{{ url()->previous() }}"
        class="text-decoration-none text-dark fw-bold" >

        <i class="fa-solid fa-arrow-left"></i>
        Back
    </a>
    <hr>

    @if ($cart->isEmpty())
    
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-info">
                    <p class="my-5">
                        You have nothing in your cart.
                    </p>
                </div>
            </div>
        </div>
        @else
        <div class="row">
            <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    {{-- {{ dd($productsCart) }} --}}
                    @foreach ($productsCart as $item)
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="card-title">
                                {{ $item->name }}
                            </h4>
                            <span>price: $ {{ $item->price }}</span>
                            <form action="{{ route('change.quantity') }}" method="POST">
                                @csrf
                                
                                <div class="form-group d-flex  ">
                                    {{-- select quantity --}}
                                    @foreach ($cart as $cartItem)
                                        @if ($cartItem->product_id == $item->id)
                                            <input 
                                                style="width: 80px; height: 40px;"
                                                class="form-control me-2"
                                                type="number"
                                                value="{{ $cartItem->quantity}}" 
                                                name="quantity" >

                                            <input 
                                                type="hidden" 
                                                name="product_id" 
                                                value="{{ $item->id }}">
                                            

                                        @endif

                                    @endforeach
                                    <button class="btn btn-secondary">change</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-6">
                            <div class="card-img">
                                <img 
                                    class="rounded" 
                                    src="{{ asset($item->image_path)}}" 
                                    width="200px" 
                                    height="150px" />
                            </div>
                        </div>
                    </div>
                    @foreach ($cart as $cartItem)
                        @if ($cartItem->product_id == $item->id)
                            <a href="{{ route('remove.item.cart' ,$cartItem->id) }}" class="btn btn-outline-danger">Remove</a>
                        @endif
                    @endforeach

                    <hr class="py-3 ">
                    @endforeach
                  
                    <div class="d-flex justify-content-between align-items-center">
                        <strong>total Price : $  {{ $totalPrice }}</strong>
                        <div class="btn btn-outline-success">
                            <a href="{{ route('checkout') }}">Ckeckout</a>
                            {{-- <form action="{{ route('checkout')}}" method="post" data-stripe-publishable-key = "{{ env('STRIPE_KEY') }}">
                                @csrf
                                <input type="hidden" value="{{ $productsCart }}" name="productsCart">
                                <button>Checkout</button>
                            </form> --}}
                        </div>
                    </div>
                    <hr class="py-3 ">   
                </div>
            </div>   
        </div>

        
    @endif
 

   


    {{-- <table class="table">
        <tbody>
            @if ( $results->isEmpty() )
                <tr>
                    <td> no results </td>
                </tr>
                    
                @else
                    @foreach ($results as $item)
                        <tr>
                            <td ><img src="{{ asset($item->image_path) }}" class="img-fluid rounded"  width="200px"></td>
                            <td class="h5">{{ $item->name }}</td>
                            <td class="w-25">
                                @if(Str::length($item->description) > 100 )
                                {{ Str::substr($item->description, 0, 100) . " ... "}}
                                @else
                                {{ $item->description }}
                            @endif
                            </td>
                            <td class="w-25">
                                <a href="#" class="btn btn-outline-primary">Buy</a>
                                <a href="{{ route('show_product' ,$item->id) }}" class="btn btn-outline-success">Show more</a>
                            </td>
                        </tr>
                    @endforeach
            @endif
            
          
        </tbody>
    </table> --}}
</div>
</div>    
   
@endsection