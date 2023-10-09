<div id="dashboard" class="animate__animated animate__fadeIn" style="display: none;">
<div class="header">
    <div class="logo-container">
        <img src="{{ asset('instructor/images/favicon.png') }}" alt="" onclick="window.location.href = ('/instructordb');">
        <span class="text-white">KodeGo Academy</span>
        <div class="menu-toggle" id="menu-toggle">
            <i class="fa-solid fa-bars"></i>
        </div>
    </div>
    <div class="user-dropdown">
        <div class="circle">
            @if(Auth::user()->profile_picture)
                <img src="{{ asset('storage/auth/images/profile_pictures/' . Auth::user()->profile_picture) }}" alt="User" id="user-image" onclick="toggleDropdown()">
            @else
                <img src="{{ asset('auth/images/profile.png') }}" alt="User" id="user-image" onclick="toggleDropdown()">
            @endif
        </div>

        <div class="dropdown-content" id="dropdown-content">
            <a href="#"><i class="fa-solid fa-user"></i> Profile</a>
            <a href="{{ route('logout') }}"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
        </div>
    </div>

</div>

