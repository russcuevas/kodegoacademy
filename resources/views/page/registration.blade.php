@include('components.Form._Formheader')

<div class="container">
    <div class="title text-center">
        <h1>Registration</h1>
    </div>

    <div class="row justify-content-center">
        <form action="{{ route('registrationrequest') }}" method="POST" class="col-md-4 mt-3" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="profile_picture">Profile picture</label>
                <input type="file" id="profile_picture" name="profile_picture" accept=".jpg, .jpeg, .png" style="display: none;">
                <label for="profile_picture" id="profile_picture_label">
                    <img src="{{ asset('auth/images/profile.png') }}" alt="User Icon" width="100" height="100" style="cursor: pointer">
                    Click to choose a picture
                </label>
            </div>

            <div class="form-group">
                <label for="name">Full name:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="contact">Phone number:</label>
                <input type="text" class="form-control" id="contact" name="contact" required pattern="[0-9]*" maxlength="11">
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <div class="password-input-wrapper">
                    <input type="password" class="form-control" id="password" name="password" required>
                    <span class="password-toggle" onclick="togglePasswordVisibility()">&#x1F441;</span>
                </div>
                <span id="password-help" class="text-danger"></span>
            </div>

            <div class="form-group">
                <label for="confirm-password">Confirm password:</label>
                <div class="confirm-password-input-wrapper">
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                    <span class="confirm-pass-toggle" onclick="toggleCPasswordVisibility()">&#x1F441;</span>
                </div>
                <span id="c-password-help" class="text-danger"></span>
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