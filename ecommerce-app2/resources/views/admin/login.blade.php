<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div class="container">
        <div class="row m-auto mt-5 d-flex align-itmes-center justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                    <h3 class="card-title">Admin Login</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.login') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <div  class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                                @error('password')
                                    <div class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Login</button>
                        </form>
                        </form>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</body>
</html>