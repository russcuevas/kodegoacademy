<div class="modal fade" id="enrollmentModal{{ $enrollment->id }}" tabindex="-1" role="dialog" aria-labelledby="enrollmentModalLabel{{ $enrollment->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="enrollmentModalLabel{{ $enrollment->enrollment_id }}">Enrollment Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>Enrollment No:</strong> {{ $enrollment->enrollment_number }}</p>
                <img style="width: 100px; height: 100px; object: fit;" src="{{ asset('storage/course/images/course/' . $enrollment->offered->course_picture) }}" class="card-img-top fixed-image" alt="Course Image">
                <p>
                    <strong>Position:</strong> {{ $enrollment->offered->position->position }}<br>
                    <strong>Course:</strong> {{ $enrollment->offered->course->course }}    
                </p>
                <hr>
                <img src="{{ asset('storage/auth/images/profile_pictures/' . $enrollment->offered->user->profile_picture) }}" style="height: 100px; width: 100px;" alt="Profile Picture">
                <p><strong>Instructor Name: </strong> {{ $enrollment->offered->user->name }}</p>
                <p><strong>Instructor Contact:</strong> {{ $enrollment->offered->user->contact }}</p>
                <p><strong>Scheduled at:</strong> <span style="color: red;">{{ \Carbon\Carbon::parse($enrollment->offered->scheduled_at)->format('F j, Y / h:i A')}}</span></p>
                <p><strong>End at:</strong> <span style="color: red;">{{ \Carbon\Carbon::parse($enrollment->offered->end_at)->format('F j, Y / h:i A')}}</span></p>
                <p><strong>Enrollment Status:</strong> <span style="color: orange; font-weight: 900;">{{ $enrollment->status }}</span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger change-status" data-status="Cancelled" data-enrollment-id="{{ $enrollment->id }}">Cancelled</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
