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

        {{-- INCLUDING MODAL --}}
        @include('admin.Modal._Users')
        {{-- MODAL END --}}

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
                        <td><img style="width: 50px; height: 50px; border-radius: 50px;" src="{{ asset('storage/auth/images/profile_pictures/' . $user->profile_picture) }}" alt="$user->name"></td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->contact }}</td>
                        <td>
                            <a href="#" style="text-decoration: none" data-toggle="modal" data-target="#viewUserModal{{ $user->id }}">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                            <i class="fa-solid fa-pen-to-square"></i>
<a href="#" style="text-decoration: none" data-toggle="modal" data-target="#deleteUserModal{{ $user->id }}">
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