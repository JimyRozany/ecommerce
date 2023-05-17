@extends('../../layouts/app2')

@section('content')

<div class="p-5">

    <a href="{{ url()->previous() }}"
        class="text-decoration-none text-dark fw-bold"
        >
        <i class="fa-solid fa-arrow-left"></i>
        Back
    </a>

    <div class="d-flex justify-content-between align-items-center  m-auto shadow-lg p-3 mb-5 bg-body rounded">
        <div class="px-3"> 
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
            @auth
                @if (auth('seller')->user()->id == $product->seller_id)

                    <div class="fw-bold text-mute">
                        Status : {{ $product->status ? 'publised' : 'draft' }}
                    </div>
                    <div class="py-2">
                        <a href="{{ route('product.edit' ,$product) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ route('product.destroy' ,$product) }}" class="btn btn-danger">Delete</a>
                    </div>
        
                @endif
                @else
                        <a href="#" class="btn btn-success">buy</a>
            @endauth

           
        </div>
        <div class="">
            <img src="{{ asset($product->image_path) }}" alt="product image" width="500px">
        </div>
    </div>
</div>
    
@endsection