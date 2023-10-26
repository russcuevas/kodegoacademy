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

        @include('admin.Modal._Instructorsmodal')

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
                            <a href="#" style="text-decoration: none; color: #41a5c1" data-toggle="modal" data-target="#viewInstructorModal{{ $instructor->id }}">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <a href="#" style="text-decoration: none; color: #7EAA92" data-toggle="modal" data-target="#updateInstructorModal{{ $instructor->id}}">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <a href="#" style="text-decoration: none; color: #FF6969" data-toggle="modal" data-target="#deleteInstructorModal{{ $instructor->id}}">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('admin.Layout._Footer')