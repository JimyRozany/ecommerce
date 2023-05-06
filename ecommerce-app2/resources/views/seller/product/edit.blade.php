@extends('../../layouts/app2')

@section('content')
<div class="py-5">

    @if (session('success'))
        <div class="alert alert-info" role="alert">
            {{ session('success'); }}
        </div>
        
    @endif

    <div class="">
        <a 
            href="{{ url()->previous() }}"
            class="text-decoration-none text-dark fw-bold"
        >
            <i class="fa-solid fa-arrow-left"></i>
            Back
        </a>
        
    </div>

    <h3>Edite Product</h3>
    <form action="{{ route('product.update', $product) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label  
                class="form-label"
            >
                Product Name
            </label>
            <input 
                type="text" 
                class="form-control @error('name') is-invalid @enderror"
                name="name"
                value="{{ $product->name }}" 
            >

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label 
                class="form-label">
               Description
            </label>
            <input 
                type="text" 
                class="form-control @error('description') is-invalid @enderror"
                name="description"
                value="{{ $product->description }}" 
            >

            @error('description')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label 
                class="form-label">
               Quantity
            </label>
            <input 
                type="number" 
                class="form-control @error('quantity') is-invalid @enderror"
                name="quantity"
                value="{{ $product->quantity}}" 
            >

            @error('quantity')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label 
                class="form-label">
               Status
            </label>
            <select id="status" name="status" class="form-select @error('status') is-invalid @enderror" aria-label="Default select example">
                <option value="1" selected>publish</option>
                <option value="0">Draft</option>
              </select>

            @error('status')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label 
                class="form-label">
               Price
            </label>
            <input 
                type="number" 
                class="form-control @error('price') is-invalid @enderror" 
                step="0.01"
                name="price"
                value="{{ $product->price}}" 

            >
            @error('price')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <label 
                class="form-label">
               Product Image
            </label>
            <input 
                type="file" 
                class="form-control @error('product_image') is-invalid @enderror" 
                step="0.01"
                name="product_image" 
                id="selectImage"

            >
            @error('product_image')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <img 
                id="preview" 
                src="{{ asset($product->image_path) }}" 
                alt="your image" 
                class="mt-3" 
                style="display:block;" 
                width="200px" 
                height="200px"/>
        </div>
        
        
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>  
</div>
  
@endsection


@section('script')
    <script>
        selectImage.onchange = evt => {
            preview = document.getElementById('preview');
            preview.style.display = 'block';
            const [file] = selectImage.files
            if (file) {
                preview.src = URL.createObjectURL(file)
            }
        }
    </script>
@endsection