@extends('../layouts/admin/admin-layout')

@section('content')
   <div class="container">
    <form action="{{ route('search.in.users') }}" method="POST" class="w-25 d-flex m-2">
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
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
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