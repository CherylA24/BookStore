<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS only -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- MyStyle CSS -->
    <link rel="stylesheet" href="/css/style.css">
    <title>@yield('title')</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark NavBar">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Book Store</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    @auth
                    @if (Auth::user()->role == 'Member')
                    <li class="nav-item">
                        <a href="{{ route('viewcart') }}" class="nav-link text-white">View Cart</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('viewtransaction') }}" class="nav-link text-white">View Transaction History</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Hello, {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                            <li><a class="dropdown-item" href="{{ route('changepassword') }}">Change Password</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Log Out</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endif
                    @if (Auth::user()->role == 'Admin')
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Manage
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('managebook') }}">Books</a></li>
                            <li><a class="dropdown-item" href="{{ route('managegenre') }}">Genre</a></li>
                            <li><a class="dropdown-item" href="{{ route('manageuser') }}">User</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Hello, {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                            <li><a class="dropdown-item" href="{{ route('changepassword') }}">Change Password</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Log Out</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endif
                    @else
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="nav-link text-white">Register</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="nav-link text-white">Login</a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container mt-5 Content">
        @yield('content')
    </div>

    <div class="container-fluid p-3 mt-5 text-white Footer">
        <div class="text-start">
            <small>Current date and time: {{ gmdate("D") }}, {{ gmdate("d M") }}, {{ gmdate("Y") }} {{ gmdate("H:i e A") }}</small>
        </div>
        <div class="text-center">
            <small>&copy {{ date("Y") }} Book Store</small>
        </div>
    </div>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- My Script -->
    <script src="/js/script.js"></script>
</body>
</html>