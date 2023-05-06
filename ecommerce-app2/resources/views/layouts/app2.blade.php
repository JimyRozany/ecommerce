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
    {{-- navbar --}}
    {{-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
         <div class="">
            <div class="logo">
                <a class="navbar-brand" href="#">E-Commerce</a>
            </div>
            

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
  
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              
                <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
    
                <div class="user_actions">
                    logout
                </div>
            
            </div>
  
         </div>
        </div>
      </nav> --}}

    {{-- nav2 --}}
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
                    <li class="nav-item">
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </li>
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