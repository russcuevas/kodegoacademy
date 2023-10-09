<div class="sidebar" id="sidebar">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link {{ Request::route()->getName() == 'instructordb' ? 'active' : '' }}" href="{{ route('instructordb') }}">
                <i class="fa-solid fa-house"><span> Dashboard</span></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::route()->getName() == 'enrollpage' ? 'active' : '' }}"  href="{{ route('enrollpage') }}">
                <i class="fa-solid fa-code"><span> Enrolled</span></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/">
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