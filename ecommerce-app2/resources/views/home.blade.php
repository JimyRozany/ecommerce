@extends('layouts.app2')

@section('content')
<div class="container py-5">
    @if ($products)
        <div class="text-center">
            <div class="row gap-1 d-flex justify-content-center ">
                @foreach ($products as $product)
                <div class="col-3">
                    <div class="card p-2" style="width: 16rem;">
                        <img src="{{ asset($product->image_path) }}" class="card-img-top" alt="..." width="250px" height="150px">
                        <div class="card-body">
                            <h5 class="card-title fw-bold">
                                @if(Str::length($product->name) > 50 )
                                    {{ Str::substr($product->name, 0, 50) . " ... "}}
        
                                    @else
                                        {{ $product->name }}
                                    
                                @endif
                            </h5>
                            <p class="card-text">
                                    @if(Str::length($product->description) > 50 )
                                        {{ Str::substr($product->description, 0, 50) . " ... "}}
                                        @else
                                        {{ $product->description }}
                                    @endif
                            </p>
                            <p class="card-text h5">
                                <span class=""> Price : </span>
                                <span class="fw-bold"> {{ $product->price }}</span>
                                <span class="text-success h4"> $</span>
                                    
                            </p>
                            <a href="#" class="btn btn-outline-primary">Buy</a>
                            <a href="{{ route('show_product' ,$product) }}" class="btn btn-outline-success">Show more</a>
                            
                        </div>
                    </div>
                    
                    
                </div>
                @endforeach
                
            </div>
        </div>
    @else
        <div class="d-flex justify-content-center">
            <div class="alert alert-danger text-center w-50 h5">
                no products here
            </div> 
        </div>
    @endif

    <div class="d-flex align-items-center justify-content-center py-5">
        {{ $products }}
    </div>
</div>    
   


@endsection