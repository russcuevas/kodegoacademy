    <nav class="navbar navbar-expand-lg navbar-light bg-dark sticky-top" style="padding: 5px">
        <div class="container-fluid">
            <a class="navbar-brand" href="home.php"><img class="navlogo" src="{{ asset('page/images/headerlogo.png') }}" alt=""></a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a id="home-link" class="nav-link" href="{{ route('homepage') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a id="about-link" class="nav-link" href="{{ route('aboutpage') }}">About</a>
                    </li>
                    <li class="nav-item">
                        <a id="course-link" class="nav-link" href="{{ route('pagecourse') }}">Courses</a>
                    </li>
                    <li class="nav-item">
                        <a id="contact-link" class="nav-link" href="{{ route('contactpage') }}">Contact</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i>
                        </a>
                        <div class="dropdown-menu custom-dropdown-menu" aria-labelledby="userDropdown">
                            {{-- <a class="dropdown-item" style="font-weight: 600;" href="#">Profile</a> --}}
                            <a class="dropdown-item" style="font-weight: 600;" href="/login">Login</a>
                            {{-- <a class="dropdown-item" href="">Logout</a> --}}
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>