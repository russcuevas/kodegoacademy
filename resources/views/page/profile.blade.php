<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('page/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('page/css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('page/sweetalert2/dist/sweetalert2.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="{{ asset('page/images/favicon.png') }}" type="image/x-icon">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <title>KodeGo Academy</title>
</head>
<body class="animate__animated animate__fadeIn">

    <nav class="navbar navbar-expand-lg navbar-light bg-dark sticky-top" style="padding: 5px">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('homepage') }}"><img class="navlogo" src="{{ asset('page/images/headerlogo.png') }}" alt=""></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <ul class="navbar-nav">
                    <li class="nav-item" id="nav-item-nav">
                        <a id="home-link" class="nav-link" href="{{ route('homepage') }}"> <i class="fas fa-home"></i> Home</a>
                    </li>
                    <li class="nav-item" id="nav-item-nav">
                        <a id="about-link" class="nav-link" href="{{ route('aboutpage') }}"> <i class="fas fa-book"></i> Enrolled</a>
                    </li>
                    <li class="nav-item" id="nav-item-nav">
                        <a id="course-link" class="nav-link" href="{{ route('pagecourse') }}"> <i class="fas fa-cogs"></i> Settings</a>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i>
                        </a>
                        <div class="dropdown-menu custom-dropdown-menu" aria-labelledby="userDropdown">
                            @auth
                            @if (auth()->user()->user_role === 'user')
                            {{-- <a class="dropdown-item" style="font-weight: 600;" href="{{ route('profilepage') }}">
                                <img style="height: 20px; width: 20px;" src="{{ asset('storage/auth/images/profile_pictures/' . Auth::user()->profile_picture) }}" alt=""> Profile</a> --}}
                            <a class="dropdown-item" href="{{ route('logout') }}" style="font-weight: 600;"><i style="margin-left: 3px;" class="fa-solid fa-right-from-bracket"></i> Logout</a>
                            @elseif (auth()->user()->user_role === 'admin')
                            <a class="dropdown-item" style="font-weight: 600;" href="/dashboard"><i class="fa-solid fa-house"></i> Dashboard</a>
                            @elseif (auth()->user()->user_role === 'instructor')
                            <a class="dropdown-item" style="font-weight: 600;" href="/instructordb"><i class="fa-solid fa-house"></i> Dashboard</a>
                            @endif
                            @else
                            <a class="dropdown-item" style="font-weight: 600;" href="/login">Login</a>
                            <a class="dropdown-item" style="font-weight: 600;" href="/registration">Register</a>
                            @endauth
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

        <aside class="sidebar">
            <div class="sidebar-header">
                <h3>Dashboard</h3>
            </div>
            <ul class="list-unstyled components mt-3">
                <li class="{{ Route::currentRouteName() == 'profilepage' ? 'active' : '' }}">
                    <a href="{{ route('profilepage') }}">
                        <i class="fas fa-user"></i> Dashboard
                    </a>
                </li>
                <li class="{{ Route::currentRouteName() == 'homepage' ? 'active' : '' }}">
                    <a href="{{ route('homepage') }}">
                        <i class="fas fa-home"></i> Home
                    </a>
                </li>
                <li class="{{ Route::currentRouteName() == '' ? 'active' : '' }}">
                    <a href="">
                        <i class="fas fa-book"></i> Enrolled
                    </a>
                </li>
                <li class="{{ Route::currentRouteName() == '' ? 'active' : '' }}">
                    <a href="">
                        <i class="fas fa-cogs"></i> Settings
                    </a>
                </li>
            </ul>
        </aside>



    {{-- PLUGINS --}}
    <script src="{{ asset('page/sweetalert2/dist/sweetalert2.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    {{-- AJAX --}}
    <script src="{{ asset('page/ajax/contact.js') }}"></script>
    <script src="{{ asset('page/ajax/enrollment.js')}}"></script>
    {{-- CUSTOM JS --}}
    <script src="{{ asset('page/js/page.js') }}"></script>
    <script src="{{ asset('page/vendor/tilt/tilt.jquery.min.js') }}"></script>
</body>
</html>

