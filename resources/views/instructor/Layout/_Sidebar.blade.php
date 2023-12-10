<div class="sidebar" id="sidebar">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link {{ Request::route()->getName() == 'instructordb' ? 'active' : '' }}" href="{{ route('instructordb') }}">
                <i class="fa-solid fa-house"></i><span style="font-weight: 900"> Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::route()->getName() == 'enrollpage' ? 'active' : '' }}"  href="{{ route('enrollpage') }}">
                <i class="fa-solid fa-code"></i><span style="font-weight: 900"> Enrollees</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/">
                <i class="fa-brands fa-chrome"></i><span style="font-weight: 900"> Page</span>
            </a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fa-solid fa-gear"></i><span style="font-weight: 900"> Activity</span>
            </a>
        </li> --}}
    </ul>
</div>