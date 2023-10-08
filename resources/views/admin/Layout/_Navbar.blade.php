<div class="header">
    <div class="logo-container">
        <img src="{{ asset('admins/images/favicon.png') }}" alt="" onclick="window.location.href = ('/dashboard');">
        <span class="text-white">KodeGo Academy</span>
        <div class="menu-toggle" id="menu-toggle">
            <i class="fa-solid fa-bars"></i>
        </div>
    </div>
    <div class="user-dropdown">
        <img src="{{ asset('admins/images/favicon.png') }}" alt="User" id="user-image" onclick="toggleDropdown()">
        <div class="dropdown-content" id="dropdown-content">
            <a href="#"><i class="fa-solid fa-user"></i> Profile</a>
            <a href="#"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
        </div>
    </div>
</div>

