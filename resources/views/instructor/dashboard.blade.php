@include ('instructor.Layout._Html')
@include ('instructor.Layout._Navbar')
@include ('instructor.Layout._Sidebar')

    <div class="container">
        <div class="main-content col-md-11">
            <div class="row">
                <div class="col-md-3 boxes">
                    <i class="fa-solid fa-user"><span> Welcome Instructor</span></i>
                    <h4 class="mt-3">{{ $instructor->name }}</h4>
                    {{-- <a href="">View.</a> --}}
                </div>

                <div class="col-md-3 boxes">
                    <i class="fa-solid fa-person-chalkboard"><span> Total enrollees</span></i>
                    <h4 class="mt-3">{{ $numberEnrollees }}</h4>
                    {{-- <a href="{{ route ('enrollpage') }}">View.</a> --}}
                </div>

                <div class="col-md-3 boxes">
                    <i class="fa-solid fa-code"><span> Assigned course</span></i>
                    @if ($assignedCourse->isNotEmpty())
                        <h4 class="mt-3">{{ $assignedCourse->first()->course->course }}</h4>
                    @else
                        <h4 class="mt-3" style="color: red">No assigned</h4>
                    @endif

                    {{-- <a href="">View.</a> --}}
                </div>
            </div>
        </div>
    </div>



@include ('instructor.Layout._Footer')

