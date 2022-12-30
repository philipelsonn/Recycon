<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>
<body class="d-flex flex-column min-vh-100">
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-light active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="/showProduct">Show Product</a>
                    </li>
                    @if (auth()->user())
                        @if (auth()->user()->type == 'USER')
                        <li class="nav-item dropdown">
                            <a class="nav-link text-light" href="/showProduct">My Cart</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link text-light" href="/showProduct">Transaction History</a>
                        </li>
                        @elseif (auth()->user()->type == 'ADMIN')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Manage Item
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item text-dark" href="#">View Item</a></li>
                                <li><a class="dropdown-item text-dark" href="#">Add Item</a></li>
                            </ul>
                        </li>
                        @endif
                    @endif
                </ul>
                @if (auth()->user())
                <form class="d-flex w-50" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search product..." aria-label="Search">
                    <button class="btn btn-outline-light" type="submit">Search</button>
                </form>
                <div class="nav-item dropdown ms-3 me-3">
                    <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Profile
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item text-dark" href="#">Edit Profile</a></li>
                        <li><a class="dropdown-item text-dark" href="#">Change Password</a></li>
                    </ul>
                </div>
                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                @else
                <form class="d-flex" role="search">
                    <a class="btn btn-outline-light" type="submit" href="{{ route('login') }}">Login</a>
                    <a class="btn btn-outline-light ms-2" type="submit" href="{{ route('register') }}">Register</a>
                </form>
                @endif
            </div>
        </div>
    </nav>

    @yield('content')

    <footer class="bg-primary d-flex justify-content-center mt-auto">
        <p class="text-white p-2">&#169 2022 Copyright LC062</p>
    </footer>
</body>
</html>