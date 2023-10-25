        {{-- ADD INSTRUCTOR MODAL --}}
        <a href="#" class="btn btn-primary mb-2" id="add-instructor-link" data-toggle="modal" data-target="#add-instructor-modal">Add instructor +</a>

        <div class="modal fade" id="add-instructor-modal" tabindex="-1" role="dialog" aria-labelledby="addInstructorModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addInstructorModalLabel">Add user</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="addInstructorForm" action="{{ route('addinstructors')}}" method="POST" class="addInstructorForm" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="profile_picture">Profile picture</label>
                            <input type="file" id="profile_picture" name="profile_picture" accept=".jpg, .jpeg, .png" style="display: none;"><br>
                            <label for="profile_picture" id="profile_picture_label">
                                <img src="{{ asset('auth/images/instructor_profile.png') }}" alt="User Icon" width="100" height="100" style="cursor: pointer">
                                Click to choose a picture
                            </label>
                        </div>

                        <div class="form-group">
                            <label for="name">Full name:</label>
                            <input type="text" class="form-control" id="name" name="name" >
                        </div>

                        <div class="form-group">
                            <label for="contact">Phone number:</label>
                            <input type="text" class="form-control" id="contact" name="contact"  pattern="[0-9]*" maxlength="11">
                        </div>

                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" >
                        </div>

                        <div class="form-group">
                            <label for="password">Password:</label>
                            <div class="password-input-wrapper">
                                <input type="password" class="form-control" id="password" name="password" >
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="confirm-password">Confirm password:</label>
                            <div class="confirm-password-input-wrapper">
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" >
                            </div>
                        </div>
                            <button type="submit" class="btn btn-primary mt-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- END ADD INSTRUCTOR --}}

        {{-- VIEW INSTRUCTOR MODAL --}}
        @foreach ($instructors as $instructor)
        <div class="modal fade" id="viewInstructorModal{{ $instructor->id }}" tabindex="-1" role="dialog" aria-labelledby="viewInstructorModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewInstructorModalLabel">Instructor Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img style="height: 100px; width: 100px; border-radius: 50px;" src="{{ asset('storage/auth/images/profile_pictures/' . $instructor->profile_picture) }}" alt="{{ $instructor->name }}">
                        <p>Name: {{ $instructor->name }}</p>
                        <p>Email: {{ $instructor->email }}</p>
                        <p>Phone number: {{ $instructor->contact }}</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        {{-- END VIEW INSTRUCTOR MODAL --}}