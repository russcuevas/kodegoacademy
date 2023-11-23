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

            <div class="export" style="text-align: end">
                <a href="{{ route('printpage') }}" target="_blank" id="printButton" style="text-decoration: none" class="btn btn-success"> <i class="fa-solid fa-print"></i> Print</a>
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
    $(document).ready(function() {
        $('.delete-enrollment').on('click', function(e) {
            e.preventDefault();

            // Get the enrollment ID from the data-enrollment-id attribute
            var enrollmentId = $(this).data('enrollment-id');

            // Confirm deletion
            if (confirm('Are you sure you want to delete this enrollment?')) {
                // Make an AJAX request to delete the enrollment
                $.ajax({
                    type: 'DELETE',
                    url: '/enrollments/' + enrollmentId, // Replace with your actual route
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        // Handle success, e.g., remove the corresponding row from the table
                        console.log('Enrollment deleted successfully');
                        // You might want to reload the page or update the UI accordingly
                    },
                    error: function(error) {
                        console.error('Error deleting enrollment:', error);
                    }
                });
            }
        });
    });
</script>
