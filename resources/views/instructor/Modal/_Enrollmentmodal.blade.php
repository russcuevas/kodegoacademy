{{-- ENROLLMENT MODAL --}}
<div class="modal fade" id="enrollmentModal{{ $enrollment->enrollment_number }}" tabindex="-1" role="dialog" aria-labelledby="enrollmentModalLabel{{ $enrollment->enrollment_number }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="enrollmentModalLabel{{ $enrollment->enrollment_number }}">Enrollment Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p><strong>Enrollment No:</strong> {{ $enrollment->enrollment_number }}</p>
                <img src="{{ asset('storage/auth/images/profile_pictures/' . $enrollment->user->profile_picture) }}" style="height: 100px; width: 100px;" alt="Profile Picture">
                <p><strong>Enrollee Name:</strong> {{ $enrollment->user->name }}</p>
                <p><strong>Enrollee Email:</strong> {{ $enrollment->user->email }}</p>
                <p><strong>Enrollee Contact:</strong> {{ $enrollment->user->contact }}</p>
                <p><strong>Enrolled Course:</strong> {{ $enrollment->offered->course->course}}</p>
                <p><strong>Scheduled at:</strong> {{ \Carbon\Carbon::parse($enrollment->offered->scheduled_at)->format('F j, Y / h:i A')}}</p>
                <p><strong>Enrollment Status:</strong> <span style="color: orange; font-weight: 900;">{{ $enrollment->status }}</span></p>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Enrolled</button>
                <button type="submit" class="btn btn-danger">Cancelled</button>
                <button type="submit" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
