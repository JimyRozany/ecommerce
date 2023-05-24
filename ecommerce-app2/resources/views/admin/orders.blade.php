@extends('../layouts/admin/admin-layout')

@section('content')
   <div class="container">
    <form action="{{ route('search.in.orders') }}" method="POST" class="w-25 d-flex m-2">
        @csrf
        <input 
            type="text" 
            placeholder="Search" 
            class="form-control border-none mr-2 @error('search_key') is-invalid @enderror" 
            name="search_key">
        @error('search_key')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <button
            type="submit" 
            class="btn btn-secondary rounded-circle py-2">
            Go
        </button>
    </form>
    
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Status</th>
                <th>Total Price</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>line 1</th>
                <th>line 2</th>
                <th>province</th>
                <th>city</th>
                <th>phone 1</th>
                <th>phone 2</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $order->status }}</td>
                    <td>{{ $order->total_price }}</td>
                    <td>{{ $order->first_name }}</td>
                    <td>{{ $order->last_name }}</td>
                    <td>{{ $order->line_1 }}</td>
                    <td>{{ $order->line_2 }}</td>
                    <td>{{ $order->province }}</td>
                    <td>{{ $order->city }}</td>
                    <td>{{ $order->phone_1 }}</td>
                    <td>{{ $order->phone_2 }}</td>
                    <td>
                        {{-- <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ route('admin.users.destroy', $user->id) }}" class="btn btn-danger">Delete</a> --}}
                    </td>
                </tr>
                @endforeach
        </tbody>
    </table>
   </div>
@endsection