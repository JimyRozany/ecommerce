@extends('../../layouts/app2')

@section('content')

<div class="py-5 px-5">
    <a 
        href="{{ url()->previous() }}"
        class="text-decoration-none text-dark fw-bold"
    >
        <i class="fa-solid fa-arrow-left"></i>
        Back
    </a>
    <div class="d-flex justify-content-between align-items-center">
        <div class="w-50"> 
            <h2>{{ $product->name }}</h2>
            <div class="fw-bold text-mute">
                Price :
                <strong class="text-success">{{ $product->price }} $</strong>
            </div>
            <div class="fw-bold text-mute">
                Quantity :
                <strong class="{{ $product->quantity <= 5 ? 'text-danger':'text-primary'}}">{{ $product->quantity ?  $product->quantity : 'out of stock'}}</strong>
            </div>
            <div class="fw-bold text-mute">
                Description :
                <p >{{ $product->description }}</p>

            </div>

            @if (auth('seller')->user()->id == $product->seller_id)

                <div class="fw-bold text-mute">
                    Status : {{ $product->status ? 'publised' : 'draft' }}
                </div>
                <div class="py-2">
                    <a href="{{ route('product.edit' ,$product) }}" class="btn btn-primary">Edit</a>
                    <a href="{{ route('product.destroy' ,$product) }}" class="btn btn-danger">Delete</a>
                </div>
                
                    
                @else
                    <a href="#" class="btn btn-success">buy</a>
                
            @endif
        </div>
        <div class="w-50">
            <img src="{{ asset($product->image_path) }}" alt="product image">
        </div>
    </div>
</div>
    
@endsection