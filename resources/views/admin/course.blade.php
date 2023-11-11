@include('admin.Layout._Html')
@include('admin.Layout._Navbar')
@include('admin.Layout._Sidebar')

<div class="container">
    <div class="main-content col-md-11">
        <h1 class="mb-2">Course</h1>
        <div class="mb-3">
            <a href="{{ route('dashboardpage') }}" style="font-weight: 900; text-decoration: none;"><i class="fa-solid fa-house"></i> Dashboard</a> 
            / <i class="fa-solid fa-code"></i><span> Course</span>
        </div>
        
        @include('admin.Modal._Coursemodal')

        <div class="table-responsive" style="overflow: scroll; height: 390px;">
            <table id="myTable" class="display table-hover">
                <thead>
                    <tr>
                        <th>Course picture</th>
                        <th>Course offered</th>
                        <th>Course description</th>
                        <th>Instructor</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><img src="" alt="Sample"></td>
                        <td>Backend/PHP Mysql</td>
                        <td>Enhance your backend skills</td>
                        <td>Archie De Vera</td>
                        <td>
                            <i class="fa-solid fa-eye"></i>
                            <i class="fa-solid fa-pen-to-square"></i>
                            <i class="fa-solid fa-trash"></i>
                        </td>
                    </tr>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('admin.Layout._Footer')

