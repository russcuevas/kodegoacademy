@include('components.Form._Formheader')
<div class="container">
    <div class="title text-center">
        <h1>Forgot password</h1>
    </div>

    <div class="row justify-content-center">
        <form action="{{ route('resetform') }}" method="POST" class="col-md-4 mt-3 passwordResetForm">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <div class="form-group">
                <label for="password">New Password:</label>
                <div class="password-input-wrapper">
                    <input type="password" class="form-control" id="password" name="password" required>
                    <span class="password-toggle" onclick="togglePasswordVisibility()">&#x1F441;</span>
                </div>
                <span id="password-help" class="text-danger"></span>
            </div>

            <div class="form-group">
                <label for="confirm-password">Confirm Password:</label>
                <div class="confirm-password-input-wrapper">
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                    <span class="confirm-pass-toggle" onclick="toggleCPasswordVisibility()">&#x1F441;</span>
                </div>
                <span id="c-password-help" class="text-danger"></span>
            </div>

            <br>
            <button type="submit" class="btn btn-primary mt-2">Reset Password</button>
        </form>
    </div>
</div>

<!-- <body>
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
</body> -->
@include('components.Form._Formfooter')