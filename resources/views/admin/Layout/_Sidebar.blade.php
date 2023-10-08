<div class="sidebar" id="sidebar">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link {{ Request::route()->getName() == 'dashboardpage' ? 'active' : '' }}" href="{{ route('dashboardpage') }}">
                <i class="fa-solid fa-house"><span> Dashboard</span></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fa-solid fa-user"><span> Users</span></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fa-solid fa-person-chalkboard"><span> Instructor</span></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::route()->getName() === 'coursepage' ? 'active' : '' }}" href="{{ route('coursepage') }}">
                <i class="fa-solid fa-code"><span> Course</span></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::route()->getName() == 'websitepage' ? 'active' : '' }}" href="{{ route('websitepage') }}">
                <i class="fa-brands fa-chrome"><span> Page</span></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fa-solid fa-gear"><span> Settings</span></i>
            </a>
        </li>
    </ul>
</div>