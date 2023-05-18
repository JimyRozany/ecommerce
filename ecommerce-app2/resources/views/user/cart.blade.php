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
                  
                    <div class="d-flex  ">
                        <div class="w-50">
                            <strong>total Price : $  {{ $totalPrice }}</strong>

                        </div>
                        <div class="vr mx-3"></div>
                        <div class="">
                            {{-- <a href="{{ route('checkout') }}">Ckeckout</a> --}}
                            {{-- data-stripe-publishable-key = "{{ env('STRIPE_KEY') }}" --}}
                            <form action="{{ route('checkout')}}" method="POST">
                                @csrf
                                <input class="form-control my-2 @error("first_name") is-invalid @enderror" type="text" name="first_name" placeholder="First Name"  >
                                @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input class="form-control my-2 @error("last_name") is-invalid @enderror" type="text" name="last_name" placeholder="Last Name"  >
                                @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input class="form-control my-2 @error("line_1") is-invalid @enderror" type="text" name="line_1" placeholder="line 1"  >
                                @error('line_1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input class="form-control my-2 @error("line_2") is-invalid @enderror" type="text" name="line_2" placeholder="line 2">
                                @error('line_2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input class="form-control my-2 @error("province") is-invalid @enderror" type="text" name="province" placeholder="Province"  >
                                @error('province')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input class="form-control my-2 @error("city") is-invalid @enderror" type="text" name="city" placeholder="City"  >
                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input class="form-control my-2 @error("phone_1") is-invalid @enderror" type="number" name="phone_1" placeholder="Phone 1"  >
                                @error('phone_1')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input class="form-control my-2 @error("phone_2     ") is-invalid @enderror" type="number" name="phone_2" placeholder="Phone 2">
                                @error('phone_2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <button class="btn btn-primary ">Checkout</button>
                            </form>
                        </div>
                    </div>
                    {{-- <hr class="py-3 ">    --}}
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