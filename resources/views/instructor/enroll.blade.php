@include('instructor.Layout._Html')
@include('instructor.Layout._Navbar')
@include('instructor.Layout._Sidebar')


<div class="container">
    <div class="main-content col-md-11">
        <h1 class="mb-2">List of enrollee</h1>
        <div class="mb-3">
            <a href="{{ route('dashboardpage') }}" style="font-weight: 900; text-decoration: none;">
                <i class="fa-solid fa-house"></i> Dashboard
            </a> 
            / <i class="fa-solid fa-code"></i><span> List of enrollee</span>

<!-- Add this button inside your HTML structure -->
<div class="export" style="text-align: end">
    <a href="javascript:void(0);" id="printButton">Print data</a>
</div>

        </div>


        <div class="table-responsive" style="overflow: scroll; height: 390px;">
            <table id="myTable" class="display table-hover">
                <thead>
                    <tr>
                        <th>Enrollee No.</th>
                        <th>Enrollee Name</th>
                        <th>Enrollee Email</th>
                        {{-- <th>Enrollee Contact</th>
                        <th>Enrolled Course</th>
                        <th>Scheduled at</th>
                        <th>End at</th> --}}
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($enrollments as $enrollment)
                    <tr>
                        <td>{{ $enrollment->enrollment_number }}</td>
                        <td>{{ $enrollment->user->name }}</td>
                        <td>{{ $enrollment->user->email }}</td>
                        {{-- <td>{{ $enrollment->user->contact }}</td>
                        <td>{{ $enrollment->offered->course->course}}</td>
                        <td>{{ \Carbon\Carbon::parse($enrollment->offered->scheduled_at)->format('F j, Y / h:i A')}}</td>
                        <td>{{ \Carbon\Carbon::parse($enrollment->offered->end_at )->format('F j, Y / h:i A')}} </td> --}}
                        <td>
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#enrollmentModal{{ $enrollment->enrollment_number }}">View</a>
                        </td>
                    </tr>
                    @include('instructor.Modal._Enrollmentmodal')
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('instructor.Layout._Footer')
<script>
    $(document).ready(function () {
        // Add a click event listener to the print button
        $("#printButton").click(function () {
            // Open the print-friendly page in a new window
            window.open('{{ route('printpage') }}', '_blank');
        });
    });
</script>
