<div class="sidebar" id="sidebar">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link {{ Request::route()->getName() == 'dashboardpage' ? 'active' : '' }}" href="{{ route('dashboardpage') }}">
                <i class="fa-solid fa-house"></i><span style="font-weight: bold"> Dashboard </span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::route()->getName() == 'userspage' ? 'active' : '' }}" href="{{ route('userspage') }}">
                <i class="fa-solid fa-user"></i><span style="font-weight: bold"> Users </span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::route()->getName() == 'instructorspage' ? 'active' : '' }}" href="{{ route('instructorspage') }}">
                <i class="fa-solid fa-person-chalkboard"></i><span style="font-weight: bold"> Instructors </span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::route()->getName() === 'coursepage' ? 'active' : '' }}" href="{{ route('coursepage') }}">
                <i class="fa-solid fa-code"></i><span style="font-weight: bold"> Course </span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('homepage') }}">
                <i class="fa-brands fa-chrome"></i><span style="font-weight: bold"> Page </span>
            </a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fa-solid fa-gear"></i><span style="font-weight: bold"> Activity </span>
            </a>
        </li> --}}
    </ul>
</div>