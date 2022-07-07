<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    <header>
        <nav class="navbar navbar-dark bg-dark">
        <ul class="nav">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('landing') }}">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('contact') }}">Contact</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('about-us') }}">About us</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('product-review',[123, 243]) }}">Product Title</a>
        </li>
        {{-- Comment --}}

        @auth 
        <li class="nav-item">
            <a href="" class="nav-light">Logout</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled">Login</a>
        </li>
        @endauth 
        </ul>
        </nav>
    </header>
</body>
</html>