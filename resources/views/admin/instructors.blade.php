@include('admin.Layout._Html')
@include('admin.Layout._Navbar')
@include('admin.Layout._Sidebar')

<div class="container">
    <div class="main-content col-md-11">
        <h1 class="mb-2">Instructor</h1>
        <div class="mb-3">
            <a href="{{ route('dashboardpage') }}" style="font-weight: 900; text-decoration: none;"><i class="fa-solid fa-house"></i> Dashboard</a>
            / <i class="fa-solid fa-person-chalkboard"></i><span> Instructor</span>
        </div>

        <a href="#" class="btn btn-primary mb-2" id="add-user-link" data-toggle="modal" data-target="#add-user-modal">Add instructor +</a>

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
                        <form id="addUserForm" action="" method="POST" class="addUserForm">
                            @csrf
                            <div class="form-group">
                                <label for="email" class="text-black mb-2">Enter Email:</label>
                                <input type="email" class="form-control" id="forgot-email" name="email">
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
                    @foreach ($instructors as $instructor)
                    <tr>
                        <td><img style="width: 50px; height: 50px;" src="{{ asset('storage/auth/images/profile_pictures/' . $instructor->profile_picture) }}" alt="$instructor->name"></td>
                        <td>{{ $instructor->name }}</td>
                        <td>{{ $instructor->email }}</td>
                        <!-- <td>{{ $instructor->password }}</td> -->
                        <td>{{ $instructor->contact }}</td>
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