        {{-- ADD USER MODAL --}}
        <a href="#" class="btn btn-primary mb-2 add-user-button" id="add-user-link" data-toggle="modal" data-target="#add-user-modal" style="font-size: 20px">Add user +</a>

        <div class="modal fade" id="add-user-modal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addUserModalLabel">Add user</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="addUserForm" action="{{ route('addusers')}}" method="POST" class="addUserForm" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="profile_picture">Profile picture</label>
                            <input type="file" id="profile_picture" name="profile_picture" accept=".jpg, .jpeg, .png" style="display: none;"><br>
                            <label for="profile_picture" id="profile_picture_label">
                                <img src="{{ asset('auth/images/profile.png') }}" alt="User Icon" width="100" height="100" style="cursor: pointer">
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
        
        {{-- END ADD USER --}}

        {{-- VIEW MODAL --}}
        @foreach ($users as $user)
        <div class="modal fade" id="viewUserModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="viewUserModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewUserModalLabel">User Details</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img style="height: 100px; width: 100px; border-radius: 50px;" src="{{ asset('storage/auth/images/profile_pictures/' . $user->profile_picture) }}" alt="{{ $user->name }}">
                        <p>Name: {{ $user->name }}</p>
                        <p>Email: {{ $user->email }}</p>
                        <p>Phone number: {{ $user->contact }}</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

        {{-- END VIEW MODAL --}}


        {{-- EDIT MODAL --}}
        @foreach ($users as $user)
            <div class="modal fade" id="updateUserModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="updateUserModalLabel{{ $user->id }}" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="updateUserModalLabel{{ $user->id }}">Edit User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" id="updateUserForm" class="updateUserForm" action="{{ route('updateusers', ['id' => $user->id]) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="profile_pictures{{ $user->id }}">Profile picture</label>
                                    <input type="file" id="profile_pictures{{ $user->id }}" class="profile-input" name="profile_picture" accept=".jpg, .jpeg, .png" style="display: none;"><br>
                                    <label for="profile_pictures{{ $user->id }}" class="profile-picture-update">
                                    <img style="height: 100px; width: 100px; border-radius: 50px;" src="{{ asset('storage/auth/images/profile_pictures/' . $user->profile_picture) }}" alt="{{ $user->name }}">
                                        Click to choose a picture
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="update_name" name="name" value="{{ $user->name }}">
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="update_email" name="email" value="{{ $user->email }}">
                                </div>
                                <div class="form-group">
                                    <label for="contact">Phone number:</label>
                                    <input type="text" class="form-control" id="update_contact" name="contact"  pattern="[0-9]*" maxlength="11" value="{{ $user->contact }}">
                                </div>

                                <div class="form-group">
                                    <label for="password">Password:</label>
                                    <div class="password-input-wrapper">
                                        <input type="password" class="form-control" id="update_password" name="password">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="confirm-password">Confirm password:</label>
                                    <div class="confirm-password-input-wrapper">
                                        <input type="password" class="form-control" id="update_confirm_password" name="confirm_password" >
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-2">Save Changes</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        {{-- END EDIT MODAL --}}


        {{-- DELETE MODAL --}}
        @foreach ($users as $user)
        <div class="modal fade" id="deleteUserModal{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirm Deletion</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete {{ $user->name }}?</p>
                    </div>
                    <div class="modal-footer">
                        <form class="deleteUserForm" id="deleteUserForm" method="POST" action="{{ route('deleteusers', ['id' => $user->id]) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        {{-- END DELETE MODAL --}}