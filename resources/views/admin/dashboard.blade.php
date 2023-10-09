@include('admin.Layout._Html')
@include('admin.Layout._Navbar')
@include('admin.Layout._Sidebar')

<div class="container">
    <div class="main-content col-md-11">
        <div class="row">
            <div class="col-md-3 boxes">
                <i class="fa-solid fa-user"><span> Total users</span></i>
                <h4 class="mt-3">15</h4>
                <a href="">View.</a>
            </div>

            <div class="col-md-3 boxes">
                <i class="fa-solid fa-person-chalkboard"><span> Total instructor</span></i>
                <h4 class="mt-3">15</h4>
                <a href="">View.</a>
            </div>

            <div class="col-md-3 boxes">
                <i class="fa-solid fa-code"><span> Total course</span></i>
                <h4 class="mt-3">15</h4>
                <a href="">View.</a>
            </div>
        </div>
    </div>
</div>

@include('admin.Layout._Footer')

