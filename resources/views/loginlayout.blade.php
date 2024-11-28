<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet"  href="{{asset('ecweb/css/ecom.css')}}">
    <link rel="stylesheet"  href="{{asset('ecweb/css/loginlayout.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Josefin+Sans:ital,wght@0,100..700;1,100..700&family=PT+Serif:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">


    <!--materail icon -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined"
      rel="stylesheet">
</head>
<body>


    <nav class="navbar">
        <div class="navbar-links">
            <a href="{{ route('user.login') }}" class="nav-link">User Login</a>
            <a href="{{ route('admin.login') }}" class="nav-link">Admin Login</a>
            <a href="{{ route('user.register') }}" class="nav-link">User Register</a>
        </div>

        @auth
            <div class="navbar-logout">
                <a href="{{ route('logout') }}" class="nav-link">Logout</a>
            </div>
        @endauth
    </nav>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>
