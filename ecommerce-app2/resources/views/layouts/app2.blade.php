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
            <a href="{{ url('/') }}" class="navbar-brand">App Logo</a>

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


                   {{-- new code  --}}

                    @if(Auth::guard('seller')->check())
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
                    @elseif(Auth::guard('user')->check())
                        <li class="nav-item dropdown">            
                            <a href="#" class="nav-link dropdown-toggle d-inline-block" data-bs-toggle="dropdown">{{ auth('user')->user()->name }}</a>
                            <ul class="dropdown-menu bg-dark">
                                <li><a href="#" class="nav-link">Profile</a></li>
                                <li class="d-flex align-items-center">
                                    <a href="{{ route('cart') }}" class="nav-link">Cart</a>
                                    @if (!auth()->user()->cart()->count() == 0)
                                        <span class="text-light fw-bold bg-primary p-2 px-3 rounded-circle">{{ auth()->user()->cart()->count() }}</span>
                                    @endif  
                                </li>
                                <li>
                                    <form action="{{ route('logout') }}" method="post" class="p-0 nav-link">
                                        @csrf
                                        <button class=" border-0 bg-transparent nav-link " type="submit">Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li> 
                        @else

                        <a href="{{ route('login') }}" class="nav-link">Login</a>
                        <a href="{{ route('register') }}" class="nav-link">Register</a>
                        
                    @endif
                   
                   {{-- end new code  --}}

              
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
   
    @include('sweetalert::alert')

</body>
</html>