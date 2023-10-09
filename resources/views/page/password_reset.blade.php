@include('components.Form._Formheader')
            @if (isset($email))
            <div class="container">
                <div class="title text-center">
                    <h1>Registration</h1>
                </div>

                <div class="row justify-content-center">
                    <form action="" method="POST" class="col-md-4 mt-3 passwordResetForm" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input style="background-color: rgb(242, 227, 201);" type="email" class="form-control" id="email" name="email" value="{{ $email }}" readonly>
                        </div>

                        <div class="form-group">
                            <label for="password">New Password:</label>
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
                        <button type="submit" class="btn btn-primary mt-2">Reset Password</button>
                    </form>
                </div>
            </div>
            @else
            <body>
                <div style="display: flex; justify-content: center; align-items: center; height: 100vh;">
                    <p> 404 Not Found <a style="color: wheat; text-decoration: none" href="/login">Try again</a> </p>
                </div>
                <div>
                    <div class="hero"> 
                        <div class="cube"></div>
                        <div class="cube"></div>
                        <div class="cube"></div>
                        <div class="cube"></div>
                        <div class="cube"></div>
                        <div class="cube"></div>
                    </div>
                </div>
            </body>
        @endif
@include('components.Form._Formfooter')