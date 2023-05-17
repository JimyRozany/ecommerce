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
    <div class="navbar navbar-expand-sm bg-dark navbar-dark text-white fixed-top">
        <div class="container">
            <a href="{{ url('/') }}" class="navbar-brand">App Logo</a>
        </div>
    </div>
    <div class="py-5">
        @yield('content')
    </div>
</body>
</html>