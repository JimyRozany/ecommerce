@extends('../layouts/admin/admin-layout')

@section('content')
   <div class="container">
    <form action="{{ route('search.in.sellers') }}" method="POST" class="w-25 d-flex m-2">
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
       <a href="{{route('seller.trash')}}" class="btn btn-outline-secondary"> Trash </a>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>phone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sellers as $seller)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $seller->name }}</td>
                    <td>{{ $seller->email }}</td>
                    <td>{{ $seller->address }}</td>
                    <td>{{ $seller->phone }}</td>
                    <td>
                        <a href="{{ route('ban.seller', $seller->id) }}" class="btn btn-outline-secondary">Ban</a>
{{--                        <a href="{{ route('admin.users.destroy', $user->id) }}" class="btn btn-danger">Delete</a>--}}
                    </td>
                </tr>
                @endforeach
        </tbody>
    </table>
   </div>
@endsection
