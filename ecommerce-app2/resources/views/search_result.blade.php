@extends('../../layouts/app2')

@section('content')
<div class="py-5">
    <a href="{{ url()->previous() }}"
        class="text-decoration-none text-dark fw-bold"
        >
        <i class="fa-solid fa-arrow-left"></i>
        Back
    </a>
    <h3 class="mt-2">search results <span class="h5 text-muted">"{{ $search_key }}"</span></h3>
    <hr>
    <table class="table">
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
      </table>
</div>
@endsection