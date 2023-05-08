<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'E-Commerce') }}</title>

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

     <!-- Scripts -->
     @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    {{-- nav --}}
    <div class="navbar navbar-expand-sm bg-dark navbar-dark text-white fixed-top">
        <div class="container">
            <a href="#" class="navbar-brand">App Logo</a>

            <button 
                class="navbar-toggler" 
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navmenu"
            >
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">
                    @guest
                        @if (Request::url() === 'http://127.0.0.1:8000/login' || Request::url() === 'http://127.0.0.1:8000/register' || Request::url() === 'http://127.0.0.1:8000/seller/login' || Request::url() === 'http://127.0.0.1:8000/seller/register')
                            <li class="nav-item">

                            </li>
                            @else
                                <li class="nav-item">
                                    <form 
                                        action="{{ route('handle_search') }}"
                                        method="POST"
                                        class="d-flex">
                                        @csrf
                                        <input 
                                            class="form-control me-2" 
                                            type="search" 
                                            placeholder="Search" 
                                            aria-label="Search"
                                            name="search_key">

                                        <button class="btn btn-outline-success" type="submit">Search</button>
                                    </form>
                                </li>
                        @endif
                    @endguest
                    
                    @if (auth('seller' ,'user')->user())
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">{{ Auth::guard('seller')->user()->name }}</a>
                            <ul class="dropdown-menu bg-dark">
                                <li><a href="#" class="dropdown-item nav-link">Profile</a></li>
                                <li>
                                    <form action="{{ route('seller_logout') }}" method="post" class="dropdown-item p-0">
                                        @csrf
                                        <button class=" border-0 bg-transparent nav-link " type="submit">logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li> 
                    @else
                        <div class="d-flex justify-content-center align-items-center">
                            <a href="{{ route('login') }}" class="nav-link">Login</a>
                            <a href="{{ route('register') }}"class="nav-link">Register</a>
                        </div>
                        
                    @endif
              
                </ul>
            </div>
        </div>
    </div>
      {{-- content section  --}}
    <div class="container py-4">
       
        @yield('content')

    </div>
    

    {{-- scripts  --}}
    @yield('script')
</body>
</html>