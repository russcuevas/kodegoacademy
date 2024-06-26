    <nav class="navbar navbar-expand-lg navbar-light bg-dark sticky-top" style="padding: 5px">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('homepage') }}"><img class="navlogo" src="{{ asset('page/images/headerlogo.png') }}" alt=""></a>

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

                    {{-- DISPLAYING NOTIFICATION --}}
                    @if (!Auth::check() || (Auth::user()->user_role === 'user'))
                        <li class="notification-dropdown">
                            <span style="cursor: pointer" id="notificationIcon" class="nav-link" href="">
                                <i class="fas fa-bell"></i>
                                <span id="notificationCounter">{{ $unreadNotifications }}</span>
                            </span>
                    <div id="notificationPanel" class="notification-box">
                    @if (Auth::check())
                        @if ($enrollments->isEmpty())
                            <p class="text-center">
                                <span class="text-danger">No message inbox</span>
                            </p>
                        @else
                            @foreach ($enrollments as $enrollment)
                                @php
                                    $notifications = app('App\Http\Controllers\NotificationController')->getNotifications($enrollment->id);
                                @endphp
                                @if ($notifications->isNotEmpty())
                                    @foreach ($notifications as $notification)
                                        @if ($notification->enrollment && $notification->enrollment->status === 'Pending')
                                        <p>
                                            <a href="{{ route('enrolledpage') }}" onclick="markNotificationAsSeen('{{ $notification->id }}')">
                                                <i class="fa-solid fa-hourglass-half" style="color: orange;"></i>
                                                Please wait for the approval by the instructor for 
                                                <span class="text-danger">
                                                    {{ $notification->enrollment->offered->position->position}} :
                                                    {{ $notification->enrollment->offered->course->course }}
                                                </span> 
                                                course thank you for enrolling!!
                                            </a>
                                        </p>
                                        @elseif ($notification->enrollment && $notification->enrollment->status === 'Enrolled')
                                            <p>
                                            <a href="{{ route('enrolledpage') }}" onclick="markNotificationAsSeen('{{ $notification->id }}')">
                                                <i class="fa-solid fa-check" style="color: green;"></i>
                                                You are now successfully enrolled in 
                                                <span class="text-danger">
                                                    {{ $notification->enrollment->offered->position->position}} :
                                                    {{ $notification->enrollment->offered->course->course }}
                                                </span> 
                                                course!
                                            </a>
                                        </p>
                                        @elseif ($notification->enrollment && $notification->enrollment->status === 'Cancelled')
                                        <p>
                                            <a href="{{ route('enrolledpage') }}" onclick="markNotificationAsSeen('{{ $notification->id }}')">
                                                <i class="fa-solid fa-xmark" class="text-danger"></i>
                                                Cancelled
                                                <span class="text-danger">{{ $notification->enrollment->offered->course->course }}</span> 
                                                course!
                                            </a>
                                        </p>
                                        @endif
                                        @endforeach
                                        @else
                                            <p class="text-center">
                                                <span class="text-danger">No message inbox</span>
                                            </p>
                                        @endif
                                    @endforeach
                                @endif
                            @else
                            <p class="text-center">
                                <a href="{{ route('loginpage') }}" class="text-danger">Login first</a>
                            </p>
                        @endif
                    </div>
                </li>
            @endif



                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user"></i>
                        </a>
                        <div class="dropdown-menu custom-dropdown-menu" aria-labelledby="userDropdown">
                            @auth
                            @if (auth()->user()->user_role === 'user')
                            <a class="dropdown-item" style="font-weight: 600;" href="{{ route('profilepage') }}">
                                <img style="height: 20px; width: 20px;" src="{{ asset('storage/auth/images/profile_pictures/' . Auth::user()->profile_picture) }}" alt=""> Profile</a>
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