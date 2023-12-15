@include('admin.Layout._Html')
@include('admin.Layout._Navbar')
@include('admin.Layout._Sidebar')

<div class="container mb-5">
    <div class="main-content col-md-11">
        <h1 class="mb-2">Course</h1>
        <div class="mb-3">
            <a href="{{ route('dashboardpage') }}" style="font-weight: 900; text-decoration: none;"><i class="fa-solid fa-house"></i> Dashboard</a> 
            / <i class="fa-solid fa-code"></i><span> Course</span>
        </div>
        
        @include('admin.Modal._Coursemodal')

        <div class="table-responsive" style="overflow: scroll; height: 390px;">
        <table id="myTable" class="display table-hover">
            <thead>
                <tr>
                    <th>Picture</th>
                    <th>Offered course</th>
                    <th>Available</th>
                    <th>Course description</th>
                    <th>Session at</th>
                    <th>End at</th>
                    <th>Instructor</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($offereds as $offered)
                    <tr>
                        <td><img style="width: 50px; height: 50px; border-radius: 50px" src="{{ asset('storage/course/images/course/' . $offered->course_picture) }}" alt="Course Image"></td>
                        <td>
                            <strong>Position:</strong> {{ $offered->position->position }}<br>
                            <strong>Course:</strong> {{ $offered->course->course }}
                        </td>
                        <td>
                            @if($offered->available > 0)
                            {{ $offered->enrollments->count() }}/15
                            @else
                                0/{{ $offered->available }}
                            @endif
                        </td>
                        <td>{{ $offered->course_description }}</td>
                        <td>{{ \Carbon\Carbon::parse($offered->scheduled_at)->format('F j, Y / h:i A') }}</td>
                        <td>{{ \Carbon\Carbon::parse($offered->end_at)->format('F j, Y / h:i A') }}</td>
                        <td>{{ $offered->user->name }}</td>
                        <td>
                            <i class="fa-solid fa-eye"></i>
                            <i class="fa-solid fa-pen-to-square"></i>
                            <i class="fa-solid fa-trash"></i>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
</div>

@include('admin.Layout._Footer')

