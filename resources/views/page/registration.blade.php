@include('components.Form._Formheader')

<div class="container">
    <div class="title text-center">
        <h1>Registration</h1>
    </div>

    <div class="row justify-content-center">
        <form action="" method="POST" class="col-md-4" enctype="multipart/form-data">
            <div class="form-group">
                <label for="profile_picture">Profile picture</label>
                <input type="file" id="profile_picture" name="profile_picture" accept=".jpg, .jpeg, .png" style="display: none;">
                <label for="profile_picture" id="profile_picture_label">
                    <img src="{{ asset('auth/images/profile.png') }}" alt="User Icon" width="100" height="100" style="cursor: pointer">
                    Click to choose a picture
                </label>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <br>

            <div class="form-group">
                <a href="/login">Click here if you have an account</a>
            </div>
            <button type="submit" class="btn btn-primary mt-2">Register</button>
        </form>
    </div>
</div>

@include('components.Form._Formfooter')