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
                    <li class="nav-item dropdown">
                        <a class="nav-link text-light" href="/showProduct">My Cart</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link text-light" href="/showProduct">Transaction History</a>
                    </li>
                </ul>
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
                <form class="d-flex" role="search">
                    <button class="btn btn-outline-light ms-2" type="submit">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer class="bg-primary d-flex justify-content-center mt-auto">
        <p class="text-white p-2">&#169 2022 Copyright LC062</p>
    </footer>
</body>
</html>
