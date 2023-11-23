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
                <p><strong>Scheduled at:</strong> <span style="color: red;">{{ \Carbon\Carbon::parse($enrollment->offered->scheduled_at)->format('F j, Y / h:i A')}}</span></p>
                <p><strong>End at:</strong> <span style="color: red;">{{ \Carbon\Carbon::parse($enrollment->offered->end_at)->format('F j, Y / h:i A')}}</span></p>
                <p><strong>Enrollment Status:</strong> <span style="color: orange; font-weight: 900;">{{ $enrollment->status }}</span></p>
            </div>
            <div class="modal-footer">
                @if($enrollment->status === 'Cancelled')
                    <a href="#" class="delete-enrollment" data-enrollment-id="{{ $enrollment->id }}">Delete</a>
                    <button type="submit" class="btn btn-primary" data-dismiss="modal">Close</button>
                @elseif($enrollment->status === 'Pending')
                    <button type="button" class="btn btn-success change-status" data-status="Enrolled" data-enrollment-id="{{ $enrollment->id }}">Enrolled</button>
                    <button type="button" class="btn btn-danger change-status" data-status="Cancelled" data-enrollment-id="{{ $enrollment->id }}">Cancelled</button>
                    <button type="submit" class="btn btn-primary" data-dismiss="modal">Close</button>
                @else
                    <a href="#" class="delete-enrollment" data-enrollment-id="{{ $enrollment->id }}">Delete</a>
                    <button type="submit" class="btn btn-primary" data-dismiss="modal">Close</button>
                @endif
            </div>
        </div>
    </div>
</div>

