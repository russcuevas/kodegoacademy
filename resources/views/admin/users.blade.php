@include('admin.Layout._Html')
@include('admin.Layout._Navbar')
@include('admin.Layout._Sidebar')

<div class="container">
    <div class="main-content col-md-11">
        <h1 class="mb-2">Users</h1>
        <div class="mb-3">
            <a href="{{ route('dashboardpage') }}" style="font-weight: 900; text-decoration: none;"><i class="fa-solid fa-house"></i> Dashboard</a>
            / <i class="fa-solid fa-user"></i><span> Users</span>
        </div>


        <a href="#" class="btn btn-primary mb-2" id="add-user-link" data-toggle="modal" data-target="#add-user-modal">Add user +</a>

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

        <div class="table-responsive" style="overflow: scroll; height: 390px;">
            <table id="myTable" class="display table-hover">
                <thead>
                    <tr>
                        <th>Picture</th>
                        <th>Name</th>
                        <th>Email</th>
                        <!-- <th>Password</th> -->
                        <th>Contact</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td><img style="width: 50px; height: 50px;" src="{{ asset('storage/auth/images/profile_pictures/' . $user->profile_picture) }}" alt="$user->name"></td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->contact }}</td>
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