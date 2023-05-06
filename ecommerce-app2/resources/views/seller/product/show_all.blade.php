@extends('../../layouts/app2')

@section('content')
<div class="mt-5">
    <a 
        href="{{ route('seller_dashboard') }}"
        class="text-decoration-none text-dark fw-bold"
    >
        <i class="fa-solid fa-arrow-left"></i>
        Back
    </a>
    
</div>
<h1 >My All Products </h1>
@if (session('deleted'))
    <div class="alert alert-success" role="alert">
       {{ session('deleted')}}
    </div>
@endif
<div class="text-center">
    <div class="row gap-1 d-flex justify-content-center ">
        @foreach ($allProducts as $product)
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
                    <a href="{{ route('product.edit' ,$product) }}" class="btn btn-primary">Edit</a>
                    <a href="{{ route('product.show' ,$product)}}" class="btn btn-info">show</a>
                    <form 
                        action="{{ route('product.destroy' ,$product)}}" 
                        method="POST"
                        class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                </div>
              </div>
         </div>
        @endforeach
        
        
        
        
      
    </div>
  </div>
@endsection